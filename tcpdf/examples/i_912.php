<?php
// require_once('formheader.php');
require_once('localconfig.php');

//* Include the main TCPDF library ( search for installation path ).
require_once('tcpdf_include.php');

//* Extend the TCPDF class to create custom Header and Footer

class MyPDF extends TCPDF
{

    // Page header
    public function Header()
    {
        $this->SetY(13);
        if ($this->page > 1) {
            $this->SetLineWidth(2.1);
            $this->SetFillColor(255, 255, 255);
            $this->MultiCell(188.5, 0, '', 'T', 1, 'C', 1, '', 6.5, false, 'T', 'C');
            $this->SetLineWidth(0.1);
            $this->SetFillColor(255, 255, 255);
            $this->MultiCell(190.3, 0, '', 'T', 1, 'C', 1, 12.8, 8.5, false, 'T', 'C');
        }
    }

    // Page footer
    public function Footer()
    {
        //* Position at 15 mm from bottom
        $this->SetY(-16);

        $footer_top_border = array(
            'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
        );
        $this->Cell(190.5, 0, '', $footer_top_border, 1, 1);

        //* Set font
        $this->SetFont('times', '', 9);

        $this->Cell(40, 6.4, 'Form I-912   Edition   04/01/24', 0, 0, 'L');

        $barcode_image = "images/i912/footer-$this->page.png";

        $this->Image($barcode_image, 67.4, 268.7, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 157.5, 268, true);
    }
}

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//* set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-912, Request for Fee Waiver');

//* set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

//* set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//* set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(12.8, 15.3, 12.8, true);

//* set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);
// $pdf->SetAutoPageBreak( TRUE, PDF_MARGIN_BOTTOM );

//* set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

/********************************
 ******** Start Page No 1 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
//* page number 1

//* set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //*array( 255, 255, 255 )
    'module_width' => 2, //* width of a single module in points
    'module_height' => 1 //* height of a single module in points
);

//* Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 6, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(30, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);
//* set font
$pdf->MultiCell(120, 15, 'Request for Fee Waiver', 0, 'C', 0, 1, 48, 6.2, true);

$pdf->SetFont('times', 'B', 11);
//* set font
$pdf->setCellPaddings(2, 4, 6, 0);
//* set cell padding
$pdf->MultiCell(30, 5, 'USCIS  Form I-912', 0, 'C', 0, 1, 174.5, 3.5, true);

$pdf->SetFont('times', 'B', 11);
//* set font
$pdf->MultiCell(80, 15, 'Department of Homeland Security', 0, 'C', 0, 1, 67, 10, true);

$pdf->SetFont('times', '', 10.8);
//* set font
$pdf->MultiCell(80, 15, 'U.S. Citizenship and Immigration Services', 0, 'C', 0, 1, 67, 15, true);

$pdf->SetFont('times', '', 9);
//* set font
$pdf->setCellPaddings(2, 1, 6, 0);
//* set cell padding
$pdf->MultiCell(40, 5, 'OMB No. 1615-0116 Expires: 03/31/2027', 0, 'C', 0, 1, 169, 15.5, true);

$pdf->Ln(1.3);

$top_border = array(
    'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(190, 4, '', $top_border, 1, 1);
//*........
$pdf->setCellPaddings(1, 1, 0, 1);
//* set cell padding
$pdf->SetLineWidth(0.1);
//* set border width
$pdf->SetDrawColor(0, 0, 0);
//* set color for cell border
$pdf->SetFillColor(255, 255, 255);
//* set filling color
$pdf->setCellHeightRatio(1.1);
//* set cell height ratio
$pdf->MultiCell(191.7, 1, '', 'T', 1, 'C', 1, 11.9, 27.80, false, 'T', 'C'); // Single Line

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(190, 31, 13, 31.2, '',  1,  0, false, false, 'C', true);
$pdf->writeHTMLCell(14, 30.6, 13.2, 31.4, '',  'R',  1, true, true, 'L', true); // Right angle
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(14, 30, 13, 37, $html, 0, 1, false, true, 'C', true);

//...........

$pdf->writeHTMLCell(175.8, 7, 27.2, 6, '',  "B",  0, false, false, '', true); // Single Line
$pdf->SetFont('times', '', 10);
$html = '<div><b>Application Receipted At </b>(Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(175, 5, 28, 31.4, $html, 0, 1, false, true, 'C', true);

//...........

$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(1.5, 24, 113.5, 38, '', 'R', 1, false, true, 'L', true); // Right angle
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell(3, 3, 52.5, 40.3, "", 1, 0, false, 'L'); // Custom sell Left side
$pdf->setCellHeightRatio(1.2);

//...........

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(88, 10, 27, 39, 'USCIS Field Office ', '', 1, false, true, 'C', true);
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell(3, 3, 29.5, 46.3, "", 1, 0, false, 'L'); // Custom sell Left side
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(40, 10, 33, 47, 'Fee Waiver Approved', '', 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell(3, 3, 72.5, 46.3, "", 1, 0, false, 'L'); // Custom sell Left side
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(40, 10, 77, 47, 'Fee Waiver Denied', '', 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(3, 3, 140.5, 40.3, "", 1, 0, false, 'L'); // Custom sell right side
$pdf->setCellHeightRatio(1.2);

//...........

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(88, 10, 117, 39, 'USCIS Service Center ', '', 1, false, true, 'C', true);
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell(3, 3, 117.5, 46.3, "", 1, 0, false, 'L'); // Custom sell right side
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(40, 10, 121, 47, 'Fee Waiver Approved', '', 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell(3, 3, 162.5, 46.3, "", 1, 0, false, 'L'); // Custom sell right side
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(40, 10, 167, 47, 'Fee Waiver Denied', '', 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(40, 10, 33, 56, 'Date:   _____________ ', '', 1, false, true, 'L', true);
$pdf->writeHTMLCell(40, 10, 77, 56, 'Date:   _____________ ', '', 1, false, true, 'L', true);
$pdf->writeHTMLCell(40, 10, 121, 56, 'Date:   _____________ ', '', 1, false, true, 'L', true);
$pdf->writeHTMLCell(40, 10, 167, 56, 'Date:   _____________ ', '', 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(100, 6, 'START HERE - Type or print in black ink.', '', 'L', 0, 1, 19.5, 66, true);
$pdf->SetFont('times', '', 10);

$pdf->Image('images/right_angle.jpg', 15, 65.4, 3.3, 3.3);

//...........

$pdf->SetFont('times', '', 11);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->setCellHeightRatio(1.3);
$html = '<div><b>If you need extra space to complete any section of this request or if you would like to provide additional<br>
information about your circumstances, use the space provided in Part 10. Additional Information.<br>
Complete and submit as many copies of Part 10., as necessary, with your request.</b></div>';
$pdf->writeHTMLCell(190, 18, 13, 71, $html, 1, 1, false, false, 'C', true);

//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 1. &nbsp;Basis for Your Request</b> (Each basis is further explained in the <b>Specific Instructions</b> section of the
Form I-912 Instructions)</div>";
$pdf->writeHTMLCell(190, 12, 13, 93, $html, 1, 1, true, false, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = "<div>Select at least one basis or more for which you may qualify and provide supporting documentation for any basis you select. You only<br>
need to qualify and provide documentation for one basis for U.S. Citizenship and Immigration Services (USCIS) to grant your fee<br>
waiver. If you choose, you may select more than one basis. You must provide supporting documentation for each basis you want<br>
considered.</div>";
$pdf->writeHTMLCell(190, 10, 12, 106.6, $html, "", "", false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.</b> </div>';
$pdf->writeHTMLCell(10, 5, 12, 128, $html, 0, 1, false, false, 'J', true);

if (showData('i_912_part_1_basis_for_your_request_1') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><b>A.&nbsp;&nbsp;</b> <input type="checkbox" name="part-1_1" value="Y" checked="' . $checked_data . '" />&nbsp;&nbsp;</div>';
$pdf->writeHTMLCell(10, 5, 17.5, 128.5, $html, 0, 1, false, false, 'J', true);
$html = '<div>I am, my spouse is, or the head of household living in my household is currently receiving a means-tested benefit.
(Complete <b>Parts 2. - 4.</b> and <b>Parts 7. - 9.</b>) </div>';
$pdf->writeHTMLCell(170, 25, 30, 128, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
if (showData('i_912_part_1_basis_for_your_request_2') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><b>B.&nbsp;&nbsp;</b> <input type="checkbox" name="part-1_2" value="Y" checked="' . $checked_data . '" />&nbsp;&nbsp;</div>';
$pdf->writeHTMLCell(10, 5, 17.5, 138.5, $html, 0, 1, false, false, 'J', true);
$html = '<div>My household income is at or below 150 percent of the Federal Poverty Guidelines. (Complete <b>Parts 2. - 3., Part<br>
5.</b>, and <b>Parts 7. - 9.</b>) </div>';
$pdf->writeHTMLCell(170, 25, 30, 138, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
if (showData('i_912_part_1_basis_for_your_request_3') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><b>C.&nbsp;&nbsp;</b> <input type="checkbox" name="part-1_3" value="YES" checked="' . $checked_data . '" />&nbsp;&nbsp;</div>';
$pdf->writeHTMLCell(10, 5, 17.5, 148.5, $html, 0, 1, false, false, 'J', true);
$html = '<div>I have a financial hardship. (Complete <b>Parts 2. -3.</b> and <b>Parts 6. - 9</b>.)</div>';
$pdf->writeHTMLCell(170, 25, 30, 148, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.&nbsp;&nbsp;&nbsp;</b> What is your current immigrant or nonimmigrant status?</div>';
$pdf->writeHTMLCell(100, 5, 12, 154, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_immigrant_nonimmigrant_status', 185, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 160);

//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 2. Information About You (Requestor)</b></div>";
$pdf->writeHTMLCell(190, 6, 13, 171, $html, 1, 0, true, false, 'L', true);

//...........

$pdf->SetFontSize(10);
$html = "<div>Provide information about yourself if you are the person requesting a fee waiver for a petition or application that you are filing for yourself. If you are the parent or legal guardian filing on behalf of a child or person with a developmental or mental impairment,
provide information about the child or person for whom you are filing this form.</div>";
$pdf->writeHTMLCell(190, 10, 12, 178.4, $html, "", "", false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b>';
$pdf->writeHTMLCell(10, 7, 12, 193.5, $html, 0, 0, false, false, 'L', true);

if (showData('i_912_part_2_legal_guardian_status') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><input type="checkbox" name="part-1_2" value="Y" checked="' . $checked_data . '" /></div>';
$pdf->writeHTMLCell(10, 7, 17, 193.5, $html, 0, 1, false, false, 'J', true);
$html = '<div>Check here if you are a parent or legal guardian filing on behalf of the person seeking the fee waiver.</div>';
$pdf->writeHTMLCell(170, 7, 22, 193.5, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp; Full Name';
$pdf->writeHTMLCell(180, 7, 12, 200, $html, 0, 0, false, false, 'L', true);

$pdf->Ln(1);
$pdf->SetFillColor(255, 255, 255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 19, 204, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 204, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 204, $html, 0, 0, false, false, 'L', true);

//...........

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-1_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.4, 211);
$pdf->TextField('part2-1_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 211.3);
$pdf->TextField('part2-1_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 211.5);

//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b> &nbsp;&nbsp;&nbsp; Other Names Used (if any) ';
$pdf->writeHTMLCell(180, 7, 12, 218, $html, 0, 0, false, false, 'L', true);
$html = 'List all other names you have used, including nicknames, aliases, and maiden name.';
$pdf->writeHTMLCell(130, 5, 19, 222.5, $html, 0, 0, false, false, 'L', true);
$pdf->Ln(1);
$pdf->SetFillColor(255, 255, 255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 19, 228, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 228, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 228, $html, 0, 0, false, false, 'L', true);

//...........

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-2_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 236);
$pdf->TextField('part2-2_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 236.3);
$pdf->TextField('part2-2_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 236.5);
$pdf->TextField('part2-2_last_name2', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 243);
$pdf->TextField('part2-2_first_name2', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 243.3);
$pdf->TextField('part2-2_middle_name2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 243.5);

//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. </b>&nbsp;&nbsp;&nbsp; Alien Registration Number (A-Number) (if any)';
$pdf->writeHTMLCell(80, 7, 12, 251, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_about_you_alien_registration_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 31, 256.5);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. </b> USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(80, 7, 96, 251, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_about_you_uscis_online_account_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 256.5);

//...........

$pdf->Image('images/right_angle.jpg', 20.3, 258.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 102.8, 258.5, 3.3, 3.3);

//...........

$pdf->SetFont('times', '', 11); // set font
$html = '<b> A-</b>';
$pdf->writeHTMLCell(80, 7, 23, 256.5, $html, 0, 0, false, false, 'L', true);



/* $pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1,202, 117, false); 
$pdf->StopTransform(); */

/********************************
 ******** End Page No 1 **********
 *********************************/

/********************************
 ******** Start Page No 2 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 2. &nbsp;Information About You (Requestor)</b> (continued)</div>";
$pdf->writeHTMLCell(190, 6, 13, 12.5, $html, 1, 0, true, false, 'L', true);

//...........
$pdf->Image('images/right_angle.jpg', 76.8, 27.2, 3.3, 3.3);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6. </b>&nbsp;&nbsp;&nbsp; Date of Birth (mm/dd/yyyy)';
$pdf->writeHTMLCell(80, 7, 12, 20.2, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_about_you_date_of_birth', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 26.1);

//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7. </b>&nbsp;&nbsp;&nbsp; U.S. Social Security Number (if any)';
$pdf->writeHTMLCell(80, 7, 70, 20.2, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_about_you_social_security_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 82, 26.1);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>8. </b> &nbsp;&nbsp;Marital Status</div>';
$pdf->writeHTMLCell(110, 7, 12, 33, $html, 0, 1, false, 'L');
if (showData('other_information_about_you_marital_status') == 'single')   $single_check = 'checked';
else $single_check = '';
if (showData('other_information_about_you_marital_status') == 'married')  $married_check = 'checked';
else $married_check = '';
if (showData('other_information_about_you_marital_status') == 'divorced') $divorce_check = 'checked';
else $divorce_check = '';
if (showData('other_information_about_you_marital_status') == 'widowed') $widowed_check = 'checked';
else $widowed_check = '';
if (showData('other_information_about_you_marital_status') == 'annulled') $marriage_annulled_check = 'checked';
else $marriage_annulled_check = '';
if (showData('other_information_about_you_marital_status') == 'separated') $separated_check = 'checked';
else $separated_check = '';
if (showData('other_information_about_you_marital_status') == 'other') $other_check = 'checked';
else $other_check = '';

$html = '&nbsp;  &nbsp; <input type="checkbox" name="part2_7meritial_Single" value="single" checked="' . $single_check . '" /> Single,Never Married
   
   &nbsp;   &nbsp; <input type="checkbox" name="part2_7meritial_Married" value="married" checked="' . $married_check . '" /> Married

   &nbsp;   &nbsp; <input type="checkbox" name="part2_7meritial_divorced" value="divorced" checked="' . $divorce_check . '" /> Divorced

   &nbsp;   &nbsp; <input type="checkbox" name="part2_7meritial_widow" value="widowed" checked="' . $widowed_check . '" /> Widowed

   &nbsp;   &nbsp; <input type="checkbox" name="part2_7meritial_merriage" value="marriage_annulled" checked="' . $marriage_annulled_check . '" /> Marriage Annulled

   &nbsp;   &nbsp; <input type="checkbox" name="part2_7meritial_separeted" value="separated" checked="' . $separated_check . '" /> Separated';

$pdf->writeHTMLCell(190, 7, 15, 38, $html, 0, 1, false, true, 'J');
$html = '<div>&nbsp;<input type="checkbox" name="part2_7meritial_other" value="other" checked="' . $other_check . '" />  Other (Explain)</div>';
$pdf->writeHTMLCell(180, 7, 17.5, 44, $html, 0, 1, false, true, 'J');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('marital_status_other_explain', 137, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 50, 44);

//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 3. &nbsp;Applications and Petitions for Which You Are Requesting a Fee Waiver</b></div>";
$pdf->writeHTMLCell(190, 6, 13, 56, $html, 1, 0, true, false, 'L', true);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1. </b> &nbsp; In the table below, add the form numbers of the applications and petitions for which you are requesting a fee waiver.</div>';
$pdf->writeHTMLCell(180, 7, 12, 64, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Applications or Petitions for You and Your Family Members</b></div>";
$pdf->writeHTMLCell(185, 6, 18, 71, $html, 1, 0, true, false, 'C', true);

//...........

$pdf->writeHTMLCell(185, 45.75, 18, 71, "", 1, 0, false, false, 'C', true); //main cell 
$pdf->writeHTMLCell(185, 8, 18, 36.9, "", "B", 0, false, false, 'C', true); //1st line 
$pdf->writeHTMLCell(185, 8, 18, 41.9, "", "B", 0, false, false, 'C', true); //2nd line
$pdf->writeHTMLCell(185, 8, 18, 46.8, "", "B", 0, false, false, 'C', true); //3rd line
$pdf->writeHTMLCell(185, 8, 18, 51.9, "", "B", 0, false, false, 'C', true); //4th line
$pdf->writeHTMLCell(185, 8, 18, 56.7, "", "B", 0, false, false, 'C', true); //5th line

$pdf->setCellHeightRatio(0);

//...........

$pdf->writeHTMLCell(32, 32.1, 27.6, 78, "", "R", 0, false, true, 'L', true); //1st  vertical line
$pdf->writeHTMLCell(32, 25.75, 33, 84.3, "", "R", 0, false, true, 'C', true); //2nd  vertical line
$pdf->writeHTMLCell(1, 31.8, 109.2, 78, "", "R", 0, false, true, 'L', true); //3rd  vertical line
$pdf->writeHTMLCell(1, 31.8, 136.5, 78, "", "R", 0, false, true, 'L', true); //4th  vertical line
$pdf->writeHTMLCell(1, 38.5, 172.5, 78, "", "R", 0, false, true, 'L', true); //5th  vertical line

//...........

$pdf->SetFontSize(11);
$html = "<div><b>A-</b></div>";
$pdf->writeHTMLCell(5, 6, 59.4, 86.4, $html, "", 0, false, false, 'C', true); //A-
$pdf->writeHTMLCell(5, 6, 59.4, 92.2, $html, "", 0, false, false, 'C', true); //A-
$pdf->writeHTMLCell(5, 6, 59.4, 99.4, $html, "", 0, false, false, 'C', true); //A-
$pdf->writeHTMLCell(5, 6, 59.4, 106, $html, "", 0, false, false, 'C', true); //A-

//...........

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(32, 6, 20, 77.8, "Full Name", "", 0, false, false, 'C', true);
$pdf->writeHTMLCell(55, 6, 50, 80.6, "<div><b>A-Number</b>(if any)</div>", "", 0, false, false, 'C', true);
$pdf->writeHTMLCell(55, 6, 95.8, 80.6, "<div><b>Date of Birth</b></div>", "", 0, false, false, 'C', true);
$pdf->writeHTMLCell(55, 6, 128, 80.6, "<div><b>Relationship to You</b></div>", "", 0, false, false, 'C', true);
$pdf->writeHTMLCell(55, 6, 160.2, 80.6, "<div><b>Forms Being Filed</b></div>", "", 0, false, false, 'C', true);
$pdf->writeHTMLCell(75, 6, 93, 112.5, "<div><b>Total Number of Forms </b>(including self)</div>", "", 0, false, false, 'R', true);

//...........

$pdf->SetFont('courier', 'B', 10);

/* 1st Column */

$pdf->TextField('part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name0', 41.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 84.3);
$pdf->TextField('part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name1', 41.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 90.7);
$pdf->TextField('part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name2', 41.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 97.2);
$pdf->TextField('part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name3', 41.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 103.6);

//...........

/* 3nd Column */

$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num0', 45, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 84.3);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num1', 45, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 90.7);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num2', 45, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 97.2);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num3', 45, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 103.6);

/* 4th Column */

$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth0', 27.2, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid', 'alignment' => 'center'), array(), 110.2, 84.3);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth1', 27.2, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid', 'alignment' => 'center'), array(), 110.2, 90.7);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth2', 27.2, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid', 'alignment' => 'center'), array(), 110.2, 97.2);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth3', 27.2, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid', 'alignment' => 'center'), array(), 110.2, 103.6);

/* 5th Column */

$pdf->writeHTMLCell(34.5, 6.5, 137.5, 84.3, "<div>Self</div>", "", 0, false, false, 'C', true);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_relate1', 36, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 137.5, 90.7);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_relate2', 36, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 137.5, 97.2);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_relate3', 36, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 137.5, 103.6);

/* 6th Column */

$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed0', 29.6, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.4, 84.3);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed1', 29.6, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.4, 90.7);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed2', 29.6, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.4, 97.2);
$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed3', 29.6, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.4, 103.6);

$pdf->TextField('part_3_applications_or_petitions_requesting_fee_waiver_family_memb_total_num', 29.6, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.4,  110.1);

/*
$pdf->TextField('part3_fullname2', 32, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 89.1);
$pdf->TextField('part3_fullname3', 32, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 96.1);

$pdf->TextField('part3_input_a_number1', 50, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 76);
$pdf->TextField('part3_input_a_number2', 50, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 82.5);
$pdf->TextField('part3_input_a_number3', 50, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 89.1);
$pdf->TextField('part3_input_a_number4', 50, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 96.1);

$pdf->TextField('part3_input_date_of_birth2', 30, 6.5, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 106.2, 89.1 );
$pdf->TextField('part3_input_date_of_birth3', 30, 6.9, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 106.2, 96.1);
$pdf->TextField('part3_input_date_of_birth4', 30, 6.9, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 106.2, 76);

$pdf->TextField('part3_input_relation_3', 34.5, 6.5, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 136.2, 89.1);
$pdf->TextField('part3_input_relation_4', 34.5, 6.9, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 136.2,  96.1);

$pdf->TextField('part3_input-15', 31.7, 6.5, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1, 82.5);
$pdf->TextField('part3_input-16', 31.7, 6.5, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1, 89.1);
$pdf->TextField('part3_input-17', 31.7, 6.9, array('strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1,  96.1);
*/

//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 4. Means-Tested Benefits</b></div>";
$pdf->writeHTMLCell(190, 6, 13, 123, $html, 1, 0, true, false, 'L', true);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>If you selected <b>Item Number 1.</b> in <b>Part 1.</b>, complete this section.</div>';
$pdf->writeHTMLCell(180, 7, 12, 131, $html, 0, 1, false, 'L');

//...........

$pdf->setFont('Times', 'B', 10);
$html = '<div>1.</div>';
$pdf->writeHTMLCell(180, 7, 12, 137, $html, 0, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html = '<div>If you, your spouse, or the head of household (including parent if the child is under 21 years of age) living with you is receiving<br>
any means-tested benefits, list the information in the table below and attach supporting documentation. If you are the parent or<br>
legal guardian filing on behalf of a child or person with a physical disability or developmental or mental impairment, provide<br>
information about the child or person for whom you are filing this form if he or she is receiving a means-tested benefit</div>';
$pdf->writeHTMLCell(190, 7, 17, 137, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Means-Tested Benefit Recipients</b></div>";
$pdf->writeHTMLCell(185, 6, 18, 157.5, $html, 1, 0, true, false, 'C', true);

//...........

$pdf->writeHTMLCell(185, 59.8, 18, 164.5, '',  1,  0, false, false, 'C', true); //main cell 

/* $pdf->writeHTMLCell( 185, 8, 18, 125.7, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 185, 8, 18, 131.7, '',  "B",  0, false, false, 'C', true );//second line
$pdf->writeHTMLCell( 185, 8, 18, 137.7, '',  "B",  0, false, false, 'C', true );//third line
$pdf->writeHTMLCell( 185, 8, 18, 143.7, '',  "B",  0, false, false, 'C', true );//4th line */

//...........

$pdf->writeHTMLCell("1", "40.6", 54, 164.5, '',  "R",  0, false, true, 'L', true); //1st  vertical line
$pdf->writeHTMLCell("1", "40.6", 78, 164.5, '',  "R",  0, false, true, 'L', true); //1st  vertical line
$pdf->writeHTMLCell("1", "40.6", 118, 164.5, '',  "R",  0, false, true, 'L', true); //1st  vertical line
$pdf->writeHTMLCell("1", "40.6", 145, 164.5, '',  "R",  0, false, true, 'L', true); //1st  vertical line
$pdf->writeHTMLCell("1", "40.6", 170, 164.5, '',  "R",  0, false, true, 'L', true); //1st  vertical line

//...........

$pdf->SetFont('times', 'B', 10);
$html = "<div><b>Full Name of Person<br>Receiving the Benefit</b></div>";
$pdf->writeHTMLCell(42, 6, 16, 164.5, $html, "", 0, false, false, 'C', true);

//...........

$pdf->SetFont('times', 'B', 10);
$html = "<div><b>Relationship<br>to You</b></div>";
$pdf->writeHTMLCell(42, 6, 46, 164.5, $html, "", 0, false, false, 'C', true);

//...........

$pdf->SetFont('times', 'B', 10);
$html = "<div><b>Name of Agency<br>Awarding Benefit</b></div>";
$pdf->writeHTMLCell(42, 6, 76, 164.5, $html, "", 0, false, false, 'C', true);

//...........

$pdf->SetFont('times', 'B', 10);
$html = "<div><b>Type of<br>Benefit</b></div>";
$pdf->writeHTMLCell(42, 6, 112, 164.5, $html, "", 0, false, false, 'C', true);

//...........

$pdf->SetFont('times', 'B', 10);
$html = "<div><b>Date Benefit<br>was Awarded</b></div>";
$pdf->writeHTMLCell(42, 6, 137, 164.5, $html, "", 0, false, false, 'C', true);

//...........

$pdf->SetFont('times', '', 9.7);
$html = "<div><b>Date Benefit Expires</b><br>(or must be renewed)</div>";
$pdf->writeHTMLCell(42, 6, 166, 164.5, $html, "", 0, false, false, 'C', true);

//...........

$pdf->SetFont('courier', 'B', 10);

$pdf->TextField('part4_1_means_test_benefits_full_name1', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 174.9);
$pdf->TextField('part4_1_means_test_benefits_full_name2', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 181);
$pdf->TextField('part4_1_means_test_benefits_full_name3', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 187);
$pdf->TextField('part4_1_means_test_benefits_full_name4', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 193.2);
$pdf->TextField('part4_1_means_test_benefits_full_name5', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 199.4);
$pdf->TextField('part4_1_means_test_benefits_full_name6', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 205.5);
$pdf->TextField('part4_1_means_test_benefits_full_name7', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 211.7);
$pdf->TextField('part4_1_means_test_benefits_full_name8', 37, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 217.8);

//...........

$pdf->TextField('part4_1_means_test_benefits_relate1', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 174.9);
$pdf->TextField('part4_1_means_test_benefits_relate2', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 181);
$pdf->TextField('part4_1_means_test_benefits_relate3', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 187);
$pdf->TextField('part4_1_means_test_benefits_relate4', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 193.2);
$pdf->TextField('part4_1_means_test_benefits_relate5', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 199.4);
$pdf->TextField('part4_1_means_test_benefits_relate6', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 205.5);
$pdf->TextField('part4_1_means_test_benefits_relate7', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 211.7);
$pdf->TextField('part4_1_means_test_benefits_relate8', 23.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.3, 217.8);

//...........

$pdf->TextField('part_4_1_means_test_benefits_agency_award1', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 174.9);
$pdf->TextField('part_4_1_means_test_benefits_agency_award2', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 181);
$pdf->TextField('part_4_1_means_test_benefits_agency_award3', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 187);
$pdf->TextField('part_4_1_means_test_benefits_agency_award4', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 193.2);
$pdf->TextField('part_4_1_means_test_benefits_agency_award5', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 199.4);
$pdf->TextField('part_4_1_means_test_benefits_agency_award6', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 205.5);
$pdf->TextField('part_4_1_means_test_benefits_agency_award7', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 211.7);
$pdf->TextField('part_4_1_means_test_benefits_agency_award8', 39.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 217.8);

//...........

$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit1', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 174.9);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit2', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 181);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit3', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 187);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit4', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 193.2);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit5', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 199.4);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit6', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 205.5);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit7', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 211.7);
$pdf->TextField('part_4_1_means_test_benefits_type_of_benefit8', 27, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119.1, 217.8);

//...........

$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award1', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 174.9);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award2', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 181);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award3', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 187);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award4', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 193.2);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award5', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 199.4);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award6', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 205.5);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award7', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 211.7);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_award8', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146.1, 217.8);

//...........

$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire1', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 174.9);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire2', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 181);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire3', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 187);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire4', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 193.2);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire5', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 199.4);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire6', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 205.5);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire7', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 211.7);
$pdf->TextField('part_4_1_means_test_benefits_date_benefit_expire8', 31.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171.1, 217.8);

/********************************
 ******** End Page No 2 **********
 *********************************/

/********************************
 ******** Start Page No 3 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$html = "<div><b>Part 5. &nbsp;Income at or Below 150 Percent of the Federal Poverty Guidelines</b></div>";
$pdf->writeHTMLCell(190, 6, 13, 12, $html, 1, 0, true, false, 'L', true);

//...........

$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('times', '', 9.7);
$html = '<div>Provide information about your adjusted gross income. See Instructions for more details.<br>
If you selected <b>Item Number 1.B.</b> in <b>Part 1.</b>, complete this section.</div>';
$pdf->writeHTMLCell(190, 10, 12.4, 19, $html, '', 1, false, true, 'L', true);

//...........

$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5);
$pdf->SetFontSize(11.6);
$html = '<div><b><i>Your Employment Status</i></b></div>';
$pdf->writeHTMLCell(190, 5, 13, 36, $html, '', 1, true, false, 'L', true);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1. </b> &nbsp; Employment Status</div>';
$pdf->writeHTMLCell(110, 7, 12, 44, $html, 0, 1, false, 'L');

if (showData('i_912_part_5_income_guidence_emplyment_status_employed') == "Y") $checked_employed = "checked";
else $checked_employed = "";
if (showData('i_912_part_5_income_guidence_emplyment_status_unemployed') == "Y") $checked_unemployed = "checked";
else $checked_unemployed = "";
if (showData('i_912_part_5_income_guidence_emplyment_status_retired') == "Y") $checked_retired = "checked";
else $checked_retired = "";
if (showData('i_912_part_5_income_guidence_emplyment_status_others') == "Y") $checked_others = "checked";
else $checked_others = "";

$html = '&nbsp;  &nbsp;    <input type="checkbox" name="part5-1Employed" value="Employed" checked="' . $checked_employed . '" /> Employed (full-time, part-time,
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-1Unemploye" value="Unemploye" checked="' . $checked_unemployed . '" />Unemployed or
   &nbsp;   &nbsp;  &nbsp; <input type="checkbox"      name="part5-1Retired" value="Retired" checked="' . $checked_retired . '" /> Retired
   &nbsp;   &nbsp;  &nbsp; <input type="checkbox"      name="part5-1Other" value="Other" checked="' . $checked_others . '" /> Other (Explain)';

$pdf->writeHTMLCell(190, 7, 15, 50, $html, 0, 1, false, true, 'J');
$html = '<div>seasonal, self-employed) </div>';
$pdf->writeHTMLCell(180, 7, 23.5, 55, $html, 0, 1, false, true, 'J');
$html = '<div>Not Employed</div>';
$pdf->writeHTMLCell(180, 7, 77.5, 55, $html, 0, 1, false, true, 'J');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('income_federal_poverty_guide_other_exp', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132.8, 55);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b>  &nbsp; If you are currently unemployed, are you currently receiving unemployment benefits?</div>';
$pdf->writeHTMLCell(160, 7, 12, 63, $html, 0, 1, false, 'L');

//...........

if (showData('i_912_part_5_income_continued_2') == "Y") $checked_yes = "checked";
else $checked_yes = "";
if (showData('i_912_part_5_income_continued_2') == "N") $checked_no = "checked";
else $checked_no = "";

$html = '&nbsp;  &nbsp;    <input type="checkbox" name="part5-2" value="Y" checked="' . $checked_yes . '" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-2" value="N" checked="' . $checked_no . '" />No ';

$pdf->writeHTMLCell(190, 4, 174, 63, $html, 0, 1, false, true, 'J');

//...........

$pdf->setFont('Times', '', 10);
$html = '<b>A.</b> &nbsp; Date you became unemployed (mm/dd/yyyy)';
$pdf->writeHTMLCell(190, 5, 18, 70, $html, 0, 1, false, true, 'J');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_input-2a', 47, 7.4, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 69.8);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3. </b>  &nbsp; What is your total household size</div>';
$pdf->writeHTMLCell(160, 7, 12, 78, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_employment_status_total_household_size', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 78.6);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4. </b>  &nbsp; What is the total number of household members earning income including yourself</div>';
$pdf->writeHTMLCell(160, 7, 12, 87, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_employment_status_total_household_earning', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 87);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b>  &nbsp; Name of head of household (if not you):</div>';
$pdf->writeHTMLCell(160, 7, 12, 95.5, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_employment_status_name_of_head_of_household', 123, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 80, 95.5);

//...........

$pdf->SetFont('times', '', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5);
$html = '<div><b><i>Your Annual Household Income</i></b></div>';
$pdf->writeHTMLCell(191, 5, 13, 108, $html, '', 1, true, false, 'L', true);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>Provide information about your adjusted gross income and the adjusted gross income of all family members counted as part of your household. &nbsp;You must list all amounts in U.S. dollars.</div>';
$pdf->writeHTMLCell(190, 4, 12, 115, $html, 0, 1, false, 'L');

//...........

$html = '<div><b>6. </b> &nbsp; Your Annual Adjusted Gross Income</div>';
$pdf->writeHTMLCell(160, 4, 12, 127, $html, 0, 1, false, 'L');
$html = '<div>$</div>';
$pdf->writeHTMLCell(10, 4, 169.5, 127, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_5input', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 127);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>7. </b> &nbsp; Annual Adjusted Gross Income of All Family Members</div>';
$pdf->writeHTMLCell(160, 4, 12, 134.5, $html, 0, 1, false, 'L');
$html = '<div>Provide the annual adjusted gross income of all family members counted as part of your household.
(Do not include the amount provided in <b>Item Number 6.</b>)</div>';
$pdf->writeHTMLCell(144, 4, 18, 140.5, $html, 0, 1, false, 'L');
$html = '<div>$</div>';
$pdf->writeHTMLCell(10, 4, 169.5, 143.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_6input', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 143.5);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>8. </b> &nbsp; Total Adjusted Gross Household Income (add the amounts from <b>Item Numbers 6.</b> and <b>7.</b>)</div>';
$pdf->writeHTMLCell(160, 4, 12, 152.5, $html, 0, 1, false, 'L');
$html = '<div>$</div>';
$pdf->writeHTMLCell(10, 4, 169.5, 152, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_7input', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 152);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>9.</b>';
$pdf->writeHTMLCell(10, 2, 12, 162, $html, 0, 0, false, 'L');

$html = '<div>Has anything changed since the date you filed your Federal tax returns or is there any difference in your
circumstances from the information on your petition? &nbsp;(For example, your marital status, income, or
number of dependents as related to documents provided.)</div>';
$pdf->writeHTMLCell(150, 2, 18, 162, $html, 0, 1, false, 'L');

//...........

if (showData('i_912_part_5_income_continued_federal_poverty_9') == "Y") $checked_yes = "checked";
else $checked_yes = "";
if (showData('i_912_part_5_income_continued_federal_poverty_9') == "N") $checked_no = "checked";
else $checked_no = "";
$html = '&nbsp;  &nbsp;    <input type="checkbox" name="part5-9" value="Y" checked="' . $checked_yes . '" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part5-9" value="N" checked="' . $checked_no . '" />No ';

$pdf->writeHTMLCell(190, 4, 175, 162, $html, 0, 1, false, true, 'J');

//...........

$html = 'If you answered "Yes" <b>to Item Number 9.</b>, provide an explanation below. &nbsp;Provide documentation if available. &nbsp;You may also use this space to provide any additional information about your circumstances that you would like USCIS to consider.';

$pdf->writeHTMLCell(182, 4, 18, 179, $html, 0, 1, false, true, 'L');

//...........

$pdf->writeHTMLCell(184, 1, 19, 183.5, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 188.5, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 193.8, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 199.3, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 204.7, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 210.2, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 215.6, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 221, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 226.5, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 232, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(184, 1, 19, 237.5, '',  "B",  0, false, false, 'C', true);


/********************************
 ******** End Page No 3 **********
 *********************************/

/********************************
 ******** Start Page No 4 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');

//...........

/* $pdf->setFont('Times', '', 10);
$html= '<div><b>8. </b>   Total Household Income (add the amounts from <b>Item Numbers 5., 6.</b>, and<b> 7.</b>)</div>';
$pdf->writeHTMLCell(160, 2, 12, 26, $html, 0, 1, false, 'L');
$html= '<div>$</div>';
$pdf->writeHTMLCell(190, 4, 170, 27, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField( 'part5_8input', 30, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174, 26.8 );*/

//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 6. &nbsp;Financial Hardship</b></div>";
$pdf->writeHTMLCell(190.5, 4, 12.8, 12.5, $html, 1, 0, true, false, 'L', true);

//...........

$pdf->setFont('Times', '', 10);
$html = 'If you selected <b>Item Number 1.C.</b> in <b>Part 1.</b>, complete this section.';
$pdf->writeHTMLCell(190.5, 4, 12, 20.3, $html, 0, 1, false, true, 'L');

//...........

$pdf->setCellHeightRatio(1.2);

$html = '<div><b>1. </b>';
$pdf->writeHTMLCell(10, 7, 12, 26.7, $html, 0, 1, false, true, 'L');

// $pdf->setCellPaddings( 0.5, 0.5, 0, 0 );

$html = '<div>You may also use this space to provide any additional information about your circumstances that you would like U.S. Citizenship
and Immigration Services (USCIS) to consider. &nbsp;If you or any family members have a situation that has caused you to incur
expenses, debts, or loss of income, describe the situation in the box below. &nbsp;Specify the amounts of the expenses, debts, and
income losses in as much detail as possible. &nbsp;This may include homelessness, major medical debt for yourself or a family
member, and natural disasters declaration posted to <a href="www.uscis.gov"><b>www.uscis.gov</b></a>.</div>';
$pdf->writeHTMLCell(183.5, 7, 18.4, 26.7, $html, 0, 1, false, 'L');

//...........

// $pdf->setCellHeightRatio( 1 );
$pdf->setFont('courier', 'B', 10);
$pdf->setCellHeightRatio(1.95);
$pdf->setCellHeightRatio(1.7);
$pdf->TextField('part6_1_input', 184.5, 56, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 0, 'borderStyle' => 'solid'), array('v' => showData('financial_hardship_incur_expenses')), 18.7, 50.4);
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(184.2, 1, 18.8, 51, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 58, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 64, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 70, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 76, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 88, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 94, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(184.2, 1, 18.8, 100, '', "B", 1, false, 'L');
//...........

$pdf->setFont('Times', '', 10);

$html = '<div><b>2. </b>';
$pdf->writeHTMLCell(10, 7, 12, 109.5, $html, 0, 1, false, true, 'L');

$html = '<div>If you have cash or assets that you can quickly convert to cash, list those in the table below. &nbsp;For example, bank accounts, stocks, or bonds. &nbsp;(Do not include retirement accounts.)</div>';
$pdf->writeHTMLCell(183.5, 7, 18.4, 109.5, $html, 0, 1, false, 'L');

//.........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Assets</b></div>";
$pdf->writeHTMLCell(90, 5, 18, 120, $html, 1, 0, true, false, 'C', true);

//...........

$pdf->writeHTMLCell(90, 1, 18, 125, '',  "B",  0, false, false, 'C', true); //1st line 208
$pdf->writeHTMLCell(90, 1, 18, 130, '',  "B",  0, false, false, 'C', true); //1st line 213
$pdf->writeHTMLCell(90, 1, 18, 135, '',  "B",  0, false, false, 'C', true); //1st line 218
$pdf->writeHTMLCell(90, 1, 18, 140, '',  "B",  0, false, false, 'C', true); //1st line 223
$pdf->writeHTMLCell(90, 1, 18, 145, '',  "B",  0, false, false, 'C', true); //1st line 228
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell(2, 33.5, 16, 126, '',  "R",  0, false, true, 'L', true); //1st line 209
$pdf->writeHTMLCell(2, 32.5, 60, 127, '',  "R",  0, false, true, 'L', true); //1st line 210
$pdf->writeHTMLCell(2, 33.5, 106, 126, '',  "R",  0, false, true, 'L', true); //1st line 209
$pdf->SetFontSize(9.7);
$html = "<div><b>Type of Asset</b></div>";
$pdf->writeHTMLCell(30, 2, 25, 129, $html, "", 0, false, true, 'C', true); //212
$html = "<div><b>Value </b>(U.S. Dollars)</div>";
$pdf->writeHTMLCell(30, 2, 68, 129, $html, "", 0, false, true, 'C', true); //212
$html = "<div><b>Total Value of Assets</b></div>";
$pdf->writeHTMLCell(40, 2, 25, 155, $html, "", 0, false, true, 'C', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_1_input_2_table_cell_type_asset1', 44, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 133.5);
$pdf->TextField('part6_1_input_2_table_cell_type_asset2', 44, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 140);
$pdf->TextField('part6_1_input_2_table_cell_type_asset3', 44, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 146.5);
$pdf->TextField('part6_1_input_2_table_cell_value_us1', 46, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 133.5);
$pdf->TextField('part6_1_input_2_table_cell_value_us2', 46, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 140);
$pdf->TextField('part6_1_input_2_table_cell_value_us3', 46, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 146.5);

//...........
$pdf->setCellHeightRatio(1.2);

$pdf->setFont('Times', '', 10);
$html = '<div><b>3. </b> &nbsp; Total Monthly Expenses and Liabilities</div>';
$pdf->writeHTMLCell(160, 2, 12, 161.5, $html, 0, 1, false, 'L');

//...........

$html = '$';
$pdf->writeHTMLCell(190, 4, 170, 162, $html, 0, 1, false, true, 'J');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3_input', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.1, 161.2); //25.7

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>Provide the total monthly amount of your expenses and liabilities. &nbsp;You must add all of the expense and liability amounts and type<br>
or print the total amount in the space provided. &nbsp;Type or print "0" in the total box if there are none. &nbsp;Select the types of expenses or<br>
liabilities you have each month and provide evidence of monthly payments, where possible.</div>';
$pdf->writeHTMLCell(190, 7, 18, 168, $html, 0, 1, false, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Rent") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-1" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 183, $html, 0, 1, false, true, 'J');
$html = '<div>Rent and/or Mortgage</div>';
$pdf->writeHTMLCell(50, 2, 23, 183, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Food") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-2" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 189, $html, 0, 1, false, true, 'J');
$html = '<div>Food</div>';
$pdf->writeHTMLCell(50, 2, 23, 189, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Utilities") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-3" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 195, $html, 0, 1, false, true, 'J');
$html = '<div>Utilities</div>';
$pdf->writeHTMLCell(50, 2, 23, 195, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Child Care") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-4" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 201, $html, 0, 1, false, true, 'J');
$html = '<div>Child and/or Elder Care</div>';
$pdf->writeHTMLCell(50, 2, 23, 201, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Insurance") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-5" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 207, $html, 0, 1, false, true, 'J');
$html = '<div>Insurance</div>';
$pdf->writeHTMLCell(50, 2, 23, 207, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Loans") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-6" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 63,  183, $html, 0, 1, false, true, 'J');
$html = '<div>Loans and/or Credit Cards</div>';
$pdf->writeHTMLCell(50, 2, 69,  183, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Car Payment") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-7" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 63, 189, $html, 0, 1, false, true, 'J');
$html = '<div>Car Payment</div>';
$pdf->writeHTMLCell(50, 2, 69, 189, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Commuting Costs") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-8" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 63, 195, $html, 0, 1, false, true, 'J');
$html = '<div>Commuting Costs</div>';
$pdf->writeHTMLCell(50, 2, 69, 195, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Medical Expenses") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-9" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 63, 201, $html, 0, 1, false, true, 'J');
$html = '<div>Medical Expenses</div>';
$pdf->writeHTMLCell(50, 2, 69, 201, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "School Expenses") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-10" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 63, 207, $html, 0, 1, false, true, 'J');
$html = '<div>School Expenses</div>';
$pdf->writeHTMLCell(50, 2, 69, 207, $html, 0, 1, false, true, 'L');

//...........

if (showData('i_912_part_6_financial_hardship_3') == "Other") $checked_data = "checked";
else $checked_data = "";
$html = '<input type="checkbox" name="part6-3-checkBox-11" value="Y" checked="' . $checked_data . '" /><br>';
$pdf->writeHTMLCell(2, 2, 112,  183, $html, 0, 1, false, true, 'J');
$html = '<div>Other</div>';
$pdf->writeHTMLCell(50, 2, 118,  183, $html, 0, 1, false, true, 'L');

//...........

$pdf->writeHTMLCell(79, 1, 118, 189, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(79, 1, 118, 194, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(79, 1, 118, 199, '',  "B",  0, false, false, 'C', true);
$pdf->writeHTMLCell(79, 1, 118, 204, '',  "B",  0, false, false, 'C', true);

$pdf->setCellHeightRatio(1.8);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_part_6_financial_hardship_chkbox_other', 80, 26, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 0, 'borderStyle' => 'solid'), array('v' => showData('i_912_part_6_financial_hardship_chkbox_other')), 118, 190);

/********************************
 ******** End Page No 4 **********
 *********************************/

/********************************
 ******** Start Page No 5 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 7. &nbsp;Requestor's Statement, Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(190.5, 6, 13, 12.5, $html, 1, 0, true, false, 'L', true);

//...........
$pdf->setFont('Times', '', 10);
//...........

$html = '<div>The person whose information is provided in <b>Part 2</b>. may sign on behalf of the entire household. &nbsp;If the person listed in <b>Part 2</b>. is
under 14 years of age, a parent or legal guardian may sign on their behalf.</div>';
$pdf->writeHTMLCell(190, 7, 12, 20.3, $html, 0, 1, false, 'L');

//...........

$html = '<div><b>NOTE:</b> &nbsp;Read the <b>Penalties</b> section of the Form I-912 Instructions before completing this part.</div>';
$pdf->writeHTMLCell(190, 7, 12, 31, $html, 0, 1, false, 'L');

//...........

$html = '<div>Select the box for either <b>Item A.</b> or <b>B.</b> in <b>Item Number 1.</b> &nbsp;If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 37, $html, 0, 1, false, 'L');

//...........

$html = "<div><b>1. </b> &nbsp; Requestor's Statement Regarding the Interpreter</div>";
$pdf->writeHTMLCell(160, 2, 12, 44, $html, 0, 1, false, 'L');

//...........

if (showData('i_912_part_7_financial_hardship_1a') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><b>A.  </b>  <input type="checkbox" name="part7-1-checkBox-A" value="Y" checked="' . $checked_data . '" /> &nbsp;  I can read and understand English, 
and I have read and understand every question and instruction on this request and my<br>
</div>';
$pdf->writeHTMLCell(190, 7, 18, 50,  $html, 0, 1, false, 'L');
$html = '<div>answer to every question.</div>';
$pdf->writeHTMLCell(190, 7, 31, 54,  $html, 0, 1, false, 'L');

//...........
$pdf->setCellHeightRatio(1.3);

if (showData('i_912_part_7_financial_hardship_1b') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><b>B.  </b>  <input type="checkbox" name="part7-1-checkBox-B" value="Y" checked="' . $checked_data . '" />  &nbsp; The interpreter named in <b>Part 8</b>. read to me every question and instruction on this request and my answer to every</div>';
$pdf->writeHTMLCell(190, 7, 18, 61,  $html, 0, 1, false, 'L');

$pdf->writeHTMLCell(20, 7, 31, 66, "question in", 0, 0, false, 'L');
$pdf->writeHTMLCell(170, 7, 155.2, 66, ", a language in which I am fluent,", 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_1_ckbox_b', 107, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48.5, 66.4);

//...........

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(190, 7, 31, 71.5, "and I understood everything.", 0, 1, false, 'L');


//...........

$html = "<div><b>2.  </b> &nbsp; Requestor's Statement Regarding the Preparer (if applicable)</b></div>";
$pdf->writeHTMLCell(190, 7, 12, 77,  $html, 0, 1, false, 'L');

//...........

if (showData('i_912_part_7_financial_hardship_2') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div><input type="checkbox" name="part7-2-checkBox" value="Y" checked="' . $checked_data . '" />&nbsp;  At my request, the preparer named in <b>Part 9.</b>, <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; prepared this request for me based only upon information I provided or authorized.</div>';
$pdf->writeHTMLCell(190, 7, 18, 84,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_1_ckbox', 104, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 92, 82.5);

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(5, 6, 196.2, 82.5, ",", "", 1, false, 'L');

//...........

$pdf->setCellPaddings(1.5, 0.5, 0, 1);
$pdf->setFont('Times', 'I', 12);
$html = "<div><b>Requestor's Contact Information</b></div>";
$pdf->writeHTMLCell(190.5, 5, 12.5, 97,  $html, 0, 1, true, 'L');
$pdf->setCellPaddings(0.5, 0.5, 0, 1);

//...........



$pdf->setFont('Times', '', 10);
$html = '<div><b>3.  </b> Requestor\'s Daytime Telephone Number</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 104.5,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_7-3_requestor_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 109.5);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.  </b> Requestor\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 104.5,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_7-4_requestor_contact_mobile_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 109.5);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.  </b> Requestor\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 118,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_7-5_requestor_contact_email_address', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 123.5);

//...........

$pdf->setFont('Times', 'I', 12);
$html = '<div>&nbsp;<b>Requestor\'s Certification</b></div>';
$pdf->writeHTMLCell(190, 7, 12.5, 133,  $html, 0, 1, true, 'L');

//...........




$pdf->setCellHeightRatio(1.2);

$pdf->setFont('Times', '', 10);
$html = '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
require that I submit original documents to USCIS at a later date. &nbsp;Furthermore, I authorize the release of any information from any of
my records that USCIS may need to determine my eligibility for the immigration benefit I seek.</div>';
$pdf->writeHTMLCell(190.8, 7, 12, 141,  $html, 0, 1, false, 'L');
$html = '<div>I further authorize release of information contained in this request, in supporting documents, and in my USCIS records to other entities
and persons where necessary for the administration and enforcement of U.S. immigration laws.</div>';
$pdf->writeHTMLCell(191, 7, 12, 155.6,  $html, 0, 1, false, 'L');
$html = '<div>I certify, under penalty of perjury, that I provided or authorized all of the information in my request, I understand all of the
information contained in, and submitted with, my request, and that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(190.8, 7, 12, 166,  $html, 0, 1, false, 'L');
$html = '<div>I certify that the information provided by the requestor in <b>Part 7</b>. applies to the household members identified in <b>Part 3</b>.</div>';
$pdf->writeHTMLCell(190.8, 7, 12, 177,  $html, 0, 1, false, 'L');
$html = '<div><b>WARNING:</b> &nbsp;If you knowingly and willfully falsify or conceal a material fact or submit a false document with your Form I-912,
USCIS will deny your fee waiver request and may deny any other immigration benefit. &nbsp;In addition, you may face severe penalties
provided by law and may be subject to criminal prosecution.</div>';
$pdf->writeHTMLCell(190.8, 7, 12, 183,  $html, 0, 1, false, 'L');





//...........

$pdf->setFont('Times', 'I', 12);
$html = '<div><b>Requestor\'s Signature</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 200,  $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = "<div><b>6.      </b> &nbsp; Requestor's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 208.5, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(135, 7, 19, 214, '', 1, 1, false, 'L'); // box
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 212, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 154, 208.5, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_6_signature', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 214);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE TO ALL REQUESTORS</b>: &nbsp;If you do not completely fill out this request or fail to submit required documents listed in the
Instructions, USCIS may deny your request.</div>';
$pdf->writeHTMLCell(190, 7, 12, 221.5,  $html, 0, 1, false, 'L');









/********************************
 ******** End Page No 5 **********
 *********************************/

/********************************
 ******** Start Page No 6 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 8. &nbsp;Interpreter's Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 12.5, $html, 1, 0, true, false, 'L', true);

//...........

$pdf->setFont('Times', '', 10);
$html = "<div>Provide the following information about the interpreter.</div>";
$pdf->writeHTMLCell(195, 7, 12, 20.3, $html, 0, 1, false, 'L');

//...........

$pdf->setFont('Times', 'I', 12);
$html = '<div>&nbsp;<b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(190, 5, 13, 30,  $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.</b> &nbsp;&nbsp; Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 37.5, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_family_last_name', 92.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 42.5);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 114, 37.5, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_family_given_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113.8, 42.5);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2.</b> &nbsp;&nbsp; Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 50, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_business_name', 92.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 55);

//...........

$pdf->setFont('Times', 'BI', 12);
//$pdf->setCellPaddings(1, 1, 1, 1); 
$html = '<div>&nbsp;Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 65, $html, 0, 1, true, 'L');
$pdf->SetFont('times', 'IB', 8);
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><I><b>(USPS ZIP Code Lookup)</b></I></a></div>';
$pdf->writeHTMLCell(90, 1, 169, 67.5, $html, 0, 1, false);
// $pdf->writeHTMLCell( 90, 1, 113, 67.5, $html, 0, 1, true, false, 'R', true );

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 73, $html, 0, 1, false, 'L');

$html = '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 73, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 78.5);

if (showData('i_912_interpreter_mailing_address_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_912_interpreter_mailing_address_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_912_interpreter_mailing_address_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";

$pdf->setFont('Times', '', 10.5);
$html = '<div>  <input type="checkbox" name="apt9" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 78.5, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="ste9" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 78.5, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="flr9" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 78.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_apt_ste_flr_value', 17.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 187, 78.5);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 86, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 155, 86, $html, 0, 1, false, 'L');

$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 180, 86, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 91);

$html = '<select name="i_912_interpreter_mailing_address_state" size="0.25">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 155, 91, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_zip_code', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180, 91);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div>Province</div>';
$pdf->writeHTMLCell(80, 7, 20, 99, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_province', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 104);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 99, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_postal_code', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 104);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 133, 99, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mailing_address_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 133, 104);

//...........

$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 114, $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div><b>4.  </b> &nbsp;Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 122.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_daytime_tel', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 127.5);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div><b>5.  </b> Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 122.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_mobile', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 127.5);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div><b>6  </b> &nbsp;Interpreter\'s  Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 135, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_email', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 140);

//...........

$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 151, $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 9.8);
$html = '<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(191, 7, 12, 159, $html, 0, 1, false, 'L');
$pdf->setFont('Times', '', 9.8);
$html = '<div>I am fluent in English and</div>';
$pdf->writeHTMLCell(191, 7, 12, 166, $html, 0, 1, false, 'L');
$html = '<div>, which is the same language specified</div>';
$pdf->writeHTMLCell(191, 7, 150, 166, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_certification_language_skill', 100, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 50.6, 165.5);
$pdf->setFont('Times', '', 10);
$html = "<div>in <b>Part 7., Item B. in Item Number 1</b>., and I have read to this requestor in the identified language every question and instruction on<br>
this request and his or her answer to every question. &nbsp;The requestor informed me that he or she understands every instruction, question,<br>
and answer on the request, including the <b>Applicant's Certification</b>, and has verified the accuracy of every answer. </div>";
$pdf->writeHTMLCell(195, 7, 12, 171, $html, 0, 1, false, 'L');

//...........

$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 188, $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = "<div><b>7.      </b> &nbsp; Interpreter's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 195.5, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(134, 7, 20, 200.5, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 198.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 156, 195.5, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_interpreter_sign_date', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 200.5);

/********************************
 ******** End Page No 7 **********
 *********************************/

/********************************
 ******** Start Page No 8 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(0.5, 0.5, 0, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 9. Contact Information, Declaration, and Signature of the Person Preparing this Request, if Other
Than the Requestor</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 12.5, $html, 1, 0, true, false, 'L', true);

//...........

//...........

$pdf->setFont('Times', '', 10);
$html = "<div>Provide the following information about the preparer for (if applicable).</div>";
$pdf->writeHTMLCell(195, 7, 12, 25, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);

/* $pdf->TextField('i_912_preparer_note_for_family_member', 103, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 100, 56); */

//...........

$pdf->setFont('Times', 'I', 12);
$html = '<div>&nbsp;<b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 34,  $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1</b> &nbsp;  &nbsp; Preparer\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(95, 7, 12, 42, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_family_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 47);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 114, 42, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_family_given_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113.8, 47);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 55, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_business_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 60);

//...........

$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1);
$html = '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 70, $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.    </b> &nbsp;Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 77, $html, 0, 1, false, 'L');

$html = '<div> &nbsp;Apt. &nbsp; Ste. &nbsp;  &nbsp; Flr. &nbsp; &nbsp; Number</div>';
$pdf->writeHTMLCell(95, 7, 155, 77, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_street_number', 137, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 82.5);

if (showData('i_912_preparer_mailing_address_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_912_preparer_mailing_address_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_912_preparer_mailing_address_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";

$pdf->setFont('Times', '', 10);
$html = '<div>  <input type="checkbox" name="apt10" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 157, 82.5, $html, 0, 1, false, 'L');
$html = '<div>  <input type="checkbox" name="ste10" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 82.5, $html, 0, 1, false, 'L');
$html = '<div>  <input type="checkbox" name="flr10" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 174, 82.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_apt_ste_flr_value', 19.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 82.5);

//...........

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 18, 90, '<div>City or Town</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 157, 90, '<div>State</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 174, 90, '<div>ZIP Code</div>', 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_city_town', 137, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 95);

$html = '<select name="i_912_preparer_mailing_address_state" size="0.25">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(27, 5, 157, 95, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_zip_code', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 174, 95);

//...........

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 18, 102.5, '<div>Province</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 108);

//...........

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(70, 7, 79, 102.5, '<div>Postal Code</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_postal_code', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 80, 108);

//...........

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 134, 102.5, '<div>Country</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mailing_address_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 135, 108);

//...........




$pdf->setFont('Times', 'I', 11.6);
$html = '<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 118.5, $html, 0, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div><b>4.  </b> Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 125.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_daytime_tel', 87, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 131.5);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div><b>5.  </b> Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 110, 125.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_mobile', 87, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 117, 131.5);

//...........

$pdf->setFont('Times', '', 10.5);
$html = '<div><b>6.  </b> Preparer\'s  Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 138.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_email', 87, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 144);

//...........

$pdf->setFont('Times', 'I', 11.6);
$pdf->writeHTMLCell(191, 7, 13, 154, "<div><b>Preparer's Statement</b></div>", 0, 1, true, 'L');

//...........
$pdf->setFont('Times', '', 10); // set font

if (showData('i_912_part_10_preparer_statment_9a') == "Y") $checked_data = "checked";
else $checked_data = "";
if (showData('i_912_preparer_statement_7b_extend') == "Y") $checkbox_extend_status = "checked";
else $checkbox_extend_status = "";
if (showData('i_912_preparer_statement_7b_not_extend') == "Y") $checkbox_not_extend_status = "checked";
else $checkbox_not_extend_status = "";

$html = '<div><b>7.    &nbsp;&nbsp;   A.     </b>     <input type="checkbox" name="part10_9A" value="Y" checked="' . $checked_data . '" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 1, false, 'L');
$html = '<div>I am not an attorney or accredited representative but have prepared this request on behalf of the<br>
requestor and with the requestor\'s consent.</div>';
$pdf->writeHTMLCell(180, 7, 30, 162, $html, 0, 1, false, 'L');

if (showData('i_912_part_10_preparer_statment_9b') == "Y") $checked_data = "checked";
else $checked_data = "";
$html = '<div>&nbsp;<b>B.     </b>     <input type="checkbox" name="part10_9B" value="Y" checked="' . $checked_data . '" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 172, $html, 0, 1, false, 'L');

$html = '<div>I am an attorney or accredited representative and my representation of the requestor in this case<br>
<input type="checkbox" name="a" value="Y" checked="' . $checkbox_extend_status . '" /> extends <input type="checkbox" name="b" value="Y" checked="' . $checkbox_not_extend_status . '" /> does not extend beyond the preparation of this request.</div>';
$pdf->writeHTMLCell(190, 7, 30, 172, $html, 0, 1, false, 'L');

/* $pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3.5, 3.5, 28, 177, "", 1, 0, false, 'L');//!Custom sell
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3.5, 3.5, 45.5, 177, "", 1, 0, false, 'L');//!Custom sell */
$pdf->setCellHeightRatio(1.2);
$html = '<div><b>NOTE:</b> If you are an attorney or accredited representative, you may be obliged to submit a<br>
completed Form G-28, Notice of Entry of Appearance as Attorney or Accredited Representative,<br>
or G-28I, Notice of Entry of Appearance as Attorney In Matters Outside the Geographical<br>
Confines of the United States, with this request.</div>';
$pdf->writeHTMLCell(150, 17, 30, 183, $html, 0, 1, false, 'L');

//...........

$pdf->setFont('Times', 'BI', 12); // set font
$html = '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(191, 7, 13, 205, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10); // set font
$html = "<div>By my signature, I certify, under penalty of perjury, that I prepared this request at the request of the requestor. The requestor then
reviewed this completed request and informed me that he or she understands all of the information contained in, and submitted with,<br>
his or her request, including the <b>Applicant's Certification</b>, and that all of this information is complete, true, and correct. I completed<br>
this request based only on information that the requestor provided to me or authorized me to obtain or use.</div>";
$pdf->writeHTMLCell(195, 7, 12, 212, $html, 0, 1, false, 'L');

$pdf->setFont('Times', 'BI', 12); // set font
$html = '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(190, 7, 13, 234, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html = "<div><b>8.      </b>  &nbsp; Preparer's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 242, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(134, 7, 20, 248, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 245, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

//...........

$pdf->setFont('Times', '', 10);
$html = '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 156, 242, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_preparer_sign_date', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 157, 248);




/********************************
 ******** End Page No 8 **********
 *********************************/

/********************************
 ******** Start Page No 9 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 11. Additional Information </b></div>';
$pdf->writeHTMLCell(190, 6.5, 13, 19, $html, 1, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.<br>
Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item</b><br>
<b>Number</b> to which your answer refers; and sign and date each sheet. ', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 96.5, 46, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 156, 46, 'Middle Name', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_additional_info_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('i_912_additional_info_first_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 51);
$pdf->TextField('i_912_additional_info_middle_name', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 157, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>A-</b>', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 50, 61, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 61, 60);


//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 50, 67, '<b>B.</b>&nbsp;&nbsp;Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 81, 67, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 18, 81, '<b>D.</b>', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_additional_info_3a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 72);
$pdf->TextField('i_912_additional_info_3b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 72);
$pdf->TextField('i_912_additional_info_3c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_912_additional_info_3d', 180, 27, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_912_additional_info_3d')), 24, 81);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(179.2, 1, 24.2, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 89, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 95.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 102, '', "B", 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 110.4, '<b>4.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 50, 110.4, '<b>B.</b>&nbsp;&nbsp;Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 81, 110.4, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 18, 125, '<b>D.</b>', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_additional_info_4a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 116);
$pdf->TextField('i_912_additional_info_4b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 116);
$pdf->TextField('i_912_additional_info_4c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 116);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_912_additional_info_4d', 180, 27, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_912_additional_info_4d')), 24, 125.2);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(179.2, 1, 24.2, 126.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 133, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 139.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 146, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 153.4, '<b>5.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 50, 153.4, '<b>B.</b>&nbsp;&nbsp;Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 81, 153.4, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 18, 167, '<b>D.</b>', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_additional_info_5a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 158.4);
$pdf->TextField('i_912_additional_info_5b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 158.4);
$pdf->TextField('i_912_additional_info_5c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 158.4);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_912_additional_info_5d', 180, 26, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_912_additional_info_5d')), 24, 167.4);
$pdf->setCellHeightRatio(1.5);

//.................
$pdf->writeHTMLCell(179.2, 1, 24.2, 167, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 173.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 179.7, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 185.7, '', "B", 1, false, 'L');

//..............
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 195.5, '<b>6.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 50, 195.5, '<b>B.</b>&nbsp;&nbsp;Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 81, 195.5, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 18, 208.5, '<b>D.</b>', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_912_additional_info_6a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 200.4);
$pdf->TextField('i_912_additional_info_6b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 200.4);
$pdf->TextField('i_912_additional_info_6c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 200.4);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_912_additional_info_6d', 180, 26, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_912_additional_info_6d')), 24, 209.7);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(179.2, 1, 24.2, 210, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 216.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 223, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(179.2, 1, 24.2, 229.3, '', "B", 1, false, 'L');
//...........

$js = "
var fields = {

'current_immigrant_nonimmigrant_status':' " . showData('current_immigrant_nonimmigrant_status') . "',

'part2-1_last_name':' " . showData('information_about_you_family_last_name') . "',
'part2-1_first_name':' " . showData('information_about_you_given_first_name') . "',
'part2-1_middle_name':' " . showData('information_about_you_middle_name') . "  ',

'part2-2_last_name':' " . showData('information_about_you_other_family_last_name') . "',
'part2-2_first_name':' " . showData('information_about_you_other_given_first_name') . "',
'part2-2_middle_name':' " . showData('information_about_you_other_middle_name') . "',

'part2-2_last_name2':' " . showData('information_about_you_other_family_last_name2') . "',
'part2-2_first_name2':' " . showData('information_about_you_other_given_first_name2') . "',
'part2-2_middle_name2':' " . showData('information_about_you_other_middle_name2') . "',

'marital_status_other_explain':' " . showData('other_information_about_you_marital_explain') . "',

'other_information_about_you_alien_registration_number':' " . showData('other_information_about_you_alien_registration_number') . "',
'other_information_about_you_uscis_online_account_number':' " . showData('other_information_about_you_uscis_online_account_number') . "',
'other_information_about_you_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . "',
'other_information_about_you_social_security_number':' " . showData('other_information_about_you_social_security_number') . "',







'part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name0':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '0') . "',
'part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name1':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '1') . "',
'part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name2':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '2') . "',
'part3_applications_or_petitions_requesting_fee_waiver_family_memb_full_name3':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '3') . "',

'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num0':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '0') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num1':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '1') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num2':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '2') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_a_num3':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '3') . "',

'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth0':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '0') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth1':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '1') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth2':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '2') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth3':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '3') . "',

'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_relate1':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_relate', '0') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_relate2':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_relate', '1') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_relate3':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_relate', '2') . "',

'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed0':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '0') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed1':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '1') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed2':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '2') . "',
'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed3':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '3') . "',

'part_3_applications_or_petitions_requesting_fee_waiver_family_memb_total_num':' " . showData('applications_or_petitions_requesting_fee_waiver_family_memb_total_num') . "',

'part4_1_means_test_benefits_full_name1':' " . showData('means_test_benefits_full_name', '0') . "',
'part4_1_means_test_benefits_full_name2':' " . showData('means_test_benefits_full_name', '1') . "',
'part4_1_means_test_benefits_full_name3':' " . showData('means_test_benefits_full_name', '2') . "',
'part4_1_means_test_benefits_full_name4':' " . showData('means_test_benefits_full_name', '3') . "',
'part4_1_means_test_benefits_full_name5':' " . showData('means_test_benefits_full_name', '4') . "',
'part4_1_means_test_benefits_full_name6':' " . showData('means_test_benefits_full_name', '5') . "',
'part4_1_means_test_benefits_full_name7':' " . showData('means_test_benefits_full_name', '6') . "',
'part4_1_means_test_benefits_full_name8':' " . showData('means_test_benefits_full_name', '7') . "',

'part4_1_means_test_benefits_relate1':' " . showData('means_test_benefits_relate', '0') . "',
'part4_1_means_test_benefits_relate2':' " . showData('means_test_benefits_relate', '1') . "',
'part4_1_means_test_benefits_relate3':' " . showData('means_test_benefits_relate', '2') . "',
'part4_1_means_test_benefits_relate4':' " . showData('means_test_benefits_relate', '3') . "',
'part4_1_means_test_benefits_relate5':' " . showData('means_test_benefits_relate', '4') . "',
'part4_1_means_test_benefits_relate6':' " . showData('means_test_benefits_relate', '5') . "',
'part4_1_means_test_benefits_relate7':' " . showData('means_test_benefits_relate', '6') . "',
'part4_1_means_test_benefits_relate8':' " . showData('means_test_benefits_relate', '7') . "',

'part_4_1_means_test_benefits_agency_award1':' " . showData('means_test_benefits_agency_award', '0') . "',
'part_4_1_means_test_benefits_agency_award2':' " . showData('means_test_benefits_agency_award', '1') . "',
'part_4_1_means_test_benefits_agency_award3':' " . showData('means_test_benefits_agency_award', '2') . "',
'part_4_1_means_test_benefits_agency_award4':' " . showData('means_test_benefits_agency_award', '3') . "',
'part_4_1_means_test_benefits_agency_award5':' " . showData('means_test_benefits_agency_award', '4') . "',
'part_4_1_means_test_benefits_agency_award6':' " . showData('means_test_benefits_agency_award', '5') . "',
'part_4_1_means_test_benefits_agency_award7':' " . showData('means_test_benefits_agency_award', '6') . "',
'part_4_1_means_test_benefits_agency_award8':' " . showData('means_test_benefits_agency_award', '7') . "',

'part_4_1_means_test_benefits_type_of_benefit1':' " . showData('means_test_benefits_type_of_benefit', '0') . "',
'part_4_1_means_test_benefits_type_of_benefit2':' " . showData('means_test_benefits_type_of_benefit', '1') . "',
'part_4_1_means_test_benefits_type_of_benefit3':' " . showData('means_test_benefits_type_of_benefit', '2') . "',
'part_4_1_means_test_benefits_type_of_benefit4':' " . showData('means_test_benefits_type_of_benefit', '3') . "',
'part_4_1_means_test_benefits_type_of_benefit5':' " . showData('means_test_benefits_type_of_benefit', '4') . "',
'part_4_1_means_test_benefits_type_of_benefit6':' " . showData('means_test_benefits_type_of_benefit', '5') . "',
'part_4_1_means_test_benefits_type_of_benefit7':' " . showData('means_test_benefits_type_of_benefit', '6') . "',
'part_4_1_means_test_benefits_type_of_benefit8':' " . showData('means_test_benefits_type_of_benefit', '7') . "',

'part_4_1_means_test_benefits_date_benefit_award1':' " . showData('means_test_benefits_date_benefit_award', '0') . "',
'part_4_1_means_test_benefits_date_benefit_award2':' " . showData('means_test_benefits_date_benefit_award', '1') . "',
'part_4_1_means_test_benefits_date_benefit_award3':' " . showData('means_test_benefits_date_benefit_award', '2') . "',
'part_4_1_means_test_benefits_date_benefit_award4':' " . showData('means_test_benefits_date_benefit_award', '3') . "',
'part_4_1_means_test_benefits_date_benefit_award5':' " . showData('means_test_benefits_date_benefit_award', '4') . "',
'part_4_1_means_test_benefits_date_benefit_award6':' " . showData('means_test_benefits_date_benefit_award', '5') . "',
'part_4_1_means_test_benefits_date_benefit_award7':' " . showData('means_test_benefits_date_benefit_award', '6') . "',
'part_4_1_means_test_benefits_date_benefit_award8':' " . showData('means_test_benefits_date_benefit_award', '7') . "',

'part_4_1_means_test_benefits_date_benefit_expire1':' " . showData('means_test_benefits_date_benefit_expire', '0') . "',
'part_4_1_means_test_benefits_date_benefit_expire2':' " . showData('means_test_benefits_date_benefit_expire', '1') . "',
'part_4_1_means_test_benefits_date_benefit_expire3':' " . showData('means_test_benefits_date_benefit_expire', '2') . "',
'part_4_1_means_test_benefits_date_benefit_expire4':' " . showData('means_test_benefits_date_benefit_expire', '3') . "',
'part_4_1_means_test_benefits_date_benefit_expire5':' " . showData('means_test_benefits_date_benefit_expire', '4') . "',
'part_4_1_means_test_benefits_date_benefit_expire6':' " . showData('means_test_benefits_date_benefit_expire', '5') . "',
'part_4_1_means_test_benefits_date_benefit_expire7':' " . showData('means_test_benefits_date_benefit_expire', '6') . "',
'part_4_1_means_test_benefits_date_benefit_expire8':' " . showData('means_test_benefits_date_benefit_expire', '7') . "',



'part5_input-2a':' " . showData('federal_poverty_guidelines_date_you_became_unemployed') . "',
'your_employment_status_total_household_size':' " . showData('your_employment_status_total_household_size') . "',
'your_employment_status_total_household_earning':' " . showData('your_employment_status_total_household_earning') . "',
'your_employment_status_name_of_head_of_household':' " . showData('your_employment_status_name_of_head_of_household') . "',

'part5_input_table_cell_4_full_name1':' " . showData('your_household_size_full_name', '0') . "',
'part5_input_table_cell_4_full_name2':' " . showData('your_household_size_full_name', '1') . "',
'part5_input_table_cell_4_full_name3':' " . showData('your_household_size_full_name', '2') . "',
'part5_input_table_cell_4_full_name4':' " . showData('your_household_size_full_name', '3') . "',

'part5_input_table_cell_4_your_household_size_date_of_birth1':' " . showData('your_household_size_date_of_birth', '0') . "',
'part5_input_table_cell_4_your_household_size_date_of_birth2':' " . showData('your_household_size_date_of_birth', '1') . "',
'part5_input_table_cell_4_your_household_size_date_of_birth3':' " . showData('your_household_size_date_of_birth', '2') . "',
'part5_input_table_cell_4_your_household_size_date_of_birth4':' " . showData('your_household_size_date_of_birth', '3') . "',

'part5_input_table_cell_4_your_household_relate1':' " . showData('your_household_relate', '0') . "',
'part5_input_table_cell_4_your_household_relate2':' " . showData('your_household_relate', '1') . "',
'part5_input_table_cell_4_your_household_relate3':' " . showData('your_household_relate', '2') . "',

'part5_input_table_cell_4_your_household_total_size':' " . showData('your_household_total_size') . "',

'income_federal_poverty_guide_other_exp':' " . showData('income_federal_poverty_guide_other_exp') . "',
'part5_5input':' " . showData('your_annual_household_income') . "',
'part5_6input':' " . showData('your_annual_household_income_all_family_memb') . "',
'part5_7input':' " . showData('your_annual_household_income_total_additional_income') . "',
'part5_8input':' " . showData('federal_poverty_guidelines_total_household_income') . "',
'i_912_annual_household_income_chkbox_expl':' " . showData('i_912_annual_household_income_chkbox_expl') . "',
// page 6
'part6_1_input_2_table_cell_type_asset1':' " . showData('financial_hardship_type_of_asset', '0') . "',
'part6_1_input_2_table_cell_type_asset2':' " . showData('financial_hardship_type_of_asset', '1') . "',
'part6_1_input_2_table_cell_type_asset3':' " . showData('financial_hardship_type_of_asset', '2') . "',

'part6_1_input_2_table_cell_value_us1':' " . showData('financial_hardship_type_of_asset_value', '0') . "',
'part6_1_input_2_table_cell_value_us2':' " . showData('financial_hardship_type_of_asset_value', '1') . "',
'part6_1_input_2_table_cell_value_us3':' " . showData('financial_hardship_type_of_asset_value', '2') . "',

'part6_3_input':' " . showData('financial_hardship_monthly_liabilities') . "',



'part7-2-checkBox':' " . showData('requestor_authorized') . "',
'part7_1_ckbox_b':' " . showData('requestor_every_ques') . "',
'part7_1_ckbox':' " . showData('requestor_authorized') . "',
'part_7-3_requestor_contact_daytime_telephone':' " . showData('requestors_daytime_tel') . "',
'part_7-4_requestor_contact_mobile_telephone':' " . showData('requestors_mobile') . "',
'part_7-5_requestor_contact_email_address':' " . showData('requestors_email') . "',

'part7_6_signature':' " . showData('requestors_sign_date') . "',
'part7_7_input':' " . showData('family_members_first_sign_name') . "',
'part7_7_signature':' " . showData('family_members_first_date_of_sign') . "',
'part7_8_input':' " . showData('family_members_second_sign_name') . "',
'part7_8_signature':' " . showData('family_members_second_date_of_sign') . "',
'part7_9_input':' " . showData('family_members_third_sign_name') . "',
'part7_9_signature':' " . showData('family_members_third_date_of_sign') . "',
'part7_10_input':' " . showData('family_members_fourth_sign_name') . "',
'part7_10_signature':' " . showData('family_members_fourth_date_of_sign') . "',
'part7_11_input':' " . showData('family_members_fifth_sign_name') . "',
'part7_11_signature':' " . showData('family_members_fifth_date_of_sign') . "',

'part8_6_signature':' " . showData('family_members_date_of_sign') . "',
'part_8-5_aplicant_contact_email_address':' " . showData('family_members_email_addr') . "',
'part_8-4_aplicant_contact_mobile_telephone':' " . showData('family_members_mobile_tel_num') . "',
'part_8-3_aplicant_contact_daytime_telephone':' " . showData('family_members_daytime_tel_num') . "',
'part8_1_input':' " . showData('family_members_statement_interpreter_for') . "',
'part8_1_b_input':' " . showData('family_memb_stat_interpre_every_ques') . "',
'part8_2_input':' " . showData('family_members_statement_preparer_for') . "',
'part8_2_authorized_input':' " . showData('family_memb_stat_preparer_authorized') . "',



'i_912_interpreter_note_for_family_member':' " . showData('i_912_interpreter_note_for_family_member') . "',
'i_912_interpreter_family_last_name':' " . showData('i_912_interpreter_family_last_name') . "',
'i_912_interpreter_family_given_first_name':' " . showData('i_912_interpreter_family_given_first_name') . "',
'i_912_interpreter_business_name':' " . showData('i_912_interpreter_business_name') . "',
'i_912_interpreter_mailing_address_street_number':' " . showData('i_912_interpreter_mailing_address_street_number') . "',
'i_912_interpreter_mailing_address_apt_ste_flr_value':' " . showData('i_912_interpreter_mailing_address_apt_ste_flr_value') . "',
'i_912_interpreter_mailing_address_city_town':' " . showData('i_912_interpreter_mailing_address_city_town') . "',
'i_912_interpreter_mailing_address_state':' " . showData('i_912_interpreter_mailing_address_state') . "',
'i_912_interpreter_mailing_address_zip_code':' " . showData('i_912_interpreter_mailing_address_zip_code') . "',
'i_912_interpreter_mailing_address_province':' " . showData('i_912_interpreter_mailing_address_province') . "',
'i_912_interpreter_mailing_address_postal_code':' " . showData('i_912_interpreter_mailing_address_postal_code') . "',
'i_912_interpreter_mailing_address_country':' " . showData('i_912_interpreter_mailing_address_country') . "',
'i_912_interpreter_daytime_tel':' " . showData('i_912_interpreter_daytime_tel') . "',
'i_912_interpreter_mobile':' " . showData('i_912_interpreter_mobile') . "',
'i_912_interpreter_email':' " . showData('i_912_interpreter_email') . "',
'i_912_interpreter_certification_language_skill':' " . showData('i_912_interpreter_certification_language_skill') . "',
'i_912_interpreter_sign_date':' " . showData('i_912_interpreter_sign_date') . "',


'i_912_preparer_note_for_family_member':' " . showData('i_912_preparer_note_for_family_member') . "',
'i_912_preparer_family_last_name':' " . showData('i_912_preparer_family_last_name') . "',
'i_912_preparer_family_given_first_name':' " . showData('i_912_preparer_family_given_first_name') . "',
'i_912_preparer_business_name':' " . showData('i_912_preparer_business_name') . "',
'i_912_preparer_mailing_address_street_number':' " . showData('i_912_preparer_mailing_address_street_number') . "',
'i_912_preparer_mailing_address_apt_ste_flr_value':' " . showData('i_912_preparer_mailing_address_apt_ste_flr_value') . "',
'i_912_preparer_mailing_address_city_town':' " . showData('i_912_preparer_mailing_address_city_town') . "',
'i_912_preparer_mailing_address_state':' " . showData('i_912_preparer_mailing_address_state') . "',
'i_912_preparer_mailing_address_zip_code':' " . showData('i_912_preparer_mailing_address_zip_code') . "',
'i_912_preparer_mailing_address_province':' " . showData('i_912_preparer_mailing_address_province') . "',
'i_912_preparer_mailing_address_postal_code':' " . showData('i_912_preparer_mailing_address_postal_code') . "',
'i_912_preparer_mailing_address_country':' " . showData('i_912_preparer_mailing_address_country') . "',
'i_912_preparer_daytime_tel':' " . showData('i_912_preparer_daytime_tel') . "',
'i_912_preparer_mobile':' " . showData('i_912_preparer_mobile') . "',
'i_912_preparer_email':' " . showData('i_912_preparer_email') . "',
'i_912_preparer_certification_language_skill':' " . showData('i_912_preparer_certification_language_skill') . "',


'i_912_preparer_sign_date':' " . showData('i_912_preparer_sign_date') . "',


'i_912_additional_info_last_name':' " . showData('i_912_additional_info_last_name') . "',
'i_912_additional_info_first_name':' " . showData('i_912_additional_info_first_name') . "',
'i_912_additional_info_middle_name':' " . showData('i_912_additional_info_middle_name') . "',
'i_912_additional_info_a_number':' " . showData('i_912_additional_info_a_number') . "',
'i_912_additional_info_3a':' " . showData('i_912_additional_info_3a_page_no') . "',
'i_912_additional_info_3b':' " . showData('i_912_additional_info_3b_part_no') . "',
'i_912_additional_info_3c':' " . showData('i_912_additional_info_3c_item_no') . "',
'i_912_additional_info_4a':' " . showData('i_912_additional_info_4a_page_no') . "',
'i_912_additional_info_4b':' " . showData('i_912_additional_info_4b_part_no') . "',
'i_912_additional_info_4c':' " . showData('i_912_additional_info_4c_item_no') . "',
'i_912_additional_info_5a':' " . showData('i_912_additional_info_5a_page_no') . "',
'i_912_additional_info_5b':' " . showData('i_912_additional_info_5b_part_no') . "',
'i_912_additional_info_5c':' " . showData('i_912_additional_info_5c_item_no') . "',
'i_912_additional_info_6a':' " . showData('i_912_additional_info_6a_page_no') . "',
'i_912_additional_info_6b':' " . showData('i_912_additional_info_6b_part_no') . "',
'i_912_additional_info_6c':' " . showData('i_912_additional_info_6c_item_no') . "',

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

//* $pdf->lastPage();
//*Close and output PDF document
$pdf->Output('i-912.pdf', 'I');
