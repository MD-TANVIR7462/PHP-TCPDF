<?php

// require_once('formheader.php');
require_once("localconfig.php");


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
        $this->SetY(-20);

        $header_top_border = array(
            'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
        );
        $this->Cell(191.5, 4, '', $header_top_border, 1, 1);

        // Set font
        $this->SetFont('times', '', 9);

        $this->Cell(40, 6, "Form I-485    Edition    01/20/25 ", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/i485/I-485-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 156, 264.5, true);
    }
}


$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-485');

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
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


/********************************
 ******** Start Page No 1 ********
 *********************************/

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
$pdf->Image($logo, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);    // set font
$pdf->MultiCell(100, 15, "Application to Register Permanent Residence or Adjust Status", 0, 'C', 0, 1, 55, 5, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-485", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0023\nExpires 10/31/2027", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->SetFont('times', '', 13);
$html = '<div><b>For USCIS Use Only</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 32, $html, 'LTR', 1, true, false, 'C', true);
$pdf->writeHTMLCell(190, 55, 13, 39, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', 'B', 8);
$pdf->writeHTMLCell(71, 6, 13, 39, 'Preference Category:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(71, 6, 13, 45, 'Country Chargeable:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(71, 6, 13, 51, 'Priority Date:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(71, 6, 13, 57, 'Date Form I-693 Signed By Civil Surgeon:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(15, 31, 53, 63, '',  'R',  1, false, true, 'L', true); //middle verticle row 1 
$pdf->writeHTMLCell(15, 31, 120, 63, '',  'R',  1, false, true, 'L', true); //middle verticle row 2


$pdf->SetFont('times', '', 6);
$pdf->writeHTMLCell(2, 1, 15, 66, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(17, 7, 18, 65, 'Applicant Interviewed',  0,  1, false, true, 'L', false);


$pdf->SetFont('times', '', 6);
$pdf->writeHTMLCell(2, 1, 43, 66, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(17, 7, 46, 65, 'Interview Waived',  0,  1, false, true, 'L', false);

$html = '<div>Date of <br>
Initial Interview :__________________</div>';
$pdf->writeHTMLCell(55, 7, 13, 73, $html,  0,  1, false, true, 'L', false);


$html = '<div>Lawful Permanent<br>
Resident as of :____________________</div>';
$pdf->writeHTMLCell(55, 7, 13, 82, $html,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(67, 24, 68, 39, '',  'BR',  1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 9);
$pdf->writeHTMLCell(80, 7, 102, 39, 'Receipt',   0,  1, false, true, 'L', true);
$pdf->writeHTMLCell(80, 7, 90, 62, 'Section of Law',   0,  1, false, true, 'L', true);
$pdf->writeHTMLCell(80, 7, 160, 39, 'Action Block',   0,  1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 4);
$pdf->writeHTMLCell(2, 2, 70, 68, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 73, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 78, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 83, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 88, '',  1,  1, false, true, 'L', false);
//.......
$pdf->writeHTMLCell(2, 2, 95, 68, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 73, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 78, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 83, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 88, '',  1,  1, false, true, 'L', false);

//.........
$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(20, 7, 72, 67.5, 'INA 209(a)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 71.5, 'INA 209(b)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 77.5, 'INA 245(a)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 82.5, 'INA 245(i)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 87.5, 'INA 245(j)',  0,  1, false, true, 'L', false);
//.......
$pdf->writeHTMLCell(30, 7,  97, 67.5, 'INA 245(m)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(30, 7,  97, 71.5, 'INA 249',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(30, 7,  97, 77.5, 'Sec. 13, Act of 9/11/57',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(35, 7,  97, 82.5, 'Cuban Adjustment Act',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(35, 7,  97, 87.5, 'Other__________________',  0,  1, false, true, 'L', false);

//upper table end 
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 11);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 1, 0, 0);
$html = '<div><b>To be completed by an attorney or accredited representative </b> (if any).</div>';
$pdf->writeHTMLCell(190, 7, 13, 96, $html, 1, 1, true, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 14);
$checked = (showData('i_485_g28_checkbox') == 'Y') ? "checked" : "";
$html = '<div> <input type="checkbox" name="i_485_g28_checkbox" value="Y" checked="' . $checked . '" /> </div>';
$pdf->writeHTMLCell(37, 20, 13, 103, $html, 'LRB', 0, false, true, 'L', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(37, 20, 20.5, 104.3, "Select this box if<br>Form G-28 is<br>attached.", '', 0, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html = '<div><b> Volag Number </b> <br>  (if any)</div>';
$pdf->writeHTMLCell(37, 20, 50, 103, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('volag_number', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 52, 114);
//...............
$pdf->SetFont('times', '', 10);
$html = '<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 20, 87, 103, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 114);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div> <b>  Attorney or Accredited Representative
USCIS Online Account Number </b> (if any) <br> </div>';
$pdf->writeHTMLCell(71, 20, 132, 103, $html, 'RB', 0, false, true, 'C', true);

$pdf->SetFont('courier', 'B', 10);
/* $pdf->TextField('attorney_uscis_online_number', 65, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),135, 114); */

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255);
$pdf->setCellPaddings(0); // set cell padding

$html = '&nbsp;<input type="text" class="heighttext" name="attorney_uscis_online_number" value="' . showData('attorney_uscis_online_number') . '" size="14" style="letter-spacing:2.8mm; width: 200px" maxlength="12" />';

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(56, 6, 138.7, 114, $html, 0, 1, false, true, 'J', 0);
$pdf->writeHTMLCell(60, 6, 140.5, 114, "", 1, 1, false, true, 'J', 0);

$pdf->setCellHeightRatio(1.5);
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->writeHTMLCell(5, 3, 145.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 155.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 165.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 175.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 185.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 195.7, 114, "", "L", 1, false, true, 'L', true);
//..............table end .........
$pdf->setCellHeightRatio(1.2);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 124, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 123, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 56.5, false); // angle 2
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html = '<div>A-Number  </div>';
$pdf->writeHTMLCell(60, 7, 105, 121, $html, 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(60, 7, 120, 123, 'A-', 0, 1, false, false, 'C', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_485_a_number', 50.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 125);
//..........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html = '<div><b>NOTE TO ALL APPLICANTS: </b>If you do not completely fill out this application or fail to submit required documents listed in the<br>
Instructions, U.S. Citizenship and Immigration Services (USCIS) may reject or deny your application.</div>';
$pdf->writeHTMLCell(190, 7, 13, 132, $html, 0, 1, false, true, 'J', true);
$html = '<div>For all sections of this application, if you need to provide any additional information or are instructed to provide an explanation, use
the space provided in <b>Part 14. Additional Information</b>.</div>';
$pdf->writeHTMLCell(190, 7, 13, 142, $html, 0, 1, false, true, 'J', true);
//..............
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 1. Information About You</b>  (Person applying for lawful permanent residence)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 158, $html, 1, 1, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(197, 5, 12, 165, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Current Legal Name (<b>Do not</b> provide a nickname)', '', 1, false, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 20, 170,"<div>Family Name (Last Name)</div>", 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 92.3, 170, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 151, 170, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_1a', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8, 175);
$pdf->TextField('p1_1b', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 93, 175);
$pdf->TextField('p1_1c', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 152, 175);
//.............
$pdf->SetFont('times', '', 10);
$html = "<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Names You Have Used Since Birth (if applicable)</div>";
$pdf->writeHTMLCell(130, 1, 12, 182, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(190, 1, 20, 188, "Provide all other names you have ever used, including your family name at birth, other legal names, nicknames, aliases, and<br>
assumed names.", 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 20, 198, '<div>Family Name (Last Name)</div>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, 93.3, 198, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 152, 198, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_2a1', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8, 203.5);
$pdf->TextField('p1_2b1', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 203.5);
$pdf->TextField('p1_2c1', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 203.5);
// //.
$pdf->TextField('p1_2a2', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8, 210.2);
$pdf->TextField('p1_2b2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 210.2);
$pdf->TextField('p1_2c2', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 210.2);
// //.
$pdf->SetFont('times', '', 10);
$html = "<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(130, 1, 12, 219.3, $html, 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62.8, 219);
//................
$pdf->SetFont('times', '', 10); // set font
$html = 'Have you ever used any other date of birth?';
$pdf->writeHTMLCell(190, 7, 20, 227, $html, '', 0, 0, true, 'L');
if (showData('i_131_exclusion_status') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_131_exclusion_status') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 227, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 226, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 20, 233, 'If you answered "Yes," provide all', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7, 20, 238, 'other dates of birth (mm/dd/yyyy).', '', 0, 0, true, 'L');
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3_other1', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8, 243);
$pdf->TextField('p1_3_other2', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8, 249.5);
/******************************
 ******** End Page No 1 ******
 ******************************/

/******************************
 ******** Start Page No 2****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 4. Processing Information</b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');








































//!................
// 'volag_number':' $attorneyData->volag_number',
// 'attorney_statebar_number':' $attorneyData->bar_number',
// 'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',


$js = "
var fields = {
// page 1

    'i_485_a_number':' " . showData('i_485_a_number') . "',	
    'info_about_you_family_lastname':' " . showData('information_about_you_family_last_name') . "',
    'info_about_you_family_firstname':' " . showData('information_about_you_given_first_name') . "',
    'info_about_you_family_middlename':' " . showData('information_about_you_middle_name') . "',	
    'additional_info_family_lastname':' " . showData('information_about_you_other_family_last_name') . "',
    'additional_info_family_firstname':' " . showData('information_about_you_other_given_first_name') . "',
    'additional_info_family_middlename':' " . showData('information_about_you_other_middle_name') . "',	
    'additional_info_3_family_lastname':' " . showData('information_about_you_other_family_last_name2') . "',
    'additional_info_3_family_firstname':' " . showData('information_about_you_other_given_first_name2') . "',
    'additional_info_3_family_middlename':' " . showData('information_about_you_other_middle_name2') . "',	
    'additional_info_4_family_lastname':' " . showData('information_about_you_other_family_last_name3') . "',
    'additional_info_4_family_firstname':' " . showData('information_about_you_other_given_first_name3') . "',
    'additional_info_4_family_middlename':' " . showData('information_about_you_other_middle_name3') . "',	
    'other_info_you_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . "',
    'other_info_you_city_town_of_birth':' " . showData('other_information_about_you_city_of_birth') . "',
	
    // page 2
	
    'infor_about_you_country_birth':' " . showData('other_information_about_you_country_of_birth') . "',
    'info_about_you_citizen_nationality':' " . showData('other_information_about_you_country_of_citizen') . "',
    'info_about_you_alien_reg_number':' " . showData('other_information_about_you_alien_registration_number') . "',
    'info_about_you_online_account_number':' " . showData('other_information_about_you_uscis_online_account_number') . "',
    'info_about_you_us_mail_in_care_name':' " . showData('information_about_you_us_mailing_care_of_name') . "',
    'info_about_you_us_mail_street':' " . showData('information_about_you_us_mailing_street_number') . "',
    'info_about_you_us_mail_apt_ste_flr':' " . showData('information_about_you_us_mailing_apt_ste_flr_value') . "',
    'info_about_you_us_mail_city_town':' " . showData('information_about_you_us_mailing_city_town') . "',
    'info_about_you_us_mail_state':' " . showData('information_about_you_us_mailing_state') . "',
    'info_about_you_us_mail_zipcode':' " . showData('information_about_you_us_mailing_zip_code') . "',
	
    'info_about_you_safe_mailing_care_of_name':' " . showData('information_about_you_mailing_care_of_name') . "',
    'info_about_you_safe_mailing_street_number_name':' " . showData('information_about_you_mailing_street_number') . "',
    'info_about_you_safe_mailing_apt_ste_flr':' " . showData('information_about_you_mailing_apt_ste_flr_value') . "',
    'info_about_you_safe_mailing_city_town':' " . showData('information_about_you_mailing_city_town') . "',
    'info_about_you_safe_mailing_state':' " . showData('information_about_you_mailing_state') . "',
    'info_about_you_safe_mailing_zipcode':' " . showData('information_about_you_mailing_zip_code') . "',
    'info_about_you_us_social_security_card':' " . showData('other_information_about_you_social_security_number') . "',
    
    'info_about_you_recent_immigration_pasport_number':' " . showData('other_information_about_you_passport_number') . "',
    'info_about_you_recent_immigration_travel_number':' " . showData('other_information_about_you_travel_document_number') . "',
    'info_about_you_recent_immigration_pasport_expire_date':' " . showData('other_information_about_you_expiry_date_issuance_passport') . "',
    'info_about_you_recent_immigration_country_issue_pasport':' " . showData('i_94_imgt_country_issuance_passport') . "',
    'info_about_you_recent_immigration_nonimmigrant_number':' " . showData('i_94_imgt_nonimmigrant_visa_number') . "',
    'info_about_you_recent_immigration_city_town':' " . showData('i_94_imgt_city_town') . "',
    'info_about_you_recent_immigration_state':' " . showData('i_94_imgt_state') . "',
    'info_about_you_recent_immigration_date_last_arrive':' " . showData('i_94_imgt_date_of_last_arival') . "',
    
    // page 3
	
    'info_about_you_recent_immigration_other':' " . showData('i_485_25d_other_status_text_value') . "',
    'info_about_you_recent_immigration_arival_record_number':' " . showData('i_94_imgt_arrival_record_number') . "',
    'info_about_you_recent_immigration_pasport_expire_date_authorized':' " . showData('i_94_imgt_expiry_date_of_authorized') . "',
    'info_about_you_recent_immigration_status_on_form_I94':' " . showData('i_94_status_on_form') . "',
    'info_about_you_status_on_current_immigration':' " . showData('i_94_current_immigration_status_changed') . "',
    'information_you_exactly_lastname':' " . showData('i_94_family_last_name') . "',
    'information_you_exactly_firstname':' " . showData('i_94_given_first_name') . "',
    'information_you_exactly_middlename':' " . showData('i_94_middle_name') . "',
	
    // page 4
	
    'info_about_you_receipt_number_underliying':' " . showData('i_485_info_about_you_part2_3_receipt_number_underlying') . "',
    'info_about_you_priority_date_underliying':' " . showData('i_485_info_about_you_part2_4_periority_date') . "',
	
    'principal_applicant_lastname':' " . showData('i_485_principal_applicant_family_last_name') . "',
    'principal_applicant_firstname':' " . showData('i_485_principal_applicant_given_first_name') . "',
    'principal_applicant_middlename':' " . showData('i_485_principal_applicant_middle_name') . "',
    'principal_applicant_a_number':' " . showData('i_485_principal_applicant_a_number') . "',
    'principal_applicant_date_of_birth':' " . showData('i_485_principal_applicant_date_of_birth') . "',
    'principal_applicant_receipt_number':' " . showData('i_485_principal_applicant_receipt_number') . "',
    'principal_applicant_priority_date':' " . showData('i_485_principal_applicant_priority_date') . "',
	
    //......end part 2
	
    'additional_info_location_city':' " . showData('i_485_additional_info_city') . "',
    'additional_info_location_country':' " . showData('i_485_additional_info_country') . "',
    'additional_info_decision':' " . showData('i_485_additional_info_decision_for_example') . "',
    'additional_info_decision1':' " . showData('i_485_additional_info_decision_date') . "',
	
    // page 5
	
    'aditional_info_address_street':' " . showData('information_about_you_home_street_number') . "',
    'aditional_info_address_apt_ste_flr':' " . showData('information_about_you_home_apt_ste_flr_value') . "',
    'aditional_info_address_city_or_town':' " . showData('information_about_you_home_city_town') . "',
    'aditional_info_address_state':' " . showData('information_about_you_home_state') . "',
    'aditional_info_address_zip_code':' " . showData('information_about_you_home_zip_code') . "',
    'aditional_info_address_province':' " . showData('information_about_you_home_province') . "',
    'aditional_info_address_postal_code':' " . showData('information_about_you_home_postal_code') . "',
    'aditional_info_address_country':' " . showData('information_about_you_home_country') . "',
    'aditional_info_address_date_from':' " . showData('information_about_you_home_residence_from_date') . "',
    'aditional_info_address_date_to':' " . showData('information_about_you_home_residence_to_date') . "',
    'aditional_info_address2_street':' " . showData('information_about_you_home_street_number2') . "',
    'aditional_info_address2_apt_ste_flr':' " . showData('information_about_you_home_apt_ste_flr_value2') . "',
    'aditional_info_address2_city_or_town':' " . showData('information_about_you_home_city_town2') . "',
    'aditional_info_address2_state':' " . showData('information_about_you_home_state2') . "',
    'aditional_info_address2_zip_code':' " . showData('information_about_you_home_zip_code2') . "',
    'aditional_info_address2_province':' " . showData('information_about_you_home_province2') . "',
    'aditional_info_address2_postal_code':' " . showData('information_about_you_home_postal_code2') . "',
    'aditional_info_address2_country':' " . showData('information_about_you_home_country2') . "',
    'aditional_info_address2_date_from':' " . showData('information_about_you_home_residence_from_date2') . "',
    'aditional_info_address2_date_to':' " . showData('information_about_you_home_residence_to_date2') . "',
	
    'aditional_info_address3_street':' " . showData('information_about_you_outside_us_street_number') . "',
    'aditional_info_address3_apt_ste_flr':' " . showData('information_about_you_outside_us_apt_ste_flr_value') . "',
    'aditional_info_address3_city_or_town':' " . showData('information_about_you_outside_us_city_town') . "',
    'aditional_info_address3_state':' " . showData('information_about_you_outside_us_state') . "',
    'aditional_info_address3_zip_code':' " . showData('information_about_you_outside_us_zip_code') . "',
    'aditional_info_address3_province':' " . showData('information_about_you_outside_us_province') . "',
    'aditional_info_address3_postal_code':' " . showData('information_about_you_outside_us_postal_code') . "',
    'aditional_info_address3_country':' " . showData('information_about_you_outside_us_country') . "',
    'aditional_info_address3_date_from':' " . showData('information_about_you_outside_us_residence_from_date') . "',
    'aditional_info_address3_date_to':' " . showData('information_about_you_outside_us_residence_to_date') . "',
    
    'aditional_info_employement_company':' " . showData('employer1_name') . "',
    'aditional_info_employer_street':' " . showData('employer1_address') . "',
    'aditional_info_employer_apt_ste_flr':' " . showData('employer1_apt_ste_flr_value') . "',
    'aditional_info_employer_city_or_town':' " . showData('employer1_city_town') . "',
    'aditional_info_employer_state':' " . showData('employer1_state') . "',
    'aditional_info_employer_zip_code':' " . showData('employer1_zip_code') . "',
    'aditional_info_employer_province':' " . showData('employer1_province') . "',
    'aditional_info_employer_postal_code':' " . showData('employer1_postal_code') . "',
    'aditional_info_employer_country':' " . showData('employer1_country') . "',
    'aditional_info_employer_occupation':' " . showData('employer1_occupation') . "',
    'aditional_info_employer_date_from':' " . showData('employer1_from_date') . "',
    'aditional_info_employer_date_to':' " . showData('employer1_to_date') . "', 
	
    'aditional_info_employer2_company':' " . showData('employer2_name') . "',
    'aditional_info_employer2_street':' " . showData('employer2_address') . "',
    'aditional_info_employer2_apt_ste_flr':' " . showData('employer2_apt_ste_flr_value') . "',
    'aditional_info_employer2_city_or_town':' " . showData('employer2_city_town') . "',
    'aditional_info_employer2_state':' " . showData('employer2_state') . "',
    'aditional_info_employer2_zip_code':' " . showData('employer2_zip_code') . "',
    'aditional_info_employer2_province':' " . showData('employer2_province') . "',
    'aditional_info_employer2_postal_code':' " . showData('employer2_postal_code') . "',
    'aditional_info_employer2_country':' " . showData('employer2_country') . "',
    'aditional_info_employer2_date_from':' " . showData('employer2_from_date') . "',
    'aditional_info_employer2_date_to':' " . showData('employer2_to_date') . "',
    'aditional_info_employer2_occupation':' " . showData('employer2_occupation') . "',
    
    'aditional_info_employer3_company':' " . showData('employer_outside_us_name') . "',
    'aditional_info_employer3_street':' " . showData('employer_outside_us_street_number') . "',
    'aditional_info_employer3_apt_ste_flr':' " . showData('employer_outside_us_apt_ste_flr_value') . "',
    'aditional_info_employer3_city_town':' " . showData('employer_outside_us_city_town') . "',
    'aditional_info_employer3_state':' " . showData('employer_outside_us_state') . "',
    'aditional_info_employer3_zip_code':' " . showData('employer_outside_us_zip_code') . "',
    'aditional_info_employer3_province':' " . showData('employer_outside_us_province') . "',
    'aditional_info_employer3_postal_code':' " . showData('employer_outside_us_postal_code') . "',
    'aditional_info_employer3_country':' " . showData('employer_outside_us_country') . "',
    'aditional_info_employer3_occupation':' " . showData('employer_outside_us_occupation') . "',
    'aditional_info_employer3_date_from':' " . showData('employer_outside_us_from_date') . "',
    'aditional_info_employer3_date_to':' " . showData('employer_outside_us_to_date') . "',
	
    'information_parent1_lastname':' " . showData('parent1_info_family_last_name') . "',
    'information_parent1_firstname':' " . showData('parent1_info_given_first_name') . "',
    'information_parent1_middlename':' " . showData('parent1_info_middle_name') . "',
    'information_parent1_lastname_at_birth':' " . showData('parent1_info_at_birth_family_last_name') . "',
    'information_parent1_firstname_at_birth':' " . showData('parent1_info_at_birth_given_first_name') . "',
    'information_parent1_middlename_at_birth':' " . showData('parent1_info_at_birth_middle_name') . "',
    'information_parent1_date_of_birth':' " . showData('parent1_info_date_of_birth') . "',
    'information_parent1_city_of_birth':' " . showData('parent1_info_city_of_birth') . "',
    'information_parent1_country_of_birth':' " . showData('parent1_info_country_of_birth') . "',	
    'information_parent1_current_city_of_resident':' " . showData('parent1_info_current_city_of_residence') . "',
    'information_parent1_current_country_of_resident':' " . showData('parent1_info_current_country_of_residence') . "',
	
    'information_parent2_lastname':' " . showData('parent2_info_family_last_name') . "',
    'information_parent2_firstname':' " . showData('parent2_info_given_first_name') . "',
    'information_parent2_middlename':' " . showData('parent2_info_middle_name') . "',
    'information_parent2_lastname_at_birth':' " . showData('parent2_info_at_birth_family_last_name') . "',
    'information_parent2_firstname_at_birth':' " . showData('parent2_info_at_birth_given_first_name') . "',
    'information_parent2_middlename_at_birth':' " . showData('parent2_info_at_birth_middle_name') . "',
    'information_parent2_date_of_birth':' " . showData('parent2_info_date_of_birth') . "',
    'information_parent2_city_of_birth':' " . showData('parent2_info_city_of_birth') . "',
    'information_parent2_country_of_birth':' " . showData('parent2_info_country_of_birth') . "',
    'information_parent2_current_city_of_resident':' " . showData('parent1_info_current_city_of_residence') . "',
    'information_parent2_current_country_of_resident':' " . showData('parent2_info_current_country_of_residence') . "',
	
    'how_many_times_married':' " . showData('other_information_about_you_total_married') . "',
    'current_mariage_spouse_lastname':' " . showData('current_spouse_family_last_name') . "',
    'current_mariage_spouse_firstname':' " . showData('current_spouse_given_first_name') . "',
    'current_mariage_spouse_middlename':' " . showData('current_spouse_family_middle_name') . "',
    'current_mariage_spouse_a_number':' " . showData('current_spouse_a_number') . "',
    'current_mariage_spouse_date_of_birth':' " . showData('current_spouse_date_of_birth') . "',
    'current_mariage_spouse_date_of_marriage':' " . showData('current_spouse_date_of_marriage') . "',
    'current_mariage_spouse_birth_city_town':' " . showData('current_spouse_birth_place_city_town') . "',
    'current_mariage_spouse_birth_state':' " . showData('current_spouse_birth_place_province') . "',
    'current_mariage_spouse_birth_country':' " . showData('current_spouse_birth_place_country') . "',
    'place_of_mariage_current_spouse_city_or_town':' " . showData('current_spouse_marriage_place_city_town') . "',
    'place_of_mariage_current_spouse_province':' " . showData('current_spouse_marriage_place_province') . "',
    'place_of_mariage_current_spouse_country':' " . showData('current_spouse_marriage_place_country') . "',
	
    'information_prior_marriage_lastname':' " . showData('prior_spouse1_family_last_name') . "',
    'information_prior_marriage_firstname':' " . showData('prior_spouse1_given_first_name') . "',
    'information_prior_marriage_middlename':' " . showData('prior_spouse1_middle_name') . "',
    'prior_spouse_date_of_marriage':' " . showData('prior_spouse1_date_of_marriage') . "',
    'prior_spouse_date_of_birth':' " . showData('prior_spouse1_date_of_birth') . "',
    'place_of_mariage_prior_spouse_city_town':' " . showData('prior_spouse1_marriage_place_city_town') . "',
    'place_of_mariage_prior_spouse_state_province':' " . showData('prior_spouse1_marriage_place_province') . "',
    'place_of_mariage_prior_spouse_country':' " . showData('prior_spouse1_marriage_place_country') . "',
    'legally_ended_date_of_prior_spouse_marriage':' " . showData('prior_spouse1_marriage_end_date') . "',
    'place_of_spouse_prior_marriage_ended_city_town':' " . showData('prior_spouse1_marriage_end_city_town') . "',
    'place_of_spouse_prior_marriage_ended_state_province':' " . showData('prior_spouse1_marriage_end_province') . "',
    'place_of_spouse_prior_marriage_ended_country':' " . showData('prior_spouse1_marriage_end_country') . "',
	
    'total_number_of_children':' " . showData('total_number_of_all_children') . "',
    'information_children1_lastname':' " . showData('child1_family_last_name') . "',
    'information_children1_firstname':' " . showData('child1_given_first_name') . "',
    'information_children1_middlename':' " . showData('child1_middle_name') . "',
    'information_children1_a_number':' " . showData('child1_a_number') . "',
    'information_children1_date_of_birth':' " . showData('child1_date_of_birth') . "',
    'information_children1_country_of_birth':' " . showData('child1_country_of_birth') . "',
	
    'information_children2_lastname':' " . showData('child2_family_last_name') . "',
    'information_children2_firstname':' " . showData('child2_given_first_name') . "',
    'information_children2_middlename':' " . showData('child2_middle_name') . "',
    'information_children2_a_number':' " . showData('child2_a_number') . "',
    'information_children2_date_of_birth':' " . showData('child2_date_of_birth') . "',
    'information_children2_country_of_birth':' " . showData('child2_country_of_birth') . "',
	
	// page 9
	
    'information_children3_lastname':' " . showData('child3_family_last_name') . "',
    'information_children3_firstname':' " . showData('child3_given_first_name') . "',
    'information_children3_middlename':' " . showData('child3_middle_name') . "',
    'information_children3_a_number':' " . showData('child3_a_number') . "',
    'information_children3_date_of_birth':' " . showData('child3_date_of_birth') . "',
    'information_children3_country_of_birth':' " . showData('child3_country_of_birth') . "',
	
    'biographic_info_feet':' " . showData('biographic_info_height_feet') . "',
    'biographic_info_inches':' " . showData('biographic_info_height_inches') . "',
    'biographic_info_pound1':' " . showData('biographic_info_weight_in_pound1') . "',
    'biographic_info_pound2':' " . showData('biographic_info_weight_in_pound2') . "',
    'biographic_info_pound3':' " . showData('biographic_info_weight_in_pound3') . "',
	
    'organization1_name_of_org':' " . showData('organaization1_name') . "',
    'organization1_city_or_town':' " . showData('organaization1_city_town') . "',
    'organization1_state_or_province':' " . showData('organaization1_province') . "',
    'organization1_counrty':' " . showData('organaization1_country') . "',
    'organization1_nature_of_group':' " . showData('organaization1_nature') . "',
    'organization1_date_from':' " . showData('organaization1_from_date') . "',
    'organization1_date_to':' " . showData('organaization1_to_date') . "',
	
    'organization2_name_of_org':' " . showData('organaization2_name') . "',
    'organization2_city_or_town':' " . showData('organaization2_city_town') . "',
    'organization2_state_or_province':' " . showData('organaization2_province') . "',
    'organization2_counrty':' " . showData('organaization2_country') . "',
    'organization2_nature_of_group':' " . showData('organaization2_nature') . "',
    'organization2_date_from':' " . showData('organaization2_from_date') . "',
    'organization2_date_to':' " . showData('organaization2_to_date') . "',
	
    'organization3_name_of_org':' " . showData('organaization3_name') . "',
    'organization3_city_or_town':' " . showData('organaization3_city_town') . "',
    'organization3_state_or_province':' " . showData('organaization3_province') . "',
    'organization3_counrty':' " . showData('organaization3_country') . "',
    'organization3_nature_of_group':' " . showData('organaization3_nature') . "',
    'organization3_date_from':' " . showData('organaization3_from_date') . "',
    'organization3_date_to':' " . showData('organaization3_to_date') . "',
	
	// page 13 
	
    'general_eligibility_household_size':' " . showData('i_485_general_eligibility_household_size') . "',
	
	// page 14
	
    'part8_table_benefit_received1':' " . showData('i_485_general_eligibility_benefit_receive', '0') . "',
    'part8_table_benefit_received2':' " . showData('i_485_general_eligibility_benefit_receive', '1') . "',
    'part8_table_benefit_received3':' " . showData('i_485_general_eligibility_benefit_receive', '2') . "',
    'part8_table_benefit_received4':' " . showData('i_485_general_eligibility_benefit_receive', '3') . "',
	
    'part8_table_startdate_68c_1':' " . showData('i_485_general_eligibility_benefit_start_date', '0') . "',
    'part8_table_startdate_68c_2':' " . showData('i_485_general_eligibility_benefit_start_date', '1') . "',
    'part8_table_startdate_68c_3':' " . showData('i_485_general_eligibility_benefit_start_date', '2') . "',
    'part8_table_startdate_68c_4':' " . showData('i_485_general_eligibility_benefit_start_date', '3') . "',
	
    'part8_table_end_date_68c_1':' " . showData('i_485_general_eligibility_benefit_end_date', '0') . "',
    'part8_table_end_date_68c_2':' " . showData('i_485_general_eligibility_benefit_end_date', '1') . "',
    'part8_table_end_date_68c_3':' " . showData('i_485_general_eligibility_benefit_end_date', '2') . "',
    'part8_table_end_date_68c_4':' " . showData('i_485_general_eligibility_benefit_end_date', '3') . "',
	
    'part8_table_dollaramount_68c_1':' " . showData('i_485_general_eligibility_benefit_amount', '0') . "',
    'part8_table_dollaramount_68c_2':' " . showData('i_485_general_eligibility_benefit_amount', '1') . "',
    'part8_table_dollaramount_68c_3':' " . showData('i_485_general_eligibility_benefit_amount', '2') . "',
    'part8_table_dollaramount_68c_4':' " . showData('i_485_general_eligibility_benefit_amount', '3') . "',
	
    'part8_table_institution_68d_1':' " . showData('i_485_general_eligibility_institution_name', '0') . "',
    'part8_table_institution_68d_2':' " . showData('i_485_general_eligibility_institution_name', '1') . "',
    'part8_table_institution_68d_3':' " . showData('i_485_general_eligibility_institution_name', '2') . "',
    'part8_table_institution_68d_4':' " . showData('i_485_general_eligibility_institution_name', '3') . "',
	
    'part8_table_date_form_68d_1':' " . showData('i_485_general_eligibility_institution_date_from', '0') . "',
    'part8_table_date_form_68d_2':' " . showData('i_485_general_eligibility_institution_date_from', '1') . "',
    'part8_table_date_form_68d_3':' " . showData('i_485_general_eligibility_institution_date_from', '2') . "',
    'part8_table_date_form_68d_4':' " . showData('i_485_general_eligibility_institution_date_from', '3') . "',
	
    'part8_table_date_to_68d_1':' " . showData('i_485_general_eligibility_institution_date_to', '0') . "',
    'part8_table_date_to_68d_2':' " . showData('i_485_general_eligibility_institution_date_to', '1') . "',
    'part8_table_date_to_68d_3':' " . showData('i_485_general_eligibility_institution_date_to', '2') . "',
    'part8_table_date_to_68d_4':' " . showData('i_485_general_eligibility_institution_date_to', '3') . "',
	
    'part8_table_reason_68d_1':' " . showData('i_485_general_eligibility_institution_reason', '0') . "',
    'part8_table_reason_68d_2':' " . showData('i_485_general_eligibility_institution_reason', '1') . "',
    'part8_table_reason_68d_3':' " . showData('i_485_general_eligibility_institution_reason', '2') . "',
    'part8_table_reason_68d_4':' " . showData('i_485_general_eligibility_institution_reason', '3') . "',
	
	// page 15
	
	// page 16
	
    'applicants_contact_telephone':' " . showData('i_485_applicant_daytime_tel') . "',
    'applicants_contact_mobile':' " . showData('i_485_applicant_mobile') . "',
    'applicants_contact_email':' " . showData('i_485_applicant_email') . "',
	
	// page 17
	
    'applicants_date_of_signature':' " . showData('i_485_applicant_sign_date') . "',
    'interpreter_family_last_name':' " . showData('i_485_interpreter_family_last_name') . "',
    'interpreter_given_first_name':' " . showData('i_485_interpreter_given_first_name') . "',
    'interpreter_family_organization_name':' " . showData('i_485_interpreter_business_name') . "',	
    'interpreter_mailing_address_street':' " . showData('i_485_interpreter_address_street_number') . "',
    'interpreter_mailing_address_apt_ste_flr':' " . showData('i_485_interpreter_address_apt_ste_flr_value') . "',
    'interpreter_mailing_address_city_town':' " . showData('i_485_interpreter_address_city_town') . "',
    'interpreter_mailing_address_state':' " . showData('i_485_interpreter_address_state') . "',
    'interpreter_mailing_address_zipcode':' " . showData('i_485_interpreter_address_zip_code') . "',
    'interpreter_mailing_address_province':' " . showData('i_485_interpreter_address_province') . "',
    'interpreter_mailing_address_postalcode':' " . showData('i_485_interpreter_address_postal_code') . "',
    'interpreter_mailing_address_country':' " . showData('i_485_interpreter_address_country') . "',
    'interpreter_contact_daytime_telephone':' " . showData('i_485_interpreter_daytime_tel') . "',
    'interpreter_contact_mobile_telephone':' " . showData('i_485_interpreter_mobile') . "',
    'interpreter_contact_email':' " . showData('i_485_interpreter_email') . "',
	
	// page 18
	
    'interpreter_certification':' " . showData('i_485_interpreter_certification_language_skill') . "',
    'interpreter_signature_date':' " . showData('i_485_interpreter_sign_date') . "',
    'preparer_family_last_name':' " . showData('i_485_preparer_family_last_name') . "',
    'preparer_family_given_name':' " . showData('i_485_preparer_given_first_name') . "',
    'preparer_family_business_name':' " . showData('i_485_preparer_business_name') . "',
    'preparer_mailing_address_street':' " . showData('i_485_preparer_address_street_number') . "',
    'preparer_mailing_address_apt_ste_flr':' " . showData('i_485_preparer_address_apt_ste_flr_value') . "',
    'preparer_mailing_address_city_town':' " . showData('i_485_preparer_address_city_town') . "',
    'preparer_mailing_address_state':' " . showData('i_485_preparer_address_state') . "',
    'preparer_mailing_address_zipcode':' " . showData('i_485_preparer_address_zip_code') . "',
    'preparer_mailing_address_province':' " . showData('i_485_preparer_address_province') . "',
    'preparer_mailing_address_postalcode':' " . showData('i_485_preparer_address_postal_code') . "',
    'preparer_mailing_address_country':' " . showData('i_485_preparer_address_country') . "',
    'preparers_contact_daytime_telephone':' " . showData('i_485_preparer_daytime_tel') . "',
    'preparers_contact_mobile_telephone':' " . showData('i_485_preparer_mobile') . "',
    'preparers_contact_email':' " . showData('i_485_preparer_email') . "',
	
	//page 19
	
    'Preparer_signature_date':' " . showData('i_485_preparer_sign_date') . "',
    'part13_numbered':'" . showData('i_485_sign_interview_permanent_residence_pages_from') . "',
    'part13_through':'" . showData('i_485_sign_interview_permanent_residence_pages_to') . "',
    'part13_numbered_pages':'" . showData('i_485_sign_interview_additional_pages_from') . "',
    'part13_through2':'" . showData('i_485_sign_interview_additional_pages_to') . "',
    'i_485_page_19_p13_signature':' " . showData('i_485_uscis_officer_sign_date') . "',
	
	// page 20
	
    'i_485_additional_info_last_name':' " . showData('i_485_additional_info_last_name') . "',
    'i_485_additional_info_first_name':' " . showData('i_485_additional_info_first_name') . "',
    'i_485_additional_info_middle_name':' " . showData('i_485_additional_info_middle_name') . "',
    'i_485_additional_info_a_number':' " . showData('i_485_additional_info_a_number') . "',	
    'i_485_additional_info_3a_page_no':' " . showData('i_485_additional_info_3a_page_no') . "',
    'i_485_additional_info_3b_part_no':' " . showData('i_485_additional_info_3b_part_no') . "',
    'i_485_additional_info_3c_item_no':' " . showData('i_485_additional_info_3c_item_no') . "',

    'i_485_additional_info_4a_page_no':' " . showData('i_485_additional_info_4a_page_no') . "',
    'i_485_additional_info_4b_part_no':' " . showData('i_485_additional_info_4b_part_no') . "',
    'i_485_additional_info_4c_item_no':' " . showData('i_485_additional_info_4c_item_no') . "',

    'i_485_additional_info_5a_page_no':' " . showData('i_485_additional_info_5a_page_no') . "',
    'i_485_additional_info_5b_part_no':' " . showData('i_485_additional_info_5b_part_no') . "',
    'i_485_additional_info_5c_item_no':' " . showData('i_485_additional_info_5c_item_no') . "',

    'i_485_additional_info_6a_page_no':' " . showData('i_485_additional_info_6a_page_no') . "',
    'i_485_additional_info_6b_part_no':' " . showData('i_485_additional_info_6b_part_no') . "',
    'i_485_additional_info_6c_item_no':' " . showData('i_485_additional_info_6c_item_no') . "',

    'i_485_additional_info_7a_page_no':' " . showData('i_485_additional_info_7a_page_no') . "',
    'i_485_additional_info_7b_part_no':' " . showData('i_485_additional_info_7b_part_no') . "',
    'i_485_additional_info_7c_item_no':' " . showData('i_485_additional_info_7c_item_no') . "',
    'i_485_additional_info_7d':' " . showData('i_485_additional_info_7d') . "',
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
$pdf->Output('Form_I-485.pdf', 'I');
