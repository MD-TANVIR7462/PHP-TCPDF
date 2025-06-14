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
//******************************
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
// $pdf->TextField('p1_3', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62.8, 43);
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
// $pdf->TextField('p1_3_other1', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.2, 60);
// $pdf->TextField('p1_3_other2', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.2, 66.8);
// //.............


// //...........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 75.6, "<b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sex", 0, 1, false, false, 'L', true);
// //.............
// if (showData('other_information_about_you_gender') == "male") $checked_male = "checked";
// else $checked_male = "";
// if (showData('other_information_about_you_gender') == "female") $checked_female = "checked";
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
// $pdf->TextField('p1_3_other1', 88, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 92.5);
// $pdf->TextField('p1_3_other2', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 112, 92.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 101, '<b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Citizenship or Nationality', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 88, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 105.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 113.5, '<b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 125.5, 'If one has been assigned, you can find it on a notice that USCIS may have sent to you.', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 118.3);

// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 12, 132, '<b>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Recent Immigration History', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 138, 'If you last entered the United States using a passport or travel document, provide the following information.', '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(190, 7, 21, 144, 'Passport or Travel Document Number Used at Last Arrival', '', 0, 0, true, 'L');
// //...............
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 143);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 151, 'Expiration Date of this Passport or Travel Document (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 45.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118.4, 151.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 160.5, 'Country that Issued this Passport or Travel Document', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 71.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 100, 160);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 168.5, 'Nonimmigrant Visa Number Used During Most Recent Arrival (if any)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 71.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 168.2);

// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 176.5, 'Date Nonimmigrant Visa Was Issued (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 48.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 176.5);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 184.5, 'Place and Date of Last Arrival into the United States', '', 0, 0, true, 'L');
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 21, 192, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 84.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.4, 196.5);

// //.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>State</div>';
// $pdf->writeHTMLCell(50, 4, 107, 192, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("about_your_mailing_state", 22, 7, $comboBoxOptions, array(), array(), 107.5, 196.5);
// $pdf->SetFont('times', '', 10);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7, 130.8, 192, 'Date of Last Arrival (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('p1_3_other1', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 131.4, 196.5);

// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 12, 204, '<b>11.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_131_parole_referral_status') == "Y") $checked = "checked";
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
// $pdf->TextField('p3_6ca', 177, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 215.6);
// //...........
// $pdf->SetFont('times', '', 14);
// if (showData('i_131_parole_referral_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="24" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 222.5, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I was inspected at a Port of Entry and paroled as (for example, humanitarian parole, Cuban parole):';
// $pdf->writeHTMLCell(190, 7, 27, 223.5, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p3_6cb', 177, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 229);

// //..................
// $pdf->SetFont('times', '', 14);
// if (showData('i_131_frtf_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="25" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 236, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I came into the United States without admission or parole.';
// $pdf->writeHTMLCell(190, 7, 27, 237, $html, '', 0, 0, true, 'L');

// //..................
// $pdf->SetFont('times', '', 14);
// if (showData('i_131_other_parole_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="26" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 20, 244, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Other: ';
// $pdf->writeHTMLCell(190, 7, 27, 245, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p3_6e', 177, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 28, 250);

//******************************
//******** End Page No 2 ******
//******************************

//******************************
//******** Start Page No 3****
//******************************
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 1. Information About You</b> (Person applying for lawful permanent residence) (continued)</div>';
$pdf->writeHTMLCell(191.5, 6, 13, 25, $html, 1, 1, true, 'L');

// ..........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 32, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = "<div>If you were issued a Form I-94 Arrival/Departure Record, provide the information from your most recent Form I-94 below:</div>";
$pdf->writeHTMLCell(190, 7, 21.4, 32, $html, '', 0, 0, true, 'L');

//..........

$pdf->SetFont('times', '', 10);
$html = "<div>Family Name (Last Name) </div>";
$pdf->writeHTMLCell(130, 1, 21.5, 37.3, $html, 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 42);
//........
$pdf->SetFont('times', '', 10);
$html = "<div>Given Name (First Name)  </div>";
$pdf->writeHTMLCell(130, 1, 114.5, 37.3, $html, 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115.5, 42);
//............
$pdf->SetFont('times', '', 10); // set font
$html = "<div>Form I-94 Arrival/Departure Record Number</div>";
$pdf->writeHTMLCell(190, 7, 21.4, 51, $html, '', 0, 0, true, 'L');
// ..........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 21.6, 59, 'Expiration Date of Authorized Stay Shown on Form I-94 (mm/dd/yyyy)<br>
or Type or Print "D/S" for Duration of Status ', '', 0, 0, true, 'L');
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3_other1', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 96, 51);
$pdf->TextField('p1_3_other2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 128, 59.5);
//.............
// ..........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 21.6, 69, 'Immigration Status on Form I-94 (for example, class of admission,<br>
or paroled, if paroled) ', '', 0, 0, true, 'L');
//.....
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3_other2', 76.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 128, 69.5);

//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 80, "<b>13.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Was your last arrival the first time you were physically present in the United States?", 0, 1, false, false, 'L', true);
//............
if (showData('i_131_exclusion_status') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_131_exclusion_status') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 80, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 79, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 88, "<b>14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>What is your current immigration status (if it has changed since your last arrival)?", 0, 1, false, false, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3_other1', 64.9, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 88);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 96, '<b>15.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Expiration Date of Current Immigration Status (mm/dd/yyyy) or Type or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print "D/S" for Duration of Status', 0, 1, false, false, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3_other1', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 128, 97);
// // //...........
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 106, '<b>16.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Have you ever been issued an "alien crewman" visa?', 0, 1, false, false, 'L', true);
//............
if (showData('i_131_exclusion_status') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_131_exclusion_status') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 106, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 105, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 114, '<b>17.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Did you last arrive in the United States to join a vessel as a seaman or crewman, or while serving in any<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;capacity aboard a vessel or aircraft?', 0, 1, false, false, 'L', true);
//............
if (showData('i_131_exclusion_status') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_131_exclusion_status') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 115, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 114, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 12, 123, '<b>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Addresses', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7, 21, 129, '<b>Current U.S. Physical Address</b>', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7, 21, 135, 'In Care Of Name (if any)', '', 0, 0, true, 'L');
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_3_other1', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 140);


//.............

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 21, 147, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3b', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 153);
// ...........
if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="50a" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="50st" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="50f" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 147, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 147, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3c', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 153);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 21, 160.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3d', 120.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 166);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 160.7, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p5_3e", 22, 7, $comboBoxOptions, array(), array(), 144.2, 166);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 160.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3f', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 166);
//..............
$pdf->SetFont('times', '', 10);
$html = '<div>Date You First Resided at This Address (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(130, 3, 21, 174.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3f', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),101, 175);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 21, 182, 'Is this your current mailing address?', 0, 1, false, false, 'L', true);
//............
if (showData('i_131_exclusion_status') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('i_131_exclusion_status') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 183, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="54" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="54" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 182, $html, 0, 1, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 21, 188, 'If you answered "No," provide your current mailing address.', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(190, 7, 21, 196, '<b>Current Mailing Address (Safe or Alternate Mailing Address, if applicable)</b>', 0, 1, false, false, 'L', true);

// ******************************
//  ******** End Page No 21 ******
//  ******************************/

// ******************************
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
$pdf->TextField('p13_Applicant_family_name', 88, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 54);
$pdf->TextField('p13_Applicant_given_name', 84, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 54);
$pdf->TextField('p13_Applicant_business_name', 88, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 67);
//........................
$pdf->setFont('Times', '', 12);
$html = '<div><b><i>Applicant\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13,78, $html, '', 1, true, 'L');
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
$pdf->TextField('p13_Applicant_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 119.2);
//................



$pdf->setFont('Times', '', 12);
$html = "<div><b>Part 11. Interpreter's Contact Information, Certification, and Signature </b></div>";
$pdf->writeHTMLCell(191.5, 6, 13, 132, $html, 1, 1, true, 'L');
//............
$html = '<div><b><i>Interpreter\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(191.5, 6.5, 13,143, $html, '', 1, true, 'L');
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
$pdf->TextField('p13_Interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 156);
$pdf->TextField('p13_Interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 156);
$pdf->TextField('p13_Interpreter_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 170);
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
$pdf->TextField('p13_Interpreter_daytime', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 194);
$pdf->TextField('p13_Interpreter_mobile', 80, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 194);
$pdf->TextField('p13_Interpreter_email', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 207);

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
$pdf->TextField('p13_Interpreter_signature_date', 93, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 225.8);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 199, 225.8, ',', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 243.4, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 243.4, "Interpreter's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 243.4, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.6, 21, 249.2, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_Interpreter_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 249.2);

// ******************************
//  ******** End Page No 22 ******
//  ******************************/

// ******************************
//  ******** Start Page No 23 ****
//  ******************************/

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
    'p1_1a':' " . showData('information_about_you_family_last_name') . "',
    'p1_1b':' " . showData('information_about_you_family_last_name') . "',
    'p1_1c':' " . showData('information_about_you_family_last_name') . "',
    'p1_2a1':' " . showData('information_about_you_family_last_name') . "',
    'p1_2b1':' " . showData('information_about_you_family_last_name') . "',
    'p1_2c1':' " . showData('information_about_you_family_last_name') . "',
    'p1_2a2':' " . showData('information_about_you_family_last_name') . "',
    'p1_2b2':' " . showData('information_about_you_family_last_name') . "',
    'p1_2c2':' " . showData('information_about_you_family_last_name') . "',
    'p1_3':' " . showData('information_about_you_family_last_name') . "',
    'p1_3_other1':' " . showData('information_about_you_family_last_name') . "',
    'p1_3_other2':' " . showData('information_about_you_family_last_name') . "',
   
	
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
