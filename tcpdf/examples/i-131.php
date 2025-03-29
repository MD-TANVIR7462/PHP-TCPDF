<?php

//require_once('form_header.php');   //database connection file 

require_once("localconfig.php");
// $allDataCountry = indexByQueryAllData("SELECT * FROM countries");

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

        $this->Cell(40, 6, "Form I-131   Edition   01/20/25", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/I-131-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
    }
}



$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-131');

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

// set a barcode on the page footer
// $pdf->setBarcode(date('Y-m-d H:i:s'));

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
$pdf->Image($logo, 12, 9, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);    // set font
$pdf->MultiCell(100, 15, "Application for Travel Document", 0, 'C', 0, 1, 55, 11, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-131", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0013\nExpires 04/30/2022", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->writeHTMLCell(148, 76, 13, 32, "", "TBL", 1, false, false, 'J', true);
$pdf->SetFillColor(220, 220, 220); // set filling color
$pdf->writeHTMLCell(13, 21, 13.4, 32.4, '', 'R', 1, true, true, 'J', true);
$pdf->SetFont('times', 'B', 10);
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(12, 30, 13, 33, $html, 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(15, 30, 50, 32, 'Receipt', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(25, 30, 110, 32, 'Action Block', 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(1, 76, 90, 32, '', 'R', 1, false, true, 'J', true); //middle vertical(|) line 
$pdf->writeHTMLCell(1, 53, 160, 32, '', 'R', 1, false, true, 'J', true); //middle vertical(|) line 
$pdf->writeHTMLCell(1, 23, 202, 85, '', 'R', 1, false, true, 'J', true); //middle vertical(|) line 
$pdf->writeHTMLCell(42, 1, 161, 102.1, '', 'B', 1, false, true, 'J', true); //under receipt  horizontal (---) line 
$pdf->writeHTMLCell(78, 1, 13, 47.8, '', 'B', 1, false, true, 'J', true); //under receipt  horizontal (---) line 

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 15, 56, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(50, 7, 18, 54, 'Document Hand Delivered', 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 9);
$html = '<div>By:______________ Date: _______/_______/_______</div>';
$pdf->writeHTMLCell(80, 7, 18, 60, $html, 0, 1, false, true, 'J', true);

$pdf->writeHTMLCell(78, 1, 13, 61, '', 'B', 1, false, true, 'J', true); //horizontal (---) line 

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(50, 7, 40, 65, 'Document Issued', 0, 1, false, false, 'J', true);
//........

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 15, 73, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8.3);
$html = '<div>Re-entry Permit<i> (Update <br>"Mail To" Section)</i></div>';
$pdf->writeHTMLCell(35, 7, 18, 72, $html, 0, 1, false, false, 'J', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 50, 73, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8.3);
$html = '<div>Refugee Travel Document <i> (Update "Mail To" Section)</i></div>';
$pdf->writeHTMLCell(40, 7, 52, 72, $html, 0, 1, false, true, 'L', true);
//.....


$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 15, 84, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8.3);
$html = '<div>Single Advance Parole</div>';
$pdf->writeHTMLCell(30, 7, 18, 84, $html, 0, 1, false, false, 'J', false);
//.....
$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 50, 85, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8.3);
$html = '<div> Multiple Advance Parole<br>
Valid Until: ____/____/____</div>';
$pdf->writeHTMLCell(40, 7, 52, 84, $html, 0, 1, false, false, 'L', true);
//.....
$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 15, 95, '', 1, 1, false, true, 'L', false); //square qube 
$pdf->SetFont('times', '', 8.3);
$html = '<div>TPS Travel Authorization Documentation<br>Valid Until: ____/____/____</div>';
$pdf->writeHTMLCell(100, 7, 18, 95, $html, 0, 1, false, false, 'L', false);
//.........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(118, 7, 91, 89, '<div><b>Mail To</b></div>', 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 8.2);
$pdf->writeHTMLCell(118, 7, 104, 89.4, '<div><i><b>(Reentry Permit and</b></i></div>', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(118, 7, 91, 92.9, '<div><i><b>Refugee Travel Document Only)</b></i></div>', 0, 1, false, false, 'L', true);
//.....

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2.3, 2, 147, 87.5, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 9.4);
$html = '<div>Address in <b>Part 2</b></div>';
$pdf->writeHTMLCell(30, 7, 150, 87, $html, 0, 1, false, true, 'J', false);
//.............
$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2.3, 2, 147, 92.5, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 9.4);
$html = '<div>U.S. Embassy, U.S. Consulate, or<br>
USCIS international field office at:</div>';
$pdf->writeHTMLCell(130, 7, 150, 92, $html, 0, 1, false, true, 'L', false);
//.....
$pdf->writeHTMLCell(130, 7, 150, 100, "<b>______________________________</b>", 0, 1, false, true, 'L', false);
//.....
$pdf->writeHTMLCell(112, 53, 91, 32, "", "RTB", 1, false, true, 'J', true);
$pdf->SetFont('times', 'B', 10);
$html = '<div>To Be Completed by an <i>Attorney/ Representative,</i><br> if any.</div>';
$pdf->writeHTMLCell(28, 7, 167, 33, $html, 0, 1, false, true, 'C', false);
//.....
$pdf->SetFont('times', '', 14);
$html = '<div> <input type="checkbox" name="g28box" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(10, 7, 155, 58, $html, 0, 0, false, true, 'C', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Fill in box if G-28 is<br>attached to represent<br>the applicant.</div>';
$pdf->writeHTMLCell(45, 7, 166, 59.5, $html, 0, 0, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(118, 7, 18, 108, '<div><b>START HERE - Type or print in black ink.</b></div>', 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(190, 6.5, 13, 114.5, '<b>Part 1. Application Type</b>', 1, 1, true, 'L');
//......
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(118, 7, 12, 120, '<div>Select the application type below.</div>', 0, 1, false, false, 'L', true);
//..........
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(190, 6.5, 13, 128.5, '<b><i>Reentry Permit</i></b>', "", 1, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 137, '<b>1.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 136, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am a lawful permanent resident or conditional permanent resident of the United States, and I am applying for a reentry<br>permit.';
$pdf->writeHTMLCell(190, 7, 27, 137, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(190, 6.5, 13, 149, '<b><i>Refugee Travel Document</i></b>', "", 1, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 157, '<b>2.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 156, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I now hold refugee or asylee status in the United States, and I am applying for a Refugee Travel Document.';
$pdf->writeHTMLCell(190, 7, 27, 157, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 165, '<b>3.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 164, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am a lawful permanent resident as a direct result of refugee or asylee status, and I am applying for a Refugee Travel<br>Document.';
$pdf->writeHTMLCell(190, 7, 27, 165, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(190, 6.5, 13, 179, '<b><i>Travel Authorization Document (for Temporary Protected Status (TPS) beneficiaries who are inside the<br>
United States)</i></b>', "", 1, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 191, '<b>4.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 190, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am a TPS beneficiary in the United States, and I am applying for a TPS Travel Authorization Document under the<br>
Immigration and Nationality Act (INA) section 244(f)(3) to allow me to seek admission under TPS upon my return from<br>
abroad. The receipt number for my last approved Form I-821, Application for Temporary Protected Status, is:';
$pdf->writeHTMLCell(190, 7, 27, 191, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_family_name', 176, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27.5,204);
//...............
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(190, 6.5, 13, 216, '<b><i>Advance Parole Document (for aliens who are inside the United States) and Advance Permission to Travel
for Commonwealth of Northern Mariana Islands (CNMI) Long-Term Residents</i></b>', "", 1, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 228, '<b>5.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am located <b>inside</b> the United States, and I am applying for an Advance Parole Document to allow me to seek parole into the<br>
United States under INA section 212(d)(5)(A) upon my return from abroad based on:';
$pdf->writeHTMLCell(190, 7, 22, 228, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 22, 238, '<b>A.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 27, 237, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A pending Form I-485, Application to Register Permanent Residence or Adjust Status, receipt number if you are<br>
filing this form separately from your Form I-485: ';
$pdf->writeHTMLCell(190, 7, 33, 238, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_family_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,247);
/******************************
 ******** End Page No 1 ******
 ******************************/

/******************************
 ******** Start Page No 2****
 ******************************/
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(11.6);
// $html = '<div><b>Part 1. Application Type</b> (continued)</div>';
// $pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20, 26, '<b>B.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 26, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'A pending Form I-589, Application for Asylum and for Withholding of Removal, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 27, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_family_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,32);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20, 39, '<b>C.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 39, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'A pending initial Form I-821, Application for Temporary Protected Status, receipt number: ';
// $pdf->writeHTMLCell(190, 7, 33, 40, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_family_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,46);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20, 53, '<b>D.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 53, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Deferred Enforced Departure.';
// $pdf->writeHTMLCell(190, 7, 33, 54, $html, '', 0, 0, true, 'L');

// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,61, '<b>E.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 61, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'A pending initial Form I-821, Application for Temporary Protected Status, receipt number: ';
// $pdf->writeHTMLCell(190, 7, 33, 62, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmly_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,68);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,76, '<b>F.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 76, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'An approved Form I-914, Application for T Nonimmigrant Status, or Form I-914, Supplement A, Application for<br>
// Family Member of T-1 Recipient, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 77, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,87);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,94, '<b>G.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 94, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'An approved Form I-918, Petition for U Nonimmigrant Status, or Form I-918, Supplement A, Petition for<br>
// Qualifying Family Member of U-1 Recipient, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 95, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,105);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,112, '<b>H.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 112, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Being a current parolee under INA section 212(d)(5), under class of admission:';
// $pdf->writeHTMLCell(190, 7, 33, 113, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,119);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,127, '<b>I.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 127, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'An approved Form I-817, Application for Family Unity Benefits, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 128, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,134);
// //.............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,142, '<b>J.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 142, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'A pending Form I-687, Application for Status as a Temporary Resident Under Section 245A of the Immigration and<br>
// Nationality Act, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 143, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,152);
// //.............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,159, '<b>K.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 159, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'An approved V Nonimmigrant Status, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 160, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,166);
// //.............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,174, '<b>L.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 174, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'CNMI long-term residence, receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 175, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,181);
// //.............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,188, '<b>M.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 188, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Other (provide explanation):';
// $pdf->writeHTMLCell(190, 7, 33, 189, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 19, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,194);
// //..............
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = '<div><b><i>Initial Parole Document (for aliens who are currently outside the United States)</i></b></div>';
// $pdf->writeHTMLCell(191, 6.5, 13, 217, $html, 0, 1, true, 'L');
// ///.............
// //.............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 12,225, '<b>6.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'I am applying for a parole document under INA section 212(d)(5)(A) on my own behalf and I am outside the United States, or I<br>
// am applying on behalf of someone else who is <b>outside</b> the United States, for the first time (initial application) under one of the<br>
// following specific parole programs or processes:';
// $pdf->writeHTMLCell(190, 7,20, 225, $html, '', 0, 0, true, 'L');
// //.............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 15, 20,238, '<b>A.</b>', 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(50, 15, 26, 238, $html, 0, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10); // set font
// $html = 'Filipino World War II Veterans Parole (FWVP) Program, Form I-130 receipt number:';
// $pdf->writeHTMLCell(190, 7, 33, 239, $html, '', 0, 0, true, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p7_Interpreter_fmily_name', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34,244);


/******************************
 ******** End Page No 9 ******
 ******************************/

/******************************
 ******** Start Page No 10****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 6. Complete Only If Applying for a Refugee Travel Document (Part 1., Item Number 2. or 3.) </b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
//...............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 33, "Since you were admitted to the United States as a refugee or granted asylee status in the United States, have you, by any legal<br>procedure or voluntary act: ", '', 1, false, 'L');

//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.a.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 44, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Reacquired the nationality of the country named above in <b>Item Number 1.</b>? ';
$pdf->writeHTMLCell(120, 7, 21.4, 44, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 45, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 44, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.b.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 51, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Acquired a new nationality?';
$pdf->writeHTMLCell(120, 7, 21.4, 51, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 52, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 51, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.c.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 58, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Been granted refugee or asylee status in any other country?';
$pdf->writeHTMLCell(120, 7, 21.4, 58, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 59, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 58, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 65, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Are you filing for a Refugee Travel Document before departing the United States?';
$pdf->writeHTMLCell(120, 7, 21.4, 65, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 66, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 65, $html, 0, 1, false, true, 'J', true);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 72, "If you answered “Yes” to <b>Item Number 5</b>., because you are filing for a Refugee Travel Document before departing the United States,
you may skip <b>Item Numbers 6.a. - 6.c.</b>", '', 1, false, 'L');
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 83, "If you answered “No” to <b>Item Number 5</b>., you must answer <b>Item Number 6.a. - 6.c. </b>", '', 1, false, 'L');
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.a.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 89, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Are you currently outside the United States?';
$pdf->writeHTMLCell(120, 7, 21.4, 89, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 90, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 89, $html, 0, 1, false, true, 'J', true);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.b.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 96, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered “Yes,” what is your current location (City or Town and Country)?';
$pdf->writeHTMLCell(120, 7, 21.4, 96, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_signature_date', 181.3, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.6, 101);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.c.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 108, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered “Yes,” what other countries have you traveled to since leaving the United States?';
$pdf->writeHTMLCell(190, 7, 21.4, 108, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_signature_date', 181.3, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.6, 113);
//............
$pdf->SetFont('times', '', 11.6); // set font
$html = '<div><b>Part 7. Information About Your Proposed Travel (Complete only if you are applying for an Advance Parole Document (Part 1., Item Number 5.).) </b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 125, $html, 1, 1, true, 'L');
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 139, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 139, "Date of Intended Departure&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_family_name', 50, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 85, 139.5);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12,145, '<b>2.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Purpose of trip. (If you need extra space to complete this section, use the space provided in <b>Part 13. Additional Information.</b>)';
$pdf->writeHTMLCell(190, 7, 20, 145, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_fmily_name', 184, 29, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.7,150.5);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12,181, '<b>3.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'List the countries you intend to visit. (If you need extra space to complete this section, use the space provided in <b>Part 13.<br>Additional Information.</b>)';
$pdf->writeHTMLCell(190, 7, 20, 181, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_fmily_name', 184, 29, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.7,190);
//............
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 220, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'How many trips do you intend to use this document?';
$pdf->writeHTMLCell(120, 7, 21.4, 220, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 26.4, 227, "One Trip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More than one trip", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 21, 226, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 235, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 235, "Expected Length of Trip (in days)", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_family_name', 17, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70, 235);

/******************************
 ******** End Page No 11 ******
 ******************************/

/******************************
 ******** Start Page No 12****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 11. Interpreter\'s Contact Information, Certification, and Signature (if applicable) (If no interpreter
was used, skip to Part 12.) </b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
$pdf->writeHTMLCell(191, 6.5, 13, 34.5, '<b><i>Interpreter\'s Full Name</i></b>', '', 1, true, 'L');
//...............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 42, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 42, "Interpreter's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114, 42, "Interpreter's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 57, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 57, "Interpreter's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 47);
$pdf->TextField('p7_Interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 47);
$pdf->TextField('p7_Interpreter_business_name', 183, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 62);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 70.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 78, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 78, "Interpreter's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 78, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 78, "Interpreter's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 91, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 91, "Interpreter's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 83);
$pdf->TextField('p7_Interpreter_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 83);
$pdf->TextField('p7_Interpreter_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 96);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 104.6, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 112, 'I certify, under penalty of perjury, that I am fluent in English and', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 182, 112, ', and I have ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 119, 'interpreted every question on the application and Instructions and interpreted the applicant\'s answers to the questions in that language,<br>
and the applicant informed me that he or she understood every instruction, question, and answer on the application.', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 130.5, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 130.5, "Interpreter's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 130.5, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 135.6, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_signature_date', 75, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 112.5);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Interpreter_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 135.5);

/******************************
 ******** End Page No 12 ******
 ******************************/

/******************************
 ******** Start Page No 13****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 11. Interpreter\'s Contact Information, Certification, and Signature (if applicable) (If no interpreter
was used, skip to Part 12.) </b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
$pdf->writeHTMLCell(191, 6.5, 13, 34.5, '<b><i>Preparer\'s Full Name</i></b>', '', 1, true, 'L');
//...............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 42, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 42, "Preparer's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114, 42, "Preparer's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 57, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 57, "Preparer's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Preparer_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 47);
$pdf->TextField('p7_Preparer_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 47);
$pdf->TextField('p7_Preparer_business_name', 183, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 62);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 70.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 78, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 78, "Preparer's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 78, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 78, "Preparer's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 91, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 91, "Preparer's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Preparer_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 83);
$pdf->TextField('p7_Preparer_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 83);
$pdf->TextField('p7_Preparer_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 96);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 104.6, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 112, 'I certify, under penalty of perjury, that I prepared this application for the applicant at his or her request and with express consent and<br>
that all the responses and information contained in and submitted with the application are complete, true, and correct and reflects only<br>
information provided by the applicant. The applicant reviewed the responses and information and informed me that he or she<br>
understands the responses and information in or submitted with the application.', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 130.5, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 130.5, "Preparer's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 130.5, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 135.6, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Preparer_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 135.5);



/******************************
 ******** End Page No 13 ******
 ******************************/

/******************************
 ******** Start Page No 14 ****
 ******************************/
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
$pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space than<br>
what is provided, make copies of this page to complete and file with this application or attach a separate sheet of paper. Type or print<br>
your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item</b><b>Number</b><br>
to which the answer refers; and sign and date each sheet. ', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 83, 46, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 144, 46, 'Middle Name (if applicable)', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_family_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('p8_additional_info_given_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 51);
$pdf->TextField('p8_additional_info_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any)', '', 1, false, 'L');
$pdf->setFont('Times', '', 11);
$pdf->writeHTMLCell(197, 5, 53, 60, '<b>A-</b>', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 50, 61.4, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 59.5, 60);


//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 67, 'Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 67, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_3a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);
$pdf->TextField('p8_additional_info_3b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 72);
$pdf->TextField('p8_additional_info_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_3d', 183, 20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_3d')), 21, 81);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 89, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 20.5, 21, 81, '', 1, 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 103, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 103, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 103, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_4a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 108);
$pdf->TextField('p8_additional_info_4b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 108);
$pdf->TextField('p8_additional_info_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 108);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_4d', 183, 20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_4d')), 21, 118);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 119, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 126, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 20.5, 21, 118, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 139, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 139, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 139, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_5a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 144);
$pdf->TextField('p8_additional_info_5b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 144);
$pdf->TextField('p8_additional_info_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 144);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_5d', 183, 20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_5d')), 21, 153);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 154, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 161, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 20.5, 21, 153, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 174.5, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 174.5, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 174.5, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 179.3);
$pdf->TextField('p8_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 179);
$pdf->TextField('p8_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 179);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_6d', 183, 20, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_6d')), 21, 188);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 189.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 196, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 20.2, 21, 188, '', 1, 1, false, 'L');
//................
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 209, '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 209, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 209, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 214.3);
$pdf->TextField('p8_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 214);
$pdf->TextField('p8_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 214);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_6d', 183, 20, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_6d')), 21, 223);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 224.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 231, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 20.2, 21, 223, '', 1, 1, false, 'L');



$js = "
var fields = {



































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
$pdf->Output('I-131.pdf', 'I');
