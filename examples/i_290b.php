<?php

require_once('formheader.php');   //database connection file 
require_once('tcpdf_include.php');

class MyPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        $this->SetY(13);
        if ($this->page > 1) {
            $this->SetLineWidth(2); // set border width
            $this->SetFillColor(255, 255, 255); // set filling color
            $this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');

            $this->SetLineWidth(0.1); // set border width
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

        $this->Cell(40, 6, "Form I-290B    Edition    04/01/24 ", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/i290b/I-290B-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 268, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);


        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 159, 267.5, true);
    }
}
$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-290B');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(13.7, 15.3, 12.8, true);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
$pdf->MultiCell(105, 7, "Notice of Appeal or Motion", 0, 'C', 0, 1, 55, 9, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-290B", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0095\nExpires 02/28/2026", 0, 'C', 0, 1, 169, 18.5, true);

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


//...table start 
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 10.5);
$pdf->writeHTMLCell(190, 45, 13, 33, '',  1,  0, false, false, 'C', true);
$pdf->writeHTMLCell(12, 44.5, 13.2, 33.3, '',  'R',  1, true, true, 'L', true);
$html = '<div>For USCIS Use Only</div>';
$pdf->writeHTMLCell(12, 30, 12.5, 46, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('times', 'B', 10);

$pdf->writeHTMLCell(1, 44, 80, 33.5, '',  'R',  1, false, true, 'L', false);  //vertical line (|)
$pdf->writeHTMLCell(1, 44, 52, 33.5, '',  'R',  1, false, true, 'L', false);   //vertical line (|)
$pdf->writeHTMLCell(1, 44, 140, 33.5, '',  'R',  1, false, true, 'L', false);   //vertical line (|)

$pdf->writeHTMLCell(55, 1, 25.5, 38, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 45.5, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 52.7, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 60, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 67, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)

$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(55, 5, 25, 33, 'Returned', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 33, 'Reloc Sent', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 44, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 44, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 52, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 52, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 59, 'Resubmitted ', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 59, 'Reloc Rec\'d', 0,  1, false, true, 'L', false);


$pdf->writeHTMLCell(55, 5, 25, 66, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 66, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 73, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 73, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->SetFont('times', 'B', 9);
$pdf->writeHTMLCell(55, 5, 105, 33, 'Receipt', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 165, 33, 'Remarks', 0,  1, false, true, 'L', false);

//table end 


// table 2 start 
$pdf->writeHTMLCell(190, 18, 13, 80, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 10.5);
$pdf->writeHTMLCell(1, 18, 56, 80, '',  'R',  1, false, true, 'L', false);
$pdf->writeHTMLCell(43.3, 17.1, 13.2, 80.5, '', 0, 1, true, true, 'C', false);
$html = "<div><b>To be completed by an attorney or accredited representative </b>(if any).</div>";
$pdf->writeHTMLCell(43.3, 3, 10, 82.3, $html, 0, 1, false, false, 'C', false);
//..........
$pdf->SetFont('times', 'B', 14);
if (showData('i_290b_g_28_box') == "Y") $g_28 = "checked";
else $g_28 = "";
$html = '<div> <input type="checkbox" name="g-28" value="1" checked="' . $g_28 . '" /> </div>';
$pdf->writeHTMLCell(66, 18, 27, 80.5, $html, 'R', 0, false, false, 'C', true);
$pdf->SetFont('times', 'B', 10.5);
$html = '<div>Select this box if<br>Form G-28 is<br>attached.</div>';
$pdf->writeHTMLCell(40, 5, 64, 81, $html, '', 0, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 18, 93, 80, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 90);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 138, 80, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 90);
//....table 2 end ...........

$pdf->SetFont('times', 'B', 10);
$html = '<div>Please visit <a><b>www.uscis.gov/i-290b/jurisdiction</b></a> for information on the immigration benefit types that are eligible for an appeal
or motion using this form. </div>';
$pdf->writeHTMLCell(190, 7, 12, 98, $html, 0, 0, false, true, 'L', true);
//............
$pdf->Image('images/right_angle.jpg', 13, 109, 3.3, 3.3);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 18, 107.5, true);


//..........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About the Applicant or
Petitioner</b></div>';
$pdf->writeHTMLCell(91, 12, 13, 115, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div>If you are an individual filing this appeal or motion, complete
<b>Item Number 1.</b> If you are a business or organization,
complete <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 12, 12, 127, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 139, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_family_lastname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 141);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 148, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_given_firstname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 150);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div>';
$pdf->writeHTMLCell(35, 7, 12, 159, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_middlename', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 159);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Business or Organization (if applicable) </div>';
$pdf->writeHTMLCell(90, 7, 12, 167, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_business_organization', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 173);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 180, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_info_align_reg_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 58, 185.5);
$pdf->SetFont('times', '', 12);
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell(10, 7, 51, 185, $html, 0, 1, false, true, 'J', true);
//.....
$pdf->Image('images/right_angle.jpg', 47, 187, 3.3, 3.3);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 192, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_info_usis_online_account_number', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 198);
//....page 1 left side end .................................................................
$pdf->SetFillColor(220, 220, 220);
//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Mailing Address </b>(or Military APO/FPO Address,<br>if applicable) </div>';
$pdf->writeHTMLCell(91, 5, 112, 115, $html, 0, 1, true, false, 'L', true);

//......
$pdf->SetFont('times', '', 8.5);
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(USPS ZIP Code Lookup)</i></b></a></div>';
$pdf->writeHTMLCell(80, 5, 118, 121, $html, 0, 1, true, false, 'R', true);
//.......
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 111.3, 127, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_in_care_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 132);
//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b. </b>&nbsp;&nbsp;&nbsp;Street Number&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name</div>';
$pdf->writeHTMLCell(40, 12, 111.3, 138.6, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_street', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 140.6);

//...........
$pdf->SetFont('times', '', 10); // set font
if (showData('petitioner_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('petitioner_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('petitioner_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";

$html = '<div><b>5.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="' . $checked_ste . '" />Ste.&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Flr" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 111.3, 149.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_apt_ste_flr', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 164, 149.1);

//......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>5.d. </b>&nbsp;&nbsp;&nbsp;City or Town </div>';
$pdf->writeHTMLCell(50, 5, 111.3, 158, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_city_town', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 157.8);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>5.e. </b>&nbsp;&nbsp;&nbsp;State</div>';

$pdf->writeHTMLCell(50, 0, 111.3, 167, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="information_about_applicant_mail_state" size="0.75">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129, 166, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>5.f. </b>&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 143, 167, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 167, 166.5);
//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.g. </b>&nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 111.3, 176, $html, '', 0, 0, true, 'L');
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_province', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 175.4);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.h. </b>&nbsp;&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 111.3, 184, $html, '', 0, 0, true, 'L');
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_postal_code', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 184);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.i. </b>&nbsp;&nbsp;&nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 111.3, 190, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121.1, 195);
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 2. Information About the Appeal or Motion</b></div>';
$pdf->writeHTMLCell(91, 7, 112, 208, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('times', '', 10);
$html = '<div>Please indicate whether you are filing an appeal to the<br>
Administrative Appeals Office (AAO) or a motion. You are not<br>
allowed to file both an appeal and a motion on a single form. <b>If<br>
you select more than one box, your filing may be rejected.</b></div>';
$pdf->writeHTMLCell(100, 5, 111, 215.7, $html, 0, 0, false, true, 'L', true);
$html = '<div><b>NOTE: DO NOT use this form if you are filing an appeal<br>
relating to a Form I-130, Petition for Alien Relative, or a<br>
Form I-360, Self-Petition for a Widow(er) of a U.S. Citizen.<br>
You must file those appeals with the Board of Immigration<br>
Appeals using Form EOIR-29</b>.</div>';
$pdf->writeHTMLCell(100, 5, 111, 234, $html, 0, 0, false, true, 'L', true);

/********************************
 ******** End Page No 1 **********
 *********************************/

/********************************
 ******** Start Page No 2 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 2. Information About the Appeal or Motion  </b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_additional_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.a. </b><input type="checkbox" name="part2_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 28, $html, 0, 0, false, 'L');
$html = '<div>I am filing an <b>appeal</b> to the AAO. My brief and/or
additional evidence is attached. </div>';
$pdf->writeHTMLCell(80, 7, 24, 28, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_calendar_days_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.b. </b><input type="checkbox" name="part2_1b" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 38, $html, 0, 0, false, 'L');
$html = '<div>I am filing an <b>appeal</b> to the AAO. I will submit my
brief and or additional evidence to the AAO within
30 calendar days of filing the appeal. </div>';
$pdf->writeHTMLCell(80, 7, 24, 38, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_submitting_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.c. </b><input type="checkbox" name="part2_1c" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 52, $html, 0, 0, false, 'L');
$html = '<div>I am filing an <b>appeal</b> to the AAO. I will not b
submitting a brief and/or additional evidence.</div>';
$pdf->writeHTMLCell(80, 7, 24, 52, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_reopen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.d. </b><input type="checkbox" name="part2_1d" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 62, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reopen.</b> My brief and/or
additional evidence is attached.</div>';
$pdf->writeHTMLCell(80, 7, 24, 62, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_reconsider_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.e. </b><input type="checkbox" name="part2_1e" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 72, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reconsider.</b> My brief is
attached.</div>';
$pdf->writeHTMLCell(80, 7, 24, 72, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_reopen_and_reconsider_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.f. </b><input type="checkbox" name="part2_1f" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 82, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reopen</b> and a <b>motion to
reconsider.</b> My brief and/or additional evidence is
attached.</div>';
$pdf->writeHTMLCell(80, 7, 24, 82, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 95, $html, 0, 0, false, 'L');
$html = '<div>USCIS Form for the Application or Petition That is the
Subject of This Appeal or Motion (for example, Form
1-140, 1-360, 1-129, 1-485, 1-601)</div>';
$pdf->writeHTMLCell(80, 7, 20, 95, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_uscis_form', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 108);

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 117, $html, 0, 0, false, 'L');
$html = '<div>Receipt Number for the Application or Petition</div>';
$pdf->writeHTMLCell(80, 7, 20, 117, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('receipt_number_for_the_applicant', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 123);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 131, $html, 0, 0, false, 'L');
$html = '<div>Requested Nonimmigrant or Immigrant Classification (for
example, H-1B, R-1, O-1, EB-1, EB-2, if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 20, 131, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2_4_request_nominigrant_example', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 141);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 150, $html, 0, 0, false, 'L');
$html = '<div>Date of the Adverse Decision (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 149, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2_5_date_of_the_adverse_decision', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 155);
//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 162, $html, 0, 0, false, 'L');
$html = '<div>Office That Issued the Adverse Decision</div>';
$pdf->writeHTMLCell(80, 7, 20, 162, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->ComboBox('part2_office_that_issued_advarse_decision', 83, 7, array(

    'Administrative Appeals Office  (AAO)',
    'Humanitrian Affairs Branch  (RIH)',
    'Agana  (AGA)',
    'Albany  (ALB)',
    'Albuquerque  (ABQ)',
    'Anchorage  (ANC)',
    'Atlanta  (ATL)',
    'Baltimore  (BAL)',
    'Boise  (BOI)',
    'Boston  (BOS)',
    'Buffalo  (BUF)',
    'California Service Center  (WAC)',
    'Charleston  (CHL)',
    'Charlotte  (CLT)',
    'Charlotte Amalie  (CHA)',
    'Chicago  (CHI)',
    'Chula Vista  (CVC)',
    'Cincinnati  (CIN)',
    'Cleveland  (CLE) ',
    'Columbus  (CLM)',
    'Dallas  (DAL)',
    'Denver  (DEN)',
    'Des Moines  (DSM)',
    'Detroit  (DET)',
    'El Paso  (ELP)',
    'Fresno  (FRE)',
    'Fort Smith AR  (FSA)',
    'Greer Field  (GRR)',
    'Harlingen  (HLG)',
    'Hartford  (HAR)',
    'Helena  (HEL)',
    'Hialeah  (HIA)',
    'Honolulu  (HHW)',
    'Houston  (HOU)',
    'Humanitrian Affairs Branch  (HAB)',
    'Indianapolis  (INP)',
    'International Operation  (IO)',
    'Jacksonville  (JAC)',
    'Kansas City  (KAN)',
    'Kendall  (KND)',
    'Las Vegas  (LVG)',
    'Lawrance  (LAW)',
    'Long Island  (LNY)',
    'Los Angles  (LAC)',
    'Los Angles  (LOS)',
    'Los Angles  (SFV)',
    'Louisville  (LOU)',
    'Manchester  (MAN)',
    'Memphis  (MEM)',
    'Miami (MIA)',
    'Milwaukee  (MIL)',
    'Mount Laurel  (MTL)',
    'National Benefits Center  (NBC)',
    'Nebaraska Service Center  (LIN)',
    'New Jersey  (NEW)',
    'New Orleans  (NOL)',
    'New York City  (NYC)',
    'Norfolk  (NOR)',
    'Oakland park  (OKL)',
    'Oklahoma City   (OKC)',
    'Omaha  (OMA)',
    'Orlando  (ORL)',
    'Philadelphia  (PHI)',
    'Phoenix  (PHO)',
    'Pittsburgh  (PIT)',
    'Portland,ME   (POM)',
    'Portland  (POO)',
    'Providence  (PRO)',
    'Queens  (QNS)',
    'Raleigh-Durham  (RAL)',
    'Refugee International Humanitrian  (RIH)',
    'Refugee, Asylum, and International Operations  (RAIO)',
    'Reno  (REN)',
    'Sacramento  (SAC)',
    'Salt Lake City  (SLC)',
    'San Antonio  (SNA)',
    'San Bernardino  (SBD)',
    'San Diego  (SND)',
    'San Francisco  (SFR)',
    'San Jose  (SNJ)',
    'San Juan  (SAJ)',
    'Santa Ana  (SAA)',
    'Seattle Field  (SEA)',
    'Spokane  (SPO)',
    'St. Albans  (STA)',
    'St. Louis  (STL)',
    'St. Paul  (SPM)',
    'Tampa T (AM)',
    'Texas Service Center (SRC)',
    'Tucson TUC',
    'Vermont Service Center  (EAC)',
    'Washington  (WAS)',
    'West Palm Beach  (WPB)',
    'Yakima  (YAK)',
    'Other'

), array(), array(), 21, 167);


$pdf->setCellHeightRatio(1.2); // set cell height ratio
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 3. Basis for the Appeal or Motion </b></div>';
$pdf->writeHTMLCell(91, 6.5, 13, 179, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('times', '', 10);
$html = '<div>In <b>Part 7. Additional Information,</b> or on a separate sheet of<br>
paper, <b>you must provide a statement regarding the basis for<br>
the appeal or motion.</b> If you attach a separate sheet of paper,<br>
type or print your name and A-Number (if any) at the top of<br>
each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item<br>
Number</b> to which your answer refers; and sign and date each<br>
sheet.</div>';
$pdf->writeHTMLCell(100, 7, 12, 186.4, $html, 0, 0, false, 'L');
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>Appeal:</b> Provide a statement that specifically identifies<br>
an erroneous conclusion of law or fact in the decision<br>
being appealed. <b>You must provide this information<br>
with your Form I-290B even if you intend to submit a<br>
brief later.</b></b></div>';
$pdf->writeHTMLCell(91, 7, 12, 216.5, $html, 0, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>Motion to Reopen:</b> A motion to reopen must state new facts
and be supported by documentary evidence demonstrating
eligibility for the requested immigration benefit at the time you
filed the application or petition.</div>';
$pdf->writeHTMLCell(91, 7, 12, 238, $html, 0, 0, false, 'L');
//........... page 2 left end ..............................................

$pdf->SetFont('times', '', 10);
$html = '<div><b>Motion to Reconsider:</b> A motion to reconsider must
demonstrate that the decision was based on an incorrect
application of law or policy, and that the decision was incorrect
based on the evidence in the case record at the time of the
decision. The motion must be supported by citations to
appropriate statutes, regulations, precedent decisions, or
statements of USCIS policy</div>';
$pdf->writeHTMLCell(91, 7, 111, 16, $html, 0, 0, false, 'L');
//.....
$pdf->setCellHeightRatio(1.2); // set cell height ratio
$pdf->SetFont('times', 'B', 11.5);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Part 4. Applicant\'s or Petitioner\'s Statement, Contact Information, Certification, and Signature </div>';
$pdf->writeHTMLCell(91, 7, 112, 48, $html, 1, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-290B
Instructions before completing this part.</div>';
$pdf->writeHTMLCell(91, 7, 111, 60, $html, 0, 0, false, 'L');

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Section A</div>';
$pdf->writeHTMLCell(91, 6.5, 112, 73, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>If you are filing an appeal or motion based on an<br><b>APPLICATION OR PETITION FILED BY AN<br>INDIVIDUAL (NOT A BUSINESS OR ORGANIZATION)</b><br>complete this section:</div>';
$pdf->writeHTMLCell(100, 7, 112, 80, $html, 0, 0, false, true, 'L', true);
//.....
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Applicant\'s or Petitioner\'s Statement</div>';
$pdf->writeHTMLCell(91, 7, 112, 99, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If 
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 107, $html, 0, 0, false, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_applicant_or_petitioner_english_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.a. </b><input type="checkbox" name="part4_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 112, 117, $html, 0, 0, false, 'L');
$html = '<div>I can read and understand English, and I have read 
and understand every question and instruction on this 
form and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 124, 117, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_applicant_or_petitioner_interpreter_name_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.b. </b><input type="checkbox" name="part4_1b" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 112, 131, $html, 0, 0, false, 'L');
$html = '<div>The interpreter named in <b>Part 5.</b> has read to me every 
question and instruction on this form, and my answer 
to every question, in <br><br><br>
a language in which I am fluent. I understood all of 
this information as interpreted.
</div>';
$pdf->writeHTMLCell(80, 7, 124, 131, $html, 0, 0, false, 'L');
// $pdf->writeHTMLCell(76, 7, 125, 145, "", 1, 0, false, 'L');
$pdf->writeHTMLCell(5, 2, 201, 146.5, ",", 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_1b_interpreter_question_and_instruction', 76, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 145);

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_applicant_or_petitioner_preparer_name_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part4_2" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 112, 162, $html, 0, 0, false, 'L');
$html = '<div>At my request, the preparer named in <b>Part 6</b>.<br>prepared this form for me based only upon <br>information I provided or authorized</div>';
$pdf->writeHTMLCell(80, 7, 124, 162, $html, 0, 0, false, 'L');

//.....
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Applicant\'s or Petitioner\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 6.6, 112, 180, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 187, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 192);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Mobile Telephone Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
(if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 200, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 209.5);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 217, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 222.5);

/********************************
 ******** End Page No 2 **********
 *********************************/

/********************************
 ******** Start Page No 3 ********
 *********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 4. Applicant\'s or Petitioner\'s Statement, Contact Information, Certification, and Signature </b>(continued)</div>';
$pdf->writeHTMLCell(91, 6.5, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Applicant\'s or Petitioner\'s Certification</div>';
$pdf->writeHTMLCell(91, 6.5, 13, 35, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of my records that USCIS may need to determine my eligibility for the immigration benefit that I seek.</div>';
$pdf->writeHTMLCell(92, 7, 12, 43, $html, 0, 0, false, true, 'L', false);
//......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I further authorize release of information contained in this form,<br>
in supporting documents, and in my USCIS records, to other<br>
entities and persons where necessary for the administration and<br>
enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(102, 7, 12, 74, $html, 0, 0, false, true, 'L', false);
//......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I certify, under penalty of perjury, that all of the information in<br>
my form and any document submitted with it were provided or<br>
authorized by me, that I reviewed and understand all of the<br>
information contained in, and submitted with, my form, and that<br>
all of this information is complete, true, and correct. </div>';
$pdf->writeHTMLCell(102, 7, 12, 93, $html, 0, 0, false, true, 'L', false);
//...........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(91, 6.5, 13, 117.5, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b>   Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 125.5, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 130.8, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_applicant_signature', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 72, 140);
//.........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Section B</div>';
$pdf->writeHTMLCell(91, 6.5, 13, 150, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If you are filing an appeal or motion based on a <b>PETITION FILED BY A BUSINESS OR ORGANIZATION (NOT AN INDIVIDUAL)</b>, complete this section:</div>';
$pdf->writeHTMLCell(92, 7, 12, 158, $html, 0, 0, false, true, 'L', false);
//...........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Petitioner\'s Statement</div>';
$pdf->writeHTMLCell(91, 6.5, 13, 173, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>NOTE:</b> Select the box for either<b> Item Number 1.a.</b> or <b>1.b.</b> If 
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(92, 7, 12, 181, $html, 0, 0, false, true, 'L', false);
//...........

$pdf->SetFont('times', '', 10);
if (showData('Petitioner_statement_english_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.a. </b><input type="checkbox" name="part4b_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 191, $html, 0, 0, false, 'L');
$html = '<div>I can read and understand English, and I have read 
and understand every question and instruction on this 
form and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 24, 191, $html, 0, 0, false, 'L');
//........

$pdf->SetFont('times', '', 10);
if (showData('Petitioner_statement_interpreter_name_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.b. </b><input type="checkbox" name="part4b_1b" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 206, $html, 0, 0, false, 'L');
$html = '<div>The interpreter named in <b>Part 5.</b> has read to me every 
question and instruction on this form, and my answer 
to every question, in <br><br><br>

a language in which I am fluent. I understood all of 
this information as interpreted.
</div>';
$pdf->writeHTMLCell(80, 7, 24, 206, $html, 0, 0, false, 'L');
// $pdf->writeHTMLCell(76, 7, 25, 220, "", 1, 0, false, 'L');
$pdf->writeHTMLCell(5, 7, 101, 222, ",", 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('section_B_1b_interpreter_named', 76, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 25, 220);

//........

$pdf->SetFont('times', '', 10);
if (showData('Petitioner_statement_preparer_name_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>2.  </b>&nbsp;&nbsp;<input type="checkbox" name="part4b_2" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 237, $html, 0, 0, false, 'L');
$html = '<div>At my request, the preparer named in<b> Part 6.<br></b>prepared this form for me based only upon<br>information I provided or authorized. </div>';
$pdf->writeHTMLCell(80, 7, 24, 237, $html, 0, 0, false, 'L');

//........page 3 left side end .....

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Petitioner\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 6.5, 113, 17, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>Provide the following information about the petitioner\'s 
authorized signatory.</div>';
$pdf->writeHTMLCell(91, 7, 112, 24, $html, 0, 0, false, 'L');
//..............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 2, 112, 33, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_family_lastname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 34.5);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 2, 112, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_given_firstname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 43.5);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.</b>&nbsp;&nbsp;&nbsp;Middle Name </div>';
$pdf->writeHTMLCell(35, 2, 112, 52.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_middlename', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 52.5);

//......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title</div>';
$pdf->writeHTMLCell(90, 0, 112, 59, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_title', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 64);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 71.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_daytime_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 76.5);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 84, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_mobile_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 89);

//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 96, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 101);

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Petitioner\'s Certification</div>';
$pdf->writeHTMLCell(91, 6, 113, 111.5, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Copies of any documents submitted are exact photocopies of 
unaltered, original documents, and I understand that, as the 
petitioner, I may be required to submit original documents to 
USCIS at a later date.</div>';
$pdf->writeHTMLCell(90, 0, 112, 118, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I authorize the release of any information from my records, or <br>
from the petitioning organization\'s records, to USCIS or other <br>
entities and persons where necessary to determine eligibility for <br>
the immigration benefit sought or where authorized by law. I <br>
recognize the authority of USCIS to conduct audits of this form <br>
using publicly available open source information. I also <br>
recognize that any supporting evidence submitted in support of <br>
this form may be verified by USCIS through any means <br>
determined appropriate by USCIS, including but not limited to, <br>
on-site compliance reviews.</div>';
$pdf->writeHTMLCell(100, 0, 112, 136.5, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If filing this form on behalf of an organization, I certify that I 
am authorized to do so by the organization.</div>';
$pdf->writeHTMLCell(90, 0, 112, 180.6, $html, '', 0, 0, true, 'L');

//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I certify, under penalty of perjury, that I have reviewed this 
form, I understand all of the information contained in, and 
submitted with, my appeal or motion, and all of this information 
is complete, true, and correct</div>';
$pdf->writeHTMLCell(90, 0, 112, 191, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(91, 6, 113, 210, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.a.  </b>   Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 2, 112, 216, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(82.9, 6.5, 121, 221, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 112, 230, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_signature2', 33, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171, 229.6);
//.........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>NOTE TO ALL APPLICANTS AND PETITIONERS:</b> If 
you do not completely fill out this form or fail to submit 
required documents listed in the Instructions, USCIS may 
dismiss, deny, or reject your appeal or motion.</div>';
$pdf->writeHTMLCell(90, 0, 112, 236, $html, '', 0, 0, true, 'L');
/********************************
 ******** End Page No 3 **********
 *********************************/

/********************************
 ******** Start Page No 4 ********
 *********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 5. Interpreter\'s Contact Information, 
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 6.5, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(90, 0, 12, 29, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(91, 6.5, 13, 35, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.a.&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 0, 12, 42, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_family_lastname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 47);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.b.&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 0, 12, 55, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_given_firstname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 60);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 0, 12, 68, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 73);
//.........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 6, 13, 83, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.&nbsp;&nbsp;&nbsp;</b>Street Number  &nbsp;<br> &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 0, 12, 90, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_street_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 92);
//...........
$pdf->SetFont('times', '', 10); // set font
if (showData('i_290b_interpreter_address_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_290b_interpreter_address_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_290b_interpreter_address_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$html = '<div><b>3.b.&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="Apt" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="' . $checked_ste . '" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 101, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_apt_flor', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 101);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 0, 12, 110, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 110);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.d.</b>&nbsp;&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 119, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="part5_interpreter_mailing_state" size="0.75">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('Times', '', 10);
$html = '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 0, 46, 119, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_zip_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 68, 119);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b>&nbsp;&nbsp;&nbsp; Province';
$pdf->writeHTMLCell(50, 0, 12, 128, $html, '', 0, 0, true, 'L');
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mailing_province', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 128);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b>&nbsp;&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 137, $html, '', 0, 0, true, 'L');
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mailing_postal_code', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 137);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 143, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mailing_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 148);
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 6, 13, 157, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 12, 164, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 169);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 12, 176, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 181);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(90, 0, 12, 188, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 193);
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(91, 6, 13, 203.5, $html, 0, 0, true, true, 'L', true);
//.........
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('Times', '', 10); // set font
$html = "<div>I certify, under penalty of perjury, that:</div>";
$pdf->writeHTMLCell(100, 0, 12, 210, $html, '', 0, 0, true, 'L');
$html = "<div>I am fluent in English and</div>";
$pdf->writeHTMLCell(100, 0, 12, 216.5, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(100, 0, 102, 216.5, ',', '', 0, 0, true, 'L');
//..................
$html = "<div>which is the same language specified in <b>Part 4., Item Number<br>
1.b. in Section A or Section B</b>, and I have read to this applicant<br>
or petitioner in the identified language every question and<br>
instruction on this form and his or her answer to every question.<br>
The applicant or petitioner informed me that he or she<br>
understands every instruction, question, and answer on the<br>
form, including the <b>Applicant's or Petitioner's Certification</b>,<br>
and has verified the accuracy of every answer. </div>";
$pdf->writeHTMLCell(100, 0, 12, 222, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_certification', 51, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 51, 216);
//.....left side End......
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b>   Interpreter\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(82.5, 7, 121.5, 30, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 112, 39, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 170, 39);
//.........
$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1.8, 1, 2); // set cell padding
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 6. Contact Information, Declaration, and Signature of the Person Preparing this Form, if Other Than the Applicant or Petitioner</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 48, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(90, 0, 112, 66, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(91, 6.5, 113, 73, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.a.&nbsp;&nbsp;&nbsp;</b>Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 0, 112, 80, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_family_lastname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 85);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.b.&nbsp;&nbsp;&nbsp;</b>Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 0, 112, 93, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_given_firstname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 98);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 106, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 111);
//.........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 6.5, 113, 121, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp;and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 129, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_preparer_mailing_street_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 131);
//...........
$pdf->SetFont('times', '', 10); // set font
if (showData('i_290b_preparer_address_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_290b_preparer_address_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_290b_preparer_address_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$html = '<div><b>3.b.</b>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Apt" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="' . $checked_ste . '" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 140, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_preparer_mailing_apt_flor', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 140);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.c.</b>&nbsp;&nbsp;&nbsp;City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 149, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_prepare_mailing_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 149);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.d.</b>&nbsp;&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 112, 158, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="part5_preparer_mailing_state" size="0.75">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 7, 129.5, 157, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.e.</b>&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 145, 158, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_prepare_mailing_zip_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 158);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 167, $html, '', 0, 0, true, 'L');
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_mailing_province', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 167);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b>&nbsp;&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 176, $html, '', 0, 0, true, 'L');
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_mailing_postal_code', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 176);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b>&nbsp;&nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 183, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_mailing_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 188);
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 6.6, 113, 199, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 207, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 212);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 219, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 224);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(90, 0, 112, 232, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 237);
/********************************
 ******** End Page No 4 **********
 *********************************/

/********************************
 ******** Start Page No 5 ********
 *********************************/
$pdf->setCellPaddings(1, 1.5, 1, 1.5); // set cell padding
$pdf->AddPage('P', 'LETTER');  // page number 5
//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 6. Contact Information, Declaration, and 
Signature of the Person Preparing this Form, if 
Other Than the Applicant or Petitioner</b>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(91, 6.6, 13, 41, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_preparer_not_an_attorney_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>7.a. </b><input type="checkbox" name="part6_7a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 50, $html, 0, 0, false, 'L');
$html = '<div>I am not an attorney or accredited representative but 
have prepared this form on behalf of the applicant or 
petitioner and with the applicant\'s or petitioner\'s 
consent.</div>';
$pdf->writeHTMLCell(80, 7, 24, 50, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_preparer_an_attorney_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>7.b. </b><input type="checkbox" name="part6_7b" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 67, $html, 0, 0, false, 'L');
$html = '<div>I am an attorney or accredited representative and 
have prepared this form on behalf of the applicant or 
petitioner and with the applicant\'s or petitioner\'s 
consent.</div>';
$pdf->writeHTMLCell(80, 7, 24, 67, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(91, 7, 13, 87, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>By my signature, I certify, under penalty of perjury, that I 
prepared this form at the request of the applicant or petitioner. 
The applicant or petitioner then reviewed this completed form 
and informed me that he or she understands all of the 
information contained in, and submitted with, his or her form, 
including the <b>Applicant\'s or Petitioner\'s Certification,</b> and 
that all of this information is complete, true, and correct. I 
completed this form based only on information that the 
applicant or petitioner provided to me or authorized me to 
obtain or use.</div>';
$pdf->writeHTMLCell(90, 7, 12, 95, $html, 0, 0, false, 'L');
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 13, 140, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.a.  </b>   Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 149, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 155, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 165, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_preparer_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70, 165);
/********************************
 ******** End Page No 5 **********
 *********************************/

/********************************
 ******** Start Page No 6 ********
 *********************************/
$pdf->AddPage('P', 'LETTER');
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 7.  &nbsp;Additional Information</b><i></i></div>';
$pdf->writeHTMLCell(91, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>If you need extra space to provide any additional information
within this application, use the space below. If you need more
space than what is provided, you may make copies of this page

to complete and file with this application or attach a separate
sheet of paper. Type or print your name and A-Number (if any)
at the top of each sheet; indicate the <b>Page Number, Part
Number</b>, and <b>Item Number</b> to which your answer refers; and
sign and date each sheet.</div>';
$pdf->writeHTMLCell(93, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_family_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 61);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 68, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_given_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 70);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 79);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 1, false, false, 'L', true);
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 70, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont('times', '', 11);
$html = '<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 51, 88, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 57.9, 88);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 103);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 113, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 110.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 114.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 118.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 123.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 128, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 132.8, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 137.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 142.2, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 147, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 151.5, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->TextField('aditional_info_name_3d', 82.5, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.5, 113);
$pdf->setCellHeightRatio(1.2);

//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 186);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 186);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 186);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 191.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 195.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 199.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 204.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 208.8, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 213, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 217.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 222.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 227.1, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 231.1, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->TextField('aditional_info_name_4d', 82.5, 63.4, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.5, 195);
$pdf->setCellHeightRatio(1.2);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number2', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number2', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number2', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 29.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 33.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 37.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 42.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 46.8, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 51, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 55.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 60.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 65.3, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_name_5d', 82, 60, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122.5, 31);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 92.7, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 98);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 93, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 98);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 93, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number3', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 98);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 106, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 104.7, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 109.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 114.3, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 119.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 124, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 128.5, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 133, '',  "B",  0, false, false, 'C', true);   // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 137.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 142, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_name_6d', 82, 60, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122.5, 107);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 168.7, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 174.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 168.7, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 174.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 168.7, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number4', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 174.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 181.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 186, '',  "B",  0, false, false, 'C', true);   // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 190.5, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 195, '',  "B",  0, false, false, 'C', true);   // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 199.5, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 204, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 208.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 213, '',  "B",  0, false, false, 'C', true);   // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 217.5, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_name_7d', 82, 58.4, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122.5, 184);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: </b>Make sure your appeal or motion is complete before filing.</div>';
$pdf->writeHTMLCell(90, 7, 112, 243, $html, 0, 1, false, true, 'L', true);
//..............



$js = "
var fields = {
    'attorney_statebar_number':' $attorneyData->bar_number',
    'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',
    'applicant_family_lastname':' " . showData('petitioner_family_last_name') . "',
    'applicant_given_firstname':' " . showData('petitioner_given_first_name') . "',
    'applicant_middlename':' " . showData('petitioner_middle_name') . "',
    'applicant_business_organization':' " . showData('i_290b_principal_immigrant_business_name') . "',
    'applicant_info_align_reg_number':' " . showData('petitioner_alien_registration_number') . "',
    'applicant_info_usis_online_account_number':' " . showData('petitioner_uscis_online_account_number') . "',
    'information_about_applicant_mail_in_care_name':' " . showData('petitioner_us_mailing_care_of_name') . "',
    'information_about_applicant_mail_street':' " . showData('petitioner_us_mailing_street_number') . "',
    'information_about_applicant_mail_apt_ste_flr':' " . showData('petitioner_us_mailing_apt_ste_flr_value') . "',
    'information_about_applicant_mail_city_town':' " . showData('petitioner_us_mailing_city_town') . "',
    'information_about_applicant_mail_state':' " . showData('petitioner_us_mailing_state') . "',
    'information_about_applicant_mail_zipcode':' " . showData('petitioner_us_mailing_zip_code') . "',
    'information_about_applicant_province':' " . showData('petitioner_us_mailing_province') . "',
    'information_about_applicant_postal_code':' " . showData('petitioner_us_mailing_postal_code') . "',
    'information_about_applicant_country':' " . showData('petitioner_us_mailing_country') . "',
//page 1 end.......    
    'information_about_uscis_form':' " . showData('i_290b_appeal_or_motion_uscis_form_no') . "',
    'receipt_number_for_the_applicant':' " . showData('i_290b_appeal_or_motion_receipt_number') . "',
    'part2_4_request_nominigrant_example':' " . showData('i_290b_appeal_or_motion_nonimmigrant_or_immigrant') . "',
    'part2_5_date_of_the_adverse_decision':' " . showData('i_290b_appeal_or_motion_adverse_decision_date') . "',
    'part2_office_that_issued_advarse_decision':' " . showData('i_290b_appeal_or_motion_adverse_decision') . "',
    'part4_1b_interpreter_question_and_instruction':' " . showData('i_290b_applicant_or_petitioner_interpreter_name') . "',
    'part4_applicant_daytime_telephone':' " . showData('i_290b_applicant_or_petitioner_daytime_tel') . "',
    'part4_applicant_mobile_telephone':' " . showData('i_290b_applicant_or_petitioner_mobile') . "',
    'part4_applicant_email_address':' " . showData('i_290b_applicant_or_petitioner_email') . "',
//page 2 end.......
    'part4_applicant_signature':' " . showData('i_290b_applicant_or_petitioner_sign_date') . "',
    'section_B_1b_interpreter_named':' " . showData('Petitioner_statement_interpreter_name') . "',
    'part4_petitioner_family_lastname':' " . showData('i_290b_petitioner_family_last_name') . "',
    'part4_petitioner_given_firstname':' " . showData('i_290b_petitioner_given_first_name') . "',
    'part4_petitioner_middlename':' " . showData('i_290b_petitioner_middle_name') . "',
    'part4_petitioner_title':' " . showData('i_290b_petitioner_title') . "',
    'part4_petitioner_daytime_telephone_number':' " . showData('petitioner_daytime_tel') . "',
    'part4_petitioner_mobile_telephone_number':' " . showData('petitioner_mobile') . "',
    'part4_petitioner_email_address':' " . showData('petitioner_email') . "',
    'part4_petitioner_signature2':' " . showData('i_290b_petitioner_sign_date') . "',
//page 3 end......    
    'part5_interpreter_family_lastname':' " . showData('i_290b_interpreter_family_last_name') . "',
    'part5_interpreter_given_firstname':' " . showData('i_290b_interpreter_given_first_name') . "',
    'part5_interpreter_business_org_name':' " . showData('i_290b_interpreter_business_name') . "',
    'part5_interpreter_mailing_street_name':' " . showData('i_290b_interpreter_address_street_number') . "',
    'part5_interpreter_mailing_apt_flor':' " . showData('i_290b_interpreter_address_apt_ste_flr_value') . "',
    'part5_interpreter_mailing_city_town':' " . showData('i_290b_interpreter_address_city_town') . "',
    'part5_interpreter_mailing_state':' " . showData('i_290b_interpreter_address_state') . "',
    'part5_interpreter_mailing_zip_code':' " . showData('i_290b_interpreter_address_zip_code') . "',
    'part5_interpreter_mailing_province':' " . showData('i_290b_interpreter_address_province') . "',
    'part5_interpreter_mailing_postal_code':' " . showData('i_290b_interpreter_address_postal_code') . "',
    'part5_interpreter_mailing_country':' " . showData('i_290b_interpreter_address_country') . "',
    'part5_interpreter_daytime_telephone':' " . showData('i_290b_interpreter_daytime_tel') . "',
    'part5_interpreter_mobile_telephone':' " . showData('i_290b_interpreter_mobile') . "',
    'part5_interpreter_email_address':' " . showData('i_290b_interpreter_email') . "',
    'part5_interpreter_certification':' " . showData('i_290b_interpreter_fluent_english') . "',
    'part5_interpreter_signature':' " . showData('i_290b_interpreter_sign_date') . "',
    'part5_preparer_family_lastname':' " . showData('i_290b_preparer_family_last_name') . "',
    'part5_preparer_given_firstname':' " . showData('i_290b_preparer_given_first_name') . "',
    'part5_preparer_business_org_name':' " . showData('i_290b_preparer_business_name') . "',
    'part5_preparer_mailing_street_name':' " . showData('i_290b_preparer_address_street_number') . "',
    'part5_preparer_mailing_apt_flor':' " . showData('i_290b_preparer_address_apt_ste_flr_value') . "',
    'part5_prepare_mailing_city_town':' " . showData('i_290b_preparer_address_city_town') . "',
    'part5_preparer_mailing_state':' " . showData('i_290b_preparer_address_state') . "',
    'part5_prepare_mailing_zip_code':' " . showData('i_290b_preparer_address_zip_code') . "',
    'part5_prepare_mailing_province':' " . showData('i_290b_preparer_address_province') . "',
    'part5_preparer_mailing_postal_code':' " . showData('i_290b_preparer_address_postal_code') . "',
    'part5_preparer_mailing_country':' " . showData('i_290b_preparer_address_country') . "',
    'part5_prepare_daytime_telephone':' " . showData('i_290b_preparer_daytime_tel') . "',
    'part5_prepare_mobile_telephone':' " . showData('i_290b_preparer_mobile') . "',
    'part5_preparer_email_address':' " . showData('i_290b_preparer_email') . "',
    'part6_preparer_signature':' " . showData('i_290b_preparer_sign_date') . "',
//page 5 end.......    
    'i_290B_additional_info_family_last_name':' " . showData('i_290b_additional_info_last_name') . "',
    'i_290B_additional_info_given_first_name':' " . showData('i_290b_additional_info_first_name') . "',
    'i_290B_additional_info_middle_name':' " . showData('i_290b_additional_info_middle_name') . "',
    'i_290B_additional_info_a_number':' " . showData('i_290b_additional_info_a_number') . "',
    'i_290B_additional_info_page_number':' " . showData('i_290b_additional_info_3a_page_no') . "',
    'i_290B_additional_info_part_number':' " . showData('i_290b_additional_info_3b_part_no') . "',
    'i_290B_additional_info_item_number':' " . showData('i_290b_additional_info_3c_item_no') . "',
    'i_290B_additional_info_page_number1':' " . showData('i_290b_additional_info_4a_page_no') . "',
    'i_290B_additional_info_part_number1':' " . showData('i_290b_additional_info_4b_part_no') . "',
    'i_290B_additional_info_item_number1':' " . showData('i_290b_additional_info_4c_item_no') . "',
    'i_290B_additional_info_page_number2':' " . showData('i_290b_additional_info_5a_page_no') . "',
    'i_290B_additional_info_part_number2':' " . showData('i_290b_additional_info_5b_part_no') . "',
    'i_290B_additional_info_item_number2':' " . showData('i_290b_additional_info_5c_item_no') . "',
    'i_290B_additional_info_page_number3':' " . showData('i_290b_additional_info_6a_page_no') . "',
    'i_290B_additional_info_part_number3':' " . showData('i_290b_additional_info_6b_part_no') . "',
    'i_290B_additional_info_item_number3':' " . showData('i_290b_additional_info_6c_item_no') . "',
    'i_290B_additional_info_page_number4':' " . showData('i_290b_additional_info_7a_page_no') . "',
    'i_290B_additional_info_part_number4':' " . showData('i_290b_additional_info_7b_part_no') . "',
    'i_290B_additional_info_item_number4':' " . showData('i_290b_additional_info_7c_item_no') . "',    
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
$pdf->Output('I-290b.pdf', 'I');
