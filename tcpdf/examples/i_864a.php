<?php

require_once("localconfig.php");
//$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        $this->SetY(13);
        if ($this->page > 1) {
            $this->SetLineWidth(2); // set border width
            // $this->SetDrawColor(0,0,0); // set color for cell border
            $this->SetFillColor(255, 255, 255); // set filling color
            $this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');

            $this->SetLineWidth(0.1); // set border width
            // $this->SetDrawColor(0,0,0); // set color for cell border
            $this->SetFillColor(255, 255, 255); // set filling color
            $this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C');
        }
    }


    
    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-17);

        $header_top_border = array(
            'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
        );
        $this->Cell(191.5, 4, '', $header_top_border, 1, 1);

        // Set font
        $this->SetFont('times', '', 9);

        $this->Cell(40, 6, "Form I-864A   Edition   10/17/24 ", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/I-864a-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 159, 267, true);
    }
}

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-864A');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(13.7, 15.3, 12.8, true);

// set auto page breaks
$pdf->SetAutoPageBreak(False, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1

// set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 2, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);


// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);    // set font
$pdf->MultiCell(120, 15, "Contract Between Sponsor and Household Member", 0, 'C', 0, 1, 48, 11, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-864A", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0075\nExpires 10/31/2027", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
    'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);


$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');
//...........

//..............table 1 start
$pdf->SetFillColor(220, 220, 220);
$pdf->writeHTMLCell(189.6, 27, 13, 33, "", 1, 1, false, true, 'C', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(189, 5, 13.3, 33.3, "For Goverment Use Only", "B", 1, true, true, 'C', true);
//...........

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(100, 15, "This Form I-864A relates to a household member who:", 0, 'L', 0, 1, 14, 39, true);


$pdf->SetFont('times', '', 10);
$html = '<div> <input type="checkbox" name="table1_b" value="Y" checked=" " /> <b> IS </b>the intending <br> &nbsp; &nbsp; &nbsp;   
immigrant</div>';
$pdf->writeHTMLCell(60, 7, 12, 45, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="table1_b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 52, 45, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(80, 15, 58, 45, "<b>IS NOT</b> the", 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html = '<div>intending<br>immigrant</div>';
$pdf->writeHTMLCell(60, 7, 58, 49, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html = '<div>Reviewed By:</div>';
$pdf->writeHTMLCell(90, 7, 88, 45, $html, 0, 1, false, true, 'J', true);
//............

$pdf->writeHTMLCell(90, 27, 111, 50, "", "T", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Location:</div>';
$pdf->writeHTMLCell(90, 7, 88, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->writeHTMLCell(35, 27, 104, 57, "", "T", 1, false, true, 'C', true);


$pdf->SetFont('times', '', 10);
$html = '<div>Date(mm/dd/yyyy):</div>';
$pdf->writeHTMLCell(90, 7, 140, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->writeHTMLCell(31, 27, 170, 57, "", "T", 1, false, true, 'C', true);

//.......table 2start
$pdf->writeHTMLCell(189, 18.2, 13.3, 62.3, "", 1, 1, false, true, 'C', true);
$pdf->writeHTMLCell(39, 17.5, 13.5, 62.5, "", "R", 1, true, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>To be completed by an attorney or accredited representative</b> (if any).  </div>';
$pdf->writeHTMLCell(40, 7, 15, 65, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 14);
$html = '<div><input type="checkbox" name="attached4" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(40, 15, 20.5, 62.5, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Select this box if<br>Form G-28 or<br>G-28I is attached.</b></div>';
$pdf->writeHTMLCell(40, 15, 61, 63, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 18, 91, 62.5, '',  'L',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 18, 138, 62.5, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell(50, 15, 92, 62, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 93, 72);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or According Representative USCIS Online Account Number</b>(if any)</div>';
$pdf->writeHTMLCell(60, 15, 139, 62.5, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_or_according_representative', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 139.5, 72);
//............table2end
$pdf->Image('images/right_angle.jpg', 14, 83.5, 3.3, 3.3);
$pdf->SetFont('times', 'B', 10.4); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. ", '', 'L', 0, 1, 18, 82.3, true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About You (the Household 
Member)</b></div>';
$pdf->writeHTMLCell(190, 6, 12.9, 90, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1.2, 0.5, 0.2); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b><i>Full Name</i></b></div>';
$pdf->writeHTMLCell(190, 6.6, 13, 100, $html, 1, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 109, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_last_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 115);
//............

$pdf->SetFont('times', '', 10);
$html = '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 85.1, 108, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_You_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 85.5, 115);
//............

$pdf->SetFont('times', '', 10);
$html = '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 146, 108, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.5, 115);
//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.8); // set font
$html = '<div><b>Mailing Address</b></div>';
$pdf->writeHTMLCell(190, 6.2, 14, 126, $html, 0, 1, true, false, 'L', true);
$pdf->SetFontSize(8.7); // set font
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(Uses ZIP Code Lookup)</i></b></a></div>';
$pdf->writeHTMLCell(40, 7, 41, 127, $html, 0, 1, false, false, 'R', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.&nbsp;&nbsp;&nbsp;&nbsp;</b>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 13, 133, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_care_of_name',181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 138);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 145, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_street', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 151);
//...........
if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="Apt1" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste1" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr1" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 152, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 147, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 146.8, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 151);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 159, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_city_town', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 164);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144.2, 159.3, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("about_your_mailing_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 164);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 159.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 164);
//..............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 171, 'Province', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 176);
//.............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,88, 171, 'Postal Code', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 176);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Country';
$pdf->writeHTMLCell(90, 7, 124, 171, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 176);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 185, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Is your current mailing address the same as your physical address? ';
$pdf->writeHTMLCell(120, 7, 21.4, 185, $html, '', 0, 0, true, 'L');
if (showData('i_864a_is_current_mailing_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_864a_is_current_mailing_same_as_physical') == "Y") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 186, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 185, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10); // set font

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "No" to <b>Item Number 3</b>., provide your
physical address.';
$pdf->writeHTMLCell(190, 7, 21.4, 192, $html, '', 0, 0, true, 'L');

//!.............
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(190, 6.6, 13, 200, $html, 0, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 207, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_street', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 213);
//...........
if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="Apt2" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste2" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr2" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 214, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 209, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 208.7, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 213);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 221, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_city_town', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 226);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 143.7, 221.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("about_your_mailing_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 226);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 167.2, 221.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 226);
//..............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 234, 'Province', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 239);
//.............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,87, 234, 'Postal Code', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 239);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Country';
$pdf->writeHTMLCell(90, 7, 124, 234, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 239);

/********************************
 ******** End Page No 1 **********
 *********************************/

/********************************
 ******** Start Page No 2 ********
 *********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About You (the Household Member)</b>(continued)</div>';
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
$pdf->setCellPaddings(1, 1, 0, 0.5);
$html = '<div><b><i>Other Information</i></b></div>';
$pdf->writeHTMLCell(191, 6, 13, 28.6, $html, 0, 1, true, false, 'L', true);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 12, 36, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 41.6);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,70, 36, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 78, 41.6);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if any)';
$pdf->writeHTMLCell(90, 7, 138, 36, $html, '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 146.5, 43, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 41.6);
//.........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,13, 48.5, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alien Registration Number (A-Number) (if any) ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 28, 54, '<b>A-</b>', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 21.5, 56, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 54);
//............. 
$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(90, 7, 94, 48.5, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->Image('images/right_angle.jpg', 102, 56, 3.3, 3.3);
$pdf->TextField('about_your_mailing_address_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 54);
//...........
$pdf->SetFont('times', '', 12); // set font
$html = "<div><b>Part 2. Your (the Household Member's) Relationship to the Sponsor</b></div>";
$pdf->writeHTMLCell(191,6.7, 13, 66, $html, 1, 1, true, false, 'L', true);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>Select <b>Item Number 1.a.</b>, <b>1.b.</b>, or <b>1.c.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 74, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 80, '<b>1.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 79, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am the intending immigrant and also the sponsor\'s 
spouse.';
$pdf->writeHTMLCell(90, 7, 27, 80, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_864a_intending_immigrant_household_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 15, 12, 87,'<b>2.</b>' , 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<div><input type="checkbox"  name="part2_2" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 86, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am the intending immigrant and also a member of the sponsor\'s household.';
$pdf->writeHTMLCell(120, 7, 27, 87, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_864a_not_a_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 15, 12, 94,'<b>3.</b>' , 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<div><input type="checkbox"  name="part2_3" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = "I am <b>not</b> the intending immigrant. I am the sponsor's household member. I am related to the sponsor as his/her:" ;
$pdf->writeHTMLCell(190, 7, 27, 94, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', "", 14);
if (showData('i_864a_spouse_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div>
<input type="checkbox"  name="part2_3a" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3b" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3c" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3d" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3e" value="Y" checked="' . $checked . '" /><br>
</div>';
$pdf->writeHTMLCell(50, 7, 26, 100, $html, 0, 1, false, true, 'L', true);
//......
$pdf->SetFont('times', "", 10);
$pdf->writeHTMLCell(100, 7, 32.5, 101, 'Spouse', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(100, 7, 32.5, 106.8, 'Son or Daughter (at least 18 years of age)', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(100, 7, 32.5, 112.8, 'Parent', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(100, 7, 32.5, 118.8, 'Brother or Sister', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(100, 7, 32.5, 124.5, 'Other Dependent (Specify)', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Other_Dependent_Specify', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 124.5);
//.............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 3. Your (the Household Member\'s) 
Employment and Income</b></div>';
$pdf->writeHTMLCell(190, 6.6, 13, 140 , $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>I am currently: </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_864a_employed_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 153, '<b>1.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 152, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Employed as a/an';
$pdf->writeHTMLCell(83, 7, 27, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part3_1_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 152);
$pdf->TextField('part3_2_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 160);
$pdf->TextField('part3_3_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 168.4);
$pdf->TextField('part3_4_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 177);
$pdf->TextField('part3_5a_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 185);
$pdf->TextField('part3_5b_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 193);
$pdf->TextField('part3_6_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 201);
//.........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 12, 161, '<b>2.</b>', 0, 1, false, true, 'L', true);
$html = '<div>Name of Employer Number 1 </div>';
$pdf->writeHTMLCell(90, 7, 21, 161, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 12, 169, '<b>3.</b>', 0, 1, false, true, 'L', true);
$html = '<div>Name of Employer Number 2 (if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 21, 169, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_864a_employed_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 177, '<b>4.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 176, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Self employed as a/an';
$pdf->writeHTMLCell(83, 7, 27, 177, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_864a_employed_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 185, '<b>5.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 184, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Retired Since (mm/dd/yyyy)';
$pdf->writeHTMLCell(83, 7, 27, 185, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_864a_employed_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 193, '<b>6.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 192, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Retired Since (mm/dd/yyyy)';
$pdf->writeHTMLCell(83, 7, 27, 193, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 12, 201, '<b>7.</b>', 0, 1, false, true, 'L', true);
$html = '<div>My current individual annual income is:</div>';
$pdf->writeHTMLCell(90, 7, 21, 201, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 99.6, 201, '$', 0, 1, false, true, 'L', true);
// ********************************
//  ******** End Page No 2 **********
//  *********************************/

// ********************************
//  ******** Start Page No 3 ********
//  *********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = "<div><b>Part 4. Your (the Household Member's) Federal Income Tax Information and Assets</b></div>";;
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 12, 26, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you filed a Federal income tax return for each of the three most recent tax years?', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
if (showData('i_864a_is_current_mailing_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_864a_is_current_mailing_same_as_physical') == "Y") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 26, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 25, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 12, 34, '<b>NOTE:</b> You <b>MUST</b> attach a photocopy or transcript of your Federal income tax return for only the most recent tax year.', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(195, 7, 12, 41, 'My total income (adjusted gross income on IRS Form 1040EZ) as reported on my Federal income tax returns for the most recent three
years was:', '', 0, 0, true, 'L');


// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_province', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 41.6);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,70, 36, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_postal_code', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 78, 41.6);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if any)';
// $pdf->writeHTMLCell(90, 7, 138, 36, $html, '', 0, 0, true, 'L');
// $pdf->Image('images/right_angle.jpg', 146.5, 43, 3.3, 3.3);
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_country', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 41.6);
// //.........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,13, 48.5, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alien Registration Number (A-Number) (if any) ', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(90, 7, 28, 54, '<b>A-</b>', '', 0, 0, true, 'L');
// $pdf->Image('images/right_angle.jpg', 21.5, 56, 3.3, 3.3);
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_postal_code', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 54);
// //............. 
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)';
// $pdf->writeHTMLCell(90, 7, 94, 48.5, $html, '', 0, 0, true, 'L');
// //.............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->Image('images/right_angle.jpg', 102, 56, 3.3, 3.3);
// $pdf->TextField('about_your_mailing_address_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 54);
// //...........
// $pdf->SetFont('times', '', 12); // set font
// $html = "<div><b>Part 2. Your (the Household Member's) Relationship to the Sponsor</b></div>";
// $pdf->writeHTMLCell(191,6.7, 13, 66, $html, 1, 1, true, false, 'L', true);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>Select <b>Item Number 1.a.</b>, <b>1.b.</b>, or <b>1.c.</b></div>';
// $pdf->writeHTMLCell(90, 7, 12, 74, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 12, 80, '<b>1.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1a" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 79, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I am the intending immigrant and also the sponsor\'s 
// spouse.';
// $pdf->writeHTMLCell(90, 7, 27, 80, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_intending_immigrant_household_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(50, 15, 12, 87,'<b>2.</b>' , 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox"  name="part2_2" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 86, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I am the intending immigrant and also a member of the sponsor\'s household.';
// $pdf->writeHTMLCell(120, 7, 27, 87, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_not_a_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(50, 15, 12, 94,'<b>3.</b>' , 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox"  name="part2_3" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 93, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = "I am <b>not</b> the intending immigrant. I am the sponsor's household member. I am related to the sponsor as his/her:" ;
// $pdf->writeHTMLCell(190, 7, 27, 94, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', "", 14);
// if (showData('i_864a_spouse_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div>
// <input type="checkbox"  name="part2_3a" value="Y" checked="' . $checked . '" /><br>
// <input type="checkbox"  name="part2_3b" value="Y" checked="' . $checked . '" /><br>
// <input type="checkbox"  name="part2_3c" value="Y" checked="' . $checked . '" /><br>
// <input type="checkbox"  name="part2_3d" value="Y" checked="' . $checked . '" /><br>
// <input type="checkbox"  name="part2_3e" value="Y" checked="' . $checked . '" /><br>
// </div>';
// $pdf->writeHTMLCell(50, 7, 26, 100, $html, 0, 1, false, true, 'L', true);
// //......
// $pdf->SetFont('times', "", 10);
// $pdf->writeHTMLCell(100, 7, 32.5, 101, 'Spouse', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(100, 7, 32.5, 106.8, 'Son or Daughter (at least 18 years of age)', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(100, 7, 32.5, 112.8, 'Parent', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(100, 7, 32.5, 118.8, 'Brother or Sister', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(100, 7, 32.5, 124.5, 'Other Dependent (Specify)', 0, 1, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('Other_Dependent_Specify', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 124.5);
// //.............
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 3. Your (the Household Member\'s) 
// Employment and Income</b></div>';
// $pdf->writeHTMLCell(190, 6.6, 13, 140 , $html, 1, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>I am currently: </b></div>';
// $pdf->writeHTMLCell(90, 7, 12, 147, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_employed_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(50, 7, 12, 153, '<b>1.</b>', 0, 1, false, true, 'L', true);
// $html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(50, 7, 20, 152, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Employed as a/an';
// $pdf->writeHTMLCell(83, 7, 27, 153, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part3_1_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 152);
// $pdf->TextField('part3_2_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 160);
// $pdf->TextField('part3_3_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 168.4);
// $pdf->TextField('part3_4_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 177);
// $pdf->TextField('part3_5a_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 185);
// $pdf->TextField('part3_5b_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 193);
// $pdf->TextField('part3_6_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 201);
// //.........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(90, 7, 12, 161, '<b>2.</b>', 0, 1, false, true, 'L', true);
// $html = '<div>Name of Employer Number 1 </div>';
// $pdf->writeHTMLCell(90, 7, 21, 161, $html, 0, 1, false, true, 'L', true);
// //.........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(90, 7, 12, 169, '<b>3.</b>', 0, 1, false, true, 'L', true);
// $html = '<div>Name of Employer Number 2 (if applicable)</div>';
// $pdf->writeHTMLCell(90, 7, 21, 169, $html, 0, 1, false, true, 'L', true);
// //.........
// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_employed_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(50, 7, 12, 177, '<b>4.</b>', 0, 1, false, true, 'L', true);
// $html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(50, 7, 20, 176, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Self employed as a/an';
// $pdf->writeHTMLCell(83, 7, 27, 177, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_employed_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(50, 7, 12, 185, '<b>5.</b>', 0, 1, false, true, 'L', true);
// $html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(50, 7, 20, 184, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Retired Since (mm/dd/yyyy)';
// $pdf->writeHTMLCell(83, 7, 27, 185, $html, '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_employed_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(50, 7, 12, 193, '<b>6.</b>', 0, 1, false, true, 'L', true);
// $html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(50, 7, 20, 192, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Retired Since (mm/dd/yyyy)';
// $pdf->writeHTMLCell(83, 7, 27, 193, $html, '', 0, 0, true, 'L');
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(90, 7, 12, 201, '<b>7.</b>', 0, 1, false, true, 'L', true);
// $html = '<div>My current individual annual income is:</div>';
// $pdf->writeHTMLCell(90, 7, 21, 201, $html, 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(90, 7, 99.6, 201, '$', 0, 1, false, true, 'L', true);


//..............page 3 left end ..................

// $pdf->StartTransform();
// $pdf->SetFillColor(0, 0, 0);
// $pdf->Rotate(30);
// $pdf->SetFont('zapfdingbats', 'B', 10);
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 180, 56.7, false); // angle 1
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 178, 72, true); // angle 2
// $pdf->MultiCell(70, 10, "s", '', 'R', 0, 1, 167, 75, true); // angle 3
// $pdf->StopTransform();
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>13.</b> &nbsp; &nbsp; Alien Registration Number (A-Number,if any)';
// $pdf->writeHTMLCell(90, 7, 112, 17, $html, '', 0, 0, true, 'L');
// //.............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_alien_reg_number3', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 22);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>A-</b>';
// $pdf->writeHTMLCell(90, 7, 152, 22.5, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>14.</b>&nbsp; &nbsp;U.S. Social Security Number (if any)';
// $pdf->writeHTMLCell(90, 7, 112, 30, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_us_social_security_number3', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 35);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>15.</b>&nbsp; &nbsp;USCIS Online Account Number (if any)';
// $pdf->writeHTMLCell(90, 7, 112, 43, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_us_online_account_number3', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 48);

// //...........
// $pdf->SetFont('times', 'B', 10);
// $html = 'Intending Immigrant Number 4 <br><br>Name';
// $pdf->writeHTMLCell(90, 7, 112, 55, $html, '', 0, 0, true, 'L');
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>16.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
// $pdf->writeHTMLCell(90, 7, 112, 67, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part5_sponsor_family_last_name4', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 69);
// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>16.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
// $pdf->writeHTMLCell(90, 7, 112, 76, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part5_sponsor_given_first_name4', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 78);
// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>16.c.  </b>  Middle Name  </div>';
// $pdf->writeHTMLCell(90, 7, 112, 87, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part5_sponsor_middle_name4', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 87);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>17.</b> &nbsp; &nbsp; Date of Birth (mm/dd/yyyy)';
// $pdf->writeHTMLCell(90, 7, 112, 96, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_sponsor_date_of_birth4', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 170, 96);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>18.</b> &nbsp; &nbsp; Alien Registration Number (A-Number,if any)';
// $pdf->writeHTMLCell(90, 7, 112, 104, $html, '', 0, 0, true, 'L');
// //.............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_alien_reg_number4', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 109);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>A-</b>';
// $pdf->writeHTMLCell(90, 7, 152, 109, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>19.</b>&nbsp; &nbsp;U.S. Social Security Number (if any)';
// $pdf->writeHTMLCell(90, 7, 112, 117, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_us_social_security_number4', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 122);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>20.</b>&nbsp; &nbsp;USCIS Online Account Number (if any)';
// $pdf->writeHTMLCell(90, 7, 112, 130, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_us_online_account_number4', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 135);

// //..............
// $pdf->StartTransform();
// $pdf->SetFillColor(0, 0, 0);
// $pdf->Rotate(30);
// $pdf->SetFont('zapfdingbats', 'B', 10);
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 96, 53.5, false); // angle 1
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 94, 68, true); // angle 2
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 73, 72, true); // angle 3
// $pdf->StopTransform();
// //...........
// $pdf->SetFont('times', 'B', 10);
// $html = 'Intending Immigrant Number 5 <br><br>Name';
// $pdf->writeHTMLCell(90, 7, 112, 142, $html, '', 0, 0, true, 'L');
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>21.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
// $pdf->writeHTMLCell(90, 7, 112, 154, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part5_sponsor_family_last_name5', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 156);
// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>21.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
// $pdf->writeHTMLCell(90, 7, 112, 163, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part5_sponsor_given_first_name5', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 165);
// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>21.c.  </b>  Middle Name  </div>';
// $pdf->writeHTMLCell(90, 7, 112, 174, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part5_sponsor_middle_name5', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 174);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>22.</b> &nbsp; &nbsp; Date of Birth (mm/dd/yyyy)';
// $pdf->writeHTMLCell(90, 7, 112, 183, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_sponsor_date_of_birth5', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 170, 183);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>23.</b> &nbsp; &nbsp; Alien Registration Number (A-Number,if any)';
// $pdf->writeHTMLCell(90, 7, 112, 190, $html, '', 0, 0, true, 'L');
// //.............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_alien_reg_number5', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 195);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>A-</b>';
// $pdf->writeHTMLCell(90, 7, 152, 195, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>24.</b>&nbsp; &nbsp;U.S. Social Security Number (if any)';
// $pdf->writeHTMLCell(90, 7, 112, 202, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_us_social_security_number5', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 207);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>25.</b>&nbsp; &nbsp;USCIS Online Account Number (if any)';
// $pdf->writeHTMLCell(90, 7, 112, 214, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part5_us_online_account_number5', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 219);

// //..............
// $pdf->StartTransform();
// $pdf->SetFillColor(0, 0, 0);
// $pdf->Rotate(30);
// $pdf->SetFont('zapfdingbats', 'B', 10);
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 94.5, 139, false); // angle 1
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 93, 153, true); // angle 2
// $pdf->MultiCell(80, 10, "s", '', 'R', 0, 1, 73, 155, true); // angle 3
// $pdf->StopTransform();
// //..............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'I', 10); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b>Sponsor\'s Statement</b></div>';
// $pdf->writeHTMLCell(91, 5, 113, 230, $html, 0, 1, true, false, 'L', true);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>NOTE: </b>Select the box for either <b>Item Number 26.a.</b> or <b>26.b.</b> 
// If applicable, select the box for<b> Item Number 27.</b>';
// $pdf->writeHTMLCell(90, 5, 112, 236, $html, '', 0, 0, true, 'L');
// //................

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>26.a. </b><input type="checkbox" name="part5_26a" value="Y" checked=" " /></div>';
// $pdf->writeHTMLCell(50, 5, 112, 245, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I can read and understand English, and I have read 
// and understand every question and instruction on this<br>
// contract and my answer to every question.';
// $pdf->writeHTMLCell(85, 5, 125, 245, $html, '', 0, 0, true, 'L');

// ********************************
//  ******** End Page No 3 **********
//  *********************************/

// ********************************
//  ******** Start Page No 4 ********
//  *********************************/
// $pdf->AddPage('P', 'LETTER');  // page number 4
// //.............
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 5. Sponsor\'s Promise, Statement, Contact 
// Information, Declaration, Certification, and 
// Signature</b> (continued)</div>';
// $pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
// //...........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_the_interpreter_named_in_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>26.b.&nbsp;</b><input type="checkbox" name="part5_26" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 12, 33, $html, 0, 1, false, true, 'L', true);
// $html = 'The interpreter named in <b>Part 7.</b> read to me every 
// question and instruction on this contract and my<br>answer to every question in <br><br><br>
// a language in which I am fluent, and I understood 
// everything. ';
// $pdf->writeHTMLCell(83, 7, 25, 33, $html, '', 0, 0, true, 'L');
// // $pdf->writeHTMLCell(78, 7, 26, 46.5, '', 1, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('interpreter_question_and_instruction', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 46.5);
// //.........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_the_preparer_named_in_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>27.&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part5_27" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 12, 60, $html, 0, 1, false, true, 'L', true);
// $html = 'At my request, the preparer named in <b>Part 8.</b>,<br><br><br>
// prepared this contract for me based only upon 
// information I provided or authorized.';
// $pdf->writeHTMLCell(83, 7, 25, 60, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('preparer_contract_information', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 65.5);
// // $pdf->writeHTMLCell(78, 7, 26, 65.5, '', 1, 0, false, 'L');
// //.........
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Sponsor\'s Contact Information</i></b></div>';
// $pdf->writeHTMLCell(91, 6.6, 13, 85, $html, 0, 1, true, false, 'L', true);
// //...........

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>28.</b>&nbsp;&nbsp;&nbsp; Sponsor\'s Daytime Telephone Number</div>';
// $pdf->writeHTMLCell(90, 7, 12, 93, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('sponsor_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 98);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>29.</b>&nbsp;&nbsp;&nbsp; Sponsor\'s  Mobile Telephone Number (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 12, 106, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('sponsor_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 111);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>30.</b> &nbsp;&nbsp;&nbsp;Sponsor\'s Email Address (if any)
// </div>';
// $pdf->writeHTMLCell(90, 6.6, 12, 119, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('sponsor_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 124);
// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Sponsor\'s Declaration and Certification</i></b></div>';
// $pdf->writeHTMLCell(91, 7, 13, 134, $html, 0, 1, true, false, 'L', true);
// //...........

// $pdf->SetFont('times', '', 10);
// $html = '<div>Copies of any documents I have submitted are exact 
// photocopies of unaltered, original documents, and I understand 
// that U.S. Citizenship and Immigration Services (USCIS) or the 
// U.S. Department of State (DOS) may require that I submit 
// original documents to USCIS or DOS at a later date. 
// Furthermore, I authorize the release of any information from 
// any and all of my records that USCIS or DOS may need to 
// determine my eligibility for the immigration benefit that I seek. </div>';
// $pdf->writeHTMLCell(93, 7, 12, 143, $html, 0, 1, false, true, 'L', true);
// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div>I furthermore authorize release of information contained in this 
// contract, in supporting documents, and in my USCIS or DOS 
// records, to other entities and persons where necessary for the 
// administration and enforcement of U.S. immigration law.</div>';
// $pdf->writeHTMLCell(92, 7, 12, 176, $html, 0, 1, false, true, 'L', true);

// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div>I certify, under penalty of perjury, that all of the information in 
// my contract and any document submitted with it were provided 
// or authorized by me, that I reviewed and understand all of the 
// information contained in, and submitted with, my contract and 
// that all of this information is complete, true, and correct.</div>';
// $pdf->writeHTMLCell(92, 7, 12, 194, $html, 0, 1, false, true, 'L', true);
// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Sponsor\'s Signature</i></b></div>';
// $pdf->writeHTMLCell(91, 6.6, 13, 217, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>31.a.</b>&nbsp;&nbsp; Sponsor\'s Signature';
// $pdf->writeHTMLCell(90, 7, 13, 225, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(80, 7, 24, 230, "", 1, 1, false, true, 'C', true);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>31.b.</b>&nbsp;&nbsp; Date of Signature (mm/dd/yyyy)';
// $pdf->writeHTMLCell(90, 7, 13, 240, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('sponsor_signature_date', 33.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 240);
// //............
// //............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>NOTE TO ALL SPONSORS:</b> If you do not completely fill 
// out this contract or fail to submit required documents listed in 
// the Instructions, USCIS may deny your contract.</div>';
// $pdf->writeHTMLCell(92, 7, 12, 247, $html, 0, 1, false, true, 'L', true);

// //......page 4 left end ....................................................................................

// //.............
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 6. Your (the Household Member\'s) Promise, 
// Statement, Contact Information, Declaration, 
// Certification, and Signature</b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 17, $html, 1, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>NOTE: </b>Read the Penalties section of the Form I-864A 
// Instructions before completing this part.</div>';
// $pdf->writeHTMLCell(92, 7, 112, 33, $html, 0, 1, false, true, 'L', true);

// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>I, THE HOUSEHOLD MEMBER,</b></div>';
// $pdf->writeHTMLCell(92, 7, 112, 42, $html, 0, 1, false, true, 'L', true);

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part6_household_member', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 48);
// //.....
// $pdf->SetFont('times', '', 10);
// $html = '(Print Name)';
// $pdf->writeHTMLCell(90, 7, 112, 54, $html, '', 0, 0, true, 'C');
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div>in consideration of the sponsor\'s promise to complete and file an 
// affidavit of support on behalf of the above named intending 
// immigrants.</div>';
// $pdf->writeHTMLCell(92, 7, 112, 60, $html, 0, 1, false, true, 'L', true);

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part6_inconsideration_sponsor_promise', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 74);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div>(Print number of intending immigrants noted in <b>Part 5. 
// Sponsor\'s Promise, Statement, Contact Information, 
// Declaration, Certification and Signature.)</b></div>';
// $pdf->writeHTMLCell(92, 7, 112, 81, $html, 0, 1, false, true, 'L', true);

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>A. </b></div>';
// $pdf->writeHTMLCell(50, 15, 118, 95, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Promise to provide any and all financial support 
// necessary to assist the sponsor in maintaining the 
// sponsored immigrants at or above the minimum 
// income provided for in the Immigration and 
// Naturalization Act (INA) section 213A(a)(1)(A) 
// (not less than 125 percent of the Federal Poverty 
// Guidelines) during the period in which the affidavit 
// of support is enforceable';
// $pdf->writeHTMLCell(75, 7, 125, 95, $html, '', 0, 0, true, 'L');

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>B. </b></div>';
// $pdf->writeHTMLCell(50, 15, 118, 128, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Agree to be jointly and severally liable for payment 
// of any and all obligations owed by the sponsor 
// under the affidavit of support to the sponsored 
// immigrants, to any agency of the Federal 
// Government, to any agency of a state or local 
// government, or to any other private entity that 
// provides means-tested public benefits;';
// $pdf->writeHTMLCell(75, 7, 125, 128, $html, '', 0, 0, true, 'L');

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>C. </b></div>';
// $pdf->writeHTMLCell(50, 15, 118, 157, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Certify under penalty under the laws of the United 
// States that the Federal income tax returns submitted 
// in support of the contract are true copies or 
// unaltered tax transcripts filed with the Internal 
// Revenue Service;';
// $pdf->writeHTMLCell(75, 7, 125, 157, $html, '', 0, 0, true, 'L');

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>D. </b></div>';
// $pdf->writeHTMLCell(50, 15, 118, 180, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Consideration where the household member is also 
// the sponsored immigrant: I understand that if I am 
// the sponsored immigrant and a member of the sponsor\'s 
// household that this promise relates only to my promise 
// to be jointly and severally liable for any obligation 
// owed by the sponsor under the affidavit of support to 
// any of my dependents, to any agency of the Federal 
// Government, to any agency of a state or local 
// government, or to any other private entity that provides 
// means-tested public benefits and to provide any and all 
// financial support necessary to assist the sponsor in 
// maintaining any of my dependents at or above the 
// minimum income provided for in INA section 213A(a)
// (1)(A) (not less than 125 percent of the Federal Poverty 
// Guideline) during the period which the affidavit of 
// support is enforceable.';
// $pdf->writeHTMLCell(75, 7, 125, 180, $html, '', 0, 0, true, 'L');

// /********************************
//  ******** End Page No 4 **********
//  *********************************/

// /********************************
//  ******** Start Page No 5 ********
//  *********************************/
// $pdf->AddPage('P', 'LETTER');

// //.............
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 6. Your (the Household Member\'s) Promise, 
// Statement, Contact Information, Declaration, 
// Certification, and Signature</b> (continued)</div>';
// $pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, false, 'L', true);

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>E. </b></div>';
// $pdf->writeHTMLCell(50, 15, 18, 33, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I understand that, if I am related to the sponsored 
// immigrant or the sponsor by marriage, the 
// termination of the marriage (by divorce, dissolution, 
// annulment, or other legal process) will not relieve 
// me of my obligations under this Form I-864A.';
// $pdf->writeHTMLCell(75, 7, 25, 33, $html, '', 0, 0, true, 'L');

// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>F. </b></div>';
// $pdf->writeHTMLCell(50, 15, 18, 54, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I authorize the Social Security Administration to 
// release information about me in its records to the 
// Department of State and U.S. Citizenship and 
// Immigration Services (USCIS).';
// $pdf->writeHTMLCell(75, 7, 25, 54, $html, '', 0, 0, true, 'L');

// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Your (the Household Member\'s) Statement</i></b></div>';
// $pdf->writeHTMLCell(90, 7, 13, 73, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>NOTE:</b>Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> 
// If applicable, select the box for <b>Item Number 2.</b> </div>';
// $pdf->writeHTMLCell(90, 7, 12, 80, $html, '', 0, 0, true, 'L');
// //.........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>1.a. </b> <input type="checkbox" name="part6_1" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 12, 90, $html, 0, 1, false, true, 'L', true);
// $html = 'I can read and understand English, and I have read 
// and understand every question and instruction on this 
// contract and my answer to every question.';
// $pdf->writeHTMLCell(83, 7, 24, 90, $html, '', 0, 0, true, 'L');
// //.........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_intending_immigrant_household_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>1.b. </b> <input type="checkbox" name="part6_1b" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 12, 103, $html, 0, 1, false, true, 'L', true);
// $html = 'The interpreter named in <b>Part 7</b>. read to me every 
// question and instruction on this contract and my<br>
// answer to every question in<br><br><br>
// a language in which I am fluent, and I understood 
// everything';
// $pdf->writeHTMLCell(83, 7, 24, 103, $html, '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(77, 7, 25, 115.5, "", 1, 0, false, 'L');
// $pdf->writeHTMLCell(5, 7, 101.5, 116, ",", 0, 0, false, 'L');
// $pdf->writeHTMLCell(5, 7, 101.5, 138, ",", 0, 0, false, 'L');
// //..........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864a_not_a_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part6_2" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 12, 132, $html, 0, 1, false, true, 'L', true);
// $html = 'At my request, the preparer named in Part 8., <br><br><br>
// prepared this contract for me based only upon 
// information I provided or authorized.';
// $pdf->writeHTMLCell(83, 7, 24, 132, $html, '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(77, 7, 25, 137.5, "", 1, 0, false, 'L');
// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Your (the Household Member\'s) Contact 
// Information</i></b></div>';
// $pdf->writeHTMLCell(90, 7, 13, 154, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;</b>Your (the Household Member\'s) Daytime Telephone<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number</div>';
// $pdf->writeHTMLCell(90, 7, 13, 165, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('your_household_member_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 173);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Your (the Household Member\'s) Mobile Telephone<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 12, 182, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('your_household_member_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 191);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Your (the Household Member\'s) Email Address (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('your_household_member_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 205);

// //............... page 5 left end .............................................................

// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Your (the Household Member\'s) Declaration and 
// Certification</i></b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div>Copies of any documents I have submitted are exact 
// photocopies of unaltered, original documents, and I understand 
// that USCIS or DOS may require that I submit original 
// documents to USCIS or DOS at a later date. Furthermore, I 
// authorize the release of any information from any and all of my 
// records that USCIS or DOS may need to determine my 
// eligibility for the immigration benefit that I seek. </div>';
// $pdf->writeHTMLCell(92, 7, 112, 27, $html, 0, 1, false, true, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div>I furthermore authorize release of information contained in this 
// contract, in supporting documents, and in my USCIS or DOS 
// records, to other entities and persons where necessary for the 
// administration and enforcement of U.S. immigration law.</div>';
// $pdf->writeHTMLCell(92, 7, 112, 56, $html, 0, 1, false, true, 'L', true);

// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div>I certify, under penalty of perjury, that all of the information in 
// my contract and any document submitted with it were provided 
// or authorized by me, that I reviewed and understand all of the 
// information contained in, and submitted with, my contract and 
// that all of this information is complete, true, and correct.</div>';
// $pdf->writeHTMLCell(92, 7, 112, 73, $html, 0, 1, false, true, 'L', true);

// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Your (the Household Member\'s) Signature</i></b></div>';
// $pdf->writeHTMLCell(91, 6.6, 113, 96, $html, 0, 1, true, false, 'L', true);
// //...........


// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>6.a.</b>&nbsp;&nbsp;&nbsp;&nbsp;Your (the Household Member\'s)  Printed Name</div>';
// $pdf->writeHTMLCell(90, 7, 112, 104, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('your_household_member_printed_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 110);
// //...............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>6.b.&nbsp;&nbsp;&nbsp;&nbsp;</b>Your (the Household Member\'s) Signature</div>';
// $pdf->writeHTMLCell(90, 7, 112, 118, $html, 0, 1, false, true, 'J', true);
// $pdf->writeHTMLCell(82, 7, 122, 123, '', 0, 1, false, true, 'J', true);
// //...............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>6.c.&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Signature (mm/dd/yyyy)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 132, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('your_household_member_date_of_signature', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 132);
// //.........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>NOTE TO ALL HOUSEHOLD MEMBERS:</b> If you do not 
// completely fill out this contract or fail to submit required 
// documents listed in the Instructions, USCIS may deny your 
// contract.</div>';
// $pdf->writeHTMLCell(92, 7, 112, 140, $html, 0, 1, false, true, 'L', true);
// //...........
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 7. Interpreter\'s Contact Information, 
// Certification, and Signature</b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 161, $html, 1, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div>Provide the following information about the interpreter.</div>';
// $pdf->writeHTMLCell(91, 7, 112, 173, $html, 0, 1, false, true, 'J', true);
// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Interpreter\'s Full Name</i></b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 183, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>1.a.</b>&nbsp;&nbsp;Interpreter\'s Family Name (Last Name)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 191, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_family_last_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 196);
// //...............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>1.b.</b>&nbsp;&nbsp;Interpreter\'s Given Name (First Name)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 205, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_given_first_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 210);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Business or Organization Name (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 218, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_business_org_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 223);

// /********************************
//  ******** End Page No 5 **********
//  *********************************/

// /********************************
//  ******** Start Page No 6 ********
//  *********************************/
// // add a page
// $pdf->AddPage('P', 'LETTER');  // page number 6
// //...........
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 7. Interpreter\'s Contact Information, 
// Certification, and Signature</b>(continued)</div>';
// $pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
// //..........
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'I', 10); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b>Interpreter\'s Mailing Address</b></div>';
// $pdf->writeHTMLCell(91, 6.6, 13, 31, $html, 0, 1, true, false, 'L', true);
// //.............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>3.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
// $pdf->writeHTMLCell(90, 7, 12, 38, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_mailing_street_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 39);
// //...........

// $pdf->SetFont('times', '', 10); // set font
// if (showData('i_864a_interpreter_address_apt_ste_flr') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('i_864a_interpreter_address_apt_ste_flr') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('i_864a_interpreter_address_apt_ste_flr') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $html = '<div><b>3.b. </b>&nbsp;  <input type="checkbox" name="Apt2" value="Apt" checked="' . $checked_apt . '"  /> Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste" checked="' . $checked_ste . '" /> Ste. <input type="checkbox" name="Flr2" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
// $pdf->writeHTMLCell(60, 0, 12, 49, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_mailing_apt_ste_flr', 44.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 59.5, 49);
// //...........

// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
// $pdf->writeHTMLCell(50, 5, 12, 58, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_mailing_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 58);
// //............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>3.d.</b> &nbsp; State</div>';
// $pdf->writeHTMLCell(50, 4, 12, 67, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("about_your_physical_state", 13, 7, $comboBoxOptions, array(), array(), 29, 67);
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>3.e.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
// $pdf->writeHTMLCell(30, 3, 45, 67, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_mailing_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 67);
// //..............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.f. </b> &nbsp;&nbsp;Province';
// $pdf->writeHTMLCell(90, 7, 12, 76, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part7_interpreter_mailing_province', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 76);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
// $pdf->writeHTMLCell(90, 7, 12, 85, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part7_interpreter_mailing_postal_code', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 85);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.h.</b> &nbsp;&nbsp;Country';
// $pdf->writeHTMLCell(90, 7, 12, 92, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part7_interpreter_mailing_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 97);
// //..............

// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Interpreter\'s Contact Information</i></b></div>';
// $pdf->writeHTMLCell(91, 7, 13, 107, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>4.  </b> &nbsp;  Interpreter\'s Daytime Telephone Number</div>';
// $pdf->writeHTMLCell(90, 7, 12, 115, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_daytime_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 120);
// //...............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>5.  </b> &nbsp;   Interpreter\'s Mobile Telephone Number (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 12, 128, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_mobile_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 133);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>6.   </b>  &nbsp; Interpreter\'s  Email Address (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 12, 141, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part7_interpreter_email_address', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 146);

// //............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'I', 10); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b>Interpreter\'s  Certification</b></div>';
// $pdf->writeHTMLCell(89.2, 7, 14, 155, $html, 0, 1, true, false, 'J', true);
// //..............

// $pdf->SetFont('times', '', 10); // set font
// $html = 'I certify, under penalty of perjury, that:';
// $pdf->writeHTMLCell(90, 7, 13, 162, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 10); // set font
// $html = 'I am fluent in English and';
// $pdf->writeHTMLCell(90, 7, 13, 167, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('interpreter_certification', 51.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 52, 166.6);
// //............

// $pdf->SetFont('times', '', 10); // set font
// $html = "which is the same language specified <b>in Part 5., Item<br>
// Number 26.b. or Part 6., Item Number 1.b.</b>, and I have read<br>
// to this sponsor or household member in the identified language<br>
// every question and instruction on this contract and his or her<br>
// answer to every question. The sponsor or household member<br>
// informed me that he or she understands every instruction,<br>
// question, and answer on the contract, including the <b>Sponsor's</b><br>
// or <b>Household Member's Declaration and Certification,</b> and<br>
// has verified the accuracy of every answer.";
// $pdf->writeHTMLCell(100, 7, 13, 173.5, $html, '', 0, 0, true, 'L');

// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'I', 10); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b>Interpreter\'s Signature</b></div>';
// $pdf->writeHTMLCell(90, 6.6, 13, 212.5, $html, 0, 1, true, false, 'J', true);
// //..............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>7.a.</b>  &nbsp; &nbsp;Interpreter\'s Signature';
// $pdf->writeHTMLCell(90, 7, 13, 220, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(80, 7, 23, 225, "", 1, 1, false, true, 'C', true);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>7.b.</b>  &nbsp; &nbsp;Date of Signature   (mm/dd/yyyy)';
// $pdf->writeHTMLCell(90, 7, 13, 235, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('interpreter_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 73, 235);

// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 8. Contact Information, Declaration, and 
// Signature of the Person Preparing this Contract, 
// if Other Than the Sponsor or Household Member</b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 17, $html, 1, 1, true, false, 'L', true);
// //..........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>Provide the following information about the preparer.</div>';
// $pdf->writeHTMLCell(90, 7, 112, 34, $html, '', 0, 0, true, 'L');
// //.............

// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Preparer\'s Full Name</i></b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 42, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>1.a.&nbsp;&nbsp;&nbsp;</b>Preparer\'s Family Name (Last Name)</div>';
// $pdf->writeHTMLCell(91, 7, 112, 50, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 55);
// //...............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>1.b.  </b>    Preparer\'s Given Name (First Name)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 63, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_given_first_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 68);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Business or Organization Name (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 76, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 81);
// //...............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'I', 10); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b>Preparer\'s Mailing Address</b></div>';
// $pdf->writeHTMLCell(91, 7, 113, 90, $html, 0, 1, true, false, 'L', true);
// //.............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>3.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
// $pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_mailing_street_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 100);
// //...........

// $pdf->SetFont('times', '', 10); // set font
// if (showData('i_864a_preparer_address_apt_ste_flr') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('i_864a_preparer_address_apt_ste_flr') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('i_864a_preparer_address_apt_ste_flr') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $html = '<div><b>3.b. </b>&nbsp;  <input type="checkbox" name="Apt4" value="Apt" checked="' . $checked_apt . '"  />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste4" value="Ste" checked="' . $checked_ste . '" />Ste. <input type="checkbox" name="Flr4" value="Flr" checked="' . $checked_flr . '"x /> Flr.</div>';
// $pdf->writeHTMLCell(60, 0, 113, 110, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_mailing_apt_ste_flr', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 110);
// //...........

// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
// $pdf->writeHTMLCell(50, 5, 113, 119, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_mailing_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 119);
// //............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>3.d.</b> &nbsp; State</div>';
// $pdf->writeHTMLCell(50, 4, 113, 128, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("about_your_physical_state", 13, 7, $comboBoxOptions, array(), array(), 130.5, 128);
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>3.e.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
// $pdf->writeHTMLCell(30, 3, 145, 128, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_mailing_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171, 128);
// //..............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.f. </b> &nbsp;&nbsp;Province';
// $pdf->writeHTMLCell(90, 7, 113, 137, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part8_preparer_mailing_province', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 143, 137);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
// $pdf->writeHTMLCell(90, 7, 113, 146, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part8_preparer_mailing_postal_code', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 143, 146);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.h.</b> &nbsp;&nbsp;Country';
// $pdf->writeHTMLCell(90, 7, 113, 153, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('part8_preparer_mailing_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 158);
// //..............

// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $html = '<div><b><i>Preparer\'s Contact Information</i></b></div>';
// $pdf->writeHTMLCell(91, 6.5, 113, 168, $html, 0, 1, true, false, 'L', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>4.  </b> &nbsp;  Preparer\'s Daytime Telephone Number</div>';
// $pdf->writeHTMLCell(90, 7, 112, 176, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_daytime_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 182);
// //...............
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>5.  </b> &nbsp;   Preparer\'s Mobile Telephone Number (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 190, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_mobile_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 195);
// //...............

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>6.   </b>  &nbsp; Preparer\'s  Email Address (if any)</div>';
// $pdf->writeHTMLCell(90, 7, 112, 204, $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('part8_preparer_email_address', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 209);

/********************************
 ******** End Page No 6 **********
 *********************************/

/********************************
 ******** Start Page No 7 ********
 *********************************/
// add a page
$pdf->AddPage('P', 'LETTER');  // page number 7
//............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = "<div><b>Part 7. Interpreter's Contact Information, Certification, and Signature</b>
(continued)</div>";
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(191, 6.6, 13, 28, $html, 0, 1, true, false, 'L', true);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 10, 12, 37, "I certify, under penalty of perjury, that: that I am fluent in English and", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 10, 162, 37, ",", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 10, 164, 37, "and I have interpreted every", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(196, 10, 12, 43, "question on the contract and instructions and interpreted the sponsor's or household member's answers to the questions in that<br>
language and the sponsor or household member informed me that he or she understood every instruction, question, and answer on the<br>
contract.", '', 0, 0, true, 'L');
//............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Interpreter_fluent_english', 49.3, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 36);
//..........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(191, 6.6, 13, 59, $html, 0, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 10, 12, 67, "<b>6.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 10, 20, 67, "Interpreter's Signature", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 10, 152, 67, "Date of Signature (mm/dd/yyyy)", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(129, 6.6, 21.3, 72, "", 1, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Interpreter_sign_date', 51.3, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 72);
$pdf->SetFont('times', '', 12); // set font
$html = "<div><b>Part 8. Contact Information, Declaration, and Signature of the Person Preparing this Contract, if Other
Than the Sponsor or Household Member</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 84, $html, 1, 1, true, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 13, 99, "<b><i>Preparer's Full Name</i></b>", 0, 1, true, false, 'L', true);
//.............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 107, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 107, "Preparer's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114, 107, "Preparer's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 120, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 120, "Preparer's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Preparer_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 112);
$pdf->TextField('Preparer_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 112);
$pdf->TextField('Preparer_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21,125);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 136, $html, '', 1, true, 'L');
// //..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 144, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 144, "Preparer's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 144, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 144, "Preparer's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 157, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 157, "Preparer's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Preparer_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 149);
$pdf->TextField('Preparer_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 149);
$pdf->TextField('Preparer_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 162);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 173, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 180, 'I certify, under penalty of perjury, that I prepared this contract for the sponsor and household member at their request and with express<br>
consent and that all of the responses and information contained in and submitted with the contract are complete, true, and correct and<br>
reflects only information provided by the sponsor and household member. The sponsor and household member reviewed the<br>
responses and information and informed me that they understand the responses and information in or submitted with the contract.', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 198, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 198, "Preparer's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155,198, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 203, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Preparer_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 203);
//.....................
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 70, TCPDF_FONTS::unichr(225), 0, 0, false, 'L'); //.............
$pdf->writeHTMLCell(82, 7, 12, 201, TCPDF_FONTS::unichr(225), 0, 0, false, 'L'); //.............
/********************************
 ******** End Page No 7 **********
 *********************************/

/********************************
 ******** Start Page No 8 ********
 *********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 8. Additional Information</b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this contract, use the space below. If you need more space
than<br>what is provided, you may make copies of this page to complete and file with this contract or attach a separate sheet of paper.
Type or<br>print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item</b>
<b>Number</b> to<br>which your answer refers; and sign and date each sheet. ', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 83, 46, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 144, 46, 'Middle Name (if applicable)', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864a_additional_info_family_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('i_864a_additional_info_given_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 51);
$pdf->TextField('i_864a_additional_info_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any)', '', 1, false, 'L');
$pdf->setFont('Times', '', 11);
$pdf->writeHTMLCell(197, 5, 53, 60, '<b>A-</b>', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 50, 61.4, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864a_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 59.5, 60);


//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 67, 'Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 67, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864a_additional_info_3a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);
$pdf->TextField('i_864a_additional_info_3b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 72);
$pdf->TextField('i_864a_additional_info_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864a_additional_info_3d', 183, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864a_additional_info_3d')), 21, 81);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 89, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 95.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 101.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 32.5, 21, 81, '', "B", 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 115, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 115, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 115, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864a_additional_info_4a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 120);
$pdf->TextField('i_864a_additional_info_4b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 120);
$pdf->TextField('i_864a_additional_info_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 120);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864a_additional_info_4d', 183, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864a_additional_info_4d')), 21, 129);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 130, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 136.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 143, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 149.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 32.5, 21, 129, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 162, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 162, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 162, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864a_additional_info_5a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 167);
$pdf->TextField('i_864a_additional_info_5b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 167);
$pdf->TextField('i_864a_additional_info_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 167);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864a_additional_info_5d', 183, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864a_additional_info_5d')), 21, 176);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 177, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 183.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 190, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 196, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 32.5, 21, 176, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 208.5, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 208.5, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 208.5, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864a_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 213.3);
$pdf->TextField('i_864a_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 213);
$pdf->TextField('i_864a_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 213);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864a_additional_info_6d', 183, 33, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864a_additional_info_6d')), 21, 222);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 223, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 229.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 236.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 242.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 33.2, 21, 222, '', 'B', 1, false, 'L');



// 'attorney_state_bar_number':' $attorneyData->bar_number',
// 'attorney_or_according_representative':' $attorneyData->uscis_online_account_number',
$js = "
var fields = {

    'info_about_you_last_name':' " . showData('information_about_you_family_last_name') . "',
    'info_about_You_first_name':' " . showData('information_about_you_given_first_name') . "',
    'info_about_you_middle_name':' " . showData('information_about_you_middle_name') . "',
    'about_your_mailing_care_of_name':' " . showData('information_about_you_us_mailing_care_of_name') . "',
    'about_your_mailing_street':' " . showData('information_about_you_us_mailing_street_number') . "',
    'about_your_mailing_apt_ste_flr':' " . showData('information_about_you_us_mailing_apt_ste_flr_value') . "',
    'about_your_mailing_city_town':' " . showData('information_about_you_us_mailing_city_town') . "',
    'about_your_mailing_state':' " . showData('information_about_you_us_mailing_state') . "',
    'about_your_mailing_zipcode':' " . showData('information_about_you_us_mailing_zip_code') . "',
    'about_your_mailing_address_province':' " . showData('information_about_you_us_mailing_province') . "',
    'about_your_mailing_address_postal_code':' " . showData('information_about_you_us_mailing_postal_code') . "',
    'about_your_mailing_address_country':' " . showData('information_about_you_us_mailing_country') . "',
    'about_your_physical_street_number_name':' " . showData('information_about_you_home_street_number') . "',
    'about_your_physical_apt_ste_flr':' " . showData('information_about_you_home_apt_ste_flr_value') . "',
    'about_your_physical_city_town':' " . showData('information_about_you_home_city_town') . "',
    'about_your_physical_state':' " . showData('information_about_you_home_state') . "',
    'about_your_physical_zipcode':' " . showData('information_about_you_home_zip_code') . "',
    'about_your_physical_province':' " . showData('information_about_you_home_province') . "',
    'about_your_physical_postal_code':' " . showData('information_about_you_home_postal_code') . "',
    'about_your_physical_country':' " . showData('information_about_you_home_country') . "',
    'other_info_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . "',
    'other_info_city_or_town':' " . showData('other_information_about_you_city_of_birth') . "',
    'other_info_state_province':' " . showData('other_information_about_you_province_of_birth') . "',
    'other_info_Country':' " . showData('other_information_about_you_country_of_birth') . "',
    'other_info_us_social_security':' " . showData('other_information_about_you_social_security_number') . "',
    'other_info_uscis_online_account':' " . showData('other_information_about_you_uscis_online_account_number') . "',
//page 1 end........
    'Other_Dependent_Specify':' " . showData('i_864a_other_dependent_value') . "',
    'part3_1_value':' " . showData('i_864a_employed_value') . "',
    'part3_2_value':' " . showData('i_864a_employer_name1') . "',
    'part3_3_value':' " . showData('i_864a_employer_name2') . "',
    'part3_4_value':' " . showData('i_864a_selfemployed_value') . "',
    'part3_5a_value':' " . showData('i_864a_retired_company') . "',
    'part3_5b_value':' " . showData('i_864a_retired_date') . "',
    'part3_6_value':' " . showData('i_864a_unemployed_date') . "',
    'current_individual_annual_income':' " . showData('i_864a_individual_annual_income') . "',
    'most_recent_tax_year':' " . showData('i_864a_tax_year1') . "',
    'most_recent_tax_year2':' " . showData('i_864a_tax_year2') . "',
    'most_recent_tax_year3':' " . showData('i_864a_tax_year3') . "',
    'most_recent_total_income_year':' " . showData('i_864a_total_income1') . "',
    'most_recent_total_income_year2':' " . showData('i_864a_total_income2') . "',
    'most_recent_total_income_year3':' " . showData('i_864a_total_income3') . "',
    'part4_3a_cash_saving_checking':' " . showData('i_864a_balance_saving_accounts') . "',
    'part4_3b_enter_cash_value_realstate':' " . showData('i_864a_real_estate_holdings') . "',
    'part4_3c_enter_stock_bond_certificates':' " . showData('i_864a_cash_value_stocks') . "',
    'part4_3d_add_together_enter_number':' " . showData('i_864a_add_together_item_numbers') . "',
    'part5_the_sponsor':' " . showData('i_864a_the_sponsor_name') . "',
    'part5_indicate_number':' " . showData('i_864a_the_sponsor_indicate_number') . "',
//page 2 end........
    'part5_sponsor_family_last_name':' " . showData('i_864a_immigrant1_family_last_name') . "',
    'part5_sponsor_given_first_name':' " . showData('i_864a_immigrant1_given_first_name') . "',
    'part5_sponsor_middle_name':' " . showData('i_864a_immigrant1_middle_name') . "',
    'part5_sponsor_date_of_birth':' " . showData('i_864a_immigrant1_date_of_birth') . "',
    'part5_alien_reg_number':' " . showData('i_864a_immigrant1_alien_registration_number') . "',
    'part5_us_social_security_number':' " . showData('i_864a_immigrant1_social_security_number') . "',
    'part5_us_online_account_number':' " . showData('i_864a_immigrant1_online_account_number') . "',
    'part5_sponsor_family_last_name2':' " . showData('i_864a_immigrant2_family_last_name') . "',
    'part5_sponsor_given_first_name2':' " . showData('i_864a_immigrant2_given_first_name') . "',
    'part5_sponsor_middle_name2':' " . showData('i_864a_immigrant2_middle_name') . "',
    'part5_sponsor_date_of_birth2':' " . showData('i_864a_immigrant2_date_of_birth') . "',
    'part5_alien_reg_number2':' " . showData('i_864a_immigrant2_alien_registration_number') . "',
    'part5_us_social_security_number2':' " . showData('i_864a_immigrant2_social_security_number') . "',
    'part5_us_online_account_number2':' " . showData('i_864a_immigrant2_online_account_number') . "',
    'part5_sponsor_family_last_name3':' " . showData('i_864a_immigrant3_family_last_name') . "',
    'part5_sponsor_given_first_name3':' " . showData('i_864a_immigrant3_given_first_name') . "',
    'part5_sponsor_middle_name3':' " . showData('i_864a_immigrant3_middle_name') . "',
    'part5_sponsor_date_of_birth3':' " . showData('i_864a_immigrant3_date_of_birth') . "',
    'part5_alien_reg_number3':' " . showData('i_864a_immigrant3_alien_registration_number') . "',
    'part5_us_social_security_number3':' " . showData('i_864a_immigrant3_social_security_number') . "',
    'part5_us_online_account_number3':' " . showData('i_864a_immigrant3_online_account_number') . "',
    'part5_sponsor_family_last_name4':' " . showData('i_864a_immigrant4_family_last_name') . "',
    'part5_sponsor_given_first_name4':' " . showData('i_864a_immigrant4_given_first_name') . "',
    'part5_sponsor_middle_name4':' " . showData('i_864a_immigrant4_middle_name') . "',
    'part5_sponsor_date_of_birth4':' " . showData('i_864a_immigrant4_date_of_birth') . "',
    'part5_alien_reg_number4':' " . showData('i_864a_immigrant4_alien_registration_number') . "',
    'part5_us_social_security_number4':' " . showData('i_864a_immigrant4_social_security_number') . "',
    'part5_us_online_account_number4':' " . showData('i_864a_immigrant4_online_account_number') . "',
    'part5_sponsor_family_last_name5':' " . showData('i_864a_immigrant5_family_last_name') . "',
    'part5_sponsor_given_first_name5':' " . showData('i_864a_immigrant5_given_first_name') . "',
    'part5_sponsor_middle_name5':' " . showData('i_864a_immigrant5_middle_name') . "',
    'part5_sponsor_date_of_birth5':' " . showData('i_864a_immigrant5_date_of_birth') . "',
    'part5_alien_reg_number5':' " . showData('i_864a_immigrant5_alien_registration_number') . "',
    'part5_us_social_security_number5':' " . showData('i_864a_immigrant5_social_security_number') . "',
    'part5_us_online_account_number5':' " . showData('i_864a_immigrant5_online_account_number') . "',
//page 3 end.............
    'interpreter_question_and_instruction':' " . showData('i_864a_the_interpreter_named_in') . "',
    'preparer_contract_information':' " . showData('i_864a_the_preparer_named_in_status') . "',
    'sponsor_contact_info_daytime':' " . showData('i_864a_sponsor_daytime_tel') . "',
    'sponsor_contact_info_mobile':' " . showData('i_864a_sponsor_mobile') . "',
    'sponsor_contact_info_email':' " . showData('i_864a_sponsor_email') . "',
    'sponsor_signature_date':' " . showData('i_864a_sponsor_sign_date') . "',
    'part6_household_member':' " . showData('i_864a_the_household_member_print_name') . "',
    'part6_inconsideration_sponsor_promise':' " . showData('i_864a_the_consideration_of_sponsor') . "',
//page 4 end.............
    'your_household_member_daytime_telephone':' " . showData('i_864a_household_member_daytime_tel') . "',
    'your_household_member_mobile_telephone':' " . showData('i_864a_household_member_mobile') . "',
    'your_household_member_email_address':' " . showData('i_864a_household_member_email') . "',
    'your_household_member_printed_name':' " . showData('i_864a_household_member_printed_name') . "',
    'your_household_member_date_of_signature':' " . showData('i_864a_household_member_sign_date') . "',
    'part7_interpreter_family_last_name':' " . showData('i_864a_preparer_family_last_name') . "',
    'part7_interpreter_given_first_name':' " . showData('i_864a_preparer_given_first_name') . "',
    'part7_interpreter_business_org_name':' " . showData('i_864a_preparer_business_name') . "',
//page 5 end............
    'part7_interpreter_mailing_street_number':' " . showData('i_864a_interpreter_address_street_number') . "',
    'part7_interpreter_mailing_apt_ste_flr':' " . showData('i_864a_interpreter_address_apt_ste_flr_value') . "',
    'part7_interpreter_mailing_city_town':' " . showData('i_864a_interpreter_address_city_town') . "',
    'part7_interpreter_mailing_state':' " . showData('i_864a_interpreter_address_state') . "',
    'part7_interpreter_mailing_zipcode':' " . showData('i_864a_interpreter_address_zip_code') . "',
    'part7_interpreter_mailing_province':' " . showData('i_864a_interpreter_address_province') . "',
    'part7_interpreter_mailing_postal_code':' " . showData('i_864a_interpreter_address_postal_code') . "',
    'part7_interpreter_mailing_country':' " . showData('i_864a_interpreter_address_country') . "',
    'part7_interpreter_daytime_telephone':' " . showData('i_864a_interpreter_daytime_tel') . "',
    'part7_interpreter_mobile_telephone':' " . showData('i_864a_interpreter_mobile') . "',
    'part7_interpreter_email_address':' " . showData('i_864a_interpreter_email') . "',
    'interpreter_certification':' " . showData('i_864a_interpreter_fluent_in_english') . "',
    'interpreter_signature_date':' " . showData('i_864a_interpreter_sign_date') . "',
    'part8_preparer_family_last_name':' " . showData('i_864a_preparer_family_last_name') . "',
    'part8_preparer_given_first_name':' " . showData('i_864a_preparer_given_first_name') . "',
    'part8_preparer_business_org_name':' " . showData('i_864a_preparer_business_name') . "',
    'part8_preparer_mailing_street_number':' " . showData('i_864a_preparer_address_street_number') . "',
    'part8_preparer_mailing_apt_ste_flr':' " . showData('i_864a_preparer_address_apt_ste_flr_value') . "',
    'part8_preparer_mailing_city_town':' " . showData('i_864a_preparer_address_city_town') . "',
    'part8_preparer_mailing_state':' " . showData('i_864a_preparer_address_state') . "',
    'part8_preparer_mailing_zipcode':' " . showData('i_864a_preparer_address_zip_code') . "',
    'part8_preparer_mailing_province':' " . showData('i_864a_preparer_address_province') . "',
    'part8_preparer_mailing_postal_code':' " . showData('i_864a_preparer_address_postal_code') . "',
    'part8_preparer_mailing_country':' " . showData('i_864a_preparer_address_country') . "',
    'part8_preparer_daytime_telephone':' " . showData('i_864a_preparer_daytime_tel') . "',
    'part8_preparer_mobile_telephone':' " . showData('i_864a_preparer_mobile') . "',
    'part8_preparer_email_address':' " . showData('i_864a_preparer_email') . "',
//page 6 end...........    
    'Interpreter_fluent_english':' " . showData('') . "',
    'Interpreter_sign_date':' " . showData('') . "',
    'Preparer_family_name':' " . showData('i_864a_preparer_family_last_name') . " ',
	'Preparer_given_name':' " . showData('i_864a_preparer_family_given_first_name') . " ',
	'Preparer_business_name':' " . showData('i_864a_preparer_business_name') . " ',
	'Preparer_daytime':' " . showData('i_864a_preparer_daytime_tel') . " ',
	'Preparer_mobile':' " . showData('i_864a_preparer_mobile') . " ',
	'Preparer_email':' " . showData('i_864a_preparer_email') . " ',
	'Preparer_signature_date':' " . showData('i_864a_preparer_sign_date') . " ',
//page 7 end.......
	'i_864a_additional_info_family_name':' " . showData('i_864a_additional_info_last_name') . " ',
	'i_864a_additional_info_given_name':' " . showData('i_864a_additional_info_first_name') . " ',
	'i_864a_additional_info_middle_name':' " . showData('i_864a_additional_info_middle_name') . " ',
	'i_864a_additional_info_a_number':' " . showData('i_864a_additional_info_a_number') . " ',
	'i_864a_additional_info_3a':' " . showData('i_864a_additional_info_3a_page_no') . " ',
	'i_864a_additional_info_3b':' " . showData('i_864a_additional_info_3b_part_no') . " ',
	'i_864a_additional_info_3c':' " . showData('i_864a_additional_info_3c_item_no') . " ',
	'i_864a_additional_info_4a':' " . showData('i_864a_additional_info_4a_page_no') . " ',
	'i_864a_additional_info_4b':' " . showData('i_864a_additional_info_4b_part_no') . " ',
	'i_864a_additional_info_4c':' " . showData('i_864a_additional_info_4c_item_no') . " ',
	'i_864a_additional_info_5a':' " . showData('i_864a_additional_info_5a_page_no') . " ',
	'i_864a_additional_info_5b':' " . showData('i_864a_additional_info_5b_part_no') . " ',
	'i_864a_additional_info_5c':' " . showData('i_864a_additional_info_5c_item_no') . " ',
	'i_864a_additional_info_6a':' " . showData('i_864a_additional_info_6a_page_no') . " ',
	'i_864a_additional_info_6b':' " . showData('i_864a_additional_info_6b_part_no') . " ',
	'i_864a_additional_info_6c':' " . showData('i_864a_additional_info_6c_item_no') . " ',
};
for (var fieldName in fields) {
    if (!fields.hasOwnProperty(fieldName)) continue;
    var field = getField(fieldName);
    if (field && field.value === '') {
        field.value = fields[fieldName];
    }
}

";
$pdf->IncludeJS($js);

// $pdf->lastPage();
//Close and output PDF document
$pdf->Output('I-864a.pdf', 'I');
