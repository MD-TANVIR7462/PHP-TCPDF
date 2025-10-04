<?php

// require_once('formheader.php');
require_once("localconfig.php");


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF
{
    // Page header
    public function Header()
    {
        $this->SetY(21);
        if ($this->page > 1) {

            $this->Ln(1.3); // Change $pdf to $this

            $top_border = array(
                'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
            );
            $this->Cell(190, 0, '', $top_border, 15.5, 1); // Change $pdf to $this
            $this->SetLineWidth(0.1);
            $this->SetFillColor(255, 255, 255);
            $this->MultiCell(191.8, 0, '', 'T', 1, 'C', 1, 12.8, 24, false, 'T', 'C');


            // A-Number Text
            $this->SetFont('times', '', 10);
            $this->SetTextColor(0, 0, 0);
            $this->SetXY(130, 15);
            $this->Cell(20, 5, 'A-Number', 0, 0, 'L');
            $this->SetFont('times', 'B', 12);
            $this->Cell(6, 5, 'A-', 0, 0, 'R');
            //.....................
            $this->Image('images/right_angle.jpg', 145.5, 16.4, 3.3, 3.3);


            // Small boxes for A-Number digits
            $boxX = 157.9;
            $boxY = 15;
            $boxSize = 5.2;
            for ($i = 0; $i < 9; $i++) {
                $this->Rect($boxX + ($i * $boxSize), $boxY, $boxSize, $boxSize);
            }
        }
    }



    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-18);

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
        $this->Image($barcode_image, 65, 267, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 156, 266.5, true);
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
$pdf->writeHTMLCell(130, 1, 20, 170, "<div>Family Name (Last Name)</div>", 0, 0, false, true, 'L', true);
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
//******************************
//******** End Page No 1 ******
//******************************

//******************************
//******** Start Page No 2****
// ******************************
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(11.6);
// $html = '<div><b>Part 1. Information About You</b> (Person applying for lawful permanent residence) (continued)</div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 25, $html, 1, 1, true, 'L');

// // ..........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>4.</b> ';
// $pdf->writeHTMLCell(90, 7, 13, 32, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $html = "<div>Do you have an Alien Registration Number (A-Number)?</div>";
// $pdf->writeHTMLCell(190, 7, 21.4, 32, $html, '', 0, 0, true, 'L');
// if (showData('i_131_obtained_passport_from_refugee_country_status') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('i_131_obtained_passport_from_refugee_country_status') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 33, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="83" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="83" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 32, $html, 0, 1, false, true, 'J', true);

// //.......
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>If you answered "Yes," provide your A-Number.</div>';
// $pdf->writeHTMLCell(190, 7, 21.4, 38, $html, '', 0, 0, true, 'L');

// //..........

// $pdf->SetFont('times', '', 10);
// $html = "<div>A-Number (if any)</div>";
// $pdf->writeHTMLCell(130, 1, 21, 43.3, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 11);
// $pdf->writeHTMLCell(130, 1, 57, 43.3, "<b>A-</b>", 0, 0, false, true, 'L', true);
// //............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_4_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62.8, 43);
// //............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>5.</b> ';
// $pdf->writeHTMLCell(90, 7, 13, 50, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $html = "<div>Have you ever used, or been assigned, any other A-Number? </div>";
// $pdf->writeHTMLCell(190, 7, 21.4, 50, $html, '', 0, 0, true, 'L');
// if (showData('i_131_obtained_passport_from_refugee_country_status') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('i_131_obtained_passport_from_refugee_country_status') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 50, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="83" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="83" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 49, $html, 0, 1, false, true, 'J', true);
// //.......
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21.6, 55, 'If you answered "Yes," provide the A-Numbers. ', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_5_1', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.2, 60);
// $pdf->TextField('p1_5_2', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.2, 66.8);
// //.............


// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 75.6, "<b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sex", 0, 1, false, false, 'L', true);
// //.............
// if (showData('p1_6_male') == "male") $checked_male = "checked";
// else $checked_male = "";
// if (showData('p1_6_female') == "female") $checked_female = "checked";
// else $checked_female = "";
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(90, 7, 40.5, 74, 'Male', 0, 1, false, false, 'J', true);
// $pdf->writeHTMLCell(90, 7, 56.5, 73.4, 'Female', 0, 1, false, false, 'J', true);
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox" name="gender1" value="Male" checked="' . $checked_male . '" /></div>';
// $pdf->writeHTMLCell(90, 7, 34.4, 74, $html, 0, 1, false, false, 'J', true);
// $html = '<div><input type="checkbox" name="gender1" value="Female" checked="' . $checked_female . '" /></div>';
// $pdf->writeHTMLCell(90, 7, 50.4, 74, $html, 0, 1, false, false, 'J', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 82, "<b>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Place of Birth", 0, 1, false, false, 'L', true);

// //............
// //.......
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 20.8, 88, 'City or Town of Birth', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 110.6, 88, 'Country of Birth', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_7_city_town', 88, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 92.5);
// $pdf->TextField('p1_7_country', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 112, 92.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 101, '<b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Citizenship or Nationality', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_8_country_of_cityzen', 88, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 105.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 113.5, '<b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 125.5, 'If one has been assigned, you can find it on a notice that USCIS may have sent to you.', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_9_uscis_online', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 118.3);

// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 132, '<b>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Recent Immigration History', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 138, 'If you last entered the United States using a passport or travel document, provide the following information.', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 144, 'Passport or Travel Document Number Used at Last Arrival', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_a', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 143);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 151, 'Expiration Date of this Passport or Travel Document (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_b', 45.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118.4, 151.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 160.5, 'Country that Issued this Passport or Travel Document', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_c', 71.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 100, 160);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 168.5, 'Nonimmigrant Visa Number Used During Most Recent Arrival (if any)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_d', 71.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 168.2);

// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 176.5, 'Date Nonimmigrant Visa Was Issued (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_e', 48.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 176.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 184.5, 'Place and Date of Last Arrival into the United States', '', 0, 0, true, 'L');
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 192, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_f', 84.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.4, 196.5);

// //.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>State</div>';
// $pdf->writeHTMLCell(50, 4, 107, 192, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p1_10_g", 22, 7, $comboBoxOptions, array(), array(), 107.5, 196.5);
// $pdf->SetFont('times', '', 10);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 130.8, 192, 'Date of Last Arrival (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_10_h', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 131.4, 196.5);

// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 12, 204, '<b>11.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('p1_11_a_chekbox') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="24" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 210, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'When I last arrived in the United States: ';
// $pdf->writeHTMLCell(190, 7, 20, 204, $html, '', 0, 0, true, 'L');
// //............
// $html = 'I was inspected at a Port of Entry and admitted as (for example, exchange visitor, visitor, temporary worker, student):';
// $pdf->writeHTMLCell(190, 7, 27, 210.5, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p1_11_a', 177, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 215.6);
// //...........
// $pdf->SetFont('times', '', 14);
// if (showData('p1_11_b_chekbox') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="24" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 222.5, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I was inspected at a Port of Entry and paroled as (for example, humanitarian parole, Cuban parole):';
// $pdf->writeHTMLCell(190, 7, 27, 223.5, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p1_11_b', 177, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 229);

// //..................
// $pdf->SetFont('times', '', 14);
// if (showData('p1_11_c_chekbox') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="25" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 236, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I came into the United States without admission or parole.';
// $pdf->writeHTMLCell(190, 7, 27, 237, $html, '', 0, 0, true, 'L');

// //..................
// $pdf->SetFont('times', '', 14);
// if (showData('p1_11_d_chekbox') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="26" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 244, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Other: ';
// $pdf->writeHTMLCell(190, 7, 27, 245, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p1_11_c', 177, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 28, 250);

// // //******************************
// // //******** End Page No 2 ******
// // //******************************

// // //******************************
// // //******** Start Page No 3****
// // //******************************

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(11.6);
// $html = '<div><b>Part 1. Information About You</b> (Person applying for lawful permanent residence) (continued)</div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 25, $html, 1, 1, true, 'L');

// // ..........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>12.</b> ';
// $pdf->writeHTMLCell(90, 7, 13, 32, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $html = "<div>If you were issued a Form I-94 Arrival/Departure Record, provide the information from your most recent Form I-94 below:</div>";
// $pdf->writeHTMLCell(190, 7, 21.4, 32, $html, '', 0, 0, true, 'L');

// //..........

// $pdf->SetFont('times', '', 10);
// $html = "<div>Family Name (Last Name) </div>";
// $pdf->writeHTMLCell(130, 1, 21.5, 37.3, $html, 0, 0, false, true, 'L', true);
// //............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_12_fmily_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 42);
// //........
// $pdf->SetFont('times', '', 10);
// $html = "<div>Given Name (First Name)  </div>";
// $pdf->writeHTMLCell(130, 1, 114.5, 37.3, $html, 0, 0, false, true, 'L', true);
// //............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_12_given_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115.5, 42);
// //............
// $pdf->SetFont('times', '', 10); // set font
// $html = "<div>Form I-94 Arrival/Departure Record Number</div>";
// $pdf->writeHTMLCell(190, 7, 21.4, 51, $html, '', 0, 0, true, 'L');
// // ..........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21.6, 59, 'Expiration Date of Authorized Stay Shown on Form I-94 (mm/dd/yyyy)<br>
// or Type or Print "D/S" for Duration of Status ', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_12_i_194', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 96, 51);
// $pdf->TextField('p1_12_expiration_date', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 128, 59.5);
// //.............
// // ..........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21.6, 69, 'Immigration Status on Form I-94 (for example, class of admission,<br>
// or paroled, if paroled) ', '', 0, 0, true, 'L');
// //.....
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_12_immigration_status', 76.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 128, 69.5);

// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 80, "<b>13.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Was your last arrival the first time you were physically present in the United States?", 0, 1, false, false, 'L', true);
// //............
// if (showData('p1_13_status') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('p1_13_status') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 80, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 79, $html, 0, 1, false, true, 'J', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 88, "<b>14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>What is your current immigration status (if it has changed since your last arrival)?", 0, 1, false, false, 'L', true);
// //............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_14', 64.9, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 88);
// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 96, '<b>15.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Expiration Date of Current Immigration Status (mm/dd/yyyy) or Type or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print "D/S" for Duration of Status', 0, 1, false, false, 'L', true);
// //............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_15', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 128, 97);
// // // //...........
// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 106, '<b>16.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Have you ever been issued an "alien crewman" visa?', 0, 1, false, false, 'L', true);
// //............
// if (showData('p1_16_status') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('p1_16_status') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 106, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 105, $html, 0, 1, false, true, 'J', true);
// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 114, '<b>17.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Did you last arrive in the United States to join a vessel as a seaman or crewman, or while serving in any<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;capacity aboard a vessel or aircraft?', 0, 1, false, false, 'L', true);
// //............
// if (showData('p1_17_status') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('p1_17_status') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 115, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 114, $html, 0, 1, false, true, 'J', true);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 123, '<b>18.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Addresses', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 129, '<b>Current U.S. Physical Address</b>', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 135, 'In Care Of Name (if any)', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_care_name', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 140);


// //.............

// $pdf->SetFont('times', '', 10);
// $html = '<div>Street Number and Name</div>';
// $pdf->writeHTMLCell(90, 7, 21, 147, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_street_number', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 153);
// // ...........
// if (showData('p1_18_apt_ste_flr') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('p1_18_apt_ste_flr') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('p1_18_apt_ste_flr') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="50a" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="50st" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="50f" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 153, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(50, 0, 144.2, 147, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 147, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_number', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 153);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>City or Town </div>';
// $pdf->writeHTMLCell(50, 5, 21, 160.7, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_city_town', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 166);
// //............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>State</div>';
// $pdf->writeHTMLCell(50, 4, 144, 160.7, $html, '', 0, 0, true, 'L');
// //..........
// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p1_18_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 166);
// $pdf->SetFont('times', '', 10);
// $html = '<div>ZIP Code</div>';
// $pdf->writeHTMLCell(30, 3, 168, 160.7, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_zip_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 166);
// //..............
// $pdf->SetFont('times', '', 10);
// $html = '<div>Date You First Resided at This Address (mm/dd/yyyy)</div>';
// $pdf->writeHTMLCell(130, 3, 21, 174.7, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_resided_date', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 101, 175);
// //............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 182, 'Is this your current mailing address?', 0, 1, false, false, 'L', true);
// //............
// if (showData('p1_18_mailing_address_status') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('p1_18_mailing_address_status') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 183, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 182, $html, 0, 1, false, true, 'J', true);
// //............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 188, 'If you answered "No," provide your current mailing address.', 0, 1, false, false, 'L', true);
// $pdf->writeHTMLCell(190, 7, 21, 196, '<b>Current Mailing Address (Safe or Alternate Mailing Address, if applicable)</b>', 0, 1, false, false, 'L', true);
// //.............
// $pdf->writeHTMLCell(190, 7, 21, 202, 'In Care Of Name (if any)', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_care_name2', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 207);
// //.............

// $pdf->SetFont('times', '', 10);
// $html = '<div>Street Number and Name</div>';
// $pdf->writeHTMLCell(90, 7, 21, 213, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_street_number2', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 219.5);
// // ...........
// if (showData('p1_18_apt_ste_flr2') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('p1_18_apt_ste_flr2') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('p1_18_apt_ste_flr2') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="50a" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="50st" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="50f" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 219.5, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(50, 0, 144.2, 213, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 213, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_street_number2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 219.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>City or Town </div>';
// $pdf->writeHTMLCell(50, 5, 21, 227.2, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_city_town2', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 232);
// //............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>State</div>';
// $pdf->writeHTMLCell(50, 4, 144, 227.2, $html, '', 0, 0, true, 'L');
// //..........
// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p1_18_state2", 22, 7, $comboBoxOptions, array(), array(), 144.2, 232);
// $pdf->SetFont('times', '', 10);
// $html = '<div>ZIP Code</div>';
// $pdf->writeHTMLCell(30, 3, 168, 227.2, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_18_zip_code2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 232);

// // //******************************
// // //******** End Page No 3 ******
// // //******************************

// // //******************************
// // //******** Start Page No 4****
// // //******************************

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = '<div><b>Part 1. Information About You</b>   (Person applying for lawful permanent residence) (continued)</div>';
// $pdf->writeHTMLCell(191.5, 6.5, 13, 26, $html, 1, 1, true, 'L');
// addYesNoQuestion($pdf, 'Have you resided at your current address for at least 5 years?', 20, 32.5, '54', 'i_131_exclusion_status');
// //........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(197, 5, 20, 40, 'If you answered "No," provide your prior address(es) for the last 5 years. Use the space provided in <b>Part 14. Additional<br>
// Information, </b> if necessary. ', '', 1, false, 'L');
// // *.................
// // *Reuseable Section
// // *.................
// $startX = 20;
// $startY = 52;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid');

// // ---------------------- Section: Title ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, $lineHeight, $startX, $startY, '<b>Prior Address</b>', '', 0, 0, true, 'L');

// // ---------------------- In Care Of ----------------------
// $pdf->writeHTMLCell(190, $lineHeight, $startX, $startY + 6, 'In Care Of Name (if any)', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_care_name3', 121, $fieldHeight, $stroke, array(), $startX + 1, $startY + 11);

// // ---------------------- Street Number ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(90, $lineHeight, $startX, $startY + 18, 'Street Number and Name', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_street_number3', 121, $fieldHeight, $stroke, array(), $startX + 1, $startY + 24);

// // ---------------------- Apt / Ste / Flr ----------------------
// $apt_ste_flr = showData('p1_18_apt_ste_flr3');
// $checked_apt = $apt_ste_flr == 'apt' ? 'checked' : '';
// $checked_ste = $apt_ste_flr == 'ste' ? 'checked' : '';
// $checked_flr = $apt_ste_flr == 'flr' ? 'checked' : '';

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 144.2, $startY + 18, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 14);
// $html = '
//   <input type="checkbox" name="50a" value="Apt" ' . $checked_apt . ' />&nbsp;
//   <input type="checkbox" name="50st" value="Ste" ' . $checked_ste . '  />
//   <input type="checkbox" name="50f" value="Flr" ' . $checked_flr . ' />
// ';
// $pdf->writeHTMLCell(50, 0, 143, $startY + 24, $html, '', 0, 0, true, 'L');

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 167, $startY + 18, "Number", '', 0, 0, true, 'L');

// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_number3', 36, $fieldHeight, $stroke, array(), 168, $startY + 24);

// // ---------------------- City / State / ZIP ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 5, $startX, $startY + 31.7, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_city_town3', 121, $fieldHeight, $stroke, array(), $startX + 1, $startY + 37);

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 4, 144, $startY + 31.7, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $comboBoxOptions = [''];
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p1_18_state3", 22, $fieldHeight, $comboBoxOptions, array(), array(), 144.2, $startY + 37);
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(30, 3, 168, $startY + 31.7, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_zip_code3', 36, $fieldHeight, $stroke, array(), 168, $startY + 37);
// // ---------------------- Province / Postal Code / Country ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY + 45.5, "<div>Province</div>", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 62.3, $startY + 45.5, '<div>Postal Code</div>', 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 121, $startY + 45.5, "Country", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 58, "Dates of Residence ", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 64, "From (mm/dd/yyyy) ", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 80, $startY + 64, "To (mm/dd/yyyy)", 0, 0, false, false, 'L', true);
// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField(
//     'p1_18_province3',
//     60,
//     $fieldHeight,
//     $stroke,
//     array(),
//     $startX + 0.8,
//     $startY + 50.5
// );
// $pdf->TextField('p1_18_postal_code3', 55.5, $fieldHeight, $stroke, array(), $startX + 62.5, $startY + 50.5);
// $pdf->TextField('p1_18_country3', 65, $fieldHeight, $stroke, array(), $startX + 120, $startY + 50.5);
// $pdf->TextField('p1_18_residence_from_date3', 47, $fieldHeight, $stroke, array(), $startX + 32, $startY + 65.5);
// $pdf->TextField('p1_18_residence_to_date3', 47, $fieldHeight, $stroke, array(), $startX + 108, $startY + 65.5);

// // *.................
// // *Reuseable Section
// // *.................
// $startX = 20;
// $startY = 127.5;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid');

// // ---------------------- Section: Title ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, $lineHeight, $startX, $startY, '<b>Most Recent Address Outside the United States</b>', '', 0, 0, true, 'L');
// // ---------------------- Section: Title ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, $lineHeight, $startX, $startY + 7, 'Provide your most recent physical address outside the United States where you lived for more than one year (if not already<br>
// listed above).', '', 0, 0, true, 'L');

// // ---------------------- Street Number ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(90, $lineHeight, $startX, $startY + 18, 'Street Number and Name', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_street_number4', 121, $fieldHeight, $stroke, array(), $startX + 1, $startY + 24);

// // ---------------------- Apt / Ste / Flr ----------------------
// $apt_ste_flr = showData('p1_18_apt_ste_flr4');
// $checked_apt = $apt_ste_flr == 'apt' ? 'checked' : '';
// $checked_ste = $apt_ste_flr == 'ste' ? 'checked' : '';
// $checked_flr = $apt_ste_flr == 'flr' ? 'checked' : '';

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 144.2, $startY + 18, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 14);
// $html = '
//   <input type="checkbox" name="50a" value="Apt" ' . $checked_apt . ' />&nbsp;
//   <input type="checkbox" name="50st" value="Ste" ' . $checked_ste . '  />
//   <input type="checkbox" name="50f" value="Flr" ' . $checked_flr . ' />
// ';
// $pdf->writeHTMLCell(50, 0, 143, $startY + 24, $html, '', 0, 0, true, 'L');

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 167, $startY + 18, "Number", '', 0, 0, true, 'L');

// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_number4', 36, $fieldHeight, $stroke, array(), 168, $startY + 24);

// // ---------------------- City / State / ZIP ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 5, $startX, $startY + 31.7, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_city_town4', 121, $fieldHeight, $stroke, array(), $startX + 1, $startY + 37);

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 4, 144, $startY + 31.7, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $comboBoxOptions = [''];
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p1_18_state4", 22, $fieldHeight, $comboBoxOptions, array(), array(), 144.2, $startY + 37);
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(30, 3, 168, $startY + 31.7, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_zip_code4', 36, $fieldHeight, $stroke, array(), 168, $startY + 37);
// // ---------------------- Province / Postal Code / Country ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY + 45.5, "<div>Province</div>", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 62.3, $startY + 45.5, '<div>Postal Code</div>', 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 121, $startY + 45.5, "Country", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 58, "Dates of Residence ", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 64, "From (mm/dd/yyyy) ", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 80, $startY + 64, "To (mm/dd/yyyy)", 0, 0, false, false, 'L', true);
// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_18_province4', 60, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 50.5);
// $pdf->TextField('p1_18_postal_code4', 55.5, $fieldHeight, $stroke, array(), $startX + 62.5, $startY + 50.5);
// $pdf->TextField('p1_18_country4', 65, $fieldHeight, $stroke, array(), $startX + 120, $startY + 50.5);
// $pdf->TextField('p1_18_residence_from_date4', 47, $fieldHeight, $stroke, array(), $startX + 32, $startY + 65.5);
// $pdf->TextField('p1_18_residence_to_date4', 47, $fieldHeight, $stroke, array(), $startX + 108, $startY + 65.5);
// //.....................
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(60, 1, 11.5, $startY + 73, "<b>19.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Social Security Card", 0, 0, false, false, 'L', true);
// addYesNoQuestion($pdf, 'Has the Social Security Administration (SSA) ever officially issued a Social Security card to you?', 20, 205.5, 'p1_19_officially_issued_ssa', 'i_131_exclusion_status');
// addYesNoQuestion($pdf, 'Do you want the SSA to issue you a Social Security card?', 20, 220, 'p1_19_want_to_issue_ssa', 'i_131_exclusion_status');
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(160, 1, 20, $startY + 84, 'If you answered "Yes," provide your U.S. Social Security Number (SSN).', 0, 0, false, false, 'L', true);
// //....................
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_19_social', 47, $fieldHeight, $stroke, array(), $startX + 112, $startY + 85);
// //...........
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(160, 5, 20, 229.5, 'If you answered "Yes," you must also answer "Yes" to the <b>Consent for Disclosure</b> below.', 0, 0, 0, true, 'L', false);
// addYesNoQuestion($pdf, '<b>Consent for Disclosure:</b> I authorize disclosure of information from this application to the SSA as<br>
// required for the purpose of assigning me an SSN and issuing me a Social Security Card.', 20, 235, 'p1_19_want_to_issue_ssa', 'p1_19_consent_for_disclosure');
// // //******************************
// // //******** End Page No 4 ******
// // //******************************

// // //******************************
// // //******** Start Page No 5****
// // // //******************************

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = '<div><b>Part 2. Application Type or Filing Category</b></div>';
// $pdf->writeHTMLCell(191.5, 6.5, 13, 26, $html, 1, 1, true, 'L');
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 33, "<b>1.</b>", 0, 0, false, true, 'L', true);
// addYesNoQuestion($pdf, 'Are you filing for adjustment of status with the Executive Office for Immigration Review (EOIR) while<br>in removal, exclusion, rescission, or deportation proceedings?', 20, 32.5, '54', 'i_131_exclusion_status');
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 43, "<b>2.</b>", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(130, 1, 20, 43, "Receipt Number of Underlying Petition (if any)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(130, 1, 106.8, 43, "Priority Date from Underlying Petition (if any)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(130, 1, 106.8, 48.5, "(mm/dd/yyyy)", 0, 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p2_2_receipt_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 48);
// $pdf->TextField('p2_2_priority_date', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 129, 48);
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 20, 55.5, "I am filing this Form I-485 as a (select <b>only one</b> box):", 0, 0, false, true, 'L', true);
// //.................
// drawCheckboxWithLabel($pdf, 19, 61, 'p2_2_principal_applicant', 'i_131_correction_terms_conditions_status', 'Principal Applicant');
// drawCheckboxWithLabel($pdf, 19, 67, 'p2_2_derivative_applicant', 'i_131_correction_terms_conditions_status', 'Derivative Applicant (Provide the following information about the principal applicant.)');
// //.......
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 20, 74, "Principal Applicant's Name", 0, 0, false, true, 'L', true);
// //...................
// $startX = 20;
// $startY = 80;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// // Labels
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 131, $startY - 0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 12, "Principal Applicant's A-Number (if any)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72, $startY + 11, "Principal Applicant's Date of Birth<br>(mm/dd/yyyy)", 0, 0, false, false, 'L', true);

// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p2_2_family', 70, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 5);    // Family Name
// $pdf->TextField('p2_2_given', 57.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
// $pdf->TextField('p2_2_middle', 52, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name
// $pdf->TextField('p2_2_a_number', 48, $fieldHeight, $stroke, array(), $startX + 10.8, $startY + 18.2);    // principal application 
// $pdf->TextField('p2_2_dob', 50, $fieldHeight, $stroke, array(), $startX + 94, $startY + 18.2);    // date of birth
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 107, "<b>I am applying</b> based on the following category (You must select <b>ONLY ONE</b> category. If you are filing as a derivative<br>
// applicant, select the appropriate box based on the category under which the principal applicant is applying or has applied. See<br>
// the Form I-485 Instructions for more information, including any <b>Additional Instructions</b> that relate to the immigrant category<br>
// you select.):", 0, 0, false, true, 'L', true);
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 128, "<b>3.a.&nbsp;&nbsp;&nbsp;Family-based</b>", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(190, 1, 20, 134, "Immediate relative of a U.S. citizen, Form I-130, I-129F, or I-360 (select your specific category below):", 0, 0, false, true, 'L', true);
// //.................
// drawCheckboxWithLabel($pdf, 19, 139, 'p2_3a_spouse_us_citizen', 'i_485_spouse_us_citizen_status', 'Spouse of a U.S. Citizen.');
// drawCheckboxWithLabel($pdf, 19, 146, 'p2_3a_child_us_citizen', 'i_485_child_us_citizen_status', 'Unmarried child under 21 years of age of a U.S. citizen.');
// drawCheckboxWithLabel($pdf, 19, 153, 'p2_3a_parent_us_citizen', 'i_485_parent_us_citizen_status', 'Parent of a U.S. citizen (if the citizen is at least 21 years of age).');
// drawCheckboxWithLabel($pdf, 19, 160, 'p2_3a_fiance_us_citizen', 'i_485_fiance_us_citizen_status', 'Person admitted to the United States as a fiancé(e) or child of a fiancé(e) of a U.S. citizen (K-1/K-2 Nonimmigrant).');
// drawCheckboxWithLabel($pdf, 19, 167, 'p2_3a_widow_us_citizen', 'i_485_widow_us_citizen_status', 'Widow or widower of a U.S. citizen.');
// drawCheckboxWithLabel($pdf, 19, 173, 'p2_3a_ndaa_relative', 'i_485_ndaa_relative_status', 'Spouse, child, or parent of a deceased U.S. active-duty service member in the armed forces under the National Defense Authorization Act (NDAA).');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 184, "Other relative of a U.S. citizen under the family-based preference categories, Form I-130 (select your specific category below):", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 190, 'p2_3a_unmarried_son_daughter_us_citizen', 'i_485_unmarried_son_daughter_us_citizen_status', 'Unmarried son or daughter of a U.S. citizen and I am 21 years of age or older.');
// drawCheckboxWithLabel($pdf, 19, 197, 'p2_3a_married_son_daughter_us_citizen', 'i_485_married_son_daughter_us_citizen_status', 'Married son or daughter of a U.S. citizen.');
// drawCheckboxWithLabel($pdf, 19, 204, 'p2_3a_brother_sister_us_citizen', 'i_485_brother_sister_us_citizen_status', 'Brother or sister of a U.S. citizen (if the citizen is at least 21 years of age).');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 211, "Relative of a lawful permanent resident under the family-based preference categories, Form I-130 (select your specific category below):", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 220, 'p2_3a_spouse_lpr', 'i_485_spouse_lpr_status', 'Spouse of a lawful permanent resident.');
// drawCheckboxWithLabel($pdf, 19, 227, 'p2_3a_child_lpr', 'i_485_child_lpr_status', 'Unmarried child under 21 years of age of a lawful permanent resident.');
// drawCheckboxWithLabel($pdf, 19, 234, 'p2_3a_unmarried_son_daughter_lpr', 'i_485_unmarried_son_daughter_lpr_status', 'Unmarried son or daughter of a lawful permanent resident and I am 21 years of age or older.');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 241, "VAWA self-petitioner (victim of battery or extreme cruelty), Form I-360 (select your specific category below):", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 245.5, 'p2_3a_vawa_spouse', 'i_485_vawa_spouse_status', 'VAWA self-petitioning spouse of a U.S. citizen or lawful permanent resident.');
// drawCheckboxWithLabel($pdf, 19, 251.5, 'p2_3a_vawa_child', 'i_485_vawa_child_status', 'VAWA self-petitioning child of a U.S. citizen or lawful permanent resident.');
// drawCheckboxWithLabel($pdf, 19, 258, 'p2_3a_vawa_parent', 'i_485_vawa_parent_status', 'VAWA self-petitioning parent of a U.S. citizen (if the citizen is at least 21 years of age).');

// // !start 
// // ******************************
// // ******** End Page No 5 ******
// // ******************************

// // ******************************
// // ******** Start Page No 6****
// // ******************************

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = '<div><b>Part 2. Application Type or Filing Category </b> (continued)</div>';
// $pdf->writeHTMLCell(191.5, 6.5, 13, 26, $html, 1, 1, true, 'L');
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 33, "<b>3.b.&nbsp;&nbsp;&nbsp;Employment-based </b>", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 38.5, 'p2_3b_alien_extraordinary', 'i_485_alien_extraordinary_status', 'Alien of Extraordinary Ability');
// $pdf->writeHTMLCell(190, 1, 20, 45, "Alien Workers, Form I-140 (select your category below and answer the following questions below, as applicable): ", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 50.5, 'p2_3b_outstanding_professor', 'i_485_outstanding_professor_status', 'Outstanding Professor or Researcher');
// drawCheckboxWithLabel($pdf, 19, 57, 'p2_3b_multinational_exec', 'i_485_multinational_exec_status', 'Multinational Executive or Manager');
// drawCheckboxWithLabel($pdf, 19, 63, 'p2_3b_advanced_degree', 'i_485_advanced_degree_status', 'Member of the Professions Holding an Advanced Degree or Alien of Exceptional Ability (who is NOT seeking a National Interest Waiver)');
// drawCheckboxWithLabel($pdf, 19, 73, 'p2_3b_professional_bachelor', 'i_485_professional_bachelor_status', "A Professional (at a minimum, requiring a bachelor's degree or a foreign degree equivalent to a U.S. bachelor's degree)");
// drawCheckboxWithLabel($pdf, 19, 80, 'p2_3b_skilled_worker', 'i_485_skilled_worker_status', 'A Skilled Worker (requiring at least 2 years of specialized training or experience)');
// drawCheckboxWithLabel($pdf, 19, 87, 'p2_3b_other_worker', 'i_485_other_worker_status', 'Any Other Worker (requiring less than 2 years of training or experience)');
// drawCheckboxWithLabel($pdf, 19, 94, 'p2_3b_national_interest', 'i_485_national_interest_status', 'An Alien Applying For a National Interest Waiver (who IS a member of the professions holding an advanced degree or an alien of exceptional ability)');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 105.5, "Did a relative file the associated Form I-140 for you (or for the principal applicant if you are a derivative applicant) or does a relative have a significant ownership interest (5 percent or more) in the business that filed Form I-140 for you (or for the principal applicant, if you are a derivative applicant)? ", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 120, 'p2_3b_na_self_petition', 'i_485_na_self_petition_status', 'N/A (I am adjusting on the basis of a Form I-140 self-petition)');
// drawCheckboxWithLabel($pdf, 19, 127, 'p2_3b_no', 'i_485_no_status', 'No');
// drawCheckboxWithLabel($pdf, 19, 134, 'p2_3b_yes', 'i_485_yes_status', 'Yes');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 26, 142, 'If you answered "Yes," is this relative your (select only one box):', 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 25, 147, 'p2_3b_father', 'i_485_father_status', 'Father');
// drawCheckboxWithLabel($pdf, 47, 147, 'p2_3b_mother', 'i_485_mother_status', 'Mother');
// drawCheckboxWithLabel($pdf, 69, 147, 'p2_3b_child', 'i_485_child_status', 'Child');
// drawCheckboxWithLabel($pdf, 88, 147, 'p2_3b_adult_son', 'i_485_adult_son_status', 'Adult Son');
// drawCheckboxWithLabel($pdf, 113.5, 147, 'p2_3b_adult_daughter', 'i_485_adult_daughter_status', 'Adult Daughter');
// drawCheckboxWithLabel($pdf, 147, 147, 'p2_3b_brother', 'i_485_brother_status', 'Brother');
// drawCheckboxWithLabel($pdf, 170, 147, 'p2_3b_sister', 'i_485_sister_status', 'Sister');
// drawCheckboxWithLabel($pdf, 25, 154, 'p2_3b_none', 'i_485_none_status', 'None of These');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 26, 162, 'Is the relative above a:', 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 25, 167, 'p2_3b_us_citizen', 'i_485_us_citizen_status', 'U.S. Citizen');
// drawCheckboxWithLabel($pdf, 52, 167, 'p2_3b_us_national', 'i_485_us_national_status', 'U.S. National');
// drawCheckboxWithLabel($pdf, 81, 167, 'p2_3b_lpr', 'i_485_lpr_status', 'Lawful Permanent Resident');
// drawCheckboxWithLabel($pdf, 130, 167, 'p2_3b_none', 'i_485_none2_status', 'None of These');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 175, "<b>3.c.&nbsp;&nbsp;&nbsp;Special Immigrant </b>", 0, 0, false, true, 'L', true);

// drawCheckboxWithLabel($pdf, 19, 181, 'p2_3c_special_juvenile', 'i_485_special_juvenile_status', 'Special Immigrant Juvenile, Form I-360');
// drawCheckboxWithLabel($pdf, 19, 187.3, 'p2_3c_afghan_iraqi', 'i_485_afghan_iraqi_status', 'Certain Afghan or Iraqi National, Form I-360 or Form DS-157');
// drawCheckboxWithLabel($pdf, 19, 193.5, 'p2_3c_broadcaster', 'i_485_broadcaster_status', 'Certain International Broadcaster, Form I-360');
// drawCheckboxWithLabel($pdf, 19, 199.7, 'p2_3c_g4_nato', 'i_485_g4_nato_status', 'Certain G-4 International Organization or Family Member or NATO-6 Employee or Family Member, Form I-360');
// drawCheckboxWithLabel($pdf, 19, 206, 'p2_3c_armed_forces', 'i_485_armed_forces_status', 'Certain U.S. Armed Forces Members (also known as the Six and Six program), Form I-360');
// drawCheckboxWithLabel($pdf, 19, 212, 'p2_3c_panama', 'i_485_panama_status', 'Panama Canal Zone Employees, Form I-360');
// drawCheckboxWithLabel($pdf, 19, 218.3, 'p2_3c_physicians', 'i_485_physicians_status', 'Certain Physicians, Form I-360');
// drawCheckboxWithLabel($pdf, 19, 224.5, 'p2_3c_usgov_employee', 'i_485_usgov_employee_status', 'Certain Employee or Former Employee of the U.S. Government Abroad, DS-1884');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 232, 'Religious Worker, Form I-360 (select your specific category below):', 0, 0, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 238.5, 'p2_3c_minister', 'i_485_minister_status', 'Minister of Religion');
// drawCheckboxWithLabel($pdf, 19, 244.5, 'p2_3c_other_religious', 'i_485_other_religious_status', 'Other Religious Worker');
// // //******************************
// // //******** End Page No 6 ******
// // //******************************

// // //******************************
// // //******** Start Page No 7****
// // //******************************
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = '<div><b>Part 2. Application Type or Filing Category </b> (continued)</div>';
// $pdf->writeHTMLCell(191.5, 6.5, 13, 26, $html, 1, 1, true, 'L');
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 33, "<b>3.d.&nbsp;&nbsp;&nbsp;Asylee or Refugee </b>", 0, 0, false, true, 'L', true);
// //................. 
// drawCheckboxWithLabel($pdf, 19, 38.5, 'p2_3d_asylum', 'i_485_asylum_status', 'Asylum Status (Immigration and Nationality Act (INA) section 208), Form I-589 or Form I-730');
// $pdf->writeHTMLCell(190, 1, 20, 45, "If you selected asylum, date you were granted asylum (mm/dd/yyyy). ", 0, 0, false, true, 'L', true);
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_asylum_date', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 127, 45);
// //........
// //................. 
// drawCheckboxWithLabel($pdf, 19, 51.5, 'p2_3d_refugee', 'i_485_refugee_status', 'Refugee Status (INA section 207), Form I-590 or Form I-730');
// $pdf->writeHTMLCell(190, 1, 20, 59, "If you selected refugee, date of initial admission as refugee (mm/dd/yyyy).", 0, 0, false, true, 'L', true);
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_refugee_date', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 127, 59);
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 66, "<b>3.e.&nbsp;&nbsp;&nbsp;Human Trafficking Victim or Crime Victim</b>", 0, 0, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 71.5, 'p2_3e_t_visa', 'i_485_human_trafficking_status', 'Human Trafficking Victim (T Nonimmigrant), Form I-914 or Derivative Family Member, Form I-914A');
// drawCheckboxWithLabel($pdf, 19, 78, 'p2_3e_u_visa', 'i_485_crime_victim_status', 'Victim of Qualifying Criminal Activity (U Nonimmigrant), Form I-918, Derivative Family Member, Form I-918A, or<br>Qualifying Family Member, Form I-929r');
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 89, "<b>3.f.&nbsp;&nbsp;&nbsp;Special Programs Based on Certain Public Laws</b>", 0, 0, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 95.5, 'p2_3f_cuban_adjustment', 'i_485_cuban_adjustment_status', 'The Cuban Adjustment Act ');
// drawCheckboxWithLabel($pdf, 19, 102, 'p2_3f_cuban_vawa', 'i_485_cuban_vawa_status', 'A Victim of Battery or Extreme Cruelty as a Spouse or Child Under the Cuban Adjustment Act');
// drawCheckboxWithLabel($pdf, 19, 109, 'p2_3f_hrifa', 'i_485_hrifa_status', 'Applicant Adjusting Based on Dependent Status Under the Haitian Refugee Immigrant Fairness Act');
// drawCheckboxWithLabel($pdf, 19, 116, 'p2_3f_hrifa_vawa', 'i_485_hrifa_vawa_status', 'A Victim of Battery or Extreme Cruelty as a Spouse or Child Applying Based on Dependent Status Under the Haitian<br>Refugee Immigrant Fairness Act');
// drawCheckboxWithLabel($pdf, 19, 126.5, 'p2_3f_lautenberg', 'i_485_lautenberg_status', "Lautenberg Parolees");
// drawCheckboxWithLabel($pdf, 19, 133.5, 'p2_3f_section13', 'i_485_section13_status', 'Diplomats or High-Ranking Officials Unable to Return Home (Section 13 of the Act of September 11, 1957)');
// drawCheckboxWithLabel($pdf, 19, 140, 'p2_3f_se_asia', 'i_485_se_asia_status', 'Nationals of Vietnam, Cambodia, and Laos Applying for Adjustment of Status Under section 586 of Public Law 106-429');
// drawCheckboxWithLabel($pdf, 19, 146.6, 'p2_3f_amerasian', 'i_485_amerasian_status', 'Applicant Adjusting Under the Amerasian Act (October 22, 1982), Form I-360');
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 155, "<b>3.g.&nbsp;&nbsp;&nbsp;Additional Options  </b>", 0, 0, false, true, 'L', true);
// // ......... 
// drawCheckboxWithLabel($pdf, 19, 161, 'p2_3g_dv', 'i_485_diversity_visa_status', 'Diversity Visa program');
// $pdf->writeHTMLCell(190, 1, 20, 168, "If you selected Diversity Visa program, provide your Diversity Visa Rank Number:", 0, 0, false, true, 'L', true);
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_diversity_visa_rank', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 168);
// //............. 
// drawCheckboxWithLabel($pdf, 19, 174, 'p2_3g_registry', 'i_485_registry_status', 'Continuous Residence in the United States Since Before January 1, 1972 ("Registry")');
// drawCheckboxWithLabel($pdf, 19, 180.5, 'p2_3g_diplomatic_birth', 'i_485_diplomatic_birth_status', 'Individual Born in the United States Under Diplomatic Status');
// drawCheckboxWithLabel($pdf, 19, 187, 'p2_3g_s_nonimmigrant', 'i_485_s_nonimmigrant_status', 'S Nonimmigrants and Qualifying Family Members (can only adjust in this category with an approved Form I-854B filed by<br>a law enforcement officer) ');
// drawCheckboxWithLabel($pdf, 19, 197, 'p2_3g_other', 'i_485_other_eligibility_status', 'Other Eligibility');
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_other_eligibility_text', 178, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 202.8);

// //..............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 210.6, "<b>4.</b>", 0, 0, false, true, 'L', true);
// addYesNoQuestion($pdf, 'If you selected a family-based, employment-based, special immigrant, or Diversity Visa immigrant<br>
// category listed above in <b>Item Numbers 3.a. - 3.g</b>. as the basis for your application for adjustment of<br>
// status, are you applying for adjustment based on INA section 245(i)?', 20, 210, 'name', 'i_485_diversity_visa_immigrant_status');
// //..............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 223.6, "<b>5.</b>", 0, 0, false, true, 'L', true);
// addYesNoQuestion($pdf, 'Are you 21 years of age or older and applying for adjustment based on classification as a child, under the<br>
// provisions of the Child Status Protection Act (CSPA)?', 20, 223, 'name', 'i_485_21_years_applying_status');
// //..............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 235, "<b>NOTE:</b>For more information to determine if you are eligible under CSPA, see the <b>Who May File Form I-485</b> section of these<br>Instructions.", 0, 0, false, true, 'L', true);
// // //******************************
// // //******** End Page No 7 ******
// // //******************************

// // //******************************
// // //******** Start Page No 8 ****
// // //******************************
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = "<div><b>Part 3. Request for Exemption for Intending Immigrant's Affidavit of Support Under Section 213A of the INA  </b> </div>";
// $pdf->writeHTMLCell(191.5, 6.5, 13, 25.5, $html, 1, 1, true, 'L');

// // Main instructional text
// $pdf->SetFont('Times', '', 10);
// $pdf->writeHTMLCell(210, 6, 12, 38, 'I am requesting an exemption from submitting an Affidavit of Support Under Section 213A of the INA (Form I-864 or Form I-864EZ)<br>because (select <b>only one</b>):', 0, 1, false, true, 'L', true);

// // ........ Part 3 ........
// $pdf->writeHTMLCell(210, 6, 12, 48, '<b>1.a.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 47, 'i_485_p3_1a_status', 'i_485_p3_1a_key', 'I have earned or can receive credit for 40 qualifying quarters (credits) of work in the United States (as defined by the Social<br>
// Security Act (SSA)). (Attach your SSA earnings statements. Do not count any quarters during which you received a means-<br>tested public benefit.)');

// $pdf->writeHTMLCell(210, 6, 12, 63, '<b>1.b.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 62, 'i_485_p3_1b_status', 'i_485_p3_1b_key', 'I am under 18 years of age, unmarried, the child of a U.S. citizen, am not likely to become a public charge, and will<br>
// automatically become a U.S. citizen under INA section 320, upon my admission as a lawful permanent resident. ');

// $pdf->writeHTMLCell(210, 6, 12, 73.5, '<b>1.c.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 72.5, 'i_485_p3_1c_status', 'i_485_p3_1c_key', 'I am applying under the widow or widower of a U.S. citizen (Form I-360) immigrant category.');

// $pdf->writeHTMLCell(210, 6, 12, 80.5, '<b>1.d.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 79.5, 'i_485_p3_1d_status', 'i_485_p3_1d_key', 'I am applying as a VAWA self-petitioner.');

// $pdf->writeHTMLCell(210, 6, 12, 87.5, '<b>1.e.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 86.5, 'i_485_p3_1e_status', 'i_485_p3_1e_key', 'None of these exemptions apply to me and I am not required by statute to submit an Affidavit of Support Under Section<br>
// 213A of the INA, nor am I required to request an exemption.');

// $pdf->writeHTMLCell(210, 6, 12, 97.5, '<b>1.f.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 96.5, 'i_485_p3_1f_status', 'i_485_p3_1f_key', 'None of these exemptions apply to me and I am not requesting an exemption as I am required to submit an Affidavit of<br>
// Support Under Section 213A of the INA.');

// //.......... Part 4 ..........
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = "<div><b>Part 4. Additional Information About You</b> </div>";
// $pdf->writeHTMLCell(191.5, 6.5, 13, 110, $html, 1, 1, true, 'L');

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 117, "<b>1.</b>", 0, 0, false, 'L');
// addYesNoQuestion($pdf, 'Have you ever applied for an immigrant visa to obtain permanent resident status at a U.S. Embassy or<br>
// U.S. Consulate abroad?', 20, 116.5, '54', 'i_485_p4_1_status');

// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 20, 127, 'If you answered "Yes," complete <b>Item Numbers 2. - 4.</b>below.', 0, 0, false, 'L');

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 132.8, '<b>2.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 133, 'Location of U.S. Embassy or U.S. Consulate', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 141, 'City or Town', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 113.6, 141, 'Country', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_p4_2_city_town', 92, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 21, 145.7);
// $pdf->TextField('i_485_p4_2_country', 90, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 115, 145.7);

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 154.8, '<b>3.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 155, 'Decision (for example, approved, refused, denied, withdrawn)', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_p4_3_decision', 87, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 118, 154.9);

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 162.8, '<b>4.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 163, 'Date of Decision (mm/dd/yyyy)', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_p4_4_date_decision', 48, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 69, 163.5);

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 172, '<b>5.</b>', 0, 0, false, 'L');
// addYesNoQuestion($pdf, 'Have you previously applied for permanent residence while in the United States?', 20, 171, '54', 'i_485_p4_5_status');

// //.............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 180, '<b>6.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 35, 180, '<b>EVER</b>', 0, 0, false, 'L');
// addYesNoQuestion($pdf, '<div>Have you&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; held lawful permanent resident status which was later rescinded under INA section 246?</div>', 20, 179, '54', 'i_485_p4_6_status');

// //.............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 187, '<b>Employment and Educational History</b>', 0, 0, false, 'L');

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 194, '<b>7.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 194, 'Provide <b>ALL</b> of your employment and educational history for the last 5 years as indicated in the Instructions. Provide your<br>
// current employment or school attended first. Include periods of self-employment, unemployment, or retirement. For each period<br>
// of unemployment or retirement, list source of financial support. If you have additional employment or educational history, use<br>
// the space provided in <b>Part 14. Additional Information.</b>', 0, 0, false, 'L');

// //...........
// $pdf->writeHTMLCell(191.5, 6.5, 20, 214, 'Employer or School (current or most recent)', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 113.6, 214, 'Name of Employer, Company, or School', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_p4_7_employer_school', 92, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 21, 219);
// $pdf->TextField('i_485_p4_7_company_name', 90, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 115, 219);

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 20, 226.5, 'Your Occupation (if unemployed or retired, so state)', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('i_485_p4_7_occupation', 184, 7, array('strokeColor'=>[64,64,64],'lineWidth'=>1,'borderStyle'=>'solid'), array(), 21, 232);

// //  *****************************
// //  ******** End Page No 8******
// //  ******************************/

// // ******************************
// //  ******** Start Page No 9 ****
// //  ******************************/
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(11.6);

// // Section Header
// $html = '<div><b>Part 4. Additional Information About You (continued)</b></div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 25.5, $html, 1, 1, true, 'L');

// // Employer/School Address Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 32, 'Address of Employer, Company, or School', 0, 1, false, false, 'L', true);

// // Street Number and Name
// $pdf->writeHTMLCell(90, 7, 21, 36.6, 'Street Number and Name', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 43);

// // Apt/Ste/Flr Checkboxes
// if (showData('employer_apt_ste_flr') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('employer_apt_ste_flr') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('employer_apt_ste_flr') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox" name="p4_7_apt_ste_flr" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="p4_7_apt_ste_flr" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="p4_7_apt_ste_flr" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 43, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 0, 144.2, 38, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 38, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_unit_number', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 43);

// // City/State/ZIP Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 50, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_city', 120.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 55);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 144.2, 50, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("employer_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 55);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 168, 50, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_zip', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 55);

// // Province/Postal Code/Country Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 62, 'Province', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_province', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 67);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 93, 62, 'Postal Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_postal_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 67);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 132, 62, 'Country', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_country', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 67);

// // Dates Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 75, 'Dates of Employment, Unemployment, Retirement, or School Attendance', 0, 1, false, false, 'L', true);

// $pdf->writeHTMLCell(60, 7, 21, 82, 'From (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employment_from_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 53, 83.3);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(60, 7, 106, 82, 'To (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employment_to_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 134, 83.1);

// // Financial Support Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 89, 'If unemployed or retired, source of financial support:', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('financial_support', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 97);

// // 8. Most Recent Employer/School Outside US Section - UPDATED TO MATCH SCREENSHOT (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 104.5, '<b>8.</b>', 0, 1, false, false, 'L', true);
// $pdf->writeHTMLCell(190, 7, 21, 103.5, 'Provide your most recent employer or school outside of the United States (if not already listed above).', 0, 1, false, false, 'L', true);

// // Name and Occupation on SAME LINE (updated)
// $pdf->writeHTMLCell(90, 7, 21, 110, 'Name of Employer, Company, or School', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(90, 7, 114, 110, 'Your Occupation (if unemployed or retired, so state)', 0, 1, false, false, 'L', true);

// // Text fields below each label
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 117.4);
// $pdf->TextField('foreign_occupation', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 117.4);

// // Address Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 123, 'Address of Employer, Company, or School', 0, 1, false, false, 'L', true);

// // Street Number and Name
// $pdf->writeHTMLCell(90, 7, 21, 128, 'Street Number and Name', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_street', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 138);

// // Apt/Ste/Flr Checkboxes
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox" name="foreign_employer_addr_type" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="foreign_employer_addr_type" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="foreign_employer_addr_type" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 138, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 0, 144.2, 132, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 132, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_unit_number', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 138);

// // City/State/ZIP Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 146, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_city', 120.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 151);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 144.2, 146, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->ComboBox("foreign_employer_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 151);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 168, 146, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_zip', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 151);

// // Province/Postal Code/Country Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 158, 'Province', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_province', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 163);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 93, 158, 'Postal Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_postal_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 163);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 132, 158, 'Country', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_country', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 163);

// // Dates Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 171, 'Dates of Employment, Unemployment, Retirement, or School Attendance', 0, 1, false, false, 'L', true);

// $pdf->writeHTMLCell(60, 7, 21, 178, 'From (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employment_from_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 53, 179.3);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(60, 7, 106, 178, 'To (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employment_to_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 134, 179.1);

// // Financial Support Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 185, 'If unemployed or retired, source of financial support:', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_financial_support', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 193);

// // Part 5 Header (y-4)
// $pdf->SetFont('times', 'B', 12);
// $html = '<div><b>Part 5. Information About Your Parents</b></div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 204, $html, 1, 1, true, 'L');
// $html = '<div><i>Information About Your Parent 1</i></div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 213.5, $html, 0, 1, true, 'L');

// // 1. Parent 1's Legal Name - ALL THREE FIELDS ON ONE LINE (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 220, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent 1\'s Legal Name', 0, 1, false, false, 'L', true);

// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 21, 224, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 86, 223, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 222, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_last_name', 63.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 230);
// $pdf->TextField('parent1_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 230);
// $pdf->TextField('parent1_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 230);

// // 2. Parent 1's Name at Birth - ALL THREE FIELDS ON ONE LINE (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 238, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent 1\'s Name at Birth (if different than above)', 0, 1, false, false, 'L', true);

// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 21, 242, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 86, 241, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 240, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 63.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 248);
// $pdf->TextField('parent1_birth_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 248);
// $pdf->TextField('parent1_birth_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 248);

// // 3. Date of Birth
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 257, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_dob', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 66, 256.5);
// // // //.......

// // ******************************
// //  ******** End Page No 9 ******
// //  ******************************/

// // ******************************
// //  ******** Start Page No 10 ****
// //  ******************************/

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 5. Information About Your Parents</b> (continued)</div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
// //........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, 12, 34, '<b>4.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, 20, 34, "Country of Birth ", '', 1, false, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p13_Applicant_family_name', 90, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 38.7);
// //.................
// $pdf->setFont('Times', 'I', 12);
// $html = "<div><b>Information About Your Parent 2</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 48, $html, 0, 1, true, 'L');
// //........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, 12, 55, '<b>5.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, 20, 55, "Parent 2's Legal Name", '', 1, false, 'L');
// //.............
// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 20, 60, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 86, 59, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 58, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_last_name', 63.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 66);
// $pdf->TextField('parent1_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 66);
// $pdf->TextField('parent1_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 66);

// // 2. Parent 1's Name at Birth - ALL THREE FIELDS ON ONE LINE (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 74, "<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent 2's Name at Birth (if different than above)", 0, 1, false, false, 'L', true);

// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 20, 80, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 85, 79, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 78, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 63.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 86);
// $pdf->TextField('parent1_birth_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 86, 86);
// $pdf->TextField('parent1_birth_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 86);

// // 3. Date of Birth
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 95, '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_dob', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 95);
// //.........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 103, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_dob', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 108);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 6. Information About Your Marital History</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 120, $html, 1, 1, true, 'L');
// ///..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 127, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is your current marital status?', 0, 1, false, false, 'L', true);
// //.............
// $pdf->SetFont('times', '', 14);
// if (showData('biographic_info_eye_color') == "black") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 20, 133, '<input type="checkbox" name="p3_eye_color_status1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 61, 133, '<input type="checkbox" name="p3_eye_color_status3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 82, 133, '<input type="checkbox" name="p3_eye_color_status4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "green") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 105, 133, '<input type="checkbox" name="p3_eye_color_status5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "hazel") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 127, 133, '<input type="checkbox" name="p3_eye_color_status6" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "hazel") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 165, 133, '<input type="checkbox" name="p3_eye_color_status6" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(140, 1, 26, 133.5, "Single, Never Married", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 67, 133.5, "Married", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 88, 133.5, "Divorced", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 111, 133.5, "Widowed", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 133, 133.5, "Marriage Annulledel", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 171, 133.5, "Legally Separated", 0, 0, false, true, 'L', true);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 140, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you are married, is your spouse a current member of the U.S. armed forces or U.S. Coast Guard?', 0, 1, false, false, 'L', true);
// //...................
// $pdf->SetFont('times', '', 14);
// if (showData('biographic_info_eye_color') == "black") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 161, 140, '<input type="checkbox" name="p6_2_checkbox" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 175, 140, '<input type="checkbox" name="p6_2_checkbox" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 190, 140, '<input type="checkbox" name="p6_2_checkbox" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(140, 1, 167, 140.5, "N/A", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 181, 140.5, "Yes", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 196, 140.5, "No", 0, 0, false, true, 'L', true);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(200, 7, 13, 148, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How many times have you been married (including your current marriage, marriages abroad, annulled marriages, and marriages<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to the same person)?', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 51, 153);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><i><b>Information About Your Current Marriage</b> (including if you are legally separated) </i></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 162.4, $html, 0, 0, true, 'L');
// // *.................
// // *Reuseable Section
// // *.................
// //............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(200, 7, 13, 170, "<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse's Legal Name ", 0, 1, false, false, 'L', true);
// //...........
// $startX = 20;
// $startY = 175;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// // Labels
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(61.5, 1, $startX + 131, $startY - 0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 12, "Current Spouse's A-Number (if any)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72, $startY + 11, "Current Spouse's Date of Birth <br>(mm/dd/yyyy)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 65, $startY + 13, "<b>6.</b>", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX - 8, $startY + 13, "<b>5.</b>", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX - 8, $startY + 26, "<b>7.</b>", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 26, "Current Spouse's Country of Birth", 0, 0, false, false, 'L', true);

// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 81, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 32);    // Family Name
// $pdf->TextField('p1_1a', 70, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 5);    // Family Name
// $pdf->TextField('p1_1b', 58.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
// $pdf->TextField('p1_1c', 52, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name
// $pdf->TextField('p1_1c', 48, $fieldHeight, $stroke, array(), $startX + 10.8, $startY + 18.2);    // principal application 
// $pdf->TextField('p1_1c', 50, $fieldHeight, $stroke, array(), $startX + 94, $startY + 18.2);
// // //...........
// //...........................
// $startX = 20;
// $startY = 204.5;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid');

// // ---------------------- Section: Title ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, $lineHeight, $startX - 8, $startY + 11, "<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse's Legal Name", '', 0, 0, true, 'L');

// // ---------------------- Street Number ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(90, $lineHeight, $startX, $startY + 18, 'Street Number and Name', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3b', 127, $fieldHeight, $stroke, array(), $startX + 1, $startY + 24);

// // ---------------------- Apt / Ste / Flr ----------------------
// $apt_ste_flr = showData('information_about_you_us_mailing_apt_ste_flr');
// $checked_apt = $apt_ste_flr == 'apt' ? 'checked' : '';
// $checked_ste = $apt_ste_flr == 'ste' ? 'checked' : '';
// $checked_flr = $apt_ste_flr == 'flr' ? 'checked' : '';

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 150.2, $startY + 18, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 14);
// $html = '
//   <input type="checkbox" name="50a" value="Apt" ' . $checked_apt . ' />&nbsp;
//   <input type="checkbox" name="50st" value="Ste" ' . $checked_ste . '  />
//   <input type="checkbox" name="50f" value="Flr" ' . $checked_flr . ' />
// ';
// $pdf->writeHTMLCell(50, 0, 149, $startY + 24, $html, '', 0, 0, true, 'L');

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 172, $startY + 18, "Number", '', 0, 0, true, 'L');

// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3c', 32, $fieldHeight, $stroke, array(), 173, $startY + 24);

// // ---------------------- City / State / ZIP ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 5, $startX, $startY + 31.7, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3d', 127, $fieldHeight, $stroke, array(), $startX + 1, $startY + 37);

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 4, 150, $startY + 31.7, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $comboBoxOptions = [''];
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p5_3e", 18, $fieldHeight, $comboBoxOptions, array(), array(), 150.2, $startY + 37);
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(30, 3, 169, $startY + 31.7, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3f', 35, $fieldHeight, $stroke, array(), 170, $startY + 37);
// // ---------------------- Province / Postal Code / Country ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY + 45.5, "<div>Province</div>", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 62.3, $startY + 45.5, '<div>Postal Code</div>', 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 121, $startY + 45.5, "Country", 0, 0, false, false, 'L', true);
// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 60, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 50.5);
// $pdf->TextField('p1_1b', 55.5, $fieldHeight, $stroke, array(), $startX + 62.5, $startY + 50.5);
// $pdf->TextField('p1_1c', 65, $fieldHeight, $stroke, array(), $startX + 120, $startY + 50.5);
// // ******************************
// //  ******** End Page No 10 ******
// //  ******************************/

// // ******************************
// //  ******** Start Page No 11 ****
// //  ******************************/

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 6. Information About Your Marital History</b> (continued)</div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
// //........
// $startX = 20;
// $startY = 34;
// // Set font for labels
// $pdf->SetFont('Times', '', 10);

// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>9.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Place of Marriage to Current Spouse", '', 1, false, 'L');

// // Sub-labels
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 6, "City or Town", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 18, "Country", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX + 92, $startY + 6, "State or Province", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 32, "Date of Marriage to Current Spouse (mm/dd/yyyy)", '', 1, false, 'L');

// // Set font for input fields
// $pdf->SetFont('courier', 'B', 10);

// // Input fields
// $pdf->TextField('marriage_city', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);

// $pdf->TextField('marriage_country', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 23);

// $pdf->TextField('marriage_state', 92, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 93, $startY + 11);

// $pdf->TextField('marriage_date', 47, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 75.5, $startY + 32);

// // .................
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, 12, 74.2, '<b>10.</b>', '', 1, false, 'L');
// addYesNoQuestion($pdf, 'Is your current spouse applying with you?', 20, 73.5, '54', 'i_131_exclusion_status');
// //................
// $pdf->setFont('Times', 'I', 12);
// $html = "<div><b>Information About Prior Marriages</b> (if any)</div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 83, $html, 0, 1, true, 'L');
// //............
// $startX = 20;
// $startY = 90;

// // Section label
// $pdf->SetFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>11.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Prior Spouse's Legal Name (provide family name before marriage)", '', 1, false, 'L');

// // Labels (all on same line)
// $pdf->writeHTMLCell(58, 7, $startX, $startY + 5, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, $startX + 66, $startY + 5, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, $startX + 128, $startY + 5, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields on same horizontal line
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('prior_spouse_last_name', 63.6, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);
// $pdf->TextField('prior_spouse_first_name', 60, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 67, $startY + 11.5);
// $pdf->TextField('prior_spouse_middle_name', 56, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 129, $startY + 12);
// //.......
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 111, "<b>12.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Date of Birth (mm/dd/yyyy)", 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('prior_spouse_first_name', 47, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 67, $startY + 21);
// // // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(58, 7, 12, 120.5, "<b>13.</b>&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Country of Birthf", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(108, 7, 115, 120.5, "<b>14.</b>&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Country of Citizenship or Nationality", 0, 0, false, false, 'L', true);
// // //......
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 125.6);
// $pdf->TextField('parent1_birth_first_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 125.6);
// //.......
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 135, "<b>15.</b>&nbsp;&nbsp;&nbsp;&nbsp;Date of Marriage to Prior Spouse's (mm/dd/yyyy)", 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('prior_spouse_first_name', 50, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], 94, 135);
// //...................
// //! reusable component
// //........
// $startX = 20;
// $startY = 142;
// // Set font for labels
// $pdf->SetFont('Times', '', 10);
// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>16.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Place of Marriage to Prior Spouse", '', 1, false, 'L');
// // Sub-labels
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 6, "City or Town", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 18, "Country", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX + 92, $startY + 6, "State or Province", '', 1, false, 'L');
// // Set fot for input fields
// $pdf->SetFont('courier', 'B', 10);
// // Input fields
// $pdf->TextField('marriage_city', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);
// $pdf->TextField('marriage_country', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 23);
// $pdf->TextField('marriage_state', 92, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 93, $startY + 11);
// //! reusable component
// $startX = 20;
// $startY = 172;
// // Set font for labels
// $pdf->SetFont('Times', '', 10);
// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>17.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Place Where Marriage with Prior Spouse Legally Ended ", '', 1, false, 'L');
// // Sub-labels
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 6, "City or Town", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 18, "Country", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX + 92, $startY + 6, "State or Province", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 32, "Date of Marriage with Prior Spouse Legally Ended (mm/dd/yyyy)", '', 1, false, 'L');
// // Set fot for input fields
// $pdf->SetFont('courier', 'B', 10);
// // Input fields
// $pdf->TextField('marriage_city', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);
// $pdf->TextField('marriage_country', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 23);
// $pdf->TextField('marriage_state', 92, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 93, $startY + 11);
// $pdf->TextField('marriage_date', 47, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 95, $startY + 32);
// //? reusable component
// // Set font for labels
// $pdf->SetFont('Times', '', 10);
// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY+40, '<b>18.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY+40.4, "How Marriage Ended with Prior Spouse (select one):", '', 1, false, 'L'); 

// //............

// //.............
// $pdf->SetFont('times', '', 14);
// if (showData('biographic_info_eye_color') == "black") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 20, 218, '<input type="checkbox" name="p3_eye_color_status1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 42, 218, '<input type="checkbox" name="p3_eye_color_status3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 64, 218, '<input type="checkbox" name="p3_eye_color_status4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "green") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 98, 218, '<input type="checkbox" name="p3_eye_color_status5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(140, 1, 26, 218.5, "Annulled", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 48, 218.5, "Divorced", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 70, 218.5, "Spouse Deceased", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 104, 218.5, "Other (Explain):", 0, 0, false, true, 'L', true);
// //..........
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p13_Interpreter_signature_date', 75, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 130, 218.5);

// //  ******************************
// //  ******** End Page No 11 ******
// //  ******************************/

// //  ******************************
// //  ******** Start Page No 12 ****
// //  ******************************/
// // Start the page
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);

// // ==================== PART 7: INFORMATION ABOUT YOUR CHILDREN ====================
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 7. Information About Your Children</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');

// // ==================== QUESTION 1: TOTAL NUMBER OF CHILDREN ====================
// $pdf->setCellHeightRatio(2);
// $pdf->setCellPaddings(0, 1, 0, 0);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 5, 12, 32, '<b>1.</b>', 0, 1, false, false, 'L', true);

// $pdf->writeHTMLCell(190, 5, 20, 32, 'Indicate the total number of ALL living children anywhere in the world (including adult sons and daughters) that you have.', 0, 1, false, false, 'L', true);


// // Note section
// $pdf->SetFont('times', '', 10);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(0, 0, 0, 0);
// $note_text = "<b>NOTE</b>: The term \"children\" includes all biological or legally adopted children, as well as current stepchildren, of any age, whether born in the United States or other countries, married or unmarried, living with you or elsewhere and includes any missing children and those born to you outside of marriage.";
// $pdf->writeHTMLCell(180, 7, 20, 42, $note_text, 0, 1, false, true, 'L', true);

// // Total children input field
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('total_children', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 51);
// //.........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(180, 5, 20, 58, 'Provide the following information for each of your children. If you have more than two children, use the space provided in <b>Part 14. Additional Information</b>.', 0, 1, false, true, 'L', true);


// // ==================== CHILD 1 SECTION ====================
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 6, 13, 68.6, '<b>2.</b>', 0, 1, false, false, 'L', true);
// $pdf->writeHTMLCell(190, 6, 20, 68, ' Child 1', 0, 1, false, false, 'L', true);

// // Child 1 - Current Legal Name section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 5, 20, 73, 'Current Legal Name', 0, 1, false, false, 'L', true);

// // Name labels
// $startX = 20;
// $startY = 80;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// // Labels
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72.3, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 131,$startY-0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);

// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 70.5, $fieldHeight, $stroke, array(), $startX + 0.2, $startY + 5);    // Family Name
// $pdf->TextField('p1_1b', 57.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
// $pdf->TextField('p1_1c', 53, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name

// // A-Number and Date of Birth section - Child 1
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+15, "A-Number (if any)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 91, $startY+15, "Date of Birth (mm/dd/yyyy)", 0, 0, false, false, 'L', false);
// // A-Number dropdown and Date of Birth field - Child 1
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 50, $fieldHeight, $stroke, array(), $startX + 39, $startY +14);    // a number
// $pdf->TextField('p1_1b', 47, $fieldHeight, $stroke, array(), $startX + 132, $startY + 14); // date of birth


// // Country of Birth - Child 1
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+21.8, "Country of Birth", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 94, $fieldHeight, $stroke, array(), $startX , $startY +26);    // country of birth


// // What is your child's relationship to you? (for example, biological child, stepchild, legally adopted child)
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(160, 1, $startX, $startY+34.5, "What is your child's relationship to you? (for example, biological child, stepchild, legally adopted child)", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 185, $fieldHeight, $stroke, array(), $startX , $startY +39);    
// //.......

// addYesNoQuestion($pdf, 'Is this child also applying now on a separate Form I-485?', $startX, $startY+47.5, 'p7_child2_Q', 'i_131_exclusion_status');

// // ==================== CHILD 2 SECTION ====================
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 6, 13, 134.6, '<b>3.</b>', 0, 1, false, false, 'L', true);
// $pdf->writeHTMLCell(190, 6, 20, 134, ' Child 2', 0, 1, false, false, 'L', true);

// // Child 1 - Current Legal Name section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 5, 20, 139, 'Current Legal Name', 0, 1, false, false, 'L', true);

// // Name labels
// $startX = 20;
// $startY = 146;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// // Labels
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72.3, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 131,$startY-0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);

// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 70.5, $fieldHeight, $stroke, array(), $startX + 0.2, $startY + 5);    // Family Name
// $pdf->TextField('p1_1b', 57.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
// $pdf->TextField('p1_1c', 53, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name

// // A-Number and Date of Birth section - Child 1
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+15, "A-Number (if any)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 91, $startY+15, "Date of Birth (mm/dd/yyyy)", 0, 0, false, false, 'L', false);
// // A-Number dropdown and Date of Birth field - Child 1
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 50, $fieldHeight, $stroke, array(), $startX + 39, $startY +14);    // a number
// $pdf->TextField('p1_1b', 47, $fieldHeight, $stroke, array(), $startX + 132, $startY + 14); // date of birth


// // Country of Birth - Child 1
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+21.8, "Country of Birth", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 94, $fieldHeight, $stroke, array(), $startX , $startY +26);    // country of birth


// // What is your child's relationship to you? (for example, biological child, stepchild, legally adopted child)
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(160, 1, $startX, $startY+34.5, "What is your child's relationship to you? (for example, biological child, stepchild, legally adopted child)", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 185, $fieldHeight, $stroke, array(), $startX , $startY +39);    
// //.......

// addYesNoQuestion($pdf, 'Is this child also applying now on a separate Form I-485?', $startX, $startY+47.5, 'p7_child2_Q', 'i_131_exclusion_status');
// //  ******************************
// //  ******** End Page No 12 ******
// //  ******************************/

// //  ******************************
// //  ******** Start Page No 13 ****
// //  ******************************/
// // Start the page
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);


// $pdf->SetFontSize(12);
// $html = "<div><b>Part 8. Biographic Information</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
// //........
// $startX = 12;
// $startY = 34;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];

// // Question 1: Ethnicity
// $pdf->SetFont(...$labelFont);
// $html = '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity (Select <b>only one</b> box)';
// $pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// // Ethnicity checkboxes
// $pdf->SetFont('times', '', 14);
// if (showData('i_131_biographic_info_ethnicity') == "hispanic") $checked = "checked";
// else $checked = "";
// $html = '<input type="checkbox" name="hispanic_not_hispanic" value="hispanic"  checked="' . $checked . '" />';
// $pdf->writeHTMLCell(5, 1, $startX + 9, $startY + 5, $html, 0, 1, false, false, 'L', false);

// if (showData('i_131_biographic_info_ethnicity') == "nothispanic") $checked = "checked";
// else $checked = "";
// $html = '<input type="checkbox" name="hispanic_not_hispanic" value="nothispanic"  checked="' . $checked . '" />';
// $pdf->writeHTMLCell(5, 1, $startX + 46, $startY + 5, $html, 0, 1, false, false, 'L', false);

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(140, 1, $startX + 15.7, $startY + 5.5, "Hispanic or Latino", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, $startX + 53, $startY + 5.5, "Not Hispanic or Latino", 0, 0, false, true, 'L', true);

// // ==================== RACE SECTION ====================
// $startY = $startY + 12;

// // Question 2: Race
// $pdf->SetFont(...$labelFont);
// $html = '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Race (Select <b>all applicable</b> boxes)';
// $pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// // Race checkboxes
// $pdf->SetFont('times', '', 14);
// if (showData('i_485_biographic_info_race_american_native') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, $startX + 9, $startY + 7, '<input type="checkbox" name="p3_race1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// if (showData('i_485_biographic_info_race_asian') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, $startX + 67, $startY + 7, '<input type="checkbox" name="p3_race2" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// if (showData('i_485_biographic_info_race_black_african') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, $startX + 85, $startY + 7, '<input type="checkbox" name="p3_race3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// if (showData('i_485_biographic_info_race_native_islander') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, $startX +9, $startY + 15, '<input type="checkbox" name="p3_race4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// if (showData('i_485_biographic_info_race_white') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, $startX + 77, $startY + 15, '<input type="checkbox" name="p3_race5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// // Race labels
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(140, 1, $startX + 15.7, $startY + 7.5, "American Indian or Alaska Native", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, $startX + 74, $startY + 7.5, "Asian", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, $startX + 92, $startY + 7.5, "Black or African American", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, $startX + 15.7, $startY + 15.5, "Native Hawaiian or Other Pacific Islander", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, $startX + 83, $startY + 15.5, "White", 0, 0, false, true, 'L', true);

// // ==================== HEIGHT AND WEIGHT SECTION ====================
// $startY = $startY + 24;

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(0, 0, $startX, $startY, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feet', 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(0, 0, $startX + 52, $startY, 'Inches', 0, 0, false, true, 'L', true);

// $pdf->SetFont(...$fieldFont);
// $pdf->ComboBox('p8_3feet', 19, 6.6, array('', '2', '3', '4', '5', '6', '7', '8'), array(), array(), $startX + 32, $startY - 0.3);
// $pdf->ComboBox('p8_3inches', 19, 6.6, array('','0' ,'1','2', '3', '4', '5', '6', '7', '8', '9', '10', '11'), array(), array(), $startX + 64, $startY - 0.3);

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(0, 0, $startX + 88, $startY, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pounds', 0, 0, false, true, 'L', true);

// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p8_4Pounds1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), $startX + 125, $startY - 0.3);
// $pdf->TextField('p8_4Pounds2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), $startX + 132, $startY - 0.3);
// $pdf->TextField('p8_4Pounds3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), $startX + 139, $startY - 0.3);

// // ==================== EYE COLOR SECTION ====================
// $startY = $startY + 8;

// $pdf->SetFont(...$labelFont);
// $html = '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye color (Select <b>only one</b> box)';
// $pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// // Eye color checkboxes
// $pdf->SetFont('times', '', 14);
// $eyeColorOptions = [
//     ['x' => 21, 'value' => "black", 'label' => "Black", 'label_x' => 28],
//     ['x' => 49, 'value' => "blue", 'label' => "Blue", 'label_x' => 56],
//     ['x' => 66, 'value' => "brown", 'label' => "Brown", 'label_x' => 73],
//     ['x' => 84, 'value' => "gray", 'label' => "Gray", 'label_x' => 91],
//     ['x' => 101, 'value' => "green", 'label' => "Green", 'label_x' => 108],
//     ['x' => 117.5, 'value' => "hazel", 'label' => "Hazel", 'label_x' => 124.5],
//     ['x' => 133.5, 'value' => "marron", 'label' => "Maroon", 'label_x' => 140],
//     ['x' => 153, 'value' => "pink", 'label' => "Pink", 'label_x' => 160],
//     ['x' => 171, 'value' => "unknown", 'label' => "Unknown/Other", 'label_x' => 178]
// ];

// foreach ($eyeColorOptions as $option) {
//     $pdf->SetFont('times', '', 14);
//     $checked = (showData('i_131_biographic_info_eye_color') == $option['value']) ? "checked" : "";
//     $pdf->writeHTMLCell(5, 1, $option['x'], $startY + 6, '<input type="checkbox" name="p3_eye_color_status' . $option['value'] . '" value="Y"  checked="' . $checked . '" />', 0, 0, false, false, 'L', false);
    
//     $pdf->SetFont(...$labelFont);
//     $pdf->writeHTMLCell(140, 1, $option['label_x'], $startY + 6.3, $option['label'], 0, 0, false, true, 'L', true);
// }

// // ==================== HAIR COLOR SECTION ====================
// $startY = $startY + 12;

// $pdf->SetFont(...$labelFont);
// $html = '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hair color (Select <b>only one</b> box)';
// $pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// // Hair color checkboxes
// $pdf->SetFont('times', '', 14);
// $hairColorOptions = [
//     ['x' => 21, 'value' => "blad", 'label' => "Bald(No hair)", 'label_x' => 28],
//     ['x' => 49, 'value' => "black", 'label' => "Black", 'label_x' => 56],
//     ['x' => 66, 'value' => "blond", 'label' => "Blond", 'label_x' => 73],
//     ['x' => 84, 'value' => "brown", 'label' => "Brown", 'label_x' => 91],
//     ['x' => 102, 'value' => "gray", 'label' => "Gray", 'label_x' => 109],
//     ['x' => 118, 'value' => "red", 'label' => "Red", 'label_x' => 125],
//     ['x' => 133, 'value' => "sandy", 'label' => "Sandy", 'label_x' => 140],
//     ['x' => 153, 'value' => "white", 'label' => "White", 'label_x' => 160],
//     ['x' => 171, 'value' => "unknown", 'label' => "Unknown/Other", 'label_x' => 178]
// ];

// foreach ($hairColorOptions as $option) {
//     $pdf->SetFont('times', '', 14);
//     $checked = (showData('i_131_biographic_info_hair_color') == $option['value']) ? "checked" : "";
//     $pdf->writeHTMLCell(5, 1, $option['x'], $startY + 6, '<input type="checkbox" name="p3_hair_color_status' . $option['value'] . '" value="Y"  checked="' . $checked . '" />', 0, 0, false, false, 'L', false);
    
//     $pdf->SetFont(...$labelFont);
//     $pdf->writeHTMLCell(140, 1, $option['label_x'], $startY + 6.3, $option['label'], 0, 0, false, true, 'L', true);
// }
// //...........

// $pdf->SetFontSize(12);
// $html = "<div><b>Part 9. General Eligibility and Inadmissibility Grounds</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 107, $html, 1, 1, true, 'L');
// //.............
// $pdf->SetFont(...$labelFont);
// $html = 'Choose the answer that you think is correct in <b>Part 9</b>. If you answer "Yes" to any questions (<b>or if you answer "No," but are unsure<br>
// of your answer</b>), provide an explanation of the events and circumstances in the space provided in <b>Part 14. Additional Information.</b>';
// $pdf->writeHTMLCell(200, 0, 13,114.6, $html, 0, 0, false, true, 'L', true);
// //.........
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(60, 0, 13,125, '<b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Have you', 0, 0, false, true, 'L', true);
// // ..............
// addYesNoQuestion($pdf, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>EVER</b> been a member of, involved in, or in any way associated with any organization,<br>
// association, fund, foundation, party, club, society, or similar group in the United States or in any other<br>
// location in the world?',20, 125, 'i_131_associated_organization', 'i_131_associated_organization');
// //.............
// $pdf->SetFont(...$labelFont);
// $html = 'If you answered "Yes" to <b>Item Number 1</b>., complete <b>Item Numbers 2. - 9.</b> If you were a member of more than two<br>
// organizations, use the space provided in Part <b>14. Additional Information.</b>.';
// $pdf->writeHTMLCell(200, 0, 20,140, $html, 0, 0, false, true, 'L', true);
// // ==================== ORGANIZATION 1 SECTION ====================
// $startX = 13;
// $startY = 150;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 6, 13, $startY, '<i>Organization 1</i>', 0, 1, false, false, 'L', true);

// // Organization Name
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+5, "<b>2</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of Organization", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('org1_name', 120, $fieldHeight, $stroke, array(), $startX+9, $startY+10);

// // City, State, Country section
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+17, "<b>3</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City or Town", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 105.5, $startY+17, "State or Province", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 8, $startY+28, "Country", 0, 0, false, false, 'L', true);

// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('org1_city', 95, $fieldHeight, $stroke, array(), $startX +9, $startY+21.7);    // City
// $pdf->TextField('org1_state', 85, $fieldHeight, $stroke, array(), $startX + 106.8, $startY+21.7); // State
// $pdf->TextField('org1_country', 95, $fieldHeight, $stroke, array(), $startX +9, $startY+33.5);  // Country

// // Nature of Organization
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, 1, $startX, $startY+41, "<b>4</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nature of Organization, including its purposes and activities, whether illicit or legitimate.", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('org1_nature', 183, $fieldHeight, $stroke, array(), $startX+9, $startY+46);

// // Nature of involvement in organization
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, 1, $startX+8, $startY+54, "Nature of involvement in organization, including role or positions(s) held, whether illicit or legitimate.", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('org1_involvement', 183, $fieldHeight, $stroke, array(), $startX+9, $startY+59);

// // Dates of Membership
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY+67, "<b>5</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dates of Membership or Dates of Involvement", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 8, $startY+74, "From (mm/dd/yyyy)", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 87, $startY+74, "To (mm/dd/yyyy)", 0, 0, false, false, 'L', true);

// // Date Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('org1_date_from', 46, $fieldHeight, $stroke, array(), $startX + 40, $startY+74);    // From date
// $pdf->TextField('org1_date_to', 47, $fieldHeight, $stroke, array(), $startX + 116, $startY+74);     // To date

// // ==================== ORGANIZATION 2 SECTION ====================
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 6, 13, 232, '<i>Organization 2</i>', 0, 1, false, false, 'L', true);

// // Organization Name
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, 13, 239, "<b>6</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of Organization", 0, 0, false, true, 'L', true);
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('org2_name', 120, $fieldHeight, $stroke, array(), 22, 244);
//...........

//  ******************************
//  ******** End Page No 12 ******
//  ******************************/

//  ******************************
//  ******** Start Page No 13 ****
//  ******************************/
// Start the page
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);

$pdf->SetFontSize(12);
$html = "<div><b>Part 9. General Eligibility and Inadmissibility Grounds </b>(continued)</div>";
$pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
//..........
$startX = 13;
$startY = 33;
$lineHeight = 6;
$fieldHeight = 7;
$labelFont = ['times', '', 10];
$fieldFont = ['courier', 'B', 10];
$stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];
// City, State, Country section
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(130, 1, $startX, $startY, "<b>7</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City or Town", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, $startX + 105.5, $startY, "State or Province", 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, $startX + 8, $startY+11, "Country", 0, 0, false, false, 'L', true);

// Fields
$pdf->SetFont(...$fieldFont);
$pdf->TextField('org1_city', 95, $fieldHeight, $stroke, array(), $startX +9, $startY+4.7);    // City
$pdf->TextField('org1_state', 85, $fieldHeight, $stroke, array(), $startX + 106.8, $startY+4.7); // State
$pdf->TextField('org1_country', 95, $fieldHeight, $stroke, array(), $startX +9, $startY+16.5);  // Country

// Nature of Organization
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(190, 1, $startX, $startY+24.5, "<b>8</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nature of Organization, including its purposes and activities, whether illicit or legitimate.", 0, 0, false, true, 'L', true);
$pdf->SetFont(...$fieldFont);
$pdf->TextField('org1_nature', 183, $fieldHeight, $stroke, array(), $startX+9, $startY+29.5);

// Nature of involvement in organization
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(190, 1, $startX+8, $startY+37.6, "Nature of involvement in organization, including role or positions(s) held, whether illicit or legitimate.", 0, 0, false, true, 'L', true);
$pdf->SetFont(...$fieldFont);
$pdf->TextField('org1_involvement', 183, $fieldHeight, $stroke, array(), $startX+9, $startY+42.5);

// Dates of Membership
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(130, 1, $startX, $startY+50, "<b>9</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dates of Membership or Dates of Involvement", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, $startX + 8, $startY+57, "From (mm/dd/yyyy)", 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, $startX + 87, $startY+57, "To (mm/dd/yyyy)", 0, 0, false, false, 'L', true);

// Date Fields
$pdf->SetFont(...$fieldFont);
$pdf->TextField('org1_date_from', 46, $fieldHeight, $stroke, array(), $startX + 40, $startY+57);    // From date
$pdf->TextField('org1_date_to', 47, $fieldHeight, $stroke, array(), $startX + 116, $startY+57);     // To date
//.............................................

$y_position = 100;
addYesNoQuestion($pdf, '<b>10.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been denied admission to the United States?', 13, $y_position, 'exclusion_10', 'i_485_exclusion_status_10');
$y_position += 7;

addYesNoQuestion($pdf, '<b>11.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been denied a visa to the United States?', 13, $y_position, 'exclusion_11', 'i_485_exclusion_status_11');
$y_position += 7;

addYesNoQuestion($pdf, '<b>12.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> worked in the United States without authorization?', 13, $y_position, 'exclusion_12', 'i_485_exclusion_status_12');
$y_position += 7;

addYesNoQuestion($pdf, '<b>13.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> violated the terms or conditions of your nonimmigrant status?', 13, $y_position, 'exclusion_13', 'i_485_exclusion_status_13');
$y_position += 7;

addYesNoQuestion($pdf, '<b>14.</b> &nbsp;&nbsp;&nbsp;&nbsp;Are you presently orhave you <b>EVER</b> been in removal, exclusion, rescission, or deportation proceedings,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;including expedited removal proceedings?', 13, $y_position, 'exclusion_14', 'i_485_exclusion_status_14');

$y_position += 10;

addYesNoQuestion($pdf, '<b>15.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been issued a final order of exclusion, deportation, or removal?', 13, $y_position, 'exclusion_15', 'i_485_exclusion_status_15');
$y_position += 7;

addYesNoQuestion($pdf, '<b>16.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> had a prior final order of exclusion, deportation, or removal reinstated?', 13, $y_position, 'exclusion_16', 'i_485_exclusion_status_16');
$y_position += 7;

addYesNoQuestion($pdf, '<b>17.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been granted voluntary departure by an immigration officer or an immigration judge but<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;failed to depart within the allotted time?', 13, $y_position, 'exclusion_1.5', 'i_485_exclusion_status_17');
$y_position += 11;

addYesNoQuestion($pdf, '<b>18.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> applied for any kind of relief or protection from removal, exclusion, or deportation?', 13, $y_position, 'exclusion_18', 'i_485_exclusion_status_18');
$y_position += 7;

addYesNoQuestion($pdf, '<b>19.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been a J-1 nonimmigrant exchange visitor who was subject to the two-year foreign<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;residence requirement?', 13, $y_position, 'exclusion_19', 'i_485_exclusion_status_19');
$y_position += 10;

addYesNoQuestion($pdf, '<b>20.</b> &nbsp;&nbsp;&nbsp;&nbsp;If you answered "Yes" to <b>Item Number 19.</b>, have you complied with the foreign residence requirement?', 13, $y_position, 'exclusion_20', 'i_485_exclusion_status_20');
$y_position += 6.5;

addYesNoQuestion($pdf, '<b>21.</b> &nbsp;&nbsp;&nbsp;&nbsp;If you answered "Yes" to <b>Item Number 19.</b> and "No" to <b>Item Number 20.</b>, have you been granted a<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;waiver or has Department of State issued a favorable waiver recommendation letter for you?', 13, $y_position, 'exclusion_21', 'i_485_exclusion_status_21');
//,.......

$pdf->SetFontSize(12);
$html = "<div><b><i>Criminal Acts and Violations</i></b></div>";
$pdf->writeHTMLCell(191.5, 6, 13, 197, $html, 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html = 'For <b>Item Numbers 22. - 41.</b>, you must answer "Yes" to any question that applies to you, even if your records were sealed or otherwise cleared, or even if anyone, including a judge, law enforcement officer, or attorney, told you that you no longer have a record. You<br>must also answer "Yes" to the following questions whether the action or offense occurred here in the United States or anywhere else in<br>the world. If you answer "Yes" to <b>Item Numbers 22. - 41.</b>, use the space provided in <b>Part 14. Additional Information</b> to provide an<br>explanation for each offense, if applicable, that includes a description of the criminal offense; where the criminal offense occurred;<br>when the criminal offense occurred; whether you were arrested, cited, charged, or detained for the criminal offense you committed;<br>and the outcome or disposition of that criminal offense (for example, convicted, placement in a diversion program, no charges filed,<br>charges dismissed, jail, prison, detention, probation, or community service). Your explanation must include the duration of any<br>sentence to confinement (even if suspended).';
$pdf->writeHTMLCell(195, 0, 13, 204, $html, 0, 1, false, true, 'L', true);
//.....................
$y_position = 243;
addYesNoQuestion($pdf, '<b>22.</b> &nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been arrested, cited, charged, or permitted to participate in a diversion program (including<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pre-trial diversion, deferred prosecution, deferred adjudication, or any withheld adjudication), or detained<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for any reason by any law enforcement official in any country including but not limited to any U.S.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;immigration official or any official of the U.S. armed forces or U.S. Coast Guard or by a similar official of<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a country other than the United States?', 13, $y_position, 'criminal_22', 'i_485_criminal_22');
//  ******************************
//  ******** End Page No 21 ******
//  ******************************/

//  ******************************
//  ******** Start Page No 22 ****
//  ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = "<div><b>Part 10. Applicant's Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
//............
$html = '<div><b><i>Applicant\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(191.5, 6.5, 13, 35, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 43, "Provide your daytime telephone number, mobile telephone number (if any), and email address (if any). ", '', 1, false, 'L');
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 49, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 49, "Applicant's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 49, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 119, 49, "Applicant's Mobile Telephone Number (if any)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 62, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 62, "Applicant's Email Address (if any)", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_Applicant_daytime', 88, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 54);
$pdf->TextField('p10_Applicant_mobile', 84, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 54);
$pdf->TextField('p10_Applicant_email', 88, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 67);
//........................
$pdf->setFont('Times', '', 12);
$html = '<div><b><i>Applicant\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 78, $html, '', 1, true, 'L');
//.........
$pdf->setCellHeightRatio(1.3);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 85.5, "I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with<br>
my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in <b>Part 11.,</b><br>
understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the<br>
information are complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records<br>
that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration law. ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 114, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 114, "Applicant's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 114, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.6, 21, 119.2, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_Applicant_date_signature', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 119.2);
//................
$pdf->setFont('Times', '', 12);
$html = "<div><b>Part 11. Interpreter's Contact Information, Certification, and Signature </b></div>";
$pdf->writeHTMLCell(191.5, 6, 13, 132, $html, 1, 1, true, 'L');
//............
$html = '<div><b><i>Interpreter\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(191.5, 6.5, 13, 143, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 151, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 151, "Interpreter's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114.6, 151, "Interpreter's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 165, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 165, "Interpreter's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p11_Interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 156);
$pdf->TextField('p11_Interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 156);
$pdf->TextField('p11_Interpreter_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 170);
//...............
$pdf->setFont('Times', '', 12);
$html = '<div><b><i>Interpreter\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 180.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 189, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 189, "Interpreter's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 115, 189, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 123, 189, "Interpreter's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 202, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 202, "Interpreter's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p11_Interpreter_daytime', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 194);
$pdf->TextField('p11_Interpreter_mobile', 80, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 194);
$pdf->TextField('p11_Interpreter_email', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 207);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 217.6, $html, '', 1, true, 'L');
//.........
$pdf->setCellHeightRatio(1.4);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 226.5, "I certify, under penalty of perjury, that I am fluent in English and<br>
and I have interpreted every question on the application and Instructions and interpreted the applicant's answers to the questions in that<br>
language, and the applicant informed me that he or she understood every instruction, question, and answer on the application.", '', 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p11_Interpreter_fluent_language', 93, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 225.8);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 199, 225.8, ',', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 243.4, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 243.4, "Interpreter's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 243.4, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.6, 21, 249.2, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p11_Interpreter_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 249.2);


// ******************************
//  ******** End Page No 22 *****
//  *****************************/

// ******************************
//  ******** Start Page No 23 ***
//  *****************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 12. Contact Information, Certification, and Signature of the Person Preparing this Application, if
Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
// ..........

$html = '<div><b><i>Preparer\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 41, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 49, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 49, "Preparer's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114.6, 49, "Preparer's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 62, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 62, "Preparer's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 54);
$pdf->TextField('p13_preparer_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 54);
$pdf->TextField('p13_preparer_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 67);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 77.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 85, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 85, "Preparer's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 115, 85, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 123, 85, "Preparer's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 98, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 98, "Preparer's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_daytime', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 90);
$pdf->TextField('p13_preparer_mobile', 80, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 90);
$pdf->TextField('p13_preparer_email', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 103);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 113.6, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 121.5, "I certify, under penalty of perjury, that I prepared this application for the applicant at his or her request and with express consent and<br>
that all of the responses and information contained in and submitted with the application are complete, true, and correct and reflects<br>
only information provided by the applicant. The applicant reviewed the responses and information and informed me that he or she<br>
understands the responses and information in or submitted with the application.", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 140, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 140, "Preparer's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 140, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.6, 21, 145.2, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 145.2);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(191, 9.5, 13, 156.2, "", 1, 1, false, 'L');
$pdf->writeHTMLCell(191, 9.5, 36, 158.2, "<b>NOTE: Do not complete Part 13. until the USCIS Officer instructs you to do so at the interview.<b/> ", 0, 1, false, 'L');
//...........
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 13. Signature at Interview</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 171, $html, 1, 1, true, 'L');
//...............
$pdf->setCellHeightRatio(1.5);
$pdf->SetFontSize(10);
$pdf->writeHTMLCell(197, 5, 12, 177.6, "I swear (affirm) and certify under penalty of perjury under the laws of the United States of America that I know that the contents of<br>
this Form I-485, Application to Register Permanent Residence or Adjust Status, subscribed by me, including the", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 189, "changes made to this application, ,<b>numbered</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 101, 189, "<b>through</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 136, 189, ", are complete, true, and correct. All", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 194.5, "information on additional pages submitted by me with this Form I-485, <b>on numbered pages</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 169, 194.5, "<b>through</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 200.5, "are complete, true, and correct. All documents submitted at this interview were provided by me and are complete, true, and correct.<br>Subscribed to and sworn to (affirmed) before me", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 20, 212, "USCIS Officer's Printed Name or Stamp", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 110, 212, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 227, "Applicant's Signature (sign in ink)", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 110, 227, "USCIS Officer's Signature (sign in ink)", '', 1, false, 'L');
$pdf->writeHTMLCell(88, 6.6, 21, 217.6, "", 1, 1, false, 'L');
$pdf->writeHTMLCell(48, 6.6, 111.6, 217.6, "", 1, 1, false, 'L');
$pdf->writeHTMLCell(88, 6.6, 21, 232.6, "", 1, 1, false, 'L');
$pdf->writeHTMLCell(92.5, 6.6, 111.6, 232.6, "", 1, 1, false, 'L');
$pdf->setCellHeightRatio(1.3);
//......................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_signature_date', 24, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 174, 183.2);
$pdf->TextField('p13_preparer_signature_date', 23, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 78, 189.2);
$pdf->TextField('p13_preparer_signature_date', 21, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 189.2);
$pdf->TextField('p13_preparer_signature_date', 24, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 195.2);
$pdf->TextField('p13_preparer_signature_date', 21, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 183, 195.2);



// ******************************
//  ******** End Page No 3 ******
//  ******************************/

// ******************************
//  ******** Start Page No 4 ****
//  ******************************/



$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 14. Additional Information</b></div>';
$pdf->writeHTMLCell(191.7, 6.5, 13, 27, $html, 1, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 35, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space than<br>
what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.<br>
Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item<br>
Number </b>to which your answer refers; and sign and date each sheet.', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 54, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 83, 54, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 144, 54, 'Middle Name (if applicable)', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864_additional_info_family_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 58.5);
$pdf->TextField('i_864_additional_info_given_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 58.5);
$pdf->TextField('i_864_additional_info_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 58.5);
//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 67, 'Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 67, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864_additional_info_3a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);
$pdf->TextField('i_864_additional_info_3b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 72);
$pdf->TextField('i_864_additional_info_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864_additional_info_3d', 183, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864_additional_info_3d')), 21, 81);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 89, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 95.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 101.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 32.5, 21, 81, '', "B", 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 115, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 115, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 115, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864_additional_info_4a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 120);
$pdf->TextField('i_864_additional_info_4b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 120);
$pdf->TextField('i_864_additional_info_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 120);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864_additional_info_4d', 183, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864_additional_info_4d')), 21, 129);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 130, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 136.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 143, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 149.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 32.5, 21, 129, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 162, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 162, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 162, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864_additional_info_5a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 167);
$pdf->TextField('i_864_additional_info_5b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 167);
$pdf->TextField('i_864_additional_info_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 167);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864_additional_info_5d', 183, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864_additional_info_5d')), 21, 176);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 177, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 183.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 190, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 196, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 32.5, 21, 176, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 208.5, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 208.5, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 208.5, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_864_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 213.3);
$pdf->TextField('i_864_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 213);
$pdf->TextField('i_864_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 213);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_864_additional_info_6d', 183, 33, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864_additional_info_6d')), 21, 222);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 223, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 229.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 236.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 242.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 33.2, 21, 222, '', 'B', 1, false, 'L');






//!................
// 'volag_number':' $attorneyData->volag_number',
// 'attorney_statebar_number':' $attorneyData->bar_number',
// 'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',


$js = "
var fields = {
// page 1

    'i_485_a_number':' " . showData('i_485_a_number') . "',	
    'p1_1a':' " . showData('example') . "',
    'p1_1b':' " . showData('example') . "',
    'p1_1c':' " . showData('example') . "',
    'p1_2a1':' " . showData('example') . "',
    'p1_2b1':' " . showData('example') . "',
    'p1_2c1':' " . showData('example') . "',
    'p1_2a2':' " . showData('example') . "',
    'p1_2b2':' " . showData('example') . "',
    'p1_2c2':' " . showData('example') . "',
    'p1_3':' " . showData('example') . "',
    'p1_3_other1':' " . showData('example') . "',
    'p1_3_other2':' " . showData('example') . "',
   
// page 2
	
    'p1_4_a_number':' " . showData('example') . "',	
    'p1_5_1':' " . showData('example') . "',	
    'p1_5_2':' " . showData('example') . "',	
    'p1_7_city_town':' " . showData('example') . "',	
    'p1_7_country':' " . showData('example') . "',	
    'p1_8_country_of_cityzen':' " . showData('example') . "',	
    'p1_9_uscis_online':' " . showData('example') . "',	
    'p1_10':' " . showData('example') . "',	
    'p1_10_a':' " . showData('example') . "',	
    'p1_10_b':' " . showData('example') . "',	
    'p1_10_c':' " . showData('example') . "',	
    'p1_10_d':' " . showData('example') . "',	
    'p1_10_e':' " . showData('example') . "',	
    'p1_10_f':' " . showData('example') . "',	
    'p1_10_g':' " . showData('example') . "',	
    'p1_10_h':' " . showData('example') . "',	
    'p1_11_a':' " . showData('example') . "',	
    'p1_11_b':' " . showData('example') . "',	
    'p1_11_c':' " . showData('example') . "',	

// page 3
	
    'p1_12_fmily_name':' " . showData('example') . "',	
    'p1_12_given_name':' " . showData('example') . "',	
    'p1_12_i_194':' " . showData('example') . "',	
    'p1_12_expiration_date':' " . showData('example') . "',	
    'p1_12_immigration_status':' " . showData('example') . "',	
    'p1_14':' " . showData('example') . "',	
    'p1_15':' " . showData('example') . "',	
    'p1_15':' " . showData('example') . "',	

    'p1_18_care_name':' " . showData('example') . "',	
    'p1_18_street_number':' " . showData('example') . "',	
    'p1_18_number':' " . showData('example') . "',	
    'p1_18_city_town':' " . showData('example') . "',	
    'p1_18_state':' " . showData('example') . "',	
    'p1_18_zip_code':' " . showData('example') . "',	

    'p1_18_resided_date':' " . showData('example') . "',	

    'p1_18_care_name2':' " . showData('example') . "',	
    'p1_18_street_number2':' " . showData('example') . "',	
    'p1_18_number2':' " . showData('example') . "',	
    'p1_18_city_town2':' " . showData('example') . "',	
    'p1_18_state2':' " . showData('example') . "',	
    'p1_18_zip_code2':' " . showData('example') . "',

// page 4
	
    'p1_18_care_name3':' " . showData('example') . "',	
    'p1_18_street_number3':' " . showData('example') . "',	
    'p1_18_number3':' " . showData('example') . "',	
    'p1_18_city_town3':' " . showData('example') . "',	
    'p1_18_state3':' " . showData('example') . "',	
    'p1_18_zip_code3':' " . showData('example') . "',
    'p1_18_province3':' " . showData('example') . "',
    'p1_18_postal_code3':' " . showData('example') . "',
    'p1_18_country3':' " . showData('example') . "',
    'p1_18_residence_from_date3':' " . showData('example') . "',
    'p1_18_residence_to_date3':' " . showData('example') . "',
	
    'p1_18_street_number4':' " . showData('example') . "',	
    'p1_18_number4':' " . showData('example') . "',	
    'p1_18_city_town4':' " . showData('example') . "',	
    'p1_18_state4':' " . showData('example') . "',	
    'p1_18_zip_code4':' " . showData('example') . "',
    'p1_18_province4':' " . showData('example') . "',
    'p1_18_postal_code4':' " . showData('example') . "',
    'p1_18_country4':' " . showData('example') . "',
    'p1_18_residence_from_date4':' " . showData('example') . "',
    'p1_18_residence_to_date4':' " . showData('example') . "',
    'p1_19_social':' " . showData('example') . "',

// page 5

    'p2_2_receipt_number':' " . showData('example') . "',
    'p2_2_priority_date':' " . showData('example') . "',
    'p2_2_family':' " . showData('example') . "',
    'p2_2_given':' " . showData('example') . "',
    'p2_2_middle':' " . showData('example') . "',
    'p2_2_a_number':' " . showData('example') . "',
    'p2_2_dob':' " . showData('example') . "',
    	
// page 7

    'i_485_asylum_date':' " . showData('example') . "',
    'i_485_refugee_date':' " . showData('example') . "',
    'i_485_diversity_visa_rank':' " . showData('example') . "',
    'i_485_other_eligibility_text':' " . showData('example') . "',

	
// page 8
	'i_485_p4_2_city_town': ' " . showData('example') . "',
    'i_485_p4_2_country': ' " . showData('example') . "',
    'i_485_p4_3_decision': ' " . showData('example') . "',
    'i_485_p4_4_date_decision': ' " . showData('example') . "',
    'i_485_p4_7_employer_school': ' " . showData('example') . "',
    'i_485_p4_7_company_name': ' " . showData('example') . "',
    'i_485_p4_7_occupation': ' " . showData('example') . "',

 
	
// page 13
    'p8_3feet':' " . showData('example') . "',
    'p8_3inches':' " . showData('example') . "',
    'p8_4Pounds1':' " . showData('example') . "',
    'p8_4Pounds2':' " . showData('example') . "',
    'p8_4Pounds3':' " . showData('example') . "',

 
	
// page 17
	

	



// page 22

    'p10_Applicant_daytime':' " . showData('example') . "',
    'p10_Applicant_mobile':' " . showData('example') . "',
    'p10_Applicant_email':' " . showData('example') . "',
    'p10_Applicant_date_signature':' " . showData('example') . "',

    'p11_Interpreter_family_name':' " . showData('example') . "',
    'p11_Interpreter_given_name':' " . showData('example') . "',
    'p11_Interpreter_business_name':' " . showData('example') . "',
    'p11_Interpreter_daytime':' " . showData('example') . "',
    'p11_Interpreter_mobile':' " . showData('example') . "',
    'p11_Interpreter_email':' " . showData('example') . "',
    'p11_Interpreter_fluent_language':' " . showData('example') . "',
    'p11_Interpreter_signature_date':' " . showData('example') . "',





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
	
//page 
	
    'Preparer_signature_date':' " . showData('i_485_preparer_sign_date') . "',
    'part13_numbered':'" . showData('i_485_sign_interview_permanent_residence_pages_from') . "',
    'part13_through':'" . showData('i_485_sign_interview_permanent_residence_pages_to') . "',
    'part13_numbered_pages':'" . showData('i_485_sign_interview_additional_pages_from') . "',
    'part13_through2':'" . showData('i_485_sign_interview_additional_pages_to') . "',
    'i_485_page_19_p13_signature':' " . showData('i_485_uscis_officer_sign_date') . "',
	
// page 24
	
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
