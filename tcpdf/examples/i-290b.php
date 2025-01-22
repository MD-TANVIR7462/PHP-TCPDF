<?php

// require_once('formheader.php');   //database connection file 
require_once('tcpdf_include.php');
// require_once('config.php'); //local db file
require_once('localconfig.php'); //localconfig file...........
    //showData()
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

        $this->Cell(40, 6, "Form I-290B    Edition    05/31/24  ", 0, 0, 'L');


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
$pdf->MultiCell(40, 5, "OMB No. 1615-0095\nExpires 03/31/2027", 0, 'C', 0, 1, 169, 18.5, true);

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

$pdf->SetFont('times', 'B', 9.9);
$html = '<div>Please visit <a><b>www.uscis.gov/i-290b/jurisdiction</b></a> for information on the immigration benefit types that are eligible for an appeal or<br>motion using this form. </div>';
$pdf->writeHTMLCell(195, 7, 12, 98.2, $html, 0, 0, false, true, 'L', true);
//............
$pdf->Image('images/right_angle.jpg', 13, 109.7, 3.3, 3.3);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 18, 108.2, true);
$pdf->SetFont('times', '', 10); // set font
$html = '<div>If you do not properly complete this form or fail to submit required documents listed in the Instructions, we may dismiss or reject your appeal or motion.</div>';
$pdf->writeHTMLCell(195, 7, 12, 115, $html, 0, 0, false, true, 'L', true);

//..........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About the Applicant or Petitioner</b></div>';
$pdf->writeHTMLCell(91, 12, 13, 126, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div>If a business or organization is filing this appeal or motion, skip<br>
to <b>Item Number 3</b>. and do not complete <b>Item Numbers 1</b>. or <b>2</b>.</div>';
$pdf->writeHTMLCell(100, 12, 12, 139, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 149, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_family_lastname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 151);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 157.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_given_firstname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 159.5);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div>';
$pdf->writeHTMLCell(35, 7, 12, 168.3, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_middlename', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 168.3);
//......
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 177.5, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_date_of_birth', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 68, 177);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Business or Organization Name (if applicable) </div>';
$pdf->writeHTMLCell(90, 7, 12, 184.5, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_business_organization', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 190);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 197, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_info_align_reg_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 58, 202.5);
$pdf->SetFont('times', '', 12);
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell(10, 7, 51, 202, $html, 0, 1, false, true, 'J', true);
//.....
$pdf->Image('images/right_angle.jpg', 47, 204, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 38, 217, 3.3, 3.3);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 209, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_info_usis_online_account_number', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 215);
//....page 1 left side end .................................................................
$pdf->SetFillColor(220, 220, 220);
//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Mailing Address </b>(Safe or Alternate Address,<br>if applicable) </div>';
$pdf->writeHTMLCell(91, 5, 112, 126, $html, 0, 1, true, false, 'L', true);

//......
$pdf->SetFont('times', '', 8.2);
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(USPS ZIP Code Lookup)</i></b></a></div>';
$pdf->writeHTMLCell(80, 5, 118, 132.7, $html, 0, 1, false, false, 'R', true);
//.......
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 111.3, 138.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_in_care_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 143.5);
//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b. </b>&nbsp;&nbsp;&nbsp;Street Number&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name</div>';
$pdf->writeHTMLCell(40, 12, 111.3, 150.6, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_street', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 152.4);

//...........
$pdf->SetFont('times', '', 10); // set font
if (showData('petitioner_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('petitioner_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('petitioner_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";

$html = '<div><b>6.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="' . $checked_ste . '" />Ste.&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Flr" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 111.3, 161.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_apt_ste_flr', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 164, 161.1);

//......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>6.d. </b>&nbsp;&nbsp;&nbsp;City or Town </div>';
$pdf->writeHTMLCell(50, 5, 111.3, 170, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_city_town', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 169.5);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>6.e. </b>&nbsp;&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 111.3, 178.5, $html, '', 0, 0, true, 'L');
//............
$pdf->SetFont('courier', 'B', 10);
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("information_about_applicant_mail_state", 13, 7, $comboBoxOptions, array(), array(), 129, 178.5);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>6.f. </b>&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 143, 178.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 167, 178);
//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.g. </b>&nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 111.3, 187.6, $html, '', 0, 0, true, 'L');
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_province', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 186.5);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.h. </b>&nbsp;&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 111.3, 195.5, $html, '', 0, 0, true, 'L');
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_postal_code', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 195);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.i. </b>&nbsp;&nbsp;&nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 111.3, 202, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121.1, 207);

/********************************
 ******** End Page No 1 **********
 *********************************/

/********************************
 ******** Start Page No 2 ********
 *********************************/
//...........
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->writeHTMLCell(91, 6.5, 13, 17, '<div><b>Part 2. Information About the Appeal or Motion</b></div>', 1, 0, true, true, 'L', true);
//...........
$pdf->setCellHeightRatio(1.2); // set cell height ratio
$pdf->SetFont('times', '', 10);
$html = '<div>Please indicate whether you are filing an appeal to the<br>
Administrative Appeals Office (AAO) or a motion. You cannot<br>
file both an appeal and a motion on a single form.<b> If you select<br>
both an appeal and a motion, we may dismiss or reject your
filing</b></div>';
$pdf->writeHTMLCell(100, 5, 12, 24, $html, 0, 0, false, true, 'L', true);
$html = '<div><b>NOTE: DO NOT use this form to file an appeal with the<br>
Board of Immigration Appeals (BIA). You must instead use<br>
Form EOIR-29.</b>.</div>';
$pdf->writeHTMLCell(100, 5, 12, 48, $html, 0, 0, false, true, 'L', true);
//........
$pdf->writeHTMLCell(100, 5, 12, 63,'I am filing an <b>appeal</b> to the AAO.', 0, 0, false, true, 'L', true);
//..............
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_additional_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.a. </b><input type="checkbox" name="part2_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 69, $html, 0, 0, false, 'L');
$html = '<div>I have attached a brief and/or additional evidence.</div>';
$pdf->writeHTMLCell(80, 7, 24, 69, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_calendar_days_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.b. </b><input type="checkbox" name="part2_1b" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 75.5, $html, 0, 0, false, 'L');
$html = '<div>I will submit a brief and/or additional evidence<br>
directly to the AAO within 30 calendar days of filing<br>
this appeal.</div>';
$pdf->writeHTMLCell(80, 7, 24, 75.5, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_submitting_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.c. </b><input type="checkbox" name="part2_1c" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 90, $html, 0, 0, false, 'L');
$html = '<div>I will not be submitting any brief or additional
evidence in support of this appeal.</div>';
$pdf->writeHTMLCell(80, 7, 24, 90, $html, 0, 0, false, 'L');
//..............
$pdf->writeHTMLCell(100, 5, 12, 100,'I am filing a <b>motion</b>. ', 0, 0, false, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_reopen_status') == "Y") $checked = "checked";else $checked = "";
$html = '<div><b>2.a. </b><input type="checkbox" name="part2_1d" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 106, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reopen.</b>  I have attached a
brief and/or additional evidence.</div>';
$pdf->writeHTMLCell(80, 7, 24, 106, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_reconsider_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>2.b. </b><input type="checkbox" name="part2_1e" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 116.5, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reconsider</b>. I have attached a<br>brief.</div>';
$pdf->writeHTMLCell(80, 7, 24, 116.5, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
if (showData('i_290b_appeal_or_motion_reopen_and_reconsider_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>2.c. </b><input type="checkbox" name="part2_1f" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(20, 7, 12, 126, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reopen</b> and a <b>motion to<br>
reconsider</b>. I have attached a brief and/or additional<br>
evidence.</div>';
$pdf->writeHTMLCell(80, 7, 24, 126, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 141, $html, 0, 0, false, 'L');
$html = '<div>Immigration Form That is the Subject of This Appeal or<br>
Motion (for example, Form I-140, I-360, I-129, I-485,<br>
I-601, I-730, I-131) (list <b>only one</b> form number)</div>';
$pdf->writeHTMLCell(100, 7, 20, 141, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_uscis_form', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 155);

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </div>';
$pdf->writeHTMLCell(20, 7, 12,163, $html, 0, 0, false, 'L');
$html = '<div>Receipt Number for the Application, Petition, or Other<br>Request (list <b>only one</b> Receipt Number)</div>';
$pdf->writeHTMLCell(80, 7, 20,163, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('receipt_number_for_the_applicant', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 172.5);
// //..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 180, $html, 0, 0, false, 'L');
$html = '<div>Requested Immigrant or Nonimmigrant Classification<br>(for example, H-1B, R-1, O-1, EB-1, EB-2, RE-2, AS-2)<br>(if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 20, 180, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2_4_request_nominigrant_example', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 194);
// //..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.</div>';
$pdf->writeHTMLCell(20, 7, 12, 202, $html, 0, 0, false, 'L');
$html = '<div>Date of the Unfavorable Decision (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 202, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2_5_date_of_the_adverse_decision', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 207);
//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.</div>';
$pdf->writeHTMLCell(20, 7, 12, 215, $html, 0, 0, false, 'L');
$html = '<div>Office That Issued the Unfavorable Decision</div>';
$pdf->writeHTMLCell(80, 7, 20, 215, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->ComboBox('part2_office_that_issued_advarse_decision', 83, 7, array(

    '(AAO)',
    ' Humanitrian Affairs Branch  (RIH)',
    ' Agana  (AGA)',
    ' Albany  (ALB)',
    ' Albuquerque  (ABQ)',
    ' Anchorage  (ANC)',
    ' Atlanta  (ATL)',
    ' Baltimore  (BAL)',
    ' Boise  (BOI)',
    ' Boston  (BOS)',
    ' Buffalo  (BUF)',
    ' California Service Center  (WAC)',
    ' Charleston  (CHL)',
    ' Charlotte  (CLT)',
    ' Charlotte Amalie  (CHA)',
    ' Chicago  (CHI)',
    ' Chula Vista  (CVC)',
    ' Cincinnati  (CIN)',
    ' Cleveland  (CLE) ',
    ' Columbus  (CLM)',
    ' Dallas  (DAL)',
    ' Denver  (DEN)',
    ' Des Moines  (DSM)',
    ' Detroit  (DET)',
    ' El Paso  (ELP)',
    ' Fresno  (FRE)',
    ' Fort Smith AR  (FSA)',
    ' Greer Field  (GRR)',
    ' Harlingen  (HLG)',
    ' Hartford  (HAR)',
    ' Helena  (HEL)',
    ' Hialeah  (HIA)',
    ' Honolulu  (HHW)',
    ' Houston  (HOU)',
    ' Humanitrian Affairs Branch  (HAB)',
    ' Indianapolis  (INP)',
    ' International Operation  (IO)',
    ' Jacksonville  (JAC)',
    ' Kansas City  (KAN)',
    ' Kendall  (KND)',
    ' Las Vegas  (LVG)',
    ' Lawrance  (LAW)',
    ' Long Island  (LNY)',
    ' Los Angles  (LAC)',
    ' Los Angles  (LOS)',
    ' Los Angles  (SFV)',
    ' Louisville  (LOU)',
    ' Manchester  (MAN)',
    ' Memphis  (MEM)',
    ' Miami (MIA)',
    ' Milwaukee  (MIL)',
    ' Mount Laurel  (MTL)',
    ' National Benefits Center  (NBC)',
    ' Nebaraska Service Center  (LIN)',
    ' New Jersey  (NEW)',
    ' New Orleans  (NOL)',
    ' New York City  (NYC)',
    ' Norfolk  (NOR)',
    ' Oakland park  (OKL)',
    ' Oklahoma City   (OKC)',
    ' Omaha  (OMA)',
    ' Orlando  (ORL)',
    ' Philadelphia  (PHI)',
    ' Phoenix  (PHO)',
    ' Pittsburgh  (PIT)',
    ' Portland,ME   (POM)',
    ' Portland  (POO)',
    ' Providence  (PRO)',
    ' Queens  (QNS)',
    ' Raleigh-Durham  (RAL)',
    ' Refugee International Humanitrian  (RIH)',
    ' Refugee, Asylum, and International Operations  (RAIO)',
    ' Reno  (REN)',
    ' Sacramento  (SAC)',
    ' Salt Lake City  (SLC)',
    ' San Antonio  (SNA)',
    ' San Bernardino  (SBD)',
    ' San Diego  (SND)',
    ' San Francisco  (SFR)',
    ' San Jose  (SNJ)',
    ' San Juan  (SAJ)',
    ' Santa Ana  (SAA)',
    ' Seattle Field  (SEA)',
    ' Spokane  (SPO)',
    ' St. Albans  (STA)',
    ' St. Louis  (STL)',
    ' St. Paul  (SPM)',
    ' Tampa T (AM)',
    ' Texas Service Center (SRC)',
    ' Tucson TUC',
    ' Vermont Service Center  (EAC)',
    ' Washington  (WAS)',
    ' West Palm Beach  (WPB)',
    ' Yakima  (YAK)',
    ' Other'

), array(), array(), 21, 220);

//........... page 2 left end ..............................................

$pdf->setCellHeightRatio(1.2); // set cell height ratio
$pdf->SetFont('times', 'B', 11.5);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Part 3. Basis for the Appeal or Motion </div>';
$pdf->writeHTMLCell(92, 7, 112, 17, $html, 1, 0, true, true, 'L', true);
//..............
$pdf->SetFont('times', '', 10);
$html = '<div><b>You must provide a statement regarding the basis for your<br>
appeal or motion in the space provided on the next page.</b> If<br>
you need additional space to provide your explanation, use <b>Part<br>
7. Additional Information</b> or a separate sheet of paper.</div>';
$pdf->writeHTMLCell(100, 7, 111, 24.5, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>Appeal:</b> Provide a statement that specifically identifies an<br>
erroneous conclusion of law or statement of fact in the decision<br>
you are appealing.<b> You MUST provide this information with<br>
your Form I-290B even if you intend to submit a brief later.</b></div>';
$pdf->writeHTMLCell(100, 7, 111, 44, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: Your appeal must address all grounds of<br>
ineligibility identified in the unfavorable decision. If you do<br>
not address an issue in a statement on this form or in a<br>
supporting brief, we may deem it waived for the appeal. A<br>
waived ground of ineligibility may be the sole basis for a<br>
dismissed appeal.</b></div>';
$pdf->writeHTMLCell(100, 7, 111, 64, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>Motion to Reopen:</b> A motion to reopen must state new facts<br>
and must be supported by documentary evidence demonstrating<br>
eligibility for the requested immigration benefit at the time you<br>
filed the application or petition.</div>';
$pdf->writeHTMLCell(100, 7, 111, 92, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>Motion to Reconsider:</b> A motion to reconsider must state the<br>
reasons for reconsideration and must be supported by any<br>
pertinent precedent decisions to establish that the decision was<br>
based on an incorrect application of law or service policy, if<br>
applicable. A motion to reconsider must also establish that the<br>
decision was incorrect based on the evidence of record at the<br>
time of the decision.</div>';
$pdf->writeHTMLCell(100, 7, 111, 110, $html, 0, 0, false, 'L');
//..............
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.6);
$pdf->writeHTMLCell(91.9, 1, 112, 118, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(91.9, 1, 112, 123.5, '',  "B",  0, false, false, 'C', true);   // line 2
$pdf->writeHTMLCell(91.9, 1, 112, 129, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(91.9, 1, 112, 134.5, '',  "B",  0, false, false, 'C', true);   // line 4 
$pdf->writeHTMLCell(91.9, 1, 112, 140, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(91.9, 1, 112, 145.5, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(91.9, 1, 112, 151, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(91.9, 1, 112, 156.5, '',  "B",  0, false, false, 'C', true);   // line 8 
$pdf->writeHTMLCell(91.9, 1, 112, 162, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(91.9, 1, 112, 167.5, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(91.9, 1, 112, 173, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(91.9, 1, 112, 178.5, '',  "B",  0, false, false, 'C', true);   // line 2
$pdf->writeHTMLCell(91.9, 1, 112, 184, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(91.9, 1, 112, 189.5, '',  "B",  0, false, false, 'C', true);   // line 4 
$pdf->writeHTMLCell(91.9, 1, 112, 195, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(91.9, 1, 112, 200.5, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(91.9, 1, 112, 206.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_3_motion_value_combobox', 92, 112, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_290b_motion_reconsider_record')), 112, 143);

/********************************
 ******** End Page No 2 **********
 *********************************/

/********************************
 ******** Start Page No 3 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 4. Applicant\'s or Petitioner\'s Contact<br>
Information, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Applicant\'s or Petitioner\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 6, 13, 33, $html, 0, 0, true, true, 'L', true);
//...............
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Provide your daytime telephone number, mobile telephone<br>
number (if any), and email address (if any).</div>';
$pdf->writeHTMLCell(90, 0, 12, 41, $html, '', 0, 0, true, 'L');

//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 12, 50.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 55.5);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Mobile Telephone Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(if any)</div>';
$pdf->writeHTMLCell(90, 0, 12, 62.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72.5);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 0, 12, 79.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 85);
//........................
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Applicant\'s or Petitioner\'s Certification and<br>Signature </div>';
$pdf->writeHTMLCell(91, 6, 13, 96, $html, 0, 0, true, true, 'L', true);
//...............
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I certify, under penalty of perjury, that I provided or authorized<br>
all of the responses and information contained in and submitted<br>
with my appeal or motion, I read and understand or, if<br>
interpreted to me in a language in which I am fluent by the<br>
 listed in <b>Part 5</b>., understood, all of the responses and<br>
information contained in, and submitted with, my appeal/<br>
motion, and that all of the responses and the information are<br>
complete, true, and correct. Furthermore, I authorize the release<br>
of any information from any and all of my records that USCIS<br>
may need to determine my eligibility for an immigration request<br>
and to other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration law. </div>';
$pdf->writeHTMLCell(100, 0, 12, 109, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 161.5, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(82.5, 7, 21, 167, "", 1, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 20, 176, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_aplicant_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70,176);
//..............
$pdf->SetFont('times', 'B', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Part 5. Interpreter\'s Contact Information,<br>Certification, and Signature</div>';
$pdf->writeHTMLCell(91, 6, 13, 188, $html, 1, 0, true, true, 'L', true);
//..............
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(91, 6, 13, 204, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 0, 12, 211, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_family_lastname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 216);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7,20, 223, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_given_firstname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 228);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 0, 12, 235.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 241);
//..................

//.....left side End......
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 17, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 114, 24, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_daytime_telephone', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 29);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 114, 37, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mobile_telephone', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 42);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 114, 50, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_email_address', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 55);


$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Interpreter\'s Certification and Signature</div>';
$pdf->writeHTMLCell(91, 7, 113, 66, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = "<div>I certify, under penalty of perjury, that I am fluent in English</div>";
$pdf->writeHTMLCell(100, 0, 112, 74.5, $html, '', 0, 0, true, 'L');
$html = "<div>and</div>";
$pdf->writeHTMLCell(100, 0, 112, 80, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(100, 0, 202, 80, ',', '', 0, 0, true, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = "<div>and I have interpreted every question on the appeal/motion, and<br>
Instructions and interpreted the applicant's answers to the<br>
questions in that language, and the applicant/petitioner informed<br>
me that they understood every instruction, question, and answer<br>
on the appeal/motion.</div>";
$pdf->writeHTMLCell(100, 0, 112, 85, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_certification_fluent_eng', 83, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 79.2);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 112, 106, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(82.5, 7, 121.5, 111, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 120, 120, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 170,120);
//.........
$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1.8, 1, 2); // set cell padding
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 6. Contact Information, Declaration, and<br>Signature of the Person Preparing This Appeal/<br>Motion, if Other Than the Applicant or<br>Petitioner</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 133, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(91, 6.5, 113, 158, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.a.&nbsp;&nbsp;&nbsp;</b>Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 0, 112, 165, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_family_lastname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 170);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 0, 120, 177, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_given_firstname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 182);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 188.8, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 194);

//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 6.6, 113, 205, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 213, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 218);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 230);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Preparer\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(90, 0, 112, 238, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 243);
/********************************
 ******** End Page No 3 *********
 ********************************/

/********************************
 ******** Start Page No 4 *******
 ********************************/
$pdf->AddPage('P', 'LETTER');  // page number 5
$pdf->setCellPaddings(1, 1.5, 1, 1.5); // set cell padding
//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 6. Contact Information, Declaration, and<br>
Signature of the Person Preparing This Appeal/<br>
Motion, if Other Than the Applicant or<br>
Petitioner</b>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div>Preparer\'s Certification and Signature </div>';
$pdf->writeHTMLCell(91,5.5, 13,43, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>I certify, under penalty of perjury, that I prepared this appeal or<br>
motion for the applicant or petitioner at their request and with<br>
express consent and that all of the responses and information<br>
contained in and submitted with the appeal or motion are<br>
complete, true, and correct and reflects only information<br>
provided by the applicant or petitioner. The applicant or<br>
petitioner reviewed the responses and information and informed<br>
me that they understand the responses and information in or<br>
submitted with the appeal or motion.</div>';
$pdf->writeHTMLCell(100, 7, 12, 51.5, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 89, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 95, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b></b>Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 20, 103, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_preparer_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70, 104);
/********************************
 ******** End Page No 4 **********
 *********************************/

/********************************
 ******** Start Page No 5 ********
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
$html = '<div>If you need extra space to provide any additional information<br>within this form, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to<br>
complete and file with this form or attach a separate sheet of<br>
paper. Type or print your name and A-Number at the top of<br>
each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item
Number </b> to which your answer refers; and sign and date each<br>
sheet</div>';
$pdf->writeHTMLCell(100, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
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
$pdf->TextField('aditional_info_name_3d', 82.5, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_290b_additional_info_3d')), 21.5, 112);
$pdf->setCellHeightRatio(1.2);

//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 179.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 185);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 179.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 185);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 179.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 185);

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
$pdf->TextField('aditional_info_name_4d', 82.5, 63.4, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_290b_additional_info_4d')), 21.5, 194);
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
$pdf->TextField('i_290B_additional_info_name_5d', 82, 65, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_290b_additional_info_5d')), 122.5, 30.5);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 95.2, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 100.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 95.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 100.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 95.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number3', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 100.5);

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
$pdf->TextField('i_290B_additional_info_name_6d', 82, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_290b_additional_info_6d')), 122.5, 109.5);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 175.9, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_page_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 181.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 175.9, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_part_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 181.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 175.9, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_290B_additional_info_item_number4', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 181.2);

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
$pdf->TextField('i_290B_additional_info_name_7d', 82, 65, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_290b_additional_info_7d')), 122.5, 191);

//..............





$js = "
var fields = {
    'attorney_statebar_number':' $attorneyData->bar_number',
    'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',
    'applicant_family_lastname':' " . showData('petitioner_family_last_name') . "',
    'applicant_given_firstname':' " . showData('petitioner_given_first_name') . "',
    'applicant_middlename':' " . showData('petitioner_middle_name') . "',
    'applicant_date_of_birth':' " . showData('petitioner_date_of_birth') . "',
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
    'part2_5_date_of_the_adverse_decision':' " . showData('i_290b_appeal_or_motion_unfavorable_decision_date') . "',
    'part2_office_that_issued_advarse_decision':' " . showData('i_290b_appeal_or_motion_unfavorable_decision') . "',

//page 2 end....
    'part4_applicant_daytime_telephone':' " . showData('i_290b_applicant_or_petitioner_daytime_tel') . "',
    'part4_applicant_mobile_telephone':' " . showData('i_290b_applicant_or_petitioner_mobile') . "',
    'part4_applicant_email_address':' " . showData('i_290b_applicant_or_petitioner_email') . "',
    'part4_aplicant_signature':' " . showData('i_290b_applicant_or_petitioner_sign_date') . "',
    'part5_interpreter_family_lastname':' " . showData('i_290b_interpreter_family_last_name') . "',
    'part5_interpreter_given_firstname':' " . showData('i_290b_interpreter_given_first_name') . "',
    'part5_interpreter_business_org_name':' " . showData('i_290b_interpreter_business_name') . "',
    'part5_interpreter_daytime_telephone':' " . showData('i_290b_interpreter_daytime_tel') . "',
    'part5_interpreter_mobile_telephone':' " . showData('i_290b_interpreter_mobile') . "',
    'part5_interpreter_email_address':' " . showData('i_290b_interpreter_email') . "',
    'part5_interpreter_certification_fluent_eng':' " . showData('i_290b_interpreter_fluent_english') . "',
    'part5_interpreter_signature':' " . showData('i_290b_interpreter_sign_date') . "',
    'part5_preparer_family_lastname':' " . showData('i_290b_preparer_family_last_name') . "',
    'part5_preparer_given_firstname':' " . showData('i_290b_preparer_given_first_name') . "',
    'part5_preparer_business_org_name':' " . showData('i_290b_preparer_business_name') . "',
    'part5_prepare_daytime_telephone':' " . showData('i_290b_preparer_daytime_tel') . "',
    'part5_prepare_mobile_telephone':' " . showData('i_290b_preparer_mobile') . "',
    'part5_preparer_email_address':' " . showData('i_290b_preparer_email') . "',
//page 3 end......
    'part6_preparer_signature':' " . showData('i_290b_preparer_sign_date') . "',
//page 4 end......
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

//Close and output PDF document
$pdf->Output('I-290b.pdf', 'I');
