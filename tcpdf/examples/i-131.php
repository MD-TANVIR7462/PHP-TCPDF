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
$pdf->SetFont('times', 'B', 14);    // set font
$pdf->MultiCell(120, 15, "Application for Travel Documents, Parole Documents,", 0, 'C', 0, 1, 48.5, 5.1, true);
$pdf->MultiCell(120, 15, "and Arrival/Departure Records", 0, 'C', 0, 1, 47.5, 10.5, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-131", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0013\nExpires 06/30/2027", 0, 'C', 0, 1, 169, 18.5, true);

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
abroad. The receipt number for my last <b>approved</b> Form I-821, Application for Temporary Protected Status, is:';
$pdf->writeHTMLCell(190, 7, 27, 191, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p1_4', 176, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27.5, 204);
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
$pdf->TextField('p1_5a', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 36, 247);

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
$html = '<div><b>Part 1. Application Type</b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
// ..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 26, '<b>B.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 26, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A pending Form I-589, Application for Asylum and for Withholding of Removal, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 27, $html, '', 0, 0, true, 'L');
// ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5b', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 32);
// ..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 39, '<b>C.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 39, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A pending initial Form I-821, Application for Temporary Protected Status, receipt number: ';
$pdf->writeHTMLCell(190, 7, 33, 40, $html, '', 0, 0, true, 'L');
// ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5c', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 46);
// ..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 53, '<b>D.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Deferred Enforced Departure.';
$pdf->writeHTMLCell(190, 7, 33, 54, $html, '', 0, 0, true, 'L');

// ..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 61, '<b>E.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 61, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A pending initial Form I-821, Application for Temporary Protected Status, receipt number: ';
$pdf->writeHTMLCell(190, 7, 33, 62, $html, '', 0, 0, true, 'L');
// ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5e', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 68);
// ..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 76, '<b>F.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 76, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'An approved Form I-914, Application for T Nonimmigrant Status, or Form I-914, Supplement A, Application for<br>
Family Member of T-1 Recipient, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 77, $html, '', 0, 0, true, 'L');
// ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5f', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 87);
// ..................   
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 94, '<b>G.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 94, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'An approved Form I-918, Petition for U Nonimmigrant Status, or Form I-918, Supplement A, Petition for<br>
Qualifying Family Member of U-1 Recipient, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 95, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5g', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 105);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 112, '<b>H.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Being a current parolee under INA section 212(d)(5), under class of admission:';
$pdf->writeHTMLCell(190, 7, 33, 113, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5h', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 119);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 127, '<b>I.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'An approved Form I-817, Application for Family Unity Benefits, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 128, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5i', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 134);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 142, '<b>J.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 142, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A pending Form I-687, Application for Status as a Temporary Resident Under Section 245A of the Immigration and<br>
Nationality Act, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 143, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5j', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 152);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 159, '<b>K.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 159, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'An approved V Nonimmigrant Status, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 160, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5k', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 166);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 174, '<b>L.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 174, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'CNMI long-term residence, receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 175, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5l', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 181);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 188, '<b>M.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 188, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Other (provide explanation):';
$pdf->writeHTMLCell(190, 7, 33, 189, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_5m', 169, 19, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 194);
//..............
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = '<div><b><i>Initial Parole Document (for aliens who are currently outside the United States)</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 217, $html, 0, 1, true, 'L');
///.............
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 225, '<b>6.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am applying for a parole document under INA section 212(d)(5)(A) on my own behalf and I am outside the United States, or I<br>
am applying on behalf of someone else who is <b>outside</b> the United States, for the first time (initial application) under one of the<br>
following specific parole programs or processes:';
$pdf->writeHTMLCell(190, 7, 20, 225, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 238, '<b>A.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 238, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Filipino World War II Veterans Parole (FWVP) Program, Form I-130 receipt number:';
$pdf->writeHTMLCell(190, 7, 33, 239, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_6', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 244);


// ******************************
//  ******** End Page No 2 ******
//  ******************************/

// ******************************
//  ******** Start Page No 3 ****
//  ******************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 1. Application Type</b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 28, '<b>B.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 28, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Immigrant Military Members and Veterans Initiative (IMMVI) ';
$pdf->writeHTMLCell(190, 7, 33, 29, $html, '', 0, 0, true, 'L');
//..............

//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 32, 35, '<b>(1)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 41, 35, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A current or former service member. ';
$pdf->writeHTMLCell(190, 7, 48, 36, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 32, 42, '<b>(2)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 41, 42, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A current spouse, child, or unmarried son or daughter (or their child under 21 years of age) of a current or<br>former service member.';
$pdf->writeHTMLCell(190, 7, 48, 43, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 32, 52, '<b>(3)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 41, 52, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Current legal guardian or surrogate of a current or former service member.';
$pdf->writeHTMLCell(190, 7, 48, 53, $html, '', 0, 0, true, 'L');

//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 61, '<b>C.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 61, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Intergovernmental Parole Referral  ';
$pdf->writeHTMLCell(190, 7, 33, 62, $html, '', 0, 0, true, 'L');
//............
$html = 'U.S. Federal Executive Branch Government Agency:  ';
$pdf->writeHTMLCell(190, 7, 33, 68.5, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_6ca', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 74.5);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = 'U.S. Federal Government Agency Representative Official Email Address:   ';
$pdf->writeHTMLCell(190, 7, 33, 81.5, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_6cb', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 87);

//  //..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 95, '<b>D.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 95, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Family Reunification Task Force (FRTF) Process; Task Force Registration Number:';
$pdf->writeHTMLCell(190, 7, 33, 96, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_6d', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 101);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 109, '<b>E.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 109, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Other: (List specific parole program or process)';
$pdf->writeHTMLCell(190, 7, 33, 110, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_6e', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 115);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 122, '<b>7.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am applying for a parole document under INA section 212(d)(5)(A) for myself and I am <b>outside</b> the United States, or I<br>
am applying for a parole document under INA section 212(d)(5)(A) on behalf of someone else who is <b>outside</b> the United<br>
States for the first time (initial application), <b>but not under a specific parole program or process.</b>';
$pdf->writeHTMLCell(190, 7, 28, 123, $html, '', 0, 0, true, 'L');
//.........
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = '<div><b><i>Initial Request for Arrival/Departure Record for Parole In Place (for aliens who are inside the United<br>States)</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 142, $html, 0, 1, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 155, '<b>8.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am applying for an initial period of parole in place under INA section 212(d)(5)(A) and I am <b>inside</b> the United States, or I am<br>
applying for an initial period of parole in place under INA section 212(d)(5)(A) on behalf of someone else who is <b>inside</b> the<br>
United States, under:';
$pdf->writeHTMLCell(190, 7, 20, 156, $html, '', 0, 0, true, 'L');

//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 170, '<b>A.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 170, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Military Parole in Place (PIP), only on my own behalf, and I am a:';
$pdf->writeHTMLCell(190, 7, 33, 171, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 177, '<b>(1)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A current or former service member';
$pdf->writeHTMLCell(190, 7, 46, 178, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 183.5, '<b>(2)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 183.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A spouse, parent, son, or daughter of a current or former service member.';
$pdf->writeHTMLCell(190, 7, 46, 184.5, $html, '', 0, 0, true, 'L');
//..............

//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 192, '<b>B.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 192, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Family Reunification Task Force (FRTF) Process; Task Force Registration Number: ';
$pdf->writeHTMLCell(190, 7, 33, 193, $html, '', 0, 0, true, 'L');
//  //..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_8b', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 198);

//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 205, '<b>C.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 205, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Family Reunification Task Force (FRTF) Process; Task Force Registration Number: ';
$pdf->writeHTMLCell(190, 7, 33, 206, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p3_8c', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 211);

//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 218, '<b>9.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 20, 218, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am applying for an initial period of parole in place under INA section 212(d)(5)(A) and I am <b>inside</b> the United States,<br>
but <b>not under</b> a specific program or process, or I am applying for an initial period of parole in place under INA section<br>
212(d)(5)(A) for someone else who is <b>inside</b> the United States, but <b>not under</b> a specific program or process.';
$pdf->writeHTMLCell(190, 7, 26, 219, $html, '', 0, 0, true, 'L');
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
$html = '<div><b>Part 1. Application Type</b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
// //..................
//.........
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = '<div><b><i>Arrival/Departure Records for Re-parole for Aliens Who Are Requesting a New Period of Parole (from<br>
inside the United States) </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 30, $html, 0, 1, true, 'L');
// .............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 42, '<b>10.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I was initially paroled into the United States or granted parole in place under INA section 212(d)(5)(A) under one of the<br>
following programs or processes and I am requesting a new period of parole, or I am applying for a new period of parole on<br>
behalf of someone else who was initially paroled into the United States under one of the following programs or processes: ';
$pdf->writeHTMLCell(190, 7, 20, 43, $html, '', 0, 0, true, 'L');
// //..............

//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 59, '<b>A.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 58, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Family Reunification Parole Process';
$pdf->writeHTMLCell(190, 7, 33, 59, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 66, '<b>B.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 65, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Certain Afghans Paroled Into the United States After July 31, 2021 (See form Instructions)';
$pdf->writeHTMLCell(190, 7, 33, 66, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 73, '<b>C.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 72, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Re-parole Process for certain Ukrainian Citizens and Their Immediate Family Members Paroled Into the United<br>
States on or After February 11, 2022 (See form Instructions)';
$pdf->writeHTMLCell(190, 7, 33, 73, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 82, '<b>D.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 82, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Filipino World War II Veterans Parole (FWVP) Program';
$pdf->writeHTMLCell(190, 7, 33, 83, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 89, '<b>E.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 89, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Immigrant Military Members and Veterans Initiative (IMMVI)';
$pdf->writeHTMLCell(190, 7, 33, 90, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 95.5, '<b>(1)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 95, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A current or former service member';
$pdf->writeHTMLCell(190, 7, 46, 96, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 101.5, '<b>(2)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 101.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A current spouse, child, or unmarried son or daughter (or their child under 21 years of age) of a current or<br>former service member.';
$pdf->writeHTMLCell(190, 7, 46, 101.5, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 110.5, '<b>(3)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 110, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Current legal guardian or surrogate of a current or former service member.';
$pdf->writeHTMLCell(190, 7, 46, 110.9, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 117.5, '<b>F.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 117, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Central American Minors (CAM) Program ';
$pdf->writeHTMLCell(190, 7, 33, 118, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 124, '<b>G.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 124, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Family Reunification Task Force (FRTF) Process';
$pdf->writeHTMLCell(190, 7, 33, 124.5, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 130.5, '<b>H.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 130.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Military Parole in Place (Military PIP)';
$pdf->writeHTMLCell(190, 7, 33, 131, $html, '', 0, 0, true, 'L');
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 137.5, '<b>(1)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 137, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A current or former service member.';
$pdf->writeHTMLCell(190, 7, 46, 138, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 33, 143.5, '<b>(2)</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 39, 143.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A spouse, parent, son, or daughter of a current or former service member.';
$pdf->writeHTMLCell(190, 7, 46, 144, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 20, 151.7, '<b>I.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 26, 151, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Other Program or Process (List specific program or process): ';
$pdf->writeHTMLCell(190, 7, 33, 152, $html, '', 0, 0, true, 'L');
//  //..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p4_10i', 169, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 34, 157);

//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 165, '<b>11.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 164, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I was initially paroled into the United States or granted parole in place under INA section 212(d)(5)(A) and I am<br>
requesting a new period of parole, but <b>not under</b> a specific program or process, or I am requesting a new period of<br>
parole on behalf of someone else who was initially paroled into the United States or granted parole in place, but <b>not<br>
under</b> a specific program or process.';
$pdf->writeHTMLCell(190, 7, 26, 165, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 184, '<b>12.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'If you selected one of the boxes in <b>Item Numbers 10</b>. or <b>11</b>., list the Admit';
$pdf->writeHTMLCell(190, 7, 20, 184, $html, '', 0, 0, true, 'L');
$html = 'Until Date/Parole shown on Form I-94: (mm/dd/yyyy)';
$pdf->writeHTMLCell(190, 7, 20, 190, $html, '', 0, 0, true, 'L');
//  ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p4_12', 51, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 99, 190);
//.........
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = '<div><b><i>Refugee Status</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 199, $html, 0, 1, true, 'L');
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 206, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Do you hold status as a refugee, were you paroled as a refugee, or are you a lawful permanent resident as a<br>direct result of being a refugee? ';
$pdf->writeHTMLCell(190, 7, 21.4, 206, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 182, 207, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 176, 206, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = '<div><b>Part 2. Information About You </b></div>';
$pdf->writeHTMLCell(191, 6, 13, 218, $html, 1, 1, true, 'L');
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 13, 226, "<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Your Full Name</div>", 0, 1, false, false, 'L', true);
$html = '<div>Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 22, 232, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_p2_1a', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 238);
//............
$pdf->SetFont('times', '', 10);
$html = '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 91.1, 232, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_p2_1b', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 91.5, 238);
//............
$pdf->SetFont('times', '', 10);
$html = '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 152, 231.9, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_p2_1c', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 152.5, 238);

// ******************************
//  ******** End Page No 4 ******
//  ******************************/

// ******************************
//  ******** Start Page No 5****
//  ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 2. Information About You</b>(continued)</div>';
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//.............
$pdf->SetFont('times', '', 10);
$html = "<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Names Used (if applicable)</div>";
$pdf->writeHTMLCell(130, 1, 12, 24, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 22, 30, '<div>Family Name (Last Name)</div>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, 88.7, 30, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 150.7, 30, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_2a1', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 35);
$pdf->TextField('p5_2b1', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89, 35);
$pdf->TextField('p5_2c1', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 35);
//.
$pdf->TextField('p5_2a2', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 41.8);
$pdf->TextField('p5_2b2', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89, 41.8);
$pdf->TextField('p5_2c2', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 41.8);
//.
$pdf->TextField('p5_2a3', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 48);
$pdf->TextField('p5_2b3', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89, 48);
$pdf->TextField('p5_2c3', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 48);

//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 13, 56, "<b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Current Mailing Address or Safe Address (if applicable)", 0, 1, false, false, 'L', true);
$html = '<div>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 22, 60, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', 'BI', 8);
$pdf->writeHTMLCell(85, 7, 110, 57, '<a href="https://tools.usps.com/go/ZipLookupAction_input"><i><b>(USPS ZIP Code Lookup)</b></i></a>', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3a', 181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 67);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 72, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3a', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 79);
// ...........
if (showData('i_864_principal_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="checkbox23" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="checkbox24" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="checkbox25" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 79, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 73.4, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 73.4, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3c', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 79);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 85.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3d', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 91);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 85.7, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p5_3e", 22, 7, $comboBoxOptions, array(), array(), 144.2, 91);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 85.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3f', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 91);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 97, 'Province', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3g', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 102);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 88, 97, 'Postal Code', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3h', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 102);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 124, 97, 'Country', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3i', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 102);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 110, "<b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Current Physical Address (if different from the above address)", 0, 1, false, false, 'L', true);
$html = '<div>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 22, 114, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', 'BI', 8);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_4a', 181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 120.4);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 125.8, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_4b', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 132);
// ........
if (showData('i_864_principal_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="checkbox23" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="checkbox24" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="checkbox25" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 132, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 126.9, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 126.9, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_4c', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 132);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 139, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_4d', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 144);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p5_4e", 22, 7, $comboBoxOptions, array(), array(), 144.2, 144);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 167, 139, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_4f', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 144);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 150, 'Province', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4g', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 155);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 88, 150, 'Postal Code', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4h', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 155);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 124, 150, 'Country', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4i', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 155);
//.............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b><i>Other Information</i></b></div>';
$pdf->writeHTMLCell(191, 5, 13, 166, $html, 0, 0, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 175, "<b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Alien Registration Number (A-Number) (if any) ", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(190, 7, 96, 175, "<b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Birth", 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_5', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 33.7, 181);
$pdf->TextField('p5_6', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 181);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 188, "<b>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Citizenship or Nationality ", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(190, 7, 112, 188, "<b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sex", 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_7', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 194.4);
//.............
if (showData('other_information_about_you_gender') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('other_information_about_you_gender') == "female") $checked_female = "checked";
else $checked_female = "";
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 125.5, 193.2, 'Male', 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(90, 7, 142.5, 192.2, 'Female', 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 13);
$html = '<div><input type="checkbox" name="gender" value="Male" checked="' . $checked_male . '" /></div>';
$pdf->writeHTMLCell(90, 7, 120.4, 194, $html, 0, 1, false, false, 'J', true);
$html = '<div><input type="checkbox" name="gender" value="Female" checked="' . $checked_female . '" /></div>';
$pdf->writeHTMLCell(90, 7, 137.4, 194, $html, 0, 1, false, false, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 201.5, "<b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Birth ", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(190, 7, 21.8, 205, "(mm/dd/yyyy)", 0, 1, false, false, 'L', true);
//...
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_8', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 43.5, 206.5);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 93, 201.5, "<b>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>U.S. Social Security Number (if any)", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_10', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 110, 206.5);
//....................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 213, "<b>11.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>USCIS Online Account Number (if any)", 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_11', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 218);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.3);
$pdf->writeHTMLCell(197, 5, 12, 225, 'If you are physically present in the United States, <b>and</b> you are seeking a Temporary Protected Status (TPS) travel authorization<br>
document, advance parole, a renewed period of parole (re-parole), or parole in place, (<b>Part 1., Item Numbers 4., 5., 8., 9., 10.</b>, or <b>11</b>.)<br>
complete the following:', '', 1, false, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 242, "<b>12.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Class of Admission (COA) (if any) ", 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(190, 7, 88, 242, "<b>13.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Most Recent Form I-94 Arrival/Departure Record Number (if any)", 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_12', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 25, 247.5);
$pdf->TextField('p5_13', 105, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 100, 247.5);
//******************************
//  ******** End Page No 5 ******
//  ******************************/

// ******************************
//  ******** Start Page No 6****
//  ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 2. Information About You</b>(continued)</div>';
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 24,  "<div><b>14.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expiration Date of Authorized Stay Shown on Form I-94</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 110, 24,  "<div><b>15.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;eMedical U.S. Parolee ID (USPID) (if any)</div>", 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 22, 30, '<div>(if any) (mm/dd/yyyy) </div>', 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_14', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 30);
$pdf->TextField('p6_15', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120.4, 30);
$pdf->SetFont('times', '', 12);
$html = '<div><i><b>Information About Them </b>(Complete this section only if you are applying on behalf of someone else.</i>)</div>';
$pdf->writeHTMLCell(191, 6, 13, 42, $html, 0, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.4);
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(197, 5, 12, 49, 'If you are requesting parole on behalf of someone other than yourself, provide the following information about that person in <b>Item<br>
Numbers 16. - 27.</b> Do not complete this section if filing for yourself.', '', 1, false, 'L');
//.............
$pdf->SetFont('times', '', 10);
$html = "<div><b>16.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)</div>";
$pdf->writeHTMLCell(130, 1, 12, 59, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 93.3, 59, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 152, 59, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_16a', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 64.5);
$pdf->TextField('p6_16b', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 64.5);
$pdf->TextField('p6_16c', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 64.5);
//.............
$pdf->SetFont('times', '', 10);
$html = "<div><b>17.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Their Other Names Used (if applicable)</div>";
$pdf->writeHTMLCell(130, 1, 12, 72, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 22, 78, '<div>Family Name (Last Name)</div>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, 93.3, 78, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 152, 78, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_17a1', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 83.5);
$pdf->TextField('p6_17b1', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 83.5);
$pdf->TextField('p6_17c1', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 83.5);
// //.
$pdf->TextField('p6_17a2', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 90.2);
$pdf->TextField('p6_17b2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 90.2);
$pdf->TextField('p6_17c2', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 90.2);
// //.
$pdf->TextField('p6_17a3', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8, 97);
$pdf->TextField('p6_17b3', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 97);
$pdf->TextField('p6_17c3', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 97);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 105,  "<div><b>18.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 70, 105,  "<div><b>19.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth</div>", 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_18', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 110.5);
$pdf->TextField('p6_19', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 81, 110.5);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 118,  "<div><b>20.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 110, 118,  "<div><b>21.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daytime Phone Number</div>", 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_20', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 124.2);
$pdf->TextField('p6_21', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 124.2);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 131,  "<div><b>22.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address (if any)</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 110, 131,  "<div><b>23.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any) </div>", 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_22', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 137);
$pdf->TextField('p6_23', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 137);
//?....................
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 13, 144, "<b>24.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Their Current Mailing Address", 0, 1, false, false, 'L', true);
$html = '<div>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 22, 148, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_24a', 181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 155);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 160.4, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_24b', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 167);
// ...........
if (showData('i_864_principal_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="checkbox23" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="checkbox24" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="checkbox25" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 167, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 161.5, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 161.5, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_24c', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 167);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 173.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_24d', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 179);
// //............

$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 173.7, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p6_24e", 22, 7, $comboBoxOptions, array(), array(), 144.2, 179);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 173.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_24f', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 179);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 185, 'Province', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_24g', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 190);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 88, 185, 'Postal Code', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_24h', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 190);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 124, 185, 'Country', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_24i', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 190);
// //! //..............
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 13, 197, "<b>25.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Their Current Physical Address", 0, 1, false, false, 'L', true);
$html = '<div>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 22, 201, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', 'BI', 8);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_25a', 181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 207.7);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 212.8, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_25b', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 219.2);
// ........
if (showData('i_864_principal_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="checkbox23" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="checkbox24" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="checkbox25" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 219, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 213.6, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 213.6, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_25c', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 219.2);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 225.6, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_25d', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 231);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 225.6, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p6_25e", 22, 7, $comboBoxOptions, array(), array(), 144.2, 231);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 167, 225, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_25f', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 231);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 238, 'Province', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_25g', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 244);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 88, 238, 'Postal Code', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_25h', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 244);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 124, 238, 'Country', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_25i', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 244);
/******************************
 ******** End Page No 6 ******
 ******************************/

/******************************
 ******** Start Page No 7****
 ******************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(12);
$html = '<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
//.................
$pdf->SetFont('times', '', 12);
$html = '<div><i><b>Their Other Information</b></i></div>';
$pdf->writeHTMLCell(191, 6, 13, 29, $html, 0, 1, true, false, 'L', true);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 36,  "<div><b>26.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class of Admission (COA) (if any)</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 94, 36,  "<div><b>27.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most Recent Form I-94 Arrival/Departure Record Number (if any)</div>", 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p7_26', 68, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 41);
$pdf->TextField('p7_27', 97, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 41);
//...........
$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 3. Biographic Information of the Person Who Will Receive the Travel Document, Parole Document,
or Arrival/Departure Record</b>d</div>';
$pdf->writeHTMLCell(191, 6, 13, 54, $html, 1, 1, true, false, 'L', true);
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, 12, 67, $html, 0, 0, false, true, 'L', true);
//............. 
$pdf->SetFont('times', '', 14);
if (showData('biographic_info_ethnicity') == "hispanic") $checked = "checked";
else $checked = "";
$html = '<input type="checkbox" name="hispanic_not_hispanic" value="hispanic"  checked="' . $checked . '" />';
$pdf->writeHTMLCell(5, 1, 21, 72, $html, 0, 1, false, false, 'L', false);
if (showData('biographic_info_ethnicity') == "nothispanic") $checked = "checked";
else $checked = "";
$html = '<input type="checkbox" name="hispanic_not_hispanic" value="nothispanic"  checked="' . $checked . '" />';
$pdf->writeHTMLCell(5, 1, 58, 72, $html, 0, 1, false, false, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 27.7, 72.5, "Hispanic or Latino", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 65, 72.5, "Not Hispanic or Latino", 0, 0, false, true, 'L', true);
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Race (Select <b>all applicable</b> boxes)';
$pdf->writeHTMLCell(0, 0, 12, 79, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
if (showData('biographic_info_race_american_native') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 21, 86, '<input type="checkbox" name="p3_race1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_race_asian') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 58, 86, '<input type="checkbox" name="p3_race2" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_race_black_african') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 78, 86, '<input type="checkbox" name="p3_race3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_race_native_islander') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 115, 86, '<input type="checkbox" name="p3_race4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_race_white') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 158, 86, '<input type="checkbox" name="p3_race5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//.........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 27.7, 86.5, "American Indian or<br>Alaska Native", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 65, 86.5, "Asian", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 85, 86.5, "Black or African<br>American", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 122, 86.5, "Native Hawaiian or<br>Other Pacific Islander", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 165, 86.5, "White", 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 98, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feet', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 64, 98, 'Inches', 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->ComboBox('p7_3feet', 19, 6.6, array('', '2', '3', '4', '5', '6', '7', '8'), array(), array(), 44, 97.7);
$pdf->ComboBox('p7_3inches', 19, 6.6, array('', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'), array(), array(), 76, 97.7);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 100, 98, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pounds', 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p7_4Pounds1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 137, 97.7);
$pdf->TextField('p7_4Pounds2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 97.7);
$pdf->TextField('p7_4Pounds3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 97.7);
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye color (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, 12, 106, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
if (showData('biographic_info_eye_color') == "black") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 21, 112, '<input type="checkbox" name="p3_eye_color_status1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "blue") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 42, 112, '<input type="checkbox" name="p3_eye_color_status2" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 60, 112, '<input type="checkbox" name="p3_eye_color_status3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 80, 112, '<input type="checkbox" name="p3_eye_color_status4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "green") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 100, 112, '<input type="checkbox" name="p3_eye_color_status5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "hazel") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 120, 112, '<input type="checkbox" name="p3_eye_color_status6" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "marron") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 140, 112, '<input type="checkbox" name="p3_eye_color_status7" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "pink") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 160, 112, '<input type="checkbox" name="p3_eye_color_status8" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_eye_color') == "unknown") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 176, 112, '<input type="checkbox" name="p3_eye_color_status9" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 28, 112.3, "Black", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 49, 112.3, "Blue", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 67, 112.3, "Brown", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 87, 112.3, "Gray", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 107, 112.3, "Green", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 127, 112.3, "Hazel", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 147, 112.3, "Maroon", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 167, 112.3, "Pink", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 183, 112.3, "Unknown/Other", 0, 0, false, true, 'L', true);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 118, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hair color (Select <b>only one</b> box)', 0, 0, false, true, 'L', true);
//  //.................
$pdf->SetFont('times', '', 14);
if (showData('biographic_info_hair_color') == "blad") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 21, 124, '<input type="checkbox" name="p3_hair_color_status1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "black") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 42, 124, '<input type="checkbox" name="p3_hair_color_status2" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "blond") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 60, 124, '<input type="checkbox" name="p3_hair_color_status3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "brown") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 80, 124, '<input type="checkbox" name="p3_hair_color_status4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "gray") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 100, 124, '<input type="checkbox" name="p3_hair_color_status5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "red") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 120, 124, '<input type="checkbox" name="p3_hair_color_status6" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "sandy") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 140, 124, '<input type="checkbox" name="p3_hair_color_status7" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "white") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 160, 124, '<input type="checkbox" name="p3_hair_color_status8" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('biographic_info_hair_color') == "unknown") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 176, 124, '<input type="checkbox" name="p3_hair_color_status9" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 28, 124.3, "Bald<br>(No hair)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 49, 124.3, "Black", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 67, 124.3, "Blond", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 87, 124.3, "Brown", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 107, 124.3, "Gray", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 127, 124.3, "Red", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 147, 124.3, "Sandy", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 167, 124.3, "White", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 183, 124.3, "Unknown/<br>Other", 0, 0, false, true, 'L', true);
//................
$pdf->SetFontSize(11.6);
$pdf->writeHTMLCell(191, 6.5, 13, 137, "<b>Part 4. Processing Information</b>", 1, 1, true, 'L');
//................
$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 144, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Has the person who will receive the travel document, parole document, or Arrival/Departure Record, if<br>approved, been in any exclusion, deportation, removal, or rescission proceedings? ';
$pdf->writeHTMLCell(190, 7, 21.4, 144, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 145, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 144, $html, 0, 1, false, true, 'J', true);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.a.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 155, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> before been issued a Reentry Permit or Refugee Travel Document? (If you answered<br>
“Yes,” provide the information in <b>Item Numbers 2.b. - 2.c.</b> for the last document issued to you.)';
$pdf->writeHTMLCell(190, 7, 21.4, 155, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 156, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 155, $html, 0, 1, false, true, 'J', true);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 165,  "<div><b>2.b.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Issued</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 22, 170,  "<div>(mm/dd/yyyy)</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 77, 165,  "<div><b>2.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disposition (attached, lost, stolen, damaged/destroyed, still in my possession, etc.):</div>", 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p7_2b', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 170);
$pdf->TextField('p7_2c', 117, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 170);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.a.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 179, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 9.6); // set font
$html = 'Have you <b>EVER</b> R been issued an Advance Parole Document? (If you answered “Yes,” please provide the<br>
information in <b>Item Numbers 3.b. - 3.c.</b> for the last document issued to you.)';
$pdf->writeHTMLCell(190, 7, 21.4, 179, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 180, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 179, $html, 0, 1, false, true, 'J', true);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 190,  "<div><b>3.b.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Issued</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 22, 195,  "<div>(mm/dd/yyyy)</div>", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(130, 1, 77, 190,  "<div><b>3.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disposition (attached, lost, stolen, damaged/destroyed, still in my possession, etc.):</div>", 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p7_3b', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 195);
$pdf->TextField('p7_3c', 117, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 195);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you are requesting <b>parole from outside the United States, parole in place, or re-parole from inside the United States, SKIP to<br>Part 8.</b>';
$pdf->writeHTMLCell(196, 7, 13, 202, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 213, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 9.6); // set font
$html = 'Are you requesting a <b>replacement</b> Reentry Permit, Refugee Travel Document, Advance Parole<br>Document, or TPS Travel Authorization Document?)';
$pdf->writeHTMLCell(190, 7, 21.4, 213, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 214, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 213, $html, 0, 1, false, true, 'J', true);
/******************************
 ******** End Page No 7 ******
 ******************************/

/******************************
 ******** Start Page No 8****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 4. Processing Information</b> (continued)</div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
// .............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 27, '<b>5.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered “Yes,” select one of the following boxes and complete <b>Item Numbers 6.a. - 6.b.</b> If you answered “No,” you<br>can skip to <b>Item Number 7.a.</b>';
$pdf->writeHTMLCell(190, 7, 20, 27, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 37, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'My document was issued, but I did not receive it.';
$pdf->writeHTMLCell(190, 7, 26, 38, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I received my document, but then it was lost, stolen, or damaged. ';
$pdf->writeHTMLCell(190, 7, 26, 45, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 51, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I received my document, but it has incorrect information because of an error caused by me or because my information has<br>changed.';
$pdf->writeHTMLCell(190, 7, 26, 52, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 61, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I received my document, but it has incorrect information because of an error not caused by me (such as a U.S. Citizenship<br>and Immigration Services (USCIS) error).';
$pdf->writeHTMLCell(190, 7, 26, 62, $html, '', 0, 0, true, 'L');
// .............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 72, '<b>6.a.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'If you are replacing your Reentry Permit, Refugee Travel Document, Advance Parole Document, or TPS Travel Authorization<br>
Document because it has incorrect information, please select the applicable box(es) indicating the information that needs to be<br>
corrected and then provide any additional information in the text box that helps USCIS confirm the correction needed.';
$pdf->writeHTMLCell(190, 7, 20, 72, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 86, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Name';
$pdf->writeHTMLCell(190, 7, 26, 87, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'A-Number';
$pdf->writeHTMLCell(190, 7, 26, 94, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 100, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Country of Birth/Citizenship';
$pdf->writeHTMLCell(190, 7, 26, 101, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 107, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Terms and Conditions';
$pdf->writeHTMLCell(190, 7, 26, 108, $html, '', 0, 0, true, 'L');
//..................
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 114, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Date of Birth';
$pdf->writeHTMLCell(190, 7, 26, 115, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 121, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Sex';
$pdf->writeHTMLCell(190, 7, 26, 122, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 128, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Validity Date';
$pdf->writeHTMLCell(190, 7, 26, 129, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 135, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Photo';
$pdf->writeHTMLCell(190, 7, 26, 136, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 10); // set font
$html = 'Provide an explanation of what is incorrect on your current document to support your request for a correction and attach copies<br>of any documents supporting your request';
$pdf->writeHTMLCell(190, 7, 19, 142, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_6a', 184.5, 21, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 152);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 174.4, '<b>6.b.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Provide the receipt number for the Form I-131 related to the Reentry Permit, Refugee Travel Document, Advance Parole<br>Document, or TPS Travel Authorization Document that you are seeking to replace: ';
$pdf->writeHTMLCell(190, 7, 19, 174.4, $html, '', 0, 0, true, 'L');
//  ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_6b', 184.5, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 184);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7, 12, 191, '<b>If you are applying for an Advance Parole Document, SKIP to Part 7.</b> ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7, 12, 197, '<b>You must complete the rest of Part 4. if you are requesting a Reentry Permit or Refugee Travel Document.</b> ', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7, 12, 203, 'Where do you want your Reentry Permit or Refugee Travel Document sent? Please note that if you want your Reentry Permit or<br>
Refugee Travel Document sent to another country, you will need to pick it up at a U.S. Embassy, U.S. Consulate, or USCIS<br>
international field office. (Select one) ', '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 218, '<b>7.a.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 217.4, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'To the U.S. address shown in <b>Part 2., Item Number 3.</b> of this application.';
$pdf->writeHTMLCell(190, 7, 26, 218, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 225, '<b>7.b.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 224.4, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'To a U.S. Embassy, U.S. Consulate, USCIS international field office, or Department of Homeland Security (DHS) office<br>overseas at:';
$pdf->writeHTMLCell(190, 7, 26, 225, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 26, 232, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p8_7b1', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 234.5);
//............
$pdf->SetFont('times', '', 10);
$html = '<div>Country</div>';
$pdf->writeHTMLCell(90, 7, 111, 233.7, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p8_7b2', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 234.5);
/******************************
 ******** End Page No 8 ******
 ******************************/

/******************************
 ******** Start Page No 9****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 4. Processing Information</b>(continued)</div>';
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 15, 12, 26, 'If you are requesting that the Reentry Permit or Refugee Travel Document be sent to a U.S. Embassy, U.S. Consulate, or USCIS<br>
international field office, where should the <b>notification</b> to pick up the travel document be sent?', 0, 1, false, true, 'L', true);
//..........
$pdf->writeHTMLCell(50, 15, 12, 35.7, '<b>8.a.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 21, 34.8, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'To the address shown in <b>Part 2., Item Number 3.</b> of this application.';
$pdf->writeHTMLCell(190, 7, 27, 35.9, $html, '', 0, 0, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 45, '<b>8.b.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 21, 44.2, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'To the address shown below in <b>Part 4., Item Number 9.a</b>. of this application.';
$pdf->writeHTMLCell(190, 7, 27, 45.3, $html, '', 0, 0, true, 'L');

//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 12, 53, "<b>9.a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>In Care Of Name (if any)", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9a', 181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 59);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 64, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9b', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 71);
// ...........
if (showData('i_864_principal_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_864_principal_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="checkbox23" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="checkbox24" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="checkbox25" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 71, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 65.4, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 65.4, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9c', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 71);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 77.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9d', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 83);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 77.7, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p9_9e", 22, 7, $comboBoxOptions, array(), array(), 144.2, 83);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 77.7, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9f', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 83);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 89.6, 'Province', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_9g', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 94.6);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 88, 89.6, 'Postal Code', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_9h', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 94.6);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 124, 89.6, 'Country', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_9i', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 94.6);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 12, 103, "<b>9.b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Daytime Phone Number", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9b_daytime', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 108);
//........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 95, 103, "<b>9.c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Email Address", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_9c_email', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 108);
//........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 5. Complete Only If Applying for a Reentry Permit (Part 1., Item Number 1.)</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 120, $html, 1, 1, true, false, 'L', true);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 127, "<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Since becoming a permanent resident of the United States (or during the past 5 years, whichever is less), how much total time<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;have you spent outside the United States?", 0, 1, false, false, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 138, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Less Than 6 Months';
$pdf->writeHTMLCell(190, 7, 26, 139, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 144, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = '6 Months to 1 Year';
$pdf->writeHTMLCell(190, 7, 26, 145, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 150, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = '1 to 2 Years';
$pdf->writeHTMLCell(190, 7, 26, 151, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 156, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = '2 to 3 Years';
$pdf->writeHTMLCell(190, 7, 26, 157, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 162, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = '3 to 4 Years';
$pdf->writeHTMLCell(190, 7, 26, 163, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'More Than 4 Years';
$pdf->writeHTMLCell(190, 7, 26, 169, $html, '', 0, 0, true, 'L');
//..................
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 6. Complete Only If Applying for a Refugee Travel Document (Part 1., Item Number 2. or 3.)</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 180, $html, 1, 1, true, false, 'L', true);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 188, "<b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country from which you are a refugee or asylee:", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p9_p6_1', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 193.5);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 7, 12, 200, "<b>If you answer “Yes” to Item Numbers 2. - 6.c. below</b>, use the space provided in <b>Part 13. Additional Information</b> to provide an<br>
explanation.", 0, 1, false, false, 'L', true);

//................
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 210, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 7, 13, 216, 'Since you were admitted to the United States as a refugee or granted asylee status, have you <b>EVER</b>: ', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Do you plan to travel to the country named above in <b>Item Number 1.</b>? ';
$pdf->writeHTMLCell(120, 7, 21.4, 210, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 211, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 210, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.a.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 223, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Returned to the country named above in <b>Item Number 1</b>.? ';
$pdf->writeHTMLCell(120, 7, 21.4, 223, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 224, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 223, $html, 0, 1, false, true, 'J', true);
// //..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.b.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 230, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'Applied for and/or obtained a national passport, passport renewal, or entry permit from the country in<br><b>Item Number 1.</b>?';
$pdf->writeHTMLCell(190, 7, 21.4, 230, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 231, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 230, $html, 0, 1, false, true, 'J', true);
// //..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 240, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 9.7); // set font
$html = 'Applied for and/or received any benefit from the country named in <b>Item Number 1.</b>. (for example, health<br>insurance benefits)?';
$pdf->writeHTMLCell(190, 7, 21.4, 240, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 241, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 240, $html, 0, 1, false, true, 'J', true);
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
$pdf->TextField('p10_6b', 181.3, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.6, 101);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.c.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 108, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered “Yes,” what other countries have you traveled to since leaving the United States?';
$pdf->writeHTMLCell(190, 7, 21.4, 108, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_6c', 181.3, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.6, 113);
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
$pdf->TextField('p10_p7_1', 50, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 85, 139.5);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 145, '<b>2.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Purpose of trip. (If you need extra space to complete this section, use the space provided in <b>Part 13. Additional Information.</b>)';
$pdf->writeHTMLCell(190, 7, 20, 145, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_p7_2', 184, 29, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.7, 150.5);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 181, '<b>3.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'List the countries you intend to visit. (If you need extra space to complete this section, use the space provided in <b>Part 13.<br>Additional Information.</b>)';
$pdf->writeHTMLCell(190, 7, 20, 181, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_p7_3', 184, 29, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.7, 190);
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
$pdf->TextField('p10_p7_5', 17, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70, 235);

/******************************
 ******** End Page No 10 ******
 ******************************/

/******************************
 ******** Start Page No 11****
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
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 31, '<b>1.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'Explain how you qualify for parole, parole in place, or re-parole. (If you need extra space to complete this section, use the space
provided in <b>Part 13. Additional Information.</b>) Include copies of any supporting documents or evidence you wish considered.<br>
(See Instructions.) ';
$pdf->writeHTMLCell(190, 7, 20, 31, $html, '', 0, 0, true, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P11_1', 184, 29, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.7, 44);
//..........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 75, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 75, "Expected Length of Stay in the United States", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P11_2', 118, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 86.5, 75);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 82, 'If the person intended to receive the parole document is outside the United States, complete the following <b>Item Numbers:</b>', '', 1, false, 'L');
//..........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 89, '<b>3.a.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 89, "Date of Intended Arrival to the United States&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P11_3a', 50, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 110, 89);
//..........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 12, 96, '<b>3.b.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 96, "Location (City or Town and Country) of the U.S. Embassy, U.S. Consulate, or the USCIS international field office that you<br>
want us to notify.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 106, "City or Town", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 105, 106, "Country", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P11_3b1', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.5, 110.5);
$pdf->TextField('P11_3b2', 98.4, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105.5, 110.5);
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = "<div><b>Part 9. Employment Authorization For New Period of Parole (Re-parole) (Part 1., Item Number 10. or<br>11.)  </b></div>";
$pdf->writeHTMLCell(191, 6.5, 13, 123, $html, 1, 1, true, 'L');
$html = "<div><b>Part 10. Applicant's Contact Information, Certification, and Signature (Read the information on<br>penalties and travel warnings in the form Instructions before completing this Part 10.) </b></div>";
$pdf->writeHTMLCell(191, 6.5, 13, 150, $html, 1, 1, true, 'L');
$pdf->writeHTMLCell(191, 6.5, 13, 166, "<b><i>Applicant's Contact Information</i></b>", '', 1, true, 'L');
//...........
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 15, 12, 136, '<b>1.</b>', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('i_864a_i_am_intending_immigrant_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox"  name="part2_1_status" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 135, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$html = 'I am requesting an Employment Authorization Document (EAD) upon approval of my new period of parole (re-parole)<br>selected under <b>Part 1., Item Number 10</b>. or <b>11.</b>';
$pdf->writeHTMLCell(190, 7, 26, 136, $html, '', 0, 0, true, 'L');
// //..............


$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 174, 'Provide your daytime telephone number, mobile telephone number (if any), and email address (if any). ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 180, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 180, "Applicant's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 108, 180, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 116, 180, "Applicant Mobile Telephone Number (if any)", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 193, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 193, "Applicant's Email Address (if any)", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P11_p10_1', 84, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21,185);
$pdf->TextField('P11_p10_2', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 117, 185);
$pdf->TextField('P11_p10_3', 84, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 198);

//........................
$pdf->setFont('Times', '', 11.6);
$html = "<div><b><i>Applicant's Certification and Signature</i></b></div>";
$pdf->writeHTMLCell(191, 6.5, 13, 207, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 215, 'I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with<br>
my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in <b>Part 11.</b>,<br>
understood, all of the responses and information contained in, and submitted with, my application (as explained to me by the<br>
interpreter), and that all of the responses and the information are complete, true, and correct. Furthermore, I authorize the release of<br>
any information from any and all of my records that USCIS may need to determine my eligibility for an immigration request and to<br>
other entities and persons where necessary for the administration and enforcement of U.S. immigration law. ', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 243.5, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 243.5, "Applicant's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 243.5, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 248.6, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P11_p10_4', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 248.5);



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
$pdf->TextField('p12_1a', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 47);
$pdf->TextField('P12_1b', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 47);
$pdf->TextField('P12_2', 183, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 62);
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
$pdf->TextField('P12_3', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 83);
$pdf->TextField('P12_4', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 83);
$pdf->TextField('P12_5', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 96);

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
$pdf->TextField('P12_interpreter_english', 75, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 112.5);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('P12_6', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 135.5);

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
$pdf->SetFontSize(12);
$html = '<div><b>Part 12. Contact Information, Certification, and Signature of the Person Preparing this Application, if<br>
Other Than the Applicant  </b></div>';
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
$pdf->TextField('p13_1a', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 47);
$pdf->TextField('p13_1b', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 47);
$pdf->TextField('p13_2', 183, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 62);
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
$pdf->TextField('p13_3', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 83);
$pdf->TextField('p13_4', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 83);
$pdf->TextField('p13_5', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 96);

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
$pdf->TextField('p13_6', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 135.5);



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
$html = '<div><b>Part 13. Additional Information</b></div>';
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
$pdf->TextField('p14_additional_info_family_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('p14_additional_info_given_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 51);
$pdf->TextField('p14_additional_info_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any)', '', 1, false, 'L');
$pdf->setFont('Times', '', 11);
$pdf->writeHTMLCell(197, 5, 53, 60, '<b>A-</b>', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 50, 61.4, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 59.5, 60);


//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 67, 'Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 67, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_3a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);
$pdf->TextField('p14_additional_info_3b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 72);
$pdf->TextField('p14_additional_info_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_3d', 183, 20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_3d')), 21, 81);
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
$pdf->TextField('p14_additional_info_4a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 108);
$pdf->TextField('p14_additional_info_4b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 108);
$pdf->TextField('p14_additional_info_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 108);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_4d', 183, 20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_4d')), 21, 118);
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
$pdf->TextField('p14_additional_info_5a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 144);
$pdf->TextField('p14_additional_info_5b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 144);
$pdf->TextField('p14_additional_info_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 144);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_5d', 183, 20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_5d')), 21, 153);
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
$pdf->TextField('p14_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 179.3);
$pdf->TextField('p14_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 179);
$pdf->TextField('p14_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 179);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_6d', 183, 20, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_6d')), 21, 188);
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
$pdf->TextField('p14_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 214.3);
$pdf->TextField('p14_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 214);
$pdf->TextField('p14_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 214);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_6d', 183, 20, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_6d')), 21, 223);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 224.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 231, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8, 20.2, 21, 223, '', 1, 1, false, 'L');

//? NOTE:- Page number then serial / part number --> p1_4 means page 1 seiral 4..................
$js = "
var fields = {
	'p1_4':' " . showData('n_400_a_number') . "',
	'p1_5a':' " . showData('n_400_a_number') . "',
//page 1 end.....

	'p2_5b':' " . showData('n_400_a_number') . "',
	'p2_5c':' " . showData('n_400_a_number') . "',
	'p2_5e':' " . showData('n_400_a_number') . "',
	'p2_5f':' " . showData('n_400_a_number') . "',
	'p2_5g':' " . showData('n_400_a_number') . "',
	'p2_5h':' " . showData('n_400_a_number') . "',
	'p2_5i':' " . showData('n_400_a_number') . "',
	'p2_5j':' " . showData('n_400_a_number') . "',
	'p2_5k':' " . showData('n_400_a_number') . "',
	'p2_5l':' " . showData('n_400_a_number') . "',
	'p2_6':' " . showData('n_400_a_number') . "',
//page 2 end.....

	'p3_6ca':' " . showData('n_400_a_number') . "',
	'p3_6cb':' " . showData('n_400_a_number') . "',
	'p3_6d':' " . showData('n_400_a_number') . "',
	'p3_6e':' " . showData('n_400_a_number') . "',
	'p3_8b':' " . showData('n_400_a_number') . "',
	'p3_8c':' " . showData('n_400_a_number') . "',
//page 3 end.....

	'p4_10i':' " . showData('n_400_a_number') . "',
	'p4_12':' " . showData('n_400_a_number') . "',
	'p4_p2_1a':' " . showData('n_400_a_number') . "',
	'p4_p2_1b':' " . showData('n_400_a_number') . "',
	'p4_p2_1c':' " . showData('n_400_a_number') . "',
//page 4 end.....

	'p5_2a1':' " . showData('n_400_a_number') . "',
	'p5_2b1':' " . showData('n_400_a_number') . "',
	'p5_2c1':' " . showData('n_400_a_number') . "',

	'p5_2a2':' " . showData('n_400_a_number') . "',
	'p5_2b2':' " . showData('n_400_a_number') . "',
	'p5_2c2':' " . showData('n_400_a_number') . "',

	'p5_2a3':' " . showData('n_400_a_number') . "',
	'p5_2b3':' " . showData('n_400_a_number') . "',
	'p5_2c3':' " . showData('n_400_a_number') . "',
	
	'p5_3a':' " . showData('n_400_a_number') . "',
	'p5_3b':' " . showData('n_400_a_number') . "',
	'p5_3c':' " . showData('n_400_a_number') . "',
	'p5_3d':' " . showData('n_400_a_number') . "',
	'p5_3e':' " . showData('n_400_a_number') . "',
	'p5_3f':' " . showData('n_400_a_number') . "',
	'p5_3g':' " . showData('n_400_a_number') . "',
	'p5_3h':' " . showData('n_400_a_number') . "',
	'p5_3i':' " . showData('n_400_a_number') . "',
	
	'p5_4a':' " . showData('n_400_a_number') . "',
	'p5_4b':' " . showData('n_400_a_number') . "',
	'p5_4c':' " . showData('n_400_a_number') . "',
	'p5_4d':' " . showData('n_400_a_number') . "',
	'p5_4e':' " . showData('n_400_a_number') . "',
	'p5_4f':' " . showData('n_400_a_number') . "',
	'p5_4g':' " . showData('n_400_a_number') . "',
	'p5_4h':' " . showData('n_400_a_number') . "',
	'p5_4i':' " . showData('n_400_a_number') . "',

	'p5_5':' " . showData('n_400_a_number') . "',
	'p5_6':' " . showData('n_400_a_number') . "',
	'p5_7':' " . showData('n_400_a_number') . "',
	'p5_8':' " . showData('n_400_a_number') . "',
	'p5_9':' " . showData('n_400_a_number') . "',
	'p5_10':' " . showData('n_400_a_number') . "',
	'p5_11':' " . showData('n_400_a_number') . "',
	'p5_12':' " . showData('n_400_a_number') . "',
	'p5_13':' " . showData('n_400_a_number') . "',
	
//page 5 end.....

	'p6_14':' " . showData('n_400_a_number') . "',
	'p6_15':' " . showData('n_400_a_number') . "',
	'p6_16a':' " . showData('n_400_a_number') . "',
	'p6_16b':' " . showData('n_400_a_number') . "',
	'p6_16c':' " . showData('n_400_a_number') . "',
	'p6_17a1':' " . showData('n_400_a_number') . "',
	'p6_17b1':' " . showData('n_400_a_number') . "',
	'p6_17c1':' " . showData('n_400_a_number') . "',
	'p6_17a2':' " . showData('n_400_a_number') . "',
	'p6_17b2':' " . showData('n_400_a_number') . "',
	'p6_17c2':' " . showData('n_400_a_number') . "',
	'p6_17a3':' " . showData('n_400_a_number') . "',
	'p6_17b3':' " . showData('n_400_a_number') . "',
	'p6_17c3':' " . showData('n_400_a_number') . "',
	'p6_18':' " . showData('n_400_a_number') . "',
	'p6_19':' " . showData('n_400_a_number') . "',
	'p6_20':' " . showData('n_400_a_number') . "',
	'p6_21':' " . showData('n_400_a_number') . "',
	'p6_22':' " . showData('n_400_a_number') . "',
	'p6_23':' " . showData('n_400_a_number') . "',

	'p6_24a':' " . showData('n_400_a_number') . "',
	'p6_24b':' " . showData('n_400_a_number') . "',
	'p6_24c':' " . showData('n_400_a_number') . "',
	'p6_24d':' " . showData('n_400_a_number') . "',
	'p6_24e':' " . showData('n_400_a_number') . "',
	'p6_24f':' " . showData('n_400_a_number') . "',
	'p6_24g':' " . showData('n_400_a_number') . "',
	'p6_24h':' " . showData('n_400_a_number') . "',
	'p6_24i':' " . showData('n_400_a_number') . "',

	'p6_25a':' " . showData('n_400_a_number') . "',
	'p6_25b':' " . showData('n_400_a_number') . "',
	'p6_25c':' " . showData('n_400_a_number') . "',
	'p6_25d':' " . showData('n_400_a_number') . "',
	'p6_25e':' " . showData('n_400_a_number') . "',
	'p6_25f':' " . showData('n_400_a_number') . "',
	'p6_25g':' " . showData('n_400_a_number') . "',
	'p6_25h':' " . showData('n_400_a_number') . "',
	'p6_25i':' " . showData('n_400_a_number') . "',

//page 6 end.....
    'p7_26':' " . showData('n_400_a_number') . "',
    'p7_27':' " . showData('n_400_a_number') . "',
    'p7_3feet':' " . showData('n_400_a_number') . "',
    'p7_3inches':' " . showData('n_400_a_number') . "',
    'p7_4Pounds1':' " . showData('n_400_a_number') . "',
    'p7_4Pounds2':' " . showData('n_400_a_number') . "',
    'p7_4Pounds3':' " . showData('n_400_a_number') . "',
    'p7_2b':' " . showData('n_400_a_number') . "',
    'p7_2c':' " . showData('n_400_a_number') . "',
    'p7_3b':' " . showData('n_400_a_number') . "',
    'p7_3c':' " . showData('n_400_a_number') . "',
//page 7 end.....

    'p8_6b':' " . showData('n_400_a_number') . "',
    'p8_7b1':' " . showData('n_400_a_number') . "',
    'p8_7b2':' " . showData('n_400_a_number') . "',
//page 8 end.....

    'p9_9a':' " . showData('n_400_a_number') . "',
    'p9_9b':' " . showData('n_400_a_number') . "',
    'p9_9c':' " . showData('n_400_a_number') . "',
    'p9_9d':' " . showData('n_400_a_number') . "',
    'p9_9e':' " . showData('n_400_a_number') . "',
    'p9_9f':' " . showData('n_400_a_number') . "',
    'p9_9g':' " . showData('n_400_a_number') . "',
    'p9_9h':' " . showData('n_400_a_number') . "',
    'p9_9i':' " . showData('n_400_a_number') . "',
    'p9_9b_daytime':' " . showData('n_400_a_number') . "',
    'p9_9c_email':' " . showData('n_400_a_number') . "',
    'p9_p6_1':' " . showData('n_400_a_number') . "',
//page 9 end.....

    'p10_6b':' " . showData('n_400_a_number') . "',
    'p10_6c':' " . showData('n_400_a_number') . "',
    'p10_p7_1':' " . showData('n_400_a_number') . "',
    'p10_p7_5':' " . showData('n_400_a_number') . "',

//page 10 end.....

    'P11_2':' " . showData('n_400_a_number') . "',
    'P11_3a':' " . showData('n_400_a_number') . "',
    'P11_3b1':' " . showData('n_400_a_number') . "',
    'P11_3b2':' " . showData('n_400_a_number') . "',
    'P11_p10_1':' " . showData('n_400_a_number') . "',
    'P11_p10_2':' " . showData('n_400_a_number') . "',
    'P11_p10_3':' " . showData('n_400_a_number') . "',
    'P11_p10_4':' " . showData('n_400_a_number') . "',

//page 11 end.....

   'p12_1a':' " . showData('n_400_a_number') . "',
   'P12_1b':' " . showData('n_400_a_number') . "',
   'P12_2':' " . showData('n_400_a_number') . "',
   'P12_3':' " . showData('n_400_a_number') . "',
   'P12_4':' " . showData('n_400_a_number') . "',
   'P12_5':' " . showData('n_400_a_number') . "',
   'P12_interpreter_english':' " . showData('n_400_a_number') . "',
   'P12_6':' " . showData('n_400_a_number') . "',

//page 12 end.....

   'p13_1a':' " . showData('n_400_a_number') . "',
   'p13_1b':' " . showData('n_400_a_number') . "',
   'p13_2':' " . showData('n_400_a_number') . "',
   'p13_3':' " . showData('n_400_a_number') . "',
   'p13_4':' " . showData('n_400_a_number') . "',
   'p13_5':' " . showData('n_400_a_number') . "',
   'p13_6':' " . showData('n_400_a_number') . "',
   
//page 13 end.....


    'p14_additional_info_family_name':' " . showData('n_400_additional_info_last_name') . "', 
	'p14_additional_info_given_name':' " . showData('n_400_additional_info_first_name') . "', 
	'p14_additional_info_middle_name':' " . showData('n_400_additional_info_middle_name') . "', 
	'p14_additional_info_a_number':' " . showData('n_400_additional_info_middle_name') . "', 
	'p14_additional_info_3a':' " . showData('n_400_additional_info_2a_page_no') . "', 
	'p14_additional_info_3b':' " . showData('n_400_additional_info_2b_part_no') . "', 
	'p14_additional_info_3c':' " . showData('n_400_additional_info_2c_item_no') . "', 
	'p14_additional_info_4a':' " . showData('n_400_additional_info_3a_page_no') . "', 
	'p14_additional_info_4b':' " . showData('n_400_additional_info_3b_part_no') . "', 
	'p14_additional_info_4c':' " . showData('n_400_additional_info_3c_item_no') . "', 
	'p14_additional_info_5a':' " . showData('n_400_additional_info_4a_page_no') . "', 
	'p14_additional_info_5b':' " . showData('n_400_additional_info_4b_part_no') . "', 
	'p14_additional_info_5c':' " . showData('n_400_additional_info_4c_item_no') . "', 
	'p14_additional_info_6a':' " . showData('n_400_additional_info_5a_page_no') . "', 
	'p14_additional_info_6b':' " . showData('n_400_additional_info_5b_part_no') . "', 
	'p14_additional_info_6c':' " . showData('n_400_additional_info_5c_item_no') . "', 



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
