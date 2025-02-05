<?php
require_once('formheader.php');
// require_once("localconfig.php");
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
$pdf->TextField('about_your_mailing_street2', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 213);
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
$pdf->TextField('about_your_mailing_apt_ste_flr2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 213);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 221, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_city_town2', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 226);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 143.7, 221.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("about_your_mailing_state2", 22, 7, $comboBoxOptions, array(), array(), 144.2, 226);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 167.2, 221.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_zipcode2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 226);
//..............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 234, 'Province', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province2', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 239);
//.............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,87, 234, 'Postal Code', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code2', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 239);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Country';
$pdf->writeHTMLCell(90, 7, 124, 234, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country2', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 239);

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
$pdf->TextField('p2_other_info_dob', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 41.6);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,70, 36, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_other_info_cob', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 78, 41.6);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if any)';
$pdf->writeHTMLCell(90, 7, 138, 36, $html, '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 146.5, 43, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_other_info_uscis_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 41.6);
//.........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,13, 48.5, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alien Registration Number (A-Number) (if any) ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 28, 54, '<b>A-</b>', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 21.5, 56, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_other_info_a_number', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 54);
//............. 
$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(90, 7, 94, 48.5, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->Image('images/right_angle.jpg', 102, 56, 3.3, 3.3);
$pdf->TextField('p2_other_info_uscis_online_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 54);
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
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
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
$html = '<div><input type="checkbox"  name="part2_2_status" value="Y" checked="' . $checked . '" /></div>';
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
$html = '<div><input type="checkbox"  name="part2_3_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = "I am <b>not</b> the intending immigrant. I am the sponsor's household member. I am related to the sponsor as his/her:" ;
$pdf->writeHTMLCell(190, 7, 27, 94, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', "", 14);
if (showData('i_864a_spouse_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div>
<input type="checkbox"  name="part2_3a_status" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3b_status" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3c_status" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3d_status" value="Y" checked="' . $checked . '" /><br>
<input type="checkbox"  name="part2_3e_status" value="Y" checked="' . $checked . '" /><br>
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
$pdf->TextField('p2_Other_Dependent_Specify', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 124.5);
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
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 153, '<b>1.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_1" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 152, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Employed as a/an';
$pdf->writeHTMLCell(83, 7, 27, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_1_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 152);
$pdf->TextField('p3_2_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 160);
$pdf->TextField('p3_3_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 168.4);
$pdf->TextField('p3_4_value', 100, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 177);
$pdf->TextField('p3_5_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 185);
$pdf->TextField('p3_6_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 193);
$pdf->TextField('p3_7_value', 35, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 201);
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
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 177, '<b>4.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_4" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 176, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Self employed as a/an';
$pdf->writeHTMLCell(83, 7, 27, 177, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 185, '<b>5.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_5" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 184, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Retired Since (mm/dd/yyyy)';
$pdf->writeHTMLCell(83, 7, 27, 185, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 193, '<b>6.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part3_6" value="Y" checked="' . $checked . '" /></div>';
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
if (showData('') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('') == "Y") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 26, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="p4_1_status" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="p4_1_status" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 25, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 12, 34, '<b>NOTE:</b> You <b>MUST</b> attach a photocopy or transcript of your Federal income tax return for only the most recent tax year.', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(195, 7, 12, 41, 'My total income (adjusted gross income on IRS Form 1040EZ) as reported on my Federal income tax returns for the most recent three
years was:', '', 0, 0, true, 'L');


//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,52, 51, 'Tax Year', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,77, 51, 'Total Income', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,12, 56, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most Recent', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,20, 63, '2nd Most Recent', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,20, 70, '3rd Most Recent', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,72, 57, '$', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,72, 64, '$', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,72, 71, '$', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p4_2_tax1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 50, 56.3);
$pdf->TextField('p4_2_tax2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 50, 63.2);
$pdf->TextField('p4_2_tax3', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 50, 70);
$pdf->TextField('p4_2_income1', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 56.3);
$pdf->TextField('p4_2_income2', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 63.2);
$pdf->TextField('p4_2_income3', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 70);
//.......
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 12, 78, '<b>My assets (complete only if necessary).</b>', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7,12, 85, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter the balance of all cash, savings, and checking accounts. ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7,12, 92, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter the net cash value of real-estate holdings. (Net value means assessed value minus mortgage<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;debt.) $  ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7,12, 103, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter the cash value of all stocks, bonds, certificates of deposit, and other assets not listed on<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Item Numbers 3. - 4.</b> ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7,12, 114, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add together <b>Item Numbers 3. - 5.</b> and enter the number here.', '', 0, 0, true, 'L');
//........
$pdf->writeHTMLCell(90, 7,161, 85, '$', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,161, 94, '$', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,161, 104, '$', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,161, 114, '$', '', 0, 0, true, 'L');
//.................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p4_my_assets_3', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 165, 85);
$pdf->TextField('p4_my_assets_4', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 165, 94);
$pdf->TextField('p4_my_assets_5', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 165, 104);
$pdf->TextField('p4_my_assets_6', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 165, 114);
//............
$pdf->SetFont('times', 'B', 12); // set font
$html = "<div><b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature</b></div>";;
$pdf->writeHTMLCell(191, 6, 13, 127, $html, 1, 1, true, false, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7,12, 135, '<b>NOTE:</b> Read the Penalties section of the Form I-864A Instructions before completing this part. ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7,12, 143, '<b>I, THE SPONSOR,</b>', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7,126, 143, ",in consideration of the household member's promise", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7,12, 149, "to support the following intending immigrants and to be jointly and severally liable for any obligations I incur under the affidavit of
support, promise to complete and file an affidavit of support on behalf of the following named intending immigrants.", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_sponsor_info', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42.5, 143);
$pdf->TextField('p5_sponsor_immigrant', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 179, 154);
// //.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intending Immigrant Number 1';
$pdf->writeHTMLCell(90, 7, 12,160,  $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 19,166,  'Family Name (Last Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 93,166,  'Given Name (First Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 154,166,  'Middle Name (if applicable)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_1_last_name', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 171.2);
$pdf->TextField('p5_1_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 171.2);
$pdf->TextField('p5_1_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 171.2);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 19,178,  'Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 69,178,  'Alien Registration Number (A-Number, if any)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 140,178,  'USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 141, 185.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 70, 185.5, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_1_dob_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 184);
$pdf->TextField('p5_1_a_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 184);
$pdf->TextField('p5_1_uscis_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 184);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intending Immigrant Number 2';
$pdf->writeHTMLCell(90, 7, 12,192,  $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 19,198,  'Family Name (Last Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 93,198,  'Given Name (First Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 154,198,  'Middle Name (if applicable)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_2_last_name', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 203.2);
$pdf->TextField('p5_2_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 203.2);
$pdf->TextField('p5_2_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 203.2);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 19,210,  'Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 69,210,  'Alien Registration Number (A-Number, if any)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 140,210,  'USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 141,217.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 70,217.5, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_2_dob_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 216);
$pdf->TextField('p5_2_a_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 216);
$pdf->TextField('p5_2_uscis_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 216);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intending Immigrant Number 3';
$pdf->writeHTMLCell(90, 7, 12,224,  $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 19,230,  'Family Name (Last Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 93,230,  'Given Name (First Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 154,230,  'Middle Name (if applicable)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3_last_name', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 235.2);
$pdf->TextField('p5_3_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 235.2);
$pdf->TextField('p5_3_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 235.2);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 19,242,  'Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 69,242,  'Alien Registration Number (A-Number, if any)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 140,242,  'USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 141,249.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 70,249.5, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3_dob_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 248);
$pdf->TextField('p5_3_a_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 248);
$pdf->TextField('p5_3_uscis_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 248);

// ********************************
//  ******** End Page No 3 **********
//  *********************************/

// ********************************
//  ******** Start Page No 4 ********
//  *********************************/
$pdf->AddPage('P', 'LETTER');  // page number 4
//.............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 5. Sponsor\'s Promise, Statement, Contact 
Information, Declaration, Certification, and 
Signature</b> (continued)</div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intending Immigrant Number 4';
$pdf->writeHTMLCell(90, 7, 12,29,  $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 19,35,  'Family Name (Last Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 93,35,  'Given Name (First Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 154,35,  'Middle Name (if applicable)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4_last_name', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 40.2);
$pdf->TextField('p5_4_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 40.2);
$pdf->TextField('p5_4_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155,40.2);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 19,47,  'Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 69,47,  'Alien Registration Number (A-Number, if any)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 140,47,  'USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 141,54.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 70,54.5, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4_dob_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 53);
$pdf->TextField('p5_4_a_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 53);
$pdf->TextField('p5_4_uscis_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 53);
//............
$pdf->SetFont('times', '', 12); // set font
$html = "<div><b><i>Sponsor's Statement</i></b> </div>";
$pdf->writeHTMLCell(191, 6, 13, 64, $html, 0, 1, true, false, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(191, 6, 12, 71, "<b>NOTE:</b> Select the box for either <b>Item Number 5.a</b>. or <b>5.b</b>. If applicable, select the box for <b>Item Number 6</b>", 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 77, '<b>5.a.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part5_5a" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 76, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I can read and understand English, I and have read and understand every question and instruction on this contract and my<br>
answer to every question.';
$pdf->writeHTMLCell(191, 7, 27, 77, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 88, '<b>5.b.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part5_5b" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 87, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'The interpreter named in <b>Part 7</b>. read to me every question and instruction on this contract and my answer to every ';
$pdf->writeHTMLCell(191, 7, 27, 88, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 27, 94, "question in", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 115, 94, ", a language in which I am fluent, and I understood everything. ", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_5b_value', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 94);
//...........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 101, '<b>6.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part5_6" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 100, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'At my request, the preparer named in <b>Part 8.</b>,';
$pdf->writeHTMLCell(191, 7, 27, 101, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 165, 101, ", prepared this contract for ", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 27, 107.8, "me based only upon information I provided or authorized.", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_6_value', 71.7, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 93.5, 102.3);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Sponsor\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 117, $html, '', 1, true, 'L');
// //..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 124, '<b>7.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 124, "Sponsor's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 124, '<b>8.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 124, "Sponsor's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 135, '<b>9.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 135, "Sponsor's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_7_value', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 129);
$pdf->TextField('p5_8_value', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 129);
$pdf->TextField('p5_9_value', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 140);

//........................
$pdf->setFont('Times', '', 12);
$html = '<div><b><i>Sponsor\'s  Declaration and Certification</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 151, $html, '', 1, true, 'L');
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(191, 6.5, 13, 159, "Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that U.S.
Citizenship and Immigration Services (USCIS) or the U.S. Department of State (DOS) may require that I submit original documents
to USCIS or DOS at a later date. Furthermore, I authorize the release of any information from any and all of my records that USCIS
or DOS may need to determine my eligibility for the immigration benefit that I seek.", '', 1,false, 'L');

$pdf->writeHTMLCell(191, 6.5, 13, 178, "I furthermore authorize release of information contained in this contract, in supporting documents, and in my USCIS or DOS records,
to other entities and persons where necessary for the administration and enforcement of U.S. immigration law.", '', 1,false, 'L');

$pdf->writeHTMLCell(191, 6.5, 13, 188.4, "I certify, under penalty of perjury, that all of the information in my contract and any document submitted with it were provided or
authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my contract and that all of
this information is complete, true, and correct.", '', 1,false, 'L');
//.........


$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Sponsor\'s Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6, 13, 206, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 213, '<b>10.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 213, "Sponsor's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155,213, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21,219, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_10_value', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156,219);
//.....................
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 217, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12,226, "<b>NOTE TO ALL SPONSORS:</b> If you do not completely fill out this contract or fail to submit required documents listed in the
Instructions, USCIS may deny your contract. ", '', 1, false, 'L');
//  ********************************
//  ******** End Page No 4 **********
//  *********************************/

// ********************************
// ******** Start Page No 5 ********
// *********************************/
$pdf->AddPage('P', 'LETTER');

//.............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 6. Your (the Household Member\'s) Promise, 
Statement, Contact Information, Declaration, 
Certification, and Signature</b> (continued)</div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(191, 7, 13,30,"<b>NOTE: </b>Read the Penalties section of the Form I-864A Instructions before completing this part.", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 13,38,"<b>I, THE HOUSEHOLD MEMBER</b>", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 127,38,", in consideration of the sponsor's promise to complete", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 13,43,"and file an affidavit of support on behalf of the above named intending immigrants.", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 165,43,"(Print number of intending", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 13,47.7,"immigrants noted in ", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 42,52,"<b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature.)</b>", 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_household_value1', 60, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),67, 39);
$pdf->TextField('p6_household_value2', 32.7, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132.5, 46);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>A. </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 60, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Promise to provide any and all financial support necessary to assist the sponsor in maintaining the sponsored immigrants at or<br>
above the minimum income provided for in the Immigration and Naturalization Act (INA) section 213A(a)(1)(A) (not less than<br>
125 percent of the Federal Poverty Guidelines) during the period in which the affidavit of support is enforceable;';
$pdf->writeHTMLCell(191, 7, 20, 60, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>B. </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 75, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Agree to be jointly and severally liable for payment of any and all obligations owed by the sponsor under the affidavit of support<br>
to the sponsored immigrants, to any agency of the Federal Government, to any agency of a state or local government, or to any<br>
other private entity that provides means-tested public benefits;';
$pdf->writeHTMLCell(191, 7, 20, 75, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>C. </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Certify under penalty under the laws of the United States that the Federal income tax returns submitted in support of the contract<br>
are true copies or unaltered tax transcripts filed with the Internal Revenue Service;';
$pdf->writeHTMLCell(191, 7, 20, 90, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>D. </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 100, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9.6); // set font
$html = "<b>Consideration where the household member is also the sponsored immigrant:</b> I understand that if I am the sponsored immigrant<br>
and a member of the sponsor's household that this promise relates only to my promise to be jointly and severally liable for any obligation<br>
owed by the sponsor under the affidavit of support to any of my dependents, to any agency of the Federal Government, to any agency of<br>
a state or local government, or to any other private entity that provides means-tested public benefits and to provide any and all financial<br>
support necessary to assist the sponsor in maintaining any of my dependents at or above the minimum income provided for in INA<br>
section 213A(a)(1)(A) (not less than 125 percent of the Federal Poverty Guideline) during the period which the affidavit of support is
enforceable.";
$pdf->writeHTMLCell(191, 7, 20, 100, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>E. </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 131, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I understand that, if I am related to the sponsored immigrant or the sponsor by marriage, the termination of the marriage (by
divorce, dissolution, annulment, or other legal process) will not relieve me of my obligations under this Form I-864A.';
$pdf->writeHTMLCell(191, 7, 20, 131, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>F. </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 142, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I authorize the Social Security Administration to release information about me in its records to the Department of State and U.S.
Citizenship and Immigration Services (USCIS).';
$pdf->writeHTMLCell(191, 7, 20, 142, $html, '', 0, 0, true, 'L');



//...............
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b><i>Your (the Household Member\'s) Statement</i></b></div>';
$pdf->writeHTMLCell(191, 7, 13, 156, $html, 0, 1, true, false, 'L', true);
// ...........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(191, 6, 12, 165, "<b>NOTE:</b> Select the box for either <b>Item Number 1.a</b>. or <b>1.b</b>. If applicable, select the box for <b>Item Number 2</b>", 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 171, '<b>1.a.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part6_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 170, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I can read and understand English, and I have read and understand every question and instruction on this contract and my<br>
answer to every question.';
$pdf->writeHTMLCell(191, 7, 27, 171, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 182, '<b>1.b.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part6_1b" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'The interpreter named in <b>Part 7</b>. read to me every question and instruction on this contract and my answer to every question in ';
$pdf->writeHTMLCell(191, 7, 27, 182, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 98, 188, ", a language in which I am fluent, and I understood everything. ", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_1b_value', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 28, 188);
//...........
$pdf->SetFont('times', '', 10);
if (showData('') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(50, 7, 12, 196, '<b>2.</b>', 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox"  name="part6_2" value="Y" checked="' . $checked . '" /></div>';
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(50, 7, 20, 195, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'At my request, the preparer named in <b>Part 8.</b>,';
$pdf->writeHTMLCell(191, 7, 27, 196, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 165, 196, ", prepared this contract  ", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(191, 7, 27, 202.8, "for me based only upon information I provided or authorized.", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_2_value', 71.7, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 93.5, 196.3);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Your (the Household Member\'s) Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 212, $html, '', 1, true, 'L');
// //..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 220, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 220, "Your (the Household Member's) Daytime Telephone Number", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 220, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 220, "Your (the Household Member's) Mobile Telephone<br>
Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 237, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 237, "Your (the Household Member's) Email Address (if any)", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_3_value', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 229);
$pdf->TextField('p6_4_value', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 229);
$pdf->TextField('p6_5_value', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 242);



//  ********************************
//  ******** End Page No 5 **********
//  *********************************/

//  ********************************
//  ******** Start Page No 6 ********
//  *********************************/
$pdf->AddPage('P', 'LETTER');  // page number 7
//............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = "<div><b>Part 6. Your (the Household Member's) Promise, Statement, Contact Information, Declaration,
Certification, and Signature</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b>Your (the Household Member\'s) Declaration and Certification</b></div>';
$pdf->writeHTMLCell(191, 6.6, 13, 33, $html, 0, 1, true, false, 'L', true);
//........................
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(191, 6.5, 13, 41, "Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS or
DOS may require that I submit original documents to USCIS or DOS at a later date. Furthermore, I authorize the release of any
information from any and all of my records that USCIS or DOS may need to determine my eligibility for the immigration benefit that
I seek. ", '', 1,false, 'L');

$pdf->writeHTMLCell(191, 6.5, 13, 59, "I furthermore authorize release of information contained in this contract, in supporting documents, and in my USCIS or DOS records,
to other entities and persons where necessary for the administration and enforcement of U.S. immigration law.", '', 1,false, 'L');

$pdf->writeHTMLCell(191, 6.5, 13, 69.4, "I certify, under penalty of perjury, that all of the information in my contract and any document submitted with it were provided or
authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my contract and that all of
this information is complete, true, and correct. ", '', 1,false, 'L');

//..........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b><i>Your (the Household Member\'s) Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.6, 13, 83.4, $html, 0, 1, true, false, 'L', true);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(191, 6.6, 13, 91.4, "<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your (the Household Member's) Printed Name", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('P6_6_value', 130, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 96);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 10, 12, 103, "<b>7.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 10, 20, 103, "Interpreter's Signature", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 10, 152, 103, "Date of Signature (mm/dd/yyyy)", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(129, 6.6, 21.3, 108, "", 1, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P6_7_value', 51.3, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 108);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 10, 12, 116, "<b>NOTE TO ALL HOUSEHOLD MEMBERS:</b> If you do not completely fill out this contract or fail to submit required documents
listed in the Instructions, USCIS may deny your contract.
", '', 0, 0, true, 'L');
// .........
$pdf->SetFont('times', '', 12); // set font
$html = "<div><b>Part 7. Interpreter's Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 130, $html, 1, 1, true, false, 'L', true);
$pdf->writeHTMLCell(191, 7, 13, 141, "<b><i>Interpreter's Full Name</i></b>", 0, 1, true, false, 'L', true);
//.............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 150, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 150, "Interpreter's Family Name (Last Name) ", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 114, 150, "Interpreter's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 163, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 163, "Interpreter's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 155);
$pdf->TextField('Interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 155);
$pdf->TextField('Interpreter_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21,167);
// //...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 178, $html, '', 1, true, 'L');
// //..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 187, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 187, "Interpreter's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 187, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 187, "Interpreter's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 200, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 200, "Interpreter's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('Interpreter_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 192);
$pdf->TextField('Interpreter_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 192);
$pdf->TextField('Interpreter_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 205);
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 107, TCPDF_FONTS::unichr(225), 0, 0, false, 'L'); //.............

//********************************
// ******** End Page No 6 **********
// *********************************/

//********************************
// ******** End Page No 7 **********
// *********************************/
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
//********************************
 //******** End Page No 7 **********
 //*********************************/

//********************************
 //******** Start Page No 8 ********
 //*********************************/
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
   'attorney_state_bar_number':' $attorneyData->bar_number',
   'attorney_or_according_representative':' $attorneyData->uscis_online_account_number',
    'info_about_you_last_name':' " . showData('') . "',
    'info_about_You_first_name':' " . showData('') . "',
    'info_about_you_middle_name':' " . showData('') . "',
    'about_your_mailing_care_of_name':' " . showData('') . "',
    'about_your_mailing_street':' " . showData('') . "',
    'about_your_mailing_street2':' " . showData('') . "',
    'about_your_mailing_apt_ste_flr':' " . showData('') . "',
    'about_your_mailing_apt_ste_flr2':' " . showData('') . "',
    'about_your_mailing_city_town':' " . showData('') . "',
    'about_your_mailing_city_town2':' " . showData('') . "',
    'about_your_mailing_state':' " . showData('') . "',
    'about_your_mailing_state2':' " . showData('') . "',
    'about_your_mailing_zipcode':' " . showData('') . "',
    'about_your_mailing_zipcode2':' " . showData('') . "',
    'about_your_mailing_address_province':' " . showData('') . "',
    'about_your_mailing_address_province2':' " . showData('') . "',
    'about_your_mailing_address_postal_code':' " . showData('') . "',
    'about_your_mailing_address_postal_code2':' " . showData('') . "',
    'about_your_mailing_address_country':' " . showData('') . "',
    'about_your_mailing_address_country2':' " . showData('') . "',
//page 1 end........
    'p2_other_info_dob':' " . showData('') . "',
    'p2_other_info_cob':' " . showData('') . "',
    'p2_other_info_uscis_number':' " . showData('') . "',
    'p2_other_info_a_number':' " . showData('') . "',
    'p2_other_info_uscis_online_number':' " . showData('') . "',
    'p2_Other_Dependent_Specify':' " . showData('') . "',
    'p3_1_value':' " . showData('') . "',
    'p3_2_value':' " . showData('') . "',
    'p3_3_value':' " . showData('') . "',
    'p3_4_value':' " . showData('') . "',
    'p3_5_value':' " . showData('') . "',
    'p3_6_value':' " . showData('') . "',
    'p3_7_value':' " . showData('') . "',
//page 2 end........
    'p4_2_tax1':' " . showData('') . "',
    'p4_2_tax2':' " . showData('') . "',
    'p4_2_tax3':' " . showData('') . "',
    'p4_2_income1':' " . showData('') . "',
    'p4_2_income2':' " . showData('') . "',
    'p4_2_income3':' " . showData('') . "',
    'p4_my_assets_3':' " . showData('') . "',
    'p4_my_assets_4':' " . showData('') . "',
    'p4_my_assets_5':' " . showData('') . "',
    'p4_my_assets_6':' " . showData('') . "',
    'p5_sponsor_info':' " . showData('') . "',
    'p5_sponsor_immigrant':' " . showData('') . "',

    'p5_1_last_name':' " . showData('') . "',
    'p5_1_first_name':' " . showData('') . "',
    'p5_1_middle_name':' " . showData('') . "',
    'p5_1_dob_name':' " . showData('') . "',
    'p5_1_a_number':' " . showData('') . "',
    'p5_1_uscis_number':' " . showData('') . "',

    'p5_2_last_name':' " . showData('') . "',
    'p5_2_first_name':' " . showData('') . "',
    'p5_2_middle_name':' " . showData('') . "',
    'p5_2_dob_name':' " . showData('') . "',
    'p5_2_a_number':' " . showData('') . "',
    'p5_2_uscis_number':' " . showData('') . "',

    'p5_3_last_name':' " . showData('') . "',
    'p5_3_first_name':' " . showData('') . "',
    'p5_3_middle_name':' " . showData('') . "',
    'p5_3_dob_name':' " . showData('') . "',
    'p5_3_a_number':' " . showData('') . "',
    'p5_3_uscis_number':' " . showData('') . "',
//page 3 end........
    'p5_4_last_name':' " . showData('') . "',
    'p5_4_first_name':' " . showData('') . "',
    'p5_4_middle_name':' " . showData('') . "',
    'p5_4_dob_name':' " . showData('') . "',
    'p5_4_a_number':' " . showData('') . "',
    'p5_4_uscis_number':' " . showData('') . "',

    'p5_5b_value':' " . showData('') . "',
    'p5_6_value':' " . showData('') . "',
    'p5_7_value':' " . showData('') . "',
    'p5_8_value':' " . showData('') . "',
    'p5_9_value':' " . showData('') . "',
    'p5_10_value':' " . showData('') . "',
//page 4 end.............

    'p6_household_value1':' " . showData('') . "',
    'p6_household_value2':' " . showData('') . "',
    'p6_1b_value':' " . showData('') . "',
    'p6_2_value':' " . showData('') . "',
    'p6_3_value':' " . showData('') . "',
    'p6_4_value':' " . showData('') . "',
    'p6_5_value':' " . showData('') . "',

//page 5 end............
    'P6_6_value':' " . showData('') . "',
    'P6_7_value':' " . showData('') . "',
    'Interpreter_family_name':' " . showData('i_864a_preparer_family_last_name') . " ',
	'Interpreter_given_name':' " . showData('i_864a_preparer_family_given_first_name') . " ',
	'Interpreter_business_name':' " . showData('i_864a_preparer_business_name') . " ',
	'Interpreter_daytime':' " . showData('i_864a_preparer_daytime_tel') . " ',
	'Interpreter_mobile':' " . showData('i_864a_preparer_mobile') . " ',
	'Interpreter_email':' " . showData('i_864a_preparer_email') . " ',
//page 6 end...........    
    'Interpreter_fluent_english':' " . showData('') . " ',
    'Interpreter_sign_date':' " . showData('i_864a_preparer_sign_date') . " ',

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
