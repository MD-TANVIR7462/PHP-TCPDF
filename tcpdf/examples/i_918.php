<?php
require_once('formheader.php');
// require_once('localconfig.php');



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
        $this->SetY( -17 );

        $header_top_border = array(
            'B' => array( 'width' => 0.5, 'color' => array( 0, 0, 0 ), 'dash' => 0, 'cap' => 'butt' ),
        );
        $this->Cell(190, 4, '', $header_top_border, 1, 1 );

        //* Set font
        $this->SetFont( 'times', '', 9 );

        $this->Cell(40, 8.5, 'Form I-918   Edition   04/01/24', 0, 0, 'L' );

        //* if ( $this->page == 1 ) {
        $barcode_image = "images/G-639-footer-pdf417-$this->page.png";
        //* )
        $this->Image( $barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );
        //* Footer Barcode PDF417

        //* $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0 );

        $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 154.4, 268.5, true );
    }
}

$pdf = new MyPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

//* set document information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( '' );
$pdf->SetTitle('Form I-918, Petition for U Nonimmigrant Status');

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
$pdf->MultiCell( 120, 15, 'Petition for U Nonimmigrant Status ', 0, 'C', 0, 1, 48, 9, true );

$pdf->SetFont( 'times', 'B', 11 );
//* set font
$pdf->setCellPaddings( 2, 4, 6, 0 );
//* set cell padding
$pdf->MultiCell( 30, 5, 'USCIS  Form I-918', 0, 'C', 0, 1, 174.5, 5.5, true );

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

$pdf->SetFont('times', '', 10);
$html = '<div><b>To be completed by an attorney or accredited representative</b> (if any).  </div>';
$pdf->writeHTMLCell( 40, 7, 15, 85, $html,  0,  1, false, true, 'L', false );

$pdf->SetFont( 'times', '', 12 );


if(showData('form_918_g28_is_attached')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><input type="checkbox" name="table_2_CheckBox" value="Y" checked="'.$checked_data.'" /></div>';
$pdf->writeHTMLCell( 40, 15, 33, 83.5, $html, 0, 1, false, true, 'R', true );

$pdf->SetFont('times', '', 10);
$html = '<div><b>Select this box if <br>Form G-28 is <br>attached.</b></div>';
$pdf->writeHTMLCell( 40, 15, 61, 84.4, $html, 0, 1, false, true, 'L', true );

$pdf->writeHTMLCell( 48, 18, 94, 83.5, '',  'L',  1, false, true, 'L', true );

$pdf->writeHTMLCell( 48, 18, 143.7, 83.5, '',  'L',  1, false, true, 'L', true );

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell( 50, 15, 94.9, 83.6, $html, 0, 1, false, true, 'L', true );

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'attorney_state_bar_number', 46, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 96, 93.4 );

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>Attorney or According Representative USCIS Online Account Number</b> (if any)</div>';
$pdf->writeHTMLCell( 60, 15, 143.7, 83.5, $html, 0, 1, false, true, 'L', true );

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'attorney_uscis_online_account_number', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 93.4 );

$pdf->SetFont( 'times', 'B', 10 );
//* set font
$pdf->MultiCell( 100, 6, 'START HERE - Type or print in black or blue ink.', '', 'L', 0, 1, 19.5, 101.7, true );
$pdf->SetFont('times', '', 10);
//* set font
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 11, 100.7, false );
//* angle
$pdf->StopTransform();

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont('times', '', 10);
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font

$html = '<div><b>Part 1. Information About You</b> (Person filing this 
petition as a victim)</div>';
$pdf->writeHTMLCell( 90, 5, 13, 108, $html, 1, 1, true, false, 'J', true );
$pdf->SetFont( 'times', 'I', 11.6 );

//*................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 120, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_1a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 122 );
//* ............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 129, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_1b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 130.8 );

//*.......
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 10, 12, 140, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_1c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 139.6 );

//*.............
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 0, 0, 0, 0 );
$pdf->SetFont('times', '', 10);
$html = '<div><b>Other Names Used </b> (Include maiden name, nicknames, and 
aliases, if applicable)</div>';
$pdf->writeHTMLCell( 90, 5, 13, 147.7, $html, 0, 1, false, true, 'L', false );

//*..................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>2.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 156.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_2a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 157 );
//* ............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>2.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 165.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_2b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 166 );

//*.......
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>2.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 10, 12, 176.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_2c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 175 );
//*.............

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'I', 10 );
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font
$html = '<div><b>Home Address</b></div>';
$pdf->writeHTMLCell( 91, 7, 12.5, 183.5, $html, 0, 1, true, false, 'J', true );
$pdf->SetFont( 'times', 'IB', 9 );
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><I>(USPS ZIP Code Lookup)</I></a></div>';
$pdf->writeHTMLCell( 90, 1, 13, 184, $html, 0, 1, true, false, 'R', true );

//*.....
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>3.a. &nbsp;&nbsp;&nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 189.9, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_3a_street_number', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 192 );

//* ...........
$pdf->SetFont('times', '', 9.7);
//* set font
if(showData('information_about_you_home_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('information_about_you_home_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('information_about_you_home_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

$html = '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="3b_Apt" value="Apt" checked="'.$apt_checked.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="3b_Ste" value="Ste" checked="'.$ste_checked.'" />Ste. 
<input type="checkbox" name="3b_Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';
$pdf->writeHTMLCell( 61, 0, 12, 202, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_3b_apt_ste', 40, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 63.5, 200.7 );

//*......

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 210, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_3c_city_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 209.5 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 219, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part1_3d_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 218.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField( 'part1_3e_zip_code', 33.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 218.3 );

//*..........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 227.6, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_3f_province', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 226.8 );
//*...............

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 236.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_3g_Postal_Code', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 235.7 );
//*........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 243.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_3h_Country', 82.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21.5, 248.7 );
//* //*.....

//*? ... <<<Part 1 & page 1 first column Done >>..........<< second column started >>....

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'I', 10 );
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font
$html = '<div><b>Safe Mailing Address</b> &nbsp; <I>(if other than Home Address)</I></div>';
$pdf->writeHTMLCell( 91, 7, 112, 108, $html, 0, 1, true, false, 'J', true );

//*...........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>4.a.</b> &nbsp; In Care Of Name </div>';
$pdf->writeHTMLCell( 70, 0, 112, 116, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4a_Care_Of_Name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 121 );

//*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>4.b. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 128, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4b_street_number', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 130 );

//* //* ...........
$pdf->SetFont('times', '', 9.7);
//* set font
if(showData('information_about_you_mailing_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('information_about_you_mailing_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('information_about_you_mailing_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

$html = '<div><b>4.c. </b> 
<input type="checkbox" name="4c_Apt" value="Apt" checked="'.$apt_checked.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="4c_Ste" value="Ste" checked="'.$ste_checked.'" />Ste. 
<input type="checkbox" name="Flr" value="4c_Flr" checked="'.$flr_checked.'" /> Flr.
</div>';
$pdf->writeHTMLCell( 61, 0, 112, 139.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4c_apt_ste', 43, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 138.9 );

//* //*......

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>4.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 147.4, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4d_city_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 147.9 );
//* //*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>4.e.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>4.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 157.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part1_4e_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 157, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField( 'part1_4f_zip_code', 35, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 168, 157 );

//* //*..........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>4.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 165.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4g_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 166 );
//* //*...............

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>4.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 175, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4h_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 174.9 );
//*........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>4.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 182, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_4i_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 187.5 );
//* //* //*.....

//*?.............<<< Other information part -1 >>>.........Column 2
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont('times', '', 9.7);
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font

$html = '<div><b> <i> Other Information </i> </b>  </div>';
$pdf->writeHTMLCell( 90.6, 6, 112.6, 197, $html, '', 1, true, false, 'J', true );

//*....
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5. </b>  &nbsp; &nbsp; Alien Registration Number (A-Number) (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 112, 203.4, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 126.4, 143, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell( 30, 7, 147, 209, $html, 0, 1, false, false, 'J', true );

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_5_registration_Number', 50, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 153.5, 209 );

//* //*............

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>6. </b>  &nbsp; &nbsp;  U.S. Social Security Number (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 112, 216, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 132.6, 154.5, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_6_social_security', 50, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),  153.5, 223 );

//*.............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>7. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell( 80, 7, 112, 231, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 119, 174.8, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_7_online_account', 64, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 139.5, 237 );
//* //*...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>8.</b>&nbsp; &nbsp; &nbsp;Marital Status</div>';
$pdf->writeHTMLCell( 95, 0, 112, 243,  $html, 0, 1, false, 'L' );


if(showData('other_information_about_you_marital_status')=="single") $single_checked = "checked"; else $single_checked = "";
if(showData('other_information_about_you_marital_status')=="married") $married_checked = "checked"; else $married_checked = "";
if(showData('other_information_about_you_marital_status')=="divorced") $divorced_checked = "checked"; else $divorced_checked = "";
if(showData('other_information_about_you_marital_status')=="widowed") $widowed_checked = "checked"; else $widowed_checked = "";


$html = '
   <input type="checkbox" name="8_Single" value="Single" checked="'.$single_checked.'" /> Single
   
   &nbsp;  &nbsp; <input type="checkbox" name="8_Married" value="Married"  checked="'.$married_checked.'" /> Married

   &nbsp;  &nbsp; <input type="checkbox" name="8_Divorced" value="Divorced"  checked="'.$divorced_checked.'"/> Divorced

   &nbsp;  &nbsp; <input type="checkbox" name="8_Widowed" value="Widowed"  checked="'.$widowed_checked.'" /> Widowed
   ';

$pdf->writeHTMLCell( 195, 0, 119, 249.8, $html, 0, 1, false, true, 'J', 0 );

/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//* page number 2
//*.........

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 1. Information About You</b>(continued)</div>';
$pdf->writeHTMLCell( 91, 4, 12, 18, $html, 1, 1, true, false, 'L', true );
//*...........
$pdf->setFont('Times', '', 10);
$html = '<div><b>9.</b>&nbsp; &nbsp; &nbsp;Gender</div>';
$pdf->writeHTMLCell( 95, 0, 12, 27,  $html, 0, 1, false, 'L' );

if(showData('other_information_about_you_gender')=="male") $male_checked = "checked"; else $male_checked = "";
if(showData('other_information_about_you_gender')=="female") $female_checked = "checked"; else $female_checked = "";

$html = '<input type="checkbox" name="Part_1_9_Male" value="Male" checked="'.$male_checked.'" />&nbsp;&nbsp; Male
   
   &nbsp;  &nbsp; <input type="checkbox" name="Part_1_9_Female" value="Female" checked="'.$female_checked.'" />&nbsp;&nbsp;  Female';

$pdf->writeHTMLCell( 195, 0, 40, 29, $html, 0, 1, false, true, 'J', 0 );

//*.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>10.  </b> Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 12, 34, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_10_date_of_birth', 32, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 35 );
//*..........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>11.   </b> Country of Birth</div>';
$pdf->writeHTMLCell( 50, 0, 12, 41, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_11_Country_of_birth', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 46.9 );
//*..............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>12.   </b> Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell( 90, 0, 12, 54, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_12_Country_of_Citizenship', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 61 );

//*..........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>13.  </b>    Form I-94 Arrival-Departure Record Number</div>';
$pdf->writeHTMLCell( 80, 7, 12, 67.7, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 36, 59.8, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_13_Arrival_Departure', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 74.5 );

//*..........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>14.</b> &nbsp;Passport Number </div>';
$pdf->writeHTMLCell( 50, 5, 12, 82.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_14_Passport_Number', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 46, 83 );
//*.........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>15.</b> &nbsp;Travel Document Number </div>';
$pdf->writeHTMLCell( 50, 5, 12, 92.2, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_15_Travel_Document_Number', 46, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 57, 92 );
//*.........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>16.   </b>Country of Issuance for Passport or Travel Document</div>';
$pdf->writeHTMLCell( 100, 0, 12, 99, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_16_Country_of_Issuance', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 106 );
//*..............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>17.   </b>Date of Issuance for Passport or Travel Document </div>';
$pdf->writeHTMLCell( 90, 0, 12, 113.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 18, 118.2, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_17_Date_of_Issuance', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 120 );
//*..............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>18.   </b>Expiration Date for Passport or Travel Document</div>';
$pdf->writeHTMLCell( 90, 0, 12, 126.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 18, 130.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_18_Expiration_Date', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 132 );
//*..............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div>Place and Date of Last Entry into the United States and Date
Authorized Stay Expired</div>';
$pdf->writeHTMLCell( 90, 0, 12.4, 139.7, $html, '', 0, 0, true, 'L' );

//*......

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>19.a.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 150, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_19a_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 150.5 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>19.b.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 158, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part1_19b_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 158, $html, '', 0, 0, true, 'L' );

//*..............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>20.   </b>Date of Last Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 0, 12, 164.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 18, 169.2, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_20_Date_of_LastEntry', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 170.4 );

//*..........
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>21.   </b> Date Authorized Stay Expired (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 177.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_21_Date_Authorized', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 183.4 );

//*..........
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>22.   </b>Current Immigration Status</div>';
$pdf->writeHTMLCell( 100, 0, 12, 188, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part1_22_Current_immigration_status', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 194 );

//*.............
$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );

$html = '<div><b>Part 2. Additional Information About You</b></div>';
$pdf->writeHTMLCell( 91, 3, 12, 203.9, $html, 1, 1, true, false, 'L', true );
//*.............
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

//*!page 2 column-1 Finished
$pdf->SetFont('times', '', 9.7);
$html = '<div>If you need extra space to complete <b> Part 2. </b>, use the space
provided in <b> Part 8. Additional Information.</b>
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 18, $html, 0, 1, false, true, 'J', true );
//*.............
$pdf->SetFont('times', '', 9.7);
$html = '<div>Select "Yes" or "No," as appropriate, for each of the following
questions.</b>
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 29, $html, 0, 1, false, true, 'J', true );

//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.   &nbsp;  </b>      I am a victim of criminal activity listed in the INA at <br>      &nbsp;  &nbsp; &nbsp;  
section 101(a)(15)(U)(iii). </div>';
$pdf->writeHTMLCell( 90, 0, 112, 40, $html, '', 0, 0, true, 'L' );

if(showData('part_2_q1_victim_of_criminal_activity')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_2_q1_victim_of_criminal_activity')=="N") $checked_no = "checked"; else $checked_no = "";

$pdf->SetFont('times', '', 10);
$html ='<div>
<input type="checkbox" name="part2_1_y_currently_active" value="Y" checked="'.$checked_yes.'" /> Yes   &nbsp;
<input type="checkbox" name="part2_1_y_currently_active" value="N" checked="'.$checked_no.'" />  No
</div>';
$pdf->writeHTMLCell(60, 0, 170, 45, $html, '', 0, 0, true, 'L');

//*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>2.   &nbsp;  </b>      I have suffered substantial physical or mental abuse as a <br>      &nbsp;  &nbsp; &nbsp;  
result of having been a victim of this criminal activity </div>';
$pdf->writeHTMLCell( 90, 0, 112, 53, $html, '', 0, 0, true, 'L' );

if(showData('part_2_q2_i_have_suffered_substantial')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_2_q2_i_have_suffered_substantial')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_2_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp;
<input type="checkbox" name="part2_2_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell(60, 0, 170, 63, $html, '', 0, 0, true, 'L');

//*.................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>3.   &nbsp;  </b>      I possess information concerning the criminal activity of <br>      &nbsp;  &nbsp; &nbsp;  
which I was a victim </div>';
$pdf->writeHTMLCell( 90, 0, 112, 69, $html, '', 0, 0, true, 'L' );

if(showData('part_2_q3_Pocess_information_concerning')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_2_q3_Pocess_information_concerning')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_3_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_3_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell(60, 0, 170, 75, $html, '', 0, 0, true, 'L');

//*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>4.   &nbsp;  </b>     I am submitting Form I-918, Supplement B, U <br>      &nbsp;  &nbsp; &nbsp;  
Nonimmigrant Status Certification, from a certifying <br>      &nbsp;  &nbsp; &nbsp;  
official</div>';
$pdf->writeHTMLCell( 90, 0, 112, 82, $html, '', 0, 0, true, 'L' );

if(showData('part_2_q4_submitting_form_non_immigrant')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_2_q4_submitting_form_non_immigrant')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_4_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp;
<input type="checkbox" name="part2_4_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 92, $html, '', 0, 0, true, 'L' );

//*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5.   &nbsp;  </b>     The crime of which I am a victim occurred in the United 
<br>      &nbsp;  &nbsp; &nbsp;  
States (including Indian country and military installations) 
 <br>      &nbsp;  &nbsp; &nbsp;  
 or violated the laws of the United States.</div>';
$pdf->writeHTMLCell( 90, 0, 112, 100, $html, '', 0, 0, true, 'L' );

if(showData('part_2_q5_the_crime_which_im_victime')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_2_q5_the_crime_which_im_victime')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_5_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp;
<input type="checkbox" name="part2_5_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 115, $html, '', 0, 0, true, 'L' );

//*....................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>6.   &nbsp;  </b>      I am under 16 years of age </div>';
$pdf->writeHTMLCell( 90, 0, 112, 124, $html, '', 0, 0, true, 'L' );

if(showData('part_2_q6_im_under_16_years')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_2_q6_im_under_16_years')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_6_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp;
<input type="checkbox" name="part2_6_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 125, $html, '', 0, 0, true, 'L' );
//*....................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>7.a. &nbsp;</b>I was or am in immigration proceedings.</div>';
$pdf->writeHTMLCell( 90, 0, 112, 134, $html, '', 0, 0, true, 'L' );

if(showData('other_info_family_immegration_process')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('other_info_family_immegration_process')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_7_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp;
<input type="checkbox" name="part2_7_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 140, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.7);
$html = '<div>If you answered "Yes," select the type of proceedings. If you
were in proceedings in the past and are no longer in proceedings,
provide the date of action. If you are currently in proceedings,
type or print “Current” in the appropriate date field. Select <b>all
applicable</b> boxes.Use the space provided in <b>Part 8. Additional
Information </b> to provide an explanation.
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 148, $html, 0, 1, false, true, 'L', true );

/* $pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 179.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont('times', '', 9.7); */

if(showData('immigration_proceedings_removal')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><b>7.b. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7b" value="Y" checked="'.$checked_data.'" /> Removal Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 178, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 184, 'Removal Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_removal_date', 40, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 164, 184);

/* $pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 190.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont('times', '', 9.7); */

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_exclusion')=="Y") $checked_data = "checked"; else $checked_data = "";

$html = '<div><b>7.c. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7c" value="Y" checked="'.$checked_data.'" /> Exclusion Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 189, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 194, 'Exclusion Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_exclusion_date', 40, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 164, 193);

/* $pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 200.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont('times', '', 9.7); */

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_deportion')=="Y") $checked_data = "checked"; else $checked_data = "";

$html = '<div><b>7.d. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7d" value="Y" checked="'.$checked_data.'" /> Deportation Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 199, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 204, 'Deportation Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_deportion_date', 40, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 164, 202);

/* $pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 210.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont('times', '', 9.7); */

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_rescission')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><b>7.e. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7e" value="Y" checked="'.$checked_data.'" /> Rescission Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 209, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 214, 'Rescission Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_rescission_date', 40, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 164, 213.067);

/* $pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 220.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont('times', '', 9.7); */

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_judicial')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><b>7.f. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7f" value="Y" checked="'.$checked_data.'" /> Judicial Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 219, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 224, 'Judicial Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_judicial_date', 40, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 164, 223);

/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//* page number 3
//*............

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 0, 0, 0, 0 );

$html = '<div><b> Part 2. Additional Information About You </b>&nbsp;&nbsp; (continued) </div>';
$pdf->writeHTMLCell( 91, 6, 12.5, 18, $html, 1, 1, true, false, 'L', true );
//*...........
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>Provide the date of entry, place of entry, and status under
which you entered the United States for each entry during
the five years preceding the filing of this petition.</b></div>';
$pdf->writeHTMLCell( 93, 7, 12, 30, $html, 0, 1, false, true, 'L', true );
//*........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>8.a </b> &nbsp;&nbsp;Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 7, 12, 45, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_8a_date_of_Entry', 32.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 44.5 );
//*..........
$pdf->SetFont('times', '', 9.7);
$html = '<div>Place of Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 7, 12, 50, $html, 0, 1, false, false, 'L', true );
//*............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>8.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 58, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_8b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 57.5 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>8.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 66, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part2_8c_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 66, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>8.d   </b>&nbsp; Status at the Time of Entry (for example, F-1 student,
B-2<br>      &nbsp;  &nbsp; &nbsp;&nbsp; tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 72.9, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_8d_status', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 82.6 );
//*..........

$pdf->writeHTMLCell( 91, 5, 12, 86.5, '', 'B', 1, false, true, 'L', true );

//*.............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>9.a </b>   &nbsp;&nbsp;Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 7, 12, 94.4, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_9a_date_of_Entry', 32.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 93.5 );
//*..........
$pdf->SetFont('times', '', 9.7);
$html = '<div>Place of Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 7, 12, 100, $html, 0, 1, false, false, 'L', true );
//*............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>9.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 108, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_9b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 108 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>9.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 116, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part2_9c_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 116, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>9.d.   </b>&nbsp; Status at the Time of Entry (for example, F-1 student,
 B-2<br>      &nbsp;  &nbsp; &nbsp;&nbsp; tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 124, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_9d_status', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 133.5 );
//*..........

$pdf->writeHTMLCell( 91, 5, 12, 137.4, '', 'B', 1, false, true, 'L', true );

//*.............
//*.............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>10.a </b>   &nbsp;&nbsp;Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 7, 12, 144.4, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_10a_date_of_Entry', 32.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 144.5 );
//*..........
$pdf->SetFont('times', '', 9.7);
$html = '<div>Place of Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 7, 12, 150, $html, 0, 1, false, false, 'L', true );
//*............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>10.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 158, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_10b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 158 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>10.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 166, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part2_10c_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 166, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>10.d   </b>&nbsp; Status at the Time of Entry (for example, F-1 student,
B-2<br>      &nbsp;  &nbsp; &nbsp;&nbsp; tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 174, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_10d_status', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 183.5 );
//*..........



//*.............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>If you are outside of the United States, provide the U.S.
 Consulate or inspection facility or a safe foreign mailing
 address you want notified if this petition is approved.</b></div>';
$pdf->writeHTMLCell( 93, 7, 12, 195, $html, 0, 1, false, true, 'L', true );
//*........

$pdf->setFont('Times', '', 10);
$html = '<div><b>11.a.</b>&nbsp; &nbsp; &nbsp;Type of Office (Select <b>only one</b> box):</div>';
$pdf->writeHTMLCell( 95, 0, 12, 210.5,  $html, 0, 1, false, 'L' );


if(showData('additional_info_about_you_type_of_office_us_consulate')=="Y") $part2_11a_us = "checked"; else $part2_11a_us = "";
if(showData('additional_info_about_you_type_of_office_pre_flight_inspection')=="Y") $part2_11a_pf_ins = "checked"; else $part2_11a_pf_ins = "";
if(showData('additional_info_about_you_type_of_office_port_of_entry')=="Y") $part2_11a_poe = "checked"; else $part2_11a_poe = "";

$html = '<div>
<input type="checkbox" name="part2_11a_us" value="U" checked="'.$part2_11a_us.'" />   U.S Consulate &nbsp; &nbsp; 
<input type="checkbox" name="part2_11a_pf_ins" value="P" checked="'.$part2_11a_pf_ins.'" />   Pre-Flight Inspection 
<br>
<input type="checkbox" name="part2_11a_poe" value="E" checked="'.$part2_11a_poe.'" />   Port-of-Entry
</div>';
$pdf->writeHTMLCell( 72, 5, 25, 217, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>11.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 230, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_11b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 230 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>11.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 239, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part2_11c_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 238.5, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>11.d.   </b>&nbsp; Country </div>';
$pdf->writeHTMLCell( 90, 0, 12, 246, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_11d_country', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 251 );

//*?..........Page 3 -- <<< Column 1 finished >>>......................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>Safe Foreign Address Where You Want Notification Sent</b>
(if other than U.S. Consulate, Pre-Flight Inspection, or
Port-of-Entry)</div>';
$pdf->writeHTMLCell( 90, 7, 112, 18, $html, 0, 1, false, true, 'J', true );
//*.............

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>12.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   and Name</div>';
$pdf->writeHTMLCell( 90, 7, 112, 32.5, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_12a', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 34 );
//*...........

$pdf->SetFont('times', '', 9.7);
//* set font

if(showData('information_about_you_safe_foreign_notification_apt_ste_flr')=="apt") $part2_12b_apt = "checked"; else $part2_12b_apt = "";
if(showData('information_about_you_safe_foreign_notification_apt_ste_flr')=="ste") $part2_12b_ste = "checked"; else $part2_12b_ste = "";
if(showData('information_about_you_safe_foreign_notification_apt_ste_flr')=="flr") $part2_12b_flr = "checked"; else $part2_12b_flr = "";

$html = '<div><b>12.b. </b>&nbsp;
<input type="checkbox" name="part2_12b_Apt" value="Apt" checked="'.$part2_12b_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="part2_12b_Ste" value="Ste" checked="'.$part2_12b_ste.'" />Ste.
<input type="checkbox" name="part2_12b_Flr" value="Flr" checked="'.$part2_12b_flr.'" /> Flr.
</div>';
$pdf->writeHTMLCell( 60, 0, 112, 44, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_12b', 44.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 159.5, 42.6 );
//*...........

$pdf->SetFont('times', '', 10);
//* set font
$html = '<div><b>12.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 52, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part2_12c_city_town', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 51.6 );
//*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>12.d.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell( 90, 7, 112, 62, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField( 'part2_12d_province', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 60.5 );
//*.............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>12.e.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell( 90, 7, 112, 70.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField( 'part2_12e_postal_code', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 69 );
//*.............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>12.f.</b> &nbsp;&nbsp; Country';
$pdf->writeHTMLCell( 90, 7, 112, 77.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField( 'part2_12f_country', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 122, 82.5 );
//*?............<<<Part 2 end -Page -3>>>>................

//*?.................<<Part 3 starts >>...................

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont('times', '', 10);
//* set font
$pdf->setCellHeightRatio( 1.1 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font
$html = '<div><b>Part 3. Processing Information</b></div>';
$pdf->writeHTMLCell( 90, 7, 114, 95, $html, 1, 1, true, false, 'L', true );
//*.............
$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div>Answer the following questions about yourself. For the
purposes of this petition, you must answer "Yes" to the
following questions, if applicable, even if your records were
sealed or otherwise cleared or if anyone, including a judge, law
enforcement officer, or attorney, told you that you no longer
have a record</div>';
$pdf->writeHTMLCell( 90, 7, 112, 103, $html, '', 1,  false, true, 'L', true );
//*................
$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>NOTE:</b> &nbsp;: If you answer “Yes” to <b>ANY</b> question in <b>Part 3.</b>,
provide an explanation in the space provided in <b>Part 8.
Additional Information.</b>';
$pdf->writeHTMLCell( 90, 7, 112, 127, $html, '', 0, 0, true, 'L' );
//*...........
$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>NOTE:</b> &nbsp;: Answering "Yes" does not necessarily mean that U.S.
Citizenship and Immigration Services (USCIS) will deny your
Petition for U Nonimmigrant Status.</b>';
$pdf->writeHTMLCell( 90, 7, 112, 141, $html, '', 0, 0, true, 'L' );
//*...........
$pdf->SetFont('times', '', 10);
//* set font
$html = '<> Have you <b>EVER:</b></>';
$pdf->writeHTMLCell( 90, 7, 112, 155.5, $html, '', 0, 0, true, 'L' );
//*...........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.a.   &nbsp;  </b>     Committed a crime or offense for which you have not <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
been arrested?. </div>';
$pdf->writeHTMLCell( 90, 0, 112, 163, $html, '', 0, 0, true, 'L' );


if(showData('part_3_1a_committed_a_crime_or_offense')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1a_committed_a_crime_or_offense')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 168, $html, '', 0, 0, true, 'L' );

//*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.b.   &nbsp;  </b>    Been arrested, cited, or detained by any law enforcement <br> &nbsp; &nbsp;  &nbsp; &nbsp; 
officer (including Department of Homeland Security (DHS), <br>  &nbsp;&nbsp; &nbsp;  &nbsp; 
former Immigration and Naturalization Service (INS), and  <br> &nbsp; &nbsp; &nbsp;  &nbsp; 
 military officers) for any reason? </div>';
$pdf->writeHTMLCell( 100, 0, 112, 174, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1b_Been_arrested_or_detained')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1b_Been_arrested_or_detained')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 187, $html, '', 0, 0, true, 'L' );

//* //*.................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.c.   &nbsp;  </b>    Been charged with committing any crime or offense?</div>';
$pdf->writeHTMLCell( 90, 0, 112, 193, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1c_Been_charged_any_crime_offense')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1c_Been_charged_any_crime_offense')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 197, $html, '', 0, 0, true, 'L' );

//* //*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.d.   &nbsp;  </b>    Been convicted of a crime or offense (even if the  <br>      &nbsp;  &nbsp; &nbsp; &nbsp;  
violation was subsequently expunged or pardoned)? <br>   
</div>';
$pdf->writeHTMLCell( 90, 0, 112, 204, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1d_been_charged_any_crime_offense')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1d_been_charged_any_crime_offense')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1d_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1d_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 213, $html, '', 0, 0, true, 'L' );

//* //*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.e.   &nbsp;  </b>     Been placed in an alternative sentencing or a  rehabilitative
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
program (for example, diversion, deferred prosecution, 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 withheld adjudication, deferred adjudication)?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 220, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1e_been_placed_alternative_sentencing')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1e_been_placed_alternative_sentencing')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1e_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1e_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 232, $html, '', 0, 0, true, 'L' );

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//* page number 3
//*...........

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 3. Processing Information </b> (continued) </div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.f.   &nbsp;  </b>    Received a suspended sentence, been placed on probation,  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
or been paroled? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 27, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1f_received_a_suspended_sentence')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1f_received_a_suspended_sentence')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1f_y" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1f_n" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 32, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.g.   &nbsp;  </b>    Been in jail or prison?  </div>';
$pdf->writeHTMLCell( 90, 0, 12, 37, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1g_been_in_jail_or_prison')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1g_been_in_jail_or_prison')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1g_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1g_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 37.5, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.h.   &nbsp;  </b>    Been the beneficiary of a pardon, amnesty, rehabilitation, <br>      &nbsp; &nbsp; &nbsp; &nbsp;   or other act of clemency or similar action? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 44, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1h_been_the_beneficiary_of_a_pardon')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1h_been_the_beneficiary_of_a_pardon')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1h_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1h_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 52, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>1.i.   &nbsp;  </b>    Exercised diplomatic immunity to avoid prosecution for a <br>      &nbsp; &nbsp; &nbsp; &nbsp;   criminal offense in the United States? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 58, $html, '', 0, 0, true, 'L' );

if(showData('part_3_1i_exercised_diplomatic_immunity')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_1i_exercised_diplomatic_immunity')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_1i_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_1i_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 65, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.7);
//* set font

$html = '<div><b>Information About Arrests, Citations, Detentions, or Charges</b></div>';
$pdf->writeHTMLCell( 100, 7, 12, 71, $html, '', 1,  false, true, 'L', true );

$html = '<div>If you answered “Yes” to any of the above questions, respond to
the questions below to provide additional details. If you need
extra space, use the space provided in <b> Part 8. Additional
Information.</b></div>';
$pdf->writeHTMLCell( 90, 7, 12, 76.5, $html, '', 1,  false, true, 'L', true );

//*..........................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>2.a.   </b> Why were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 94, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_2a', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 100);
//*..........................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>2.b.   </b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 100, 0, 12, 108.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_2b', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 66, 114);
//*...............
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div>Where were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 121.5, $html, '', 0, 0, true, 'L' );
//*...................

$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>2.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 128, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_2c_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 128);
//*............

$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<b>2.d.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 136, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part3_2d_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 136, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>2.e.   </b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 90, 0, 12, 143, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_2e_country', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 148.5);
//*..................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>2.f.   </b>&nbsp;Outcome or disposition (for example, no charges filed, 
<br>      &nbsp;  &nbsp;&nbsp; charges dismissed, jail, probation)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 156, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_2f_outcome_dis_chrg', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 165.5);

$pdf->writeHTMLCell( 91, 5, 12.4, 170.4, '', 'B', 1, false, true, 'L', true );

//*?.........................<><>........................................

//*..........................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>3.a.   </b> Why were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 178, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_3a', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 184);
//*..........................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>3.b.   </b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 100, 0, 12, 191.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_3b', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 66, 197.5);
//* //*...............
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div>Where were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 205.5, $html, '', 0, 0, true, 'L' );
//* //*...................

$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 211.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part3_3c', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 212 );
//* //*............

$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 220, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="part3_3d" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 220, $html, '', 0, 0, true, 'L' );

//* //*..................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>3.e.   </b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 90, 0, 12, 227, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part3_3e', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 232.5 );
//* //*..................
$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div><b>3.f.   </b>&nbsp;Outcome or disposition (for example, no charges filed, 
<br>      &nbsp;  &nbsp;&nbsp; charges dismissed, jail, probation)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 240, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_3f', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 249.5 );

//*?.............<<4th page first column done>> .............

$pdf->SetFont('times', '', 9.9);
//* set font
$html = '<div>Have you <b>EVER:</b
></div>';
$pdf->writeHTMLCell( 90, 0, 112, 18, $html, '', 0, 0, true, 'L' );
//*...............

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>4.a.   &nbsp;  </b>    Engaged in, or do you intend to engage in, prostitution or  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
procurement of prostitution? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 27, $html, '', 0, 0, true, 'L' );

if(showData('part_3_4a_engaged_in_or_intend')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_4a_engaged_in_or_intend')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_4a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_4a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 32, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>4.b.   &nbsp;  </b>    Engaged in any unlawful commercialized vice, including,   <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
but not limited to, illegal gambling? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 37.4, $html, '', 0, 0, true, 'L' );

if(showData('part_3_4b_illegal_gambling')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_4b_illegal_gambling')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_4b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_4b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 42.7, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>4.c.   &nbsp;  </b>    Knowingly encouraged, induced, assisted, abetted, or  <br>      &nbsp; &nbsp; &nbsp; &nbsp;   aided any alien to try to enter the United States illegally? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 48.5, $html, '', 0, 0, true, 'L' );

if(showData('part_3_4c_knowingly_encouraged')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_4c_knowingly_encouraged')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_4c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_4c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 58, $html, '', 0, 0, true, 'L' );
//* //*.........

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>4.d.   &nbsp;  </b>     Illicitly trafficked in any controlled substance or knowingly
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
assisted, abetted, or colluded in the illicit trafficking of any 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 controlled substance?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 66, $html, '', 0, 0, true, 'L' );

if(showData('part_3_4d_Illicitly_trafficked')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_4d_Illicitly_trafficked')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_4d_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_4d_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 75, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.7);
$html = '<div>Have you <b>EVER</b> committed, planned or prepared, participated
in, threatened to, attempted to, conspired to commit, gathered
information for, or solicited funds for any of the following:
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 82, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5.a.   &nbsp;  </b>   Hijacking or sabotage of any conveyance (including an  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
aircraft, vessel, or vehicle)? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 96, $html, '', 0, 0, true, 'L' );

if(showData('part_3_5a_hijacking_or_sabotage')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_5a_hijacking_or_sabotage')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_5a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_5a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 101.4, $html, '', 0, 0, true, 'L' );

//*................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5.b.   &nbsp;  </b>     Seizing or detaining, and threatening to kill, injure, or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
continue to detain, another individual in order to compel a 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 third person (including a governmental organization) to <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 do or abstain from doing any act as an explicit or implicit 
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
  condition for the release of the individual seized or <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; detained? </div>';
$pdf->writeHTMLCell( 100, 0, 112, 110, $html, '', 0, 0, true, 'L' );

if(showData('part_3_5b_seizing_or_detaining')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_5b_seizing_or_detaining')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_5b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_5b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 131, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5.c.   &nbsp;  </b>    Assassination? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 137, $html, '', 0, 0, true, 'L' );

if(showData('part_3_5c_assassination')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_5c_assassination')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_5c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_5c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 137.5, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5.d.   &nbsp;  </b>    The use of any firearm with intent to endanger, directly or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
indirectly, the safety of one or more individuals or to 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 cause substantial damage to property?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 144, $html, '', 0, 0, true, 'L' );

if(showData('part_3_5d_firearm_with_intent_to_endanger')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('part_3_5d_firearm_with_intent_to_endanger')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_5d_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_5d_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 156, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>5.e.   &nbsp;  </b>     The use of any biological agent, chemical agent, nuclear 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
weapon or device, explosive, or other weapon or  
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 dangerous device, with intent to endanger, directly or <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 indirectly, the safety of one or more individuals or to
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
  cause substantial damage to property?  </div>';
$pdf->writeHTMLCell( 100, 0, 112, 163, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_use_of_biological_chemical_nuclear_weapon_cause_substantial_damage_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_use_of_biological_chemical_nuclear_weapon_cause_substantial_damage_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_5e_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_5e_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 182.5, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.7);
$html = '<div>Have you <b>EVER</b> been a member of, solicited money or members
for, provided support for, attended military training (as defined in
section 2339D(c)(1) of Title 18, United States Code) by or on
behalf of, or been associated with any other group of two or
more individuals, whether organized or not, which has been
designated as, or has engaged in or has a subgroup which has
been designated as, or has engaged in:
</div>';
$pdf->writeHTMLCell(90, 7, 112, 188, $html, 0, 1, false, true, 'J', true);

//*........................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>6.a.   &nbsp;  </b>  A terrorist organization under section 219 of the INA?
</div>';
$pdf->writeHTMLCell(90, 0, 112, 218, $html, '', 0, 0, true, 'L');

if(showData('processing_info_terrorist_organization_under_section_219_ina_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_terrorist_organization_under_section_219_ina_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell(60, 0, 170, 223, $html, '', 0, 0, true, 'L');

//*.................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>6.b.   &nbsp;  </b>    Hijacking or sabotage of any conveyance (including an  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
aircraft, vessel, or vehicle)?</div>';
$pdf->writeHTMLCell(90, 0, 112, 228.7, $html, '', 0, 0, true, 'L');

if(showData('processing_info_hijacking_of_any_conveyance_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_hijacking_of_any_conveyance_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell(60, 0, 170, 234.5, $html, '', 0, 0, true, 'L');

/********************************
******** End Page No 4 **********
*********************************/

/********************************
******** Start Page No 5 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//* page number 1
//*.............

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 3. Processing Information</b>(continued)</div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//*...........

$pdf->SetFont('times', '', 9.9);
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

if(showData('processing_info_seizing_detaining_threatening_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_seizing_detaining_threatening_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 47.7, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.d.   &nbsp;  </b>    Assassination? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 55, $html, '', 0, 0, true, 'L' );

if(showData('i_918_processing_info_6d_assassination_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('i_918_processing_info_6d_assassination_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6d_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6d_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 55.7, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.e.   &nbsp;  </b>    The use of any firearm with intent to endanger, directly or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
indirectly, the safety of one or more individuals or to 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 cause substantial damage to property?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 63, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_use_of_firearm_substantial_damage_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_use_of_firearm_substantial_damage_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6e_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6e_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 74, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.f.   &nbsp;  </b>     The use of any biological agent, chemical agent, nuclear 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
weapon or device, explosive, or other weapon or   dangerous
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 device, with intent to endanger, directly or indirectly, the <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 safety of one or more individuals or to cause substantial
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
   damage to property?  </div>';
$pdf->writeHTMLCell( 100, 0, 12, 81, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_use_of_dangerous_device_substantial_damage_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_use_of_dangerous_device_substantial_damage_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6f_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6f_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 98, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.g.   &nbsp;  </b>    Soliciting money or members or otherwise providing 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
material support to a terrorist organization?
</div>';
$pdf->writeHTMLCell( 100, 0, 12, 103.6, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_providing_material_support_to_terrorist_organization_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_providing_material_support_to_terrorist_organization_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_6g_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_6g_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 112, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.9);
$html = '<div>Do you intend to engage in the United States in:
</div>';
$pdf->writeHTMLCell( 100, 0, 12, 117.8, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>7.a.   &nbsp;  </b>Espionage?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 124.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_engage_to_united_states_espionage_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_engage_to_united_states_espionage_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_7a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_7a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 125, $html, '', 0, 0, true, 'L' );

//*................

$pdf->SetFont('times', '', 9.9);
$html = '<div><b>7.b.   &nbsp;  </b>Any unlawful activity, or any activity the purpose of
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
which is in opposition to, or the control, or overthrow of
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 the government of the United States?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 132, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_unlawful_activity_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_unlawful_activity_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_7b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_7b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 142.5, $html, '', 0, 0, true, 'L' );
//*.......................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>7.c.   &nbsp;  </b>  Solely, principally, or incidentally in any activity related
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
to espionage or sabotage or to violate any law involving
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 the export of goods, technology, or sensitive information?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 149, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_activity_related_to_espionage_or_sabotage_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_activity_related_to_espionage_or_sabotage_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_7c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_7c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 161.5, $html, '', 0, 0, true, 'L' );

//*.......................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>8.   &nbsp;  </b>   Have you <b>EVER</b> been or do you continue to be a member 
<br>      &nbsp;  &nbsp; &nbsp;   
of the Communist or other totalitarian party, except when 
 <br>      &nbsp; &nbsp;  &nbsp; 
 membership was involuntary?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 167, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_communist_membership_or_totalitarian_party_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_communist_membership_or_totalitarian_party_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_8_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_8_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 176, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont('times', '', 9.9);
$html = '<div><b>9.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 184, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = '<div>Have you <b>EVER</b> , during the period of March 23, 1933 <br>
to May 8, 1945, in association with either the Nazi<br>
Government of Germany or any organization or<br>
government associated or allied with the Nazi<br>
Government of Germany, ordered, incited, assisted or<br>
otherwise participated in the persecution of any person<br>
because of race, religion, nationality, membership in a<br>
particular social group, or political opinion?</div>';
$pdf->writeHTMLCell( 90, 0, 18, 184, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_association_with_nazi_govt_of_germany_or_org_or_govt_associated_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_association_with_nazi_govt_of_germany_or_org_or_govt_associated_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_9_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_9_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 216, $html, '', 0, 0, true, 'L' );
//* //*.......................

//*?....5th page 1st column completed............//*

$pdf->SetFont('times', '', 9.9);
$html = '<div>Have you EVER ordered, incited, called for, committed, assisted,
helped with, or otherwise participated in any of the following:</div>';
$pdf->writeHTMLCell( 100, 0, 112, 18, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 29, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = '<div>Acts involving torture or genocide?</div>';
$pdf->writeHTMLCell( 90, 0, 121, 29, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_involving_torture_or_genocide_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_involving_torture_or_genocide_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_10a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 29, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 37, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = '<div>Killing any person?</div>';
$pdf->writeHTMLCell( 90, 0, 121, 37, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_killing_any_person_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_killing_any_person_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_10b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 37, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 44, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = '<div>Intentionally and severely injuring any person?
</div>';
$pdf->writeHTMLCell( 90, 0, 121, 44, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_intentionally_severely_injuring_any_person_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_intentionally_severely_injuring_any_person_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_10c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 48, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.d.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 53, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = '<div>Engaging in any kind of sexual conduct or relations  with<br>
any person who was being forced or threatened?
 </div>';
$pdf->writeHTMLCell( 90, 0, 121, 53, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_engaging_any_sexual_conduct_with_any_person_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_engaging_any_sexual_conduct_with_any_person_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10d_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_10d_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 61.5, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.e.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 67, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Limiting or denying any person's ability to exercise <br>
religious beliefs? 
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 67, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_denying_religious_beliefs_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_denying_religious_beliefs_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10e_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox"name="part3_10e_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 72, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.f.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 77.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>The persecution of any person because of race, religion, <br>
national origin, membership in a particular social group, <br>or political opinion?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 77.7, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_persecution_of_any_person_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_persecution_of_any_person_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10f_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_10f_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 86, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.g.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 92.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Displacing or moving any person from their residence by<br>
force, threat of force, compulsion, or duress?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 92.7, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_moving_any_person_from_their_residence_by_force_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_moving_any_person_from_their_residence_by_force_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_10g_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_10g_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 102, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont('times', '', 9.9);
$html = "<div><b>NOTE:</b> If you answered 'Yes' to any question in <b>Item
Numbers 10.a. - 10.g.</b>, please describe the circumstances in
<b>Part 8. Additional Information.</b>
</div>";
$pdf->writeHTMLCell( 90, 0, 112, 108, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>11.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 122, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> advocated that another person commit<br>
any of the acts described in the preceding question, urged,<br>or encouraged another person, to commit such acts?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 122, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_urged_or_encouraged_preceding_question_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_urged_or_encouraged_preceding_question_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_11_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_11_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 134, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> been present or nearby when any person was:
 </div>";
$pdf->writeHTMLCell( 90, 0, 112, 142, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>12.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 149, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Intentionally killed, tortured, beaten, or injured?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 149, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_intentionally_killed_tortured_beaten_or_injured_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_intentionally_killed_tortured_beaten_or_injured_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_12a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_12a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 155, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>12.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 161, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Displaced or moved from his or her residence by force,<br>
compulsion, or duress?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 161, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_moved_from_residence_by_force_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_moved_from_residence_by_force_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_12b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_12b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 166, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>12.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 172, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>In any way compelled or forced to engage in any kind of<br>
sexual contact or relations?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 172, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_compelled_or_forced_to_engage_sexual_relations_stauts')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_compelled_or_forced_to_engage_sexual_relations_stauts')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_12c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_12c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 177, $html, '', 0, 0, true, 'L' );
//*......................

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER:</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 112, 186, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>13.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 193, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Served in, been a member of, assisted in, or participated <br>
in any military unit, paramilitary unit, police unit, self- <br>defense unit, vigilante unit, rebel group, guerilla group,<br>
militia, or other insurgent organization?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 193, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_participated_military_police_selfdefense_unit_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_participated_military_police_selfdefense_unit_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_13a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_13a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 210, $html, '', 0, 0, true, 'L' );

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

$html = '<div><b>Part 3. Processing Information</b>(continued)</div>';
$pdf->writeHTMLCell( 92, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//*...........

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>13.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 27, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Served in any prison, jail, prison camp, detention facility,<br>
labor camp, or any other situation that involved detaining<br>
persons?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 27, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_served_in_prison_jail_labor_camp_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_served_in_prison_jail_labor_camp_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_13b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_13b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 36.7, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>13.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 42.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Served in, been a member of, assisted in, or participated<br>
in any group, unit, or organization of any kind in which <br>
you or other persons transported, possessed, or used any <br>
type of weapon?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 42.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_participated_weapon_organization_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_participated_weapon_organization_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_13c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_13c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 54.7, $html, '', 0, 0, true, 'L' );
//*........................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>NOTE: </b>If you answered "Yes" to any question in<b> Item<br>
Numbers 13.a. - 13.c.</b>, please describe the circumstances in<br>
<b>Part 8. Additional Information.</b>
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 61.5, $html, '', 0, 0, true, 'L' );
//*........................
$pdf->SetFont('times', '', 9.9);
$html = '<div>Have you <b>EVER:</b
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 77.2, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>14.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 83.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Received any type of military, paramilitary, or weapons <br>
training?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 83.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_received_military_weapons_training_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_received_military_weapons_training_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_14a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_14a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 87.7, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>14.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 94, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Been a member of, assisted in, or participated in any<br>
group, unit, or organization of any kind in which you or<br>
other persons used any type of weapon against any person<br>
or threatened to do so?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 94, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_participated_in_organization_which_used_weapon_against_any_person_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_participated_in_organization_which_used_weapon_against_any_person_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_14b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_14b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 106.5, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>14.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 112.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Assisted or participated in selling or providing weapons to<br>
any person who to your knowledge used them against<br>
another person, or in transporting weapons to any person<br>
who to your knowledge used them against another<br>
person?</div>";
$pdf->writeHTMLCell( 90, 0, 21, 112.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_participated_in_providing_weapons_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_participated_in_providing_weapons_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_14c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_14c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 129.5, $html, '', 0, 0, true, 'L' );
//*........................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>NOTE: </b>If you answered "Yes" to any question in<b> Item<br>
Numbers 14.a. - 14.c.</b>, please describe the circumstances in<br>
<b>Part 8. Additional Information.</b>
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 139.5, $html, '', 0, 0, true, 'L' );

//*........................
$pdf->SetFont('times', '', 9.9);
$html = '<div>Have you <b>EVER:</b
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 155.2, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>15.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 161.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Recruited, enlisted, conscripted, or used any person under <br>
15 years of age to serve in or help an armed force or group?</div>";
$pdf->writeHTMLCell( 90, 0, 21, 161.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_recruited_any_person_under_15_years_age_to_help_armed_force_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_recruited_any_person_under_15_years_age_to_help_armed_force_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_15a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_15a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 170, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>15.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 176.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Used any person under 15 years of age to take part in<br>
hostilities, or to help or provide services to people in<br>
combat?</div>";
$pdf->writeHTMLCell( 90, 0, 21, 176.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_used_any_person_under_15_years_age_to_take_part_in_hostilities_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_used_any_person_under_15_years_age_to_take_part_in_hostilities_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_15b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_15b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 185, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>16.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 191.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Are you <b>NOW</b> in removal, exclusion, rescission, or<br>
deportation proceedings?</div>";
$pdf->writeHTMLCell( 90, 0, 21, 191.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_now_in_removal_exclusion_rescission_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_now_in_removal_exclusion_rescission_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_16_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_16_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 196, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>17.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 202.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> had removal, exclusion, rescission, or<br>
deportation proceedings initiated against you?</div>";
$pdf->writeHTMLCell( 90, 0, 21, 202.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_initiated_in_removal_exclusion_rescission_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_initiated_in_removal_exclusion_rescission_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_17_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_17_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 211, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>18.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 217.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> been removed, excluded, or deported<br>
from the United States?</div>";
$pdf->writeHTMLCell( 90, 0, 21, 217.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_removed_from_united_states_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_removed_from_united_states_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_18_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_18_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 222, $html, '', 0, 0, true, 'L' );

//*? 6th page 1st column done...............
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>19.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 17.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> been ordered to be removed, excluded,<br>
or deported from the United States?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 17.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_ordered_to_be_removed_from_united_states_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_ordered_to_be_removed_from_united_states_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_19_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_19_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 22, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>20.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 30.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> R been denied a visa or denied admission<br>
to the United States?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 30.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_denied_visa_to_united_states_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_denied_visa_to_united_states_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_20_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_20_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 36, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>21.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 42.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you<b> EVER</b> been granted voluntary departure by an<br>
immigration officer or an immigration judge and failed to<br>
depart within the allotted time?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 42.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_granted_voluntary_departure_by_immigration_officer_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_granted_voluntary_departure_by_immigration_officer_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_21_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_21_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 51.8, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>22.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 57.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Are you<b> NOW</b> under a final order or civil penalty for<br>
violating section 274C of the INA (producing and/or<br>
using false documentation to unlawfully satisfy a<br>
requirement of the INA)?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 57.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_ina_violating_section_274c_using_false_documentation_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_ina_violating_section_274c_using_false_documentation_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_22_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_22_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 70.8, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>23.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 76.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b>, by fraud or willful misrepresentation of<br>
a material fact, sought to procure or procured a visa or<br>
other documentation, for entry into the United States or<br>
any immigration benefit?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 76.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_by_fraud_procured_a_visa_for_entry_into_the_united_states_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_by_fraud_procured_a_visa_for_entry_into_the_united_states_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_23_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_23_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 89.2, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>24.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 95.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you<b> EVER </b>left the United States to avoid being<br>
drafted into the U.S. Armed Forces or U.S. Coast Guard?<br></div>";
$pdf->writeHTMLCell( 90, 0, 121, 95.5, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_left_united_states_to_avoid_being_drafted_into_us_armed_forces_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_left_united_states_to_avoid_being_drafted_into_us_armed_forces_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_24_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_24_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 103.4, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>25.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 109, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> been a J nonimmigrant exchange visitor<br>
who was subject to the 2-year foreign residence<br>
requirement and not yet complied with that requirement<br>
or obtained a waiver of such?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 109, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_j_nonimmigrant_exchange_visitor_2_year_foreign_residence_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_j_nonimmigrant_exchange_visitor_2_year_foreign_residence_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_25_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_25_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 122.2, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>26.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 128.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER</b> detained, retained, or withheld the<br>
custody of a child, having a lawful claim to United States<br>
citizenship, outside the United States from a United States<br>
citizen granted custody?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 128.6, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_detained_a_child_having_a_lawful_claim_to_united_states_citizenship_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_detained_a_child_having_a_lawful_claim_to_united_states_citizenship_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_26_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_26_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 141.2, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>27.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 148.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Do you plan to practice polygamy in the United States?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 148.6, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_practice_polygamy_in_united_states_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_practice_polygamy_in_united_states_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox"  name="part3_27_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_27_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 153.5, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>28.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 160.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Have you <b>EVER </b>entered the United States as a stowaway?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 160.6, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_entered_united_states_as_stowaway_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_entered_united_states_as_stowaway_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_28_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_28_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 165.5, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>29.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 170.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Do you <b>NOW</b> have a communicable disease of public<br>
health significance?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 170.7, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_communicable_disease_of_public_health_significance_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_communicable_disease_of_public_health_significance_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_29a_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_29a_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 176.5, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>29.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 183.2, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Do you <b>NOW</b> have or have you <b>EVER</b> had a physical or<br>
mental disorder and behavior (or a history of behavior<br>
that is likely to recur) associated with the disorder which<br>
has posed or may pose a threat to the property, safety, or<br>
welfare of yourself or others?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 183.2, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_physical_or_mental_disorder_and_behavior_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_physical_or_mental_disorder_and_behavior_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_29b_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_29b_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 200, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>29.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 206, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>Are you <b>NOW</b> or have you<b> EVER </b>been a drug abuser or<br>
drug addict?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 206, $html, '', 0, 0, true, 'L' );

if(showData('processing_info_drug_abuser_or_drug_addict_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('processing_info_drug_abuser_or_drug_addict_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part3_29c_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part3_29c_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 212, $html, '', 0, 0, true, 'L' );

/********************************
******** End Page No 6 **********
*********************************/

/********************************
******** Start Page No 7 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor( 220, 220, 220 );

$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font
$html = '<div><b>Part 4. Information About Your Spouse and/or
Children</b></div>';
$pdf->writeHTMLCell( 90, 2, 13, 17, $html, 1, 1, true, 'L' );
//*.................
$pdf->SetFont('times', '', 9.9);
$html = "<div>If you need extra space to complete <b>Part 4.</b>, use the space <br>
provided in <b>Part 8. Additional Information.</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 27, $html, '', 0, 0, true, 'L' );
//*...............

//*................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 2, 12, 36.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>Family Name<br>(Last Name)</div>';
$pdf->writeHTMLCell( 55, 2, 20, 36, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_1a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 38 );
//* ............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 2, 12, 46, $html, 0, 1, false, false, 'J', true );
$html = '<div>Given Name<br>(First Name)</div>';
$pdf->writeHTMLCell( 55, 4, 20, 45, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_1b_FirstName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 47.5 );

//* //*.......
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.c.</b></div>';
$pdf->writeHTMLCell( 35, 2, 12, 57, $html, 0, 1, false, false, 'J', true );
$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell( 55, 2, 20, 57, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_1c_middleName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 57 );

//*.............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>2.  </b> &nbsp;&nbsp; Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 2, 12, 65, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_2_date_of_birth', 33, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 65.5 );
//*..........
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>3.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 72.4, $html, 0, 1, false, false, 'J', true );
$html = '<div>Country of Birth</div>';
$pdf->writeHTMLCell( 55, 4, 20, 72.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_3_Country_of_Birth', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 79 );

//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 88.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>Relationship</div>';
$pdf->writeHTMLCell( 55, 4, 20, 88, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_4_Relationship', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 94 );

//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 101, $html, 0, 1, false, false, 'J', true );
$html = '<div>Current Location</div>';
$pdf->writeHTMLCell( 55, 3, 20, 101, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_5_Current_Location', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 107 );

//*............ */
$pdf->writeHTMLCell( 91, 2, 12, 110, '', 'B', 1, false, true, 'L', true );
//* //*?..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.a.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 115, $html, 0, 1, false, false, 'J', true );
$html = '<div>Family Name<br>(Last Name)</div>';
$pdf->writeHTMLCell( 55, 3, 20, 115, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_6a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 117 );
//* ............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.b.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 124, $html, 0, 1, false, false, 'J', true );
$html = '<div>Given Name<br>(First Name)</div>';
$pdf->writeHTMLCell( 55, 3, 20, 124, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_6b_FirstName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 125.5 );

//* //*.......
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.c.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 133, $html, 0, 1, false, false, 'J', true );
$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell( 55, 3, 20, 133.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_6c_middleName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 134 );

//* //*.............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>7.  </b> &nbsp;&nbsp; Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 3, 12, 143, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_7_date_of_birth', 33, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 143 );
//* //*..........
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>8.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 149, $html, 0, 1, false, false, 'J', true );
$html = '<div>Country of Birth</div>';
$pdf->writeHTMLCell( 55, 3, 20, 149, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_8_Country_of_Birth', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 155.5 );

//* //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>9.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 162, $html, 0, 1, false, false, 'J', true );
$html = '<div>Relationship</div>';
$pdf->writeHTMLCell( 55, 3, 20, 162, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_9_Relationship', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 168 );

//* //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>10.</b></div>';
$pdf->writeHTMLCell( 35, 3, 12, 174, $html, 0, 1, false, false, 'J', true );
$html = '<div>Current Location</div>';
$pdf->writeHTMLCell( 55, 4, 20, 174, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_10_Current_Location', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 180 );

//* //*............ */
$pdf->writeHTMLCell( 91, 3, 12, 183, '', 'B', 1, false, true, 'L', true );

// //* //*?..................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>11.a.</b></div>';
$pdf->writeHTMLCell( 35, 4, 12, 188, $html, 0, 1, false, false, 'J', true );
$html = '<div>Family Name<br>(Last Name)</div>';
$pdf->writeHTMLCell( 55, 4, 20, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_11a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 189.5 );
//* ............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>11.b.</b></div>';
$pdf->writeHTMLCell( 35, 4, 12, 196.6, $html, 0, 1, false, false, 'J', true );
$html = '<div>Given Name<br>(First Name)</div>';
$pdf->writeHTMLCell( 55, 4, 20, 196.6, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_11b_FirstName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 198 );

//* //* //*.......
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>11.c.</b></div>';
$pdf->writeHTMLCell( 35, 4, 12, 206, $html, 0, 1, false, false, 'J', true );
$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell( 55, 4, 20, 206, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_11c_middleName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 206.5 );

//* //* //*.............
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>12.  </b> &nbsp;&nbsp; Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 4, 12, 215, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_12_date_of_birth', 33, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 214.7 );
//* //*..........
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>13.</b></div>';
$pdf->writeHTMLCell( 35, 4, 12, 219.6, $html, 0, 1, false, false, 'J', true );
$html = '<div>Country of Birth</div>';
$pdf->writeHTMLCell( 55, 4, 20, 219.6, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_13_Country_of_Birth', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 225 );

//* //* //*............ */
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>14.</b></div>';
$pdf->writeHTMLCell( 35, 4, 12, 231, $html, 0, 1, false, false, 'J', true );
$html = '<div>Relationship</div>';
$pdf->writeHTMLCell( 55, 4, 20, 231, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_14_Relationship', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 236.6 );

//* //*............ */

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>15.</b></div>';
$pdf->writeHTMLCell( 35, 2, 12, 242.4, $html, 0, 1, false, false, 'J', true );
$html = '<div>Current Location</div>';
$pdf->writeHTMLCell( 55, 6, 20, 242.4, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_15_Current_Location', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 248 );

//* //* //*..................

//?Column 1 done <<<<page 7>>>>.............

//* //*?..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>16.a.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 16, $html, 0, 1, false, false, 'J', true );
$html = '<div>Family Name<br>(Last Name)</div>';
$pdf->writeHTMLCell( 55, 3, 120, 16, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_16a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 18 );
//* ............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>16.b.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 25, $html, 0, 1, false, false, 'J', true );
$html = '<div>Given Name<br>(First Name)</div>';
$pdf->writeHTMLCell( 55, 3, 120, 25, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_16b_FirstName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 27 );

// //* //*.......
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>16.c.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 35, $html, 0, 1, false, false, 'J', true );
$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell( 55, 3, 120, 35.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_16c_middleName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 36 );

// //* //*.............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>17.  </b> &nbsp;&nbsp; Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 3, 112, 45, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_17_date_of_birth', 33, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 45 );
// //* //*..........
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>18.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 53, $html, 0, 1, false, false, 'J', true );
$html = '<div>Country of Birth</div>';
$pdf->writeHTMLCell( 55, 3, 120, 53, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_18_Country_of_Birth', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 58.5 );

// //* //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>19.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 64.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>Relationship</div>';
$pdf->writeHTMLCell( 55, 3, 120, 64.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_19_Relationship', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 70 );

// //* //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>20.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 76, $html, 0, 1, false, false, 'J', true );
$html = '<div>Current Location</div>';
$pdf->writeHTMLCell( 55, 4, 120, 76, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_20_Current_Location', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 82 );

// //* //*............ */
$pdf->writeHTMLCell( 90, 3, 113.5, 86, '', 'B', 1, false, true, 'L', true );

//*? //*?..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>21.a.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 96, $html, 0, 1, false, false, 'J', true );
$html = '<div>Family Name<br>(Last Name)</div>';
$pdf->writeHTMLCell( 55, 3, 120, 96, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_21a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 98 );
//* ............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>21.b.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 105, $html, 0, 1, false, false, 'J', true );
$html = '<div>Given Name<br>(First Name)</div>';
$pdf->writeHTMLCell( 55, 3, 120, 105, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_21b_FirstName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 107 );

// //* //*.......
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>21.c.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 115, $html, 0, 1, false, false, 'J', true );
$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell( 55, 3, 120, 115.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_21c_middleName', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 116 );

// //* //*.............
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>22.  </b> &nbsp;&nbsp; Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 3, 112, 125, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_22_date_of_birth', 33, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 125 );
// //* //*..........
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>23.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 133, $html, 0, 1, false, false, 'J', true );
$html = '<div>Country of Birth</div>';
$pdf->writeHTMLCell( 55, 3, 120, 133, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_23_Country_of_Birth', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 138.5 );

// //* //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>24.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 144.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>Relationship</div>';
$pdf->writeHTMLCell( 55, 3, 120, 144.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_24_Relationship', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 150.5 );

// //* //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>25.</b></div>';
$pdf->writeHTMLCell( 35, 3, 112, 156.8, $html, 0, 1, false, false, 'J', true );
$html = '<div>Current Location</div>';
$pdf->writeHTMLCell( 55, 4, 120, 156.8, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part4_25_Current_Location', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 162.8 );

// //* //*............ */
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont('times', '', 10);
//* set font
$pdf->setCellHeightRatio( 1.1 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font
$html = '<div><b><i>Filing On Behalf of Family Members</i></b></div>';
$pdf->writeHTMLCell( 90, 7, 114, 175, $html, '', 1, true, false, 'L', true );

//*..................
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>26.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 188, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('times', '', 9.9);
$html = "<div>I am petitioning for one or more qualifying family<br>
members.</div>";
$pdf->writeHTMLCell( 90, 0, 121, 188, $html, '', 0, 0, true, 'L' );

if(showData('family_members_petitioning_for_one_or_more_qualifying_family_members_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('family_members_petitioning_for_one_or_more_qualifying_family_members_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part4_26_y_currently_active" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part4_26_y_currently_active" value="N" checked="'.$checked_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 194, $html, '', 0, 0, true, 'L' );

//*..............
$pdf->SetFont('times', '', 9.9);
$html = "<div><b>NOTE:</b> If you answered “Yes” to <b>26</b>., you must<br>
complete and include Supplement A for each family<br>
member for whom you are petitioning.

 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 200, $html, '', 0, 0, true, 'L' );

/********************************
******** End Page No 7 **********
*********************************/

/********************************
******** Start Page No 8 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
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
$pdf->SetFont('times', '', 9.9);
$html = "<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-918 <br>
Instructions before completing this part</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 28, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Statement</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 13, 38, $html, '', 1, true, false, 'L', true );
//*...................

$pdf->SetFont('times', '', 9.7);
$html = "<div><b>NOTE:</b> Select the box for either <b>1.a.</b> or <b>1.b.</b> If applicable,
select the box for <b>2</b>.</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 46, $html, '', 0, 0, true, 'L' );




//*..................
$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

if(showData('i_918_petitioner_1a_read_and_understand_english_status')=="Y") $checked_status = "checked"; else $checked_status = "";
$html = '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="part_5_1a" value="1" checked="'.$checked_status.'" /></div>';
$pdf->writeHTMLCell( 93, 12, 12, 56, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I can read and understand English, and I have read <br>
and understand every question and instruction on <br>
this petition and my answer to every question.</div>';
$pdf->writeHTMLCell( 90, 12, 26, 56, $html, 0, 1, 0, true, 'L', false, false );

//*..................
$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

if(showData('i_918_petitioner_1b_read_and_answer_status')=="Y") $checked_status = "checked"; else $checked_status = "";
$html = '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="part_5_1b" value="1" checked="'.$checked_status.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 70, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>The interpreter named in <b>Part 6.</b> read to me every <br>
question and instruction on this petition and my answer  <br>
to every question in</div>';
$pdf->writeHTMLCell( 90, 5, 26, 70, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 86.6, ',', 0, 1, 0, true, 'L', false, false ); // only for comma ','
$pdf->TextField('i_918_petitioner_statement_1b', 76, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 26, 82.6 );
// $pdf->writeHTMLCell( 76, 7, 26, 83, '', 1, 0, false, 'L' );

//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood everything.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 88.6, $html, 0, 0, false, 'L' );

//*..................
$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

if(showData('i_918_petitioner_request_preparer_named_status')=="Y") $checked_status = "checked"; else $checked_status = "";
$html = '<div><b>2.  </b> &nbsp; <input type="checkbox" name="part_5_2" value="1" checked="'.$checked_status.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 100, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>At my request, the preparer named in <b>Part 7.</b>,</div>';
$pdf->writeHTMLCell( 90, 5, 26, 100, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 107.6, ',', 0, 1, 0, true, 'L', false, false ); // only for comma ','
$pdf->TextField('i_918_petitioner_statement_2', 76, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 26, 104.6);
// $pdf->writeHTMLCell( 76, 7, 26, 104.5, '', 1, 0, false, 'L' );

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
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>3.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 133, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20, 133, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'i_918_petitioner_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 139 );
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 146.5, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 146.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_petitioner_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 153 );
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 160, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 160, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_petitioner_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 167 );
//*..................
$pdf->SetFont('times', '', 9.9);
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Declaration and Certification</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 178, $html, '', 1, true, false, 'L', true );
//*.............

$pdf->SetFont('times', '', 9.9);
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

$pdf->SetFont('times', '', 9.9);
$html = '<div>I understand that USCIS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 17, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont('times', '', 9.9);
$html = '<div> <b>1)</b>&nbsp;&nbsp; I provided or authorized all of the information<br>
 contained in, and submitted with, my petition; 
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 38, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont('times', '', 9.9);
$html = '<div> <b>2)</b>&nbsp;&nbsp; I reviewed and understood all of the information in,<br>
 and submitted with, my petition; and
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 46.5, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont('times', '', 9.9);
$html = '<div> <b>3)</b>&nbsp;&nbsp; All of this information was complete, true, and<br>
 correct at the time of filing.
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 54.5, $html, 0, 1, 0, true, 'L', false, false );

//*.............

$pdf->SetFont('times', '', 9.9);
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
$pdf->setFont('Times', '', 10);
$html = "<div><b>6.a. </b> &nbsp; Petitioner's Signature</div>";
$pdf->writeHTMLCell( 92, 7, 112.5, 101, $html, 0, 1, false, 'L' );
//*.......
$pdf->writeHTMLCell( 82, 7, 122.5, 106, '', 1, 0, false, 'L' );
//.........
$pdf->SetFont( 'zapfdingbats', '', 22 );
// symbol font
$pdf->writeHTMLCell( 82, 7, 112.5, 105, TCPDF_FONTS::unichr( 225 ), 0, 0, false, 'L' );
//*........
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 112.5, 116, $html, 0, 1, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918_petitioner_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174, 116);
//*.........

$pdf->SetFont('times', '', 9.9);
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

$pdf->SetFont('times', '', 9.9);
$html = '<div>Provide the following information about the interpreter.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 175, $html, 0, 1, 0, true, 'L', false, false );
//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 182, $html, '', 1, true, false, 'L', true );

//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 192, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 192, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_family_last_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 198);
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 205, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 205, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_family_given_first_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 211);
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 218, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 218, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_business_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 224);

/********************************
******** End Page No 8 **********
*********************************/

/********************************
******** Start Page No 9 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
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
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mailing_address_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 40);

//* //* ...........
$pdf->SetFont('times', '', 9.7);
//* set font

if(showData('i_918_interpreter_mailing_address_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('i_918_interpreter_mailing_address_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('i_918_interpreter_mailing_address_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

$html = '<div><b>3.b. </b>
<input type="checkbox" name="P6_3b_Apt" value="Apt" checked="'.$apt_checked.'" />Apt. &nbsp;
<input type="checkbox" name="p6_3b_Ste" value="Ste" checked="'.$ste_checked.'" />Ste. &nbsp;
<input type="checkbox" name="p6_3b_Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';

$pdf->writeHTMLCell( 61, 0, 12, 51, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mailing_address_apt_ste_flr_value', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 50);

//* //*......

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 60, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mailing_address_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42.6, 60);
//* //*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 70.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font

$html = '<select name="i_918_interpreter_mailing_address_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 29.5, 70, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField('i_918_interpreter_mailing_address_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 70);

//* //*..........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 80, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mailing_address_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 80);
//* //*...............

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 90, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mailing_address_postal_code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 90);
//*........

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 98, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mailing_address_country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 104);
//* //* //*.....

//*..............
$pdf->SetFont('times', '', 9.7);
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 116, $html, '', 1, true, false, 'L', true );
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 124, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 124, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 129.4);
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 137, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 137, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 142.5 );
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 150, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 150, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'i_918_interpreter_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 155 );
//*............ */
$pdf->SetFont('times', '', 9.7);
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Certification </i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 164, $html, '', 1, true, false, 'L', true );
//*............ */

$pdf->SetFont('times', '', 9.9);
$html = '<div>I certify, under penalty of perjury, that:<br>I am fluent in English and
</div>';
$pdf->writeHTMLCell( 95, 5, 12, 172, $html, 0, 1, 0, true, 'L', false, false );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_certification_language_skill', 43, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 53, 176.2);

$pdf->SetFont('times', '', 9.7);
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
$pdf->SetFont('times', '', 9.7);
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Signature</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 213, $html, '', 1, true, false, 'L', true );
//*............ */

$pdf->setFont('Times', '', 10);
$html = "<div><b>7.a. </b> &nbsp; Interpreter's Signature (sign in ink)</div>";
$pdf->writeHTMLCell( 92, 7, 12, 220, $html, 0, 1, false, 'L' );
//*.......
$pdf->writeHTMLCell( 82, 7, 21.8, 225, '', 1, 0, false, 'L' );
//*........
$pdf->setFont('Times', '', 10);
$html = '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 235, $html, 0, 1, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918_interpreter_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 74, 234);
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
$pdf->SetFont('times', '', 10);
$html = "<div>Provide the following information about the preparer.
</div>";
$pdf->writeHTMLCell( 95, 5, 111, 35, $html, 0, 1, 0, true, 'L', false, false );

//*/.............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112, 45, $html, '', 1, true, false, 'L', true );

//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 55, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 55, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_family_last_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 60);
// //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 67, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 67, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_family_given_first_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 72);
// //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 79, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 79, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_business_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 84);
// //*............ */

$pdf->SetFont( 'times', '', 11.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 95, $html, '', 1, true, false, 'L', true );

//*...............................................
$pdf->SetFont('times', '', 9.7);
$html = '<div><b>3.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 103, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mailing_address_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 104);

// //* //* ...........
$pdf->SetFont('times', '', 9.7);
//* set font

if(showData('i_918_preparer_mailing_address_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('i_918_preparer_mailing_address_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('i_918_preparer_mailing_address_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

$html = '<div><b>3.b. </b>
<input type="checkbox" name="P7_3b_Apt" value="Apt" checked="'.$apt_checked.'" />Apt. &nbsp;
<input type="checkbox" name="p7_3b_Ste" value="Ste" checked="'.$ste_checked.'" />Ste. &nbsp;
<input type="checkbox" name="p7_3b_Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';

$pdf->writeHTMLCell( 61, 0, 112, 113, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mailing_address_apt_ste_flr_value', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 112.5);

// //* //*......

$pdf->SetFont('times', '', 9.7);
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 122, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mailing_address_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 121.5);
// //* //*............

$pdf->SetFont('times', '', 10);
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 132, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
// //* set font

$html = '<select name="i_918_preparer_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 131, $html, '', 0, 0, true, 'L' );

$pdf->SetFont('courier', 'B', 10);
//* set font
$pdf->TextField('i_918_preparer_mailing_address_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 131);

// //* //*..........

$pdf->SetFont('times', '', 9.7);
// //* set font
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 142, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mailing_address_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 141);
//* //*...............

$pdf->SetFont('times', '', 9.7);
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 150, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mailing_address_postal_code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 150);
//*........

$pdf->SetFont('times', '', 9.7);

$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 156.4, $html, '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mailing_address_country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 163);
// //* //* //*.....

//*..............
$pdf->SetFont('times', '', 9.7);
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 175, $html, '', 1, true, false, 'L', true );
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 182, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 182, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 187.7);
//*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 195, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 195, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 200);
// //*............ */
$pdf->SetFont('times', '', 9.9);
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 208, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 208, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 213);

/********************************
******** End Page No 9 **********
*********************************/

/********************************
******** Start Page No 10 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
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

if(showData('i_918_preparer_statement_7a')=="Y") $checked_status = "checked"; else $checked_status = "";
$html= '<div><b>7.a.  </b> &nbsp;
<input type = "checkbox" name="p7_7a_agree" value="1" checked="'.$checked_status.'" /></div>';
$pdf->writeHTMLCell(15, 12, 12, 28, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div>I am not an attorney or accredited representative but
have prepared this petition on behalf of the petitioner
and with the petitioner\'s consent.</div>';
$pdf->writeHTMLCell( 83, 12, 25, 28, $html, 0, 1, 0, true, 'L', false, false );
//..........

$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.04 );
// reset font spacing

if(showData('i_918_preparer_statement_7b')=="Y") $checked_status = "checked"; else $checked_status = "";
$html = '<div><b>7.b.  </b> &nbsp; <input type="checkbox" name="p7_7b_agree" value="1" checked="'.$checked_status.'" /></div>';
$pdf->writeHTMLCell( 15, 12, 12, 44, $html, 0, 1, 0, true, 'L', false, false );

if(showData('i_918_preparer_statement_7b_extend')=="Y") $checkbox_extend_status = "checked"; else $checkbox_extend_status = "";
if(showData('i_918_preparer_statement_7b_not_extend')=="Y") $checkbox_not_extend_status = "checked"; else $checkbox_not_extend_status = "";

/* $html= '<div>I am an attorney or accredited representative and my
representation of the applicant in this case<br><input type="checkbox" name="a" value="Y" checked="'.$checkbox_extend_status.'" />  extends <input type="checkbox" name="b" value="Y" checked="'.$checkbox_not_extend_status.'" /> does not extend beyond the<br>

preparation of this application.</div>'; */

$html = '<div>I am an attorney or accredited representative and my
representation of the petitioner  in this  case <br><input type="checkbox" name="a" value="Y" checked="'.$checkbox_extend_status.'" /> extends <input type="checkbox" name="b" value="Y" checked="'.$checkbox_not_extend_status.'" /> does not extend beyond the  preparation <br>of this petition.</div>';
$pdf->writeHTMLCell( 90, 12, 25, 44, $html, 0, 1, 0, true, 'L', false, false );

/* $pdf->SetLineStyle( array( 'width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array( 0, 0, 0 ) ) );
$pdf->writeHTMLCell( 4, 4, 26, 53, '', 1, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 4, 4, 43, 53, '', 1, 1, 0, true, 'L', false, false ); */

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
$pdf->setFont('Times', '', 10);
//.............
$html = '<div><b>8.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 177, $html, 0, 1, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918_preparer_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 75, 177);

/********************************
******** End Page No 10 **********
*********************************/

/********************************
******** Start Page No 11 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 8.  &nbsp;Additional Information</b><i></i></div>';
$pdf->writeHTMLCell(91, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>If you need extra space to provide any additional information<br>within this petition, use the space below. If you need more<br>
space than what is provided, you may make copies of this page<br>to
complete and file with this form or attach a separate sheet<br>of
paper. Include your name and A-Number (if any) at the top<br>of
each sheet; indicate the <b>Page Number, Part Number</b>, and<br><b>Item
Number </b> to which your answer refers; and sign and date<br>each
sheet</div>';
$pdf->writeHTMLCell(100, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 61);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 68, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 70);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 79);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 1, false, false, 'L', true);
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 41, 69.5, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont('times', '', 11);
$html = '<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 52, 88, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 58.9, 88);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_page_number', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 103);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_part_number', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_item_number', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 112, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 109.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 113.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 117.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 122.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 127, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 131.8, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 136.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 141.2, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 146, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 150.5, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->TextField('aditional_info_name_3d', 82.5, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_918_additional_info_3d')), 21.5, 112);
$pdf->setCellHeightRatio(1.2);

//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 179.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_page_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 185);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 179.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_part_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 185);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 179.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_item_number1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 185);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 194.5, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 191, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 195.1, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 199.7, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 204.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 208.2, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 213, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 217.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 221.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 226.1, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 230.1, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->TextField('aditional_info_name_4d', 82.5, 63.4, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_918_additional_info_4d')), 21.5, 194);
$pdf->setCellHeightRatio(1.2);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_page_number2', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_part_number2', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_item_number2', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 28.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 32.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 36.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 41.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 45.8, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 50, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 54.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 59.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 64.3, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(81.6, 1, 122.6, 68.3, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_name_5d', 82, 65, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_918_additional_info_5d')), 122.5, 30.5);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 95.2, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_page_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 100.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 95.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_part_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 100.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 95.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_item_number3', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 100.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 106, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 106.7, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 111.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 116.3, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 121.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 126, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 130.5, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 135, '',  "B",  0, false, false, 'C', true);   // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 139.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 144, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->writeHTMLCell(81.6, 1, 122.6, 148, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_name_6d', 82, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_918_additional_info_6d')), 122.5, 109.5);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 175.9, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_page_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 181.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 175.9, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_part_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 181.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 175.9, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_item_number4', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 181.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 191, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 188.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 193, '',  "B",  0, false, false, 'C', true);   // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 197.7, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 202, '',  "B",  0, false, false, 'C', true);   // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 206.5, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 211, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 215.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 220, '',  "B",  0, false, false, 'C', true);   // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 224.5, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(81.6, 1, 122.6, 228.9, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918_additional_info_name_7d', 82, 65, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_918_additional_info_7d')), 122.5, 191);

//..............










$js = "
var fields = {
    
'attorney_uscis_online_account_number':' $attorneyData->uscis_online_account_number',
'attorney_state_bar_number' : ' $attorneyData->bar_number',
'part1_1a_lastname':' ".showData('information_about_you_family_last_name')." ',
'part1_1b_firstname':' ".showData('information_about_you_given_first_name')." ',
'part1_1c_middlename':' ".showData('information_about_you_middle_name')." ',
'part1_2a_lastname':' ".showData('information_about_you_other_family_last_name')." ',
'part1_2b_firstname':' ".showData('information_about_you_other_given_first_name')." ',
'part1_2c_middlename':' ".showData('information_about_you_other_middle_name')." ',
'part1_3a_street_number': ' ".showData('information_about_you_home_street_number')." ',
'part1_3b_apt_ste':' ".showData('information_about_you_home_apt_ste_flr_value')." ',
'part1_3c_city_town':' ".showData('information_about_you_home_city_town')." ',
'part1_3d_state' : ' ".showData('information_about_you_home_state')." ',
'part1_3e_zip_code' :' ".showData('information_about_you_home_zip_code')." ',
'part1_3f_province':' ".showData('information_about_you_home_province')." ',
'part1_3g_Postal_Code' :' ".showData('information_about_you_home_postal_code')." ',
'part1_3h_Country':' ".showData('information_about_you_home_country')." ',

'part1_4a_Care_Of_Name':' ".showData('information_about_you_mailing_care_of_name')." ',
'part1_4b_street_number': ' ".showData('information_about_you_mailing_street_number')." ',
'part1_4c_apt_ste' :' ".showData('information_about_you_mailing_apt_ste_flr_value')." ',
'part1_4d_city_town':' ".showData('information_about_you_mailing_city_town')." ',
'part1_4e_state': ' ".showData('information_about_you_mailing_state')." ',
'part1_4f_zip_code':' ".showData('information_about_you_mailing_zip_code')." ',
'part1_4g_province':' ".showData('information_about_you_mailing_province')." ',
'part1_4h_Postal_Code':' ".showData('information_about_you_mailing_postal_code')." ',
'part1_4i_Country':' ".showData('information_about_you_mailing_country')." ',

'part1_5_registration_Number':' ".showData('other_information_about_you_alien_registration_number')." ',
'part1_6_social_security':' ".showData('other_information_about_you_social_security_number')." ',
'part1_7_online_account':' ".showData('other_information_about_you_uscis_online_account_number')." ',
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

// page 2

'Part_1_9_Male': ' ',
'Part_1_9_Female': ' ',

'part1_10_date_of_birth':' ".showData('other_information_about_you_date_of_birth')." ',
'part1_11_Country_of_birth':' ".showData('other_information_about_you_country_of_birth')." ',
'part1_12_Country_of_Citizenship':' ".showData('other_information_about_you_country_of_citizen')." ',
'part1_13_Arrival_Departure':' ".showData('i_94_imgt_arrival_record_number')." ',
'part1_14_Passport_Number':' ".showData('other_information_about_you_passport_number')." ',
'part1_15_Travel_Document_Number':' ".showData('other_information_about_you_travel_document_number')." ',
'part1_16_Country_of_Issuance':' ".showData('i_94_imgt_country_issuance_passport')." ',
'part1_17_Date_of_Issuance':' ".showData('i_94_imgt_date_issuance_passport')." ',
'part1_18_Expiration_Date':' ".showData('other_information_about_you_expiry_date_issuance_passport')." ',
'part1_19a_city_or_town':' ".showData('i_94_imgt_city_town')." ',
'part1_19b_state':' ".showData('i_94_imgt_state')." ',
'part1_20_Date_of_LastEntry':' ".showData('i_94_imgt_date_of_last_arival')." ',
'part1_21_Date_Authorized':' ".showData('i_94_imgt_expiry_date_of_authorized')."',
'part1_22_Current_immigration_status':' ".showData('i_94_current_immigration_status')."',
'immigration_proceedings_removal_date':' ".showData('immigration_proceedings_removal_date')."',
'immigration_proceedings_exclusion_date':' ".showData('immigration_proceedings_exclusion_date')."',
'immigration_proceedings_deportion_date':' ".showData('immigration_proceedings_deportion_date')."',
'immigration_proceedings_rescission_date':' ".showData('immigration_proceedings_rescission_date')."',
'immigration_proceedings_judicial_date':' ".showData('immigration_proceedings_judicial_date')."',

// page 3

'part2_8a_date_of_Entry':' ".showData('additional_info_about_you_date_of_entry')."',
'part2_8b_city_or_town':' ".showData('additional_info_about_you_place_of_entry_city_town')."',
'part2_8c_state':' ".showData('additional_info_about_you_place_of_entry_state')."',
'part2_8d_status':' ".showData('additional_info_about_you_status_of_entry')."',
'part2_9a_date_of_Entry':' ".showData('additional_info_about_you_date_of_entry2')."',
'part2_9b_city_or_town':' ".showData('additional_info_about_you_place_of_entry_city_town2')."',
'part2_9c_state':' ".showData('additional_info_about_you_place_of_entry_state2')."',
'part2_9d_status':' ".showData('additional_info_about_you_status_of_entry2')."',
'part2_10a_date_of_Entry':' ".showData('additional_info_about_you_date_of_entry3')."',
'part2_10b_city_or_town':' ".showData('additional_info_about_you_place_of_entry_city_town3')."',
'part2_10c_state':' ".showData('additional_info_about_you_place_of_entry_state3')."',
'part2_10d_status':' ".showData('additional_info_about_you_status_of_entry3')."',
'part2_11b_city_or_town':' ".showData('additional_info_about_you_place_of_notification_outside_us_city_town')."',
'part2_11c_state':' ".showData('additional_info_about_you_place_of_notification_outside_us_state')."',
'part2_11d_country':' ".showData('additional_info_about_you_place_of_notification_outside_us_country')."',
'part2_12a':' ".showData('information_about_you_safe_foreign_notification_street_number')."',
'part2_12b':' ".showData('information_about_you_safe_foreign_notification_ste_apt_flr_number')."',
'part2_12c_city_town':' ".showData('information_about_you_safe_foreign_notification_city_town')."',
'part2_12d_province':' ".showData('information_about_you_safe_foreign_notification_province')."',
'part2_12e_postal_code':' ".showData('information_about_you_safe_foreign_notification_postal_code')."',
'part2_12f_country':' ".showData('information_about_you_safe_foreign_notification_country')."',
'part3_2a':' ".showData('processing_information_why_were_you_arested')."',
'part3_2b':' ".showData('processing_information_date_of_arrest_citation_detension_or_charge')."',
'part3_2c_city_or_town':' ".showData('processing_information_arrest_city_town')."',
'part3_2d_state':' ".showData('processing_information_arrest_state')."',
'part3_2e_country':' ".showData('processing_information_arrest_country')."',
'part3_2f_outcome_dis_chrg':' ".showData('processing_information_arrest_outcome_disposition')."',
'part3_3a':' ".showData('processing_information_why_were_you_arested2')."',
'part3_3b':' ".showData('processing_information_date_of_arrest_citation_detension_or_charge2')."',
'part3_3c':' ".showData('processing_information_arrest_city_town2')."',
'part3_3d':' ".showData('processing_information_arrest_state2')."',
'part3_3e':' ".showData('processing_information_arrest_country2')."',
'part3_3f':' ".showData('processing_information_arrest_outcome_disposition2')."',

// page 5

// page 6

// page 7

'part4_1a_lastname':' ".showData('spouse_children1_family_last_name')."',
'part4_1b_FirstName':' ".showData('spouse_children1_given_first_name')."',
'part4_1c_middleName':' ".showData('spouse_children1_middle_name')."',
'part4_2_date_of_birth':' ".showData('spouse_children1_date_of_birth')."',
'part4_3_Country_of_Birth':' ".showData('spouse_children1_country_of_birth')."',
'part4_4_Relationship':'  ".showData('spouse_children1_relationship')." ',
'part4_5_Current_Location':'  ".showData('spouse_children1_current_location')."',

'part4_6a_lastname':' ".showData('spouse_children2_family_last_name')."',
'part4_6b_FirstName':' ".showData('spouse_children2_given_first_name')."',
'part4_6c_middleName':' ".showData('spouse_children2_middle_name')." ',
'part4_7_date_of_birth':' ".showData('spouse_children2_date_of_birth')."',
'part4_8_Country_of_Birth':' ".showData('spouse_children2_country_of_birth')."',
'part4_9_Relationship':'  ".showData('spouse_children2_relationship')." ',
'part4_10_Current_Location':' ".showData('spouse_children2_current_location')."',

'part4_11a_lastname':' ".showData('spouse_children3_family_last_name')."',
'part4_11b_FirstName':'  ".showData('spouse_children3_given_first_name')."',
'part4_11c_middleName':'  ".showData('spouse_children3_middle_name')."',
'part4_12_date_of_birth':' ".showData('spouse_children3_date_of_birth')."',
'part4_13_Country_of_Birth':' ".showData('spouse_children3_country_of_birth')."',
'part4_14_Relationship':'  ".showData('spouse_children3_relationship')."',
'part4_15_Current_Location':' ".showData('spouse_children3_current_location')."',

'part4_16a_lastname':' ".showData('spouse_children4_family_last_name')."',
'part4_16b_FirstName':' ".showData('spouse_children4_given_first_name')."',
'part4_16c_middleName':' ".showData('spouse_children4_middle_name')."',
'part4_17_date_of_birth':' ".showData('spouse_children4_date_of_birth')."',
'part4_18_Country_of_Birth':' ".showData('spouse_children4_country_of_birth')."',
'part4_19_Relationship':' ".showData('spouse_children4_relationship')."',
'part4_20_Current_Location':' ".showData('spouse_children4_current_location')."',

'part4_21a_lastname':' ".showData('spouse_children5_family_last_name')." ',
'part4_21b_FirstName':' ".showData('spouse_children5_given_first_name')." ',
'part4_21c_middleName':' ".showData('spouse_children5_middle_name')." ',
'part4_22_date_of_birth':' ".showData('spouse_children5_date_of_birth')." ',
'part4_23_Country_of_Birth':' ".showData('spouse_children5_country_of_birth')." ',
'part4_24_Relationship':' ".showData('spouse_children5_relationship')." ',
'part4_25_Current_Location':' ".showData('spouse_children5_current_location')." ',

// page 8
'i_918_petitioner_statement_1b':' ".showData('i_918_petitioner_statement_1b')."',
'i_918_petitioner_statement_2':' ".showData('i_918_petitioner_statement_2')."',
'i_918_petitioner_daytime_tel':' ".showData('i_918_petitioner_daytime_tel')." ',
'i_918_petitioner_mobile':' ".showData('i_918_petitioner_mobile')." ',
'i_918_petitioner_email':' ".showData('i_918_petitioner_email')." ',
'i_918_petitioner_sign_date':' ".showData('i_918_petitioner_sign_date')."',
'i_918_interpreter_family_last_name':' ".showData('i_918_interpreter_family_last_name')."',
'i_918_interpreter_family_given_first_name':' ".showData('i_918_interpreter_family_given_first_name')."',
'i_918_interpreter_business_name':' ".showData('i_918_interpreter_business_name')."',

// page 9

'i_918_interpreter_mailing_address_street_number':' ".showData('i_918_interpreter_mailing_address_street_number')."',
'i_918_interpreter_mailing_address_apt_ste_flr_value':' ".showData('i_918_interpreter_mailing_address_apt_ste_flr_value')."',
'i_918_interpreter_mailing_address_city_town':' ".showData('i_918_interpreter_mailing_address_city_town')."',
'i_918_interpreter_mailing_address_state':' ".showData('i_918_interpreter_mailing_address_state')."',
'i_918_interpreter_mailing_address_zip_code':' ".showData('i_918_interpreter_mailing_address_zip_code')."',
'i_918_interpreter_mailing_address_province':' ".showData('i_918_interpreter_mailing_address_province')."',
'i_918_interpreter_mailing_address_postal_code':' ".showData('i_918_interpreter_mailing_address_postal_code')."',
'i_918_interpreter_mailing_address_country':' ".showData('i_918_interpreter_mailing_address_country')."',
'i_918_interpreter_daytime_tel':' ".showData('i_918_interpreter_daytime_tel')."',
'i_918_interpreter_mobile':' ".showData('i_918_interpreter_mobile')."',
'i_918_interpreter_email':' ".showData('i_918_interpreter_email')."',
'i_918_interpreter_certification_language_skill':' ".showData('i_918_interpreter_certification_language_skill')."',
'i_918_interpreter_sign_date':' ".showData('i_918_interpreter_sign_date')."',
'i_918_preparer_family_last_name':' ".showData('i_918_preparer_family_last_name')."',
'i_918_preparer_family_given_first_name':' ".showData('i_918_preparer_family_given_first_name')."',
'i_918_preparer_business_name':' ".showData('i_918_preparer_business_name')."',
'i_918_preparer_mailing_address_street_number':' ".showData('i_918_preparer_mailing_address_street_number')."',
'i_918_preparer_mailing_address_apt_ste_flr_value':' ".showData('i_918_preparer_mailing_address_apt_ste_flr_value')."',
'i_918_preparer_mailing_address_city_town':' ".showData('i_918_preparer_mailing_address_city_town')."',
'i_918_preparer_mailing_address_state':' ".showData('i_918_preparer_mailing_address_state')."',
'i_918_preparer_mailing_address_zip_code':' ".showData('i_918_preparer_mailing_address_zip_code')."',
'i_918_preparer_mailing_address_province':' ".showData('i_918_preparer_mailing_address_province')."',
'i_918_preparer_mailing_address_postal_code':' ".showData('i_918_preparer_mailing_address_postal_code')."',
'i_918_preparer_mailing_address_country':' ".showData('i_918_preparer_mailing_address_country')."',
'i_918_preparer_daytime_tel':' ".showData('i_918_preparer_daytime_tel')."',
'i_918_preparer_mobile':' ".showData('i_918_preparer_mobile')."',
'i_918_preparer_email':' ".showData('i_918_preparer_email')."',

// page 10

'i_918_preparer_sign_date':' ".showData('i_918_preparer_sign_date')."',

// page 11

'i_918_additional_info_last_name':' ".showData('i_918_additional_info_last_name')."',
'i_918_additional_info_first_name':' ".showData('i_918_additional_info_first_name')."',
'i_918_additional_info_middle_name':' ".showData('i_918_additional_info_middle_name')."',
'i_918_additional_info_a_number':' ".showData('i_918_additional_info_a_number')."',
'i_918_additional_info_page_number':' ".showData('i_918_additional_info_3a_page_no')."',
'i_918_additional_info_part_number':' ".showData('i_918_additional_info_3b_part_no')."',
'i_918_additional_info_item_number':' ".showData('i_918_additional_info_3c_item_no')."',
'i_918_additional_info_page_number1':' ".showData('i_918_additional_info_4a_page_no')."',
'i_918_additional_info_part_number1':' ".showData('i_918_additional_info_4b_part_no')."',
'i_918_additional_info_item_number1':' ".showData('i_918_additional_info_4c_item_no')."',
'i_918_additional_info_page_number2':' ".showData('i_918_additional_info_5a_page_no')."',
'i_918_additional_info_part_number2':' ".showData('i_918_additional_info_5b_part_no')."',
'i_918_additional_info_item_number2':' ".showData('i_918_additional_info_5c_item_no')."',
'i_918_additional_info_page_number3':' ".showData('i_918_additional_info_6a_page_no')."',
'i_918_additional_info_part_number3':' ".showData('i_918_additional_info_6b_part_no')."',
'i_918_additional_info_item_number3':' ".showData('i_918_additional_info_6c_item_no')."',
'i_918_additional_info_page_number4':' ".showData('i_918_additional_info_7a_page_no')."',
'i_918_additional_info_part_number4':' ".showData('i_918_additional_info_7b_part_no')."',
'i_918_additional_info_item_number4':' ".showData('i_918_additional_info_7c_item_no')."',

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
$pdf->Output('i-918.pdf', 'I');