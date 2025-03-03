<?php
// require_once('formheader.php');   //database connection file 
require_once('localconfig.php');   //database connection file 



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
        $this->SetY(-16.8);

        $header_top_border = array(
            'B' => array('width' => 0.3, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
        );
        $this->Cell(189.7, 4, '', $header_top_border, 1, 1);

        // Set font
        $this->SetFont('times', '', 9);

        $this->Cell(40, 6, "Form I-864   Edition   12/08/21  E", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/i864/i-864-footer-pdf417-$this->page.jpg";
        // )
        $this->Image($barcode_image, 65, 267, 95, '', 'jpg', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417



        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 156.1, 267, true);
    }
}



$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-864');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(13.7, 15.3, 12.8, true);


// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


/********************************
 ******** Start Page No 1 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');

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
$pdf->Image($logo, 12, 11, 16, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);    // set font
$pdf->MultiCell(180, 15, "Affidavit of Support Under Section 213A of the INA", 0, 'C', 0, 1, 17, 10, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-864", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0075\nExpires 01/31/2026", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
    'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);


$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255); // set filling color
$pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

// $pdf->Ln(1);
// set filling color
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
$pdf->setCellHeightRatio(1.2);

$pdf->SetFont('times', 'B', 9); // set font
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(190, 34.8, "", 1, 'C', 1, 1, 13, 32.5, true);

$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', 'B', 10);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1.5, 0, 0); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(15, 34, " For\nUSCIS\nUse\nOnly", 0, 'C', 0, 0, 13.3, 39.6, true);
$pdf->MultiCell(15, 34, "", "R", 'C', 1, 1, 13.3, 33, true);

$pdf->setFont('Times', 'B', 10);
$pdf->MultiCell(90, 7, "Affidavit of Support Submitter", 0, 'C', 0, 1, 8, 32, true);
$pdf->SetFont('times', '', 5);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->writeHTMLCell(2, 1, 32, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div>Petitioner</div>';
$pdf->writeHTMLCell(30, 3, 35, 39, $html, 0, 1, false, true, 'L', true);
//......
$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 45, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div>Ist Joint Sponsor</div>';
$pdf->writeHTMLCell(30, 3, 35, 44, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 50, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div>2nd Joint Sponsor</div>';
$pdf->writeHTMLCell(30, 3, 35, 49, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 55, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div>Substitute Sponsor</div>';
$pdf->writeHTMLCell(30, 3, 35, 54, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 60, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div>5% Owner</div>';
$pdf->writeHTMLCell(30, 3, 35, 59, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->MultiCell(60, 34.8, "", 'LR', 'C', 0, 1, 80, 32.5, true);
$pdf->setFont('Times', 'B', 10);
$pdf->MultiCell(90, 7, "Section 213A Review", 0, 'C', 0, 1, 67, 33, true);
//..........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 83, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div>MEETS</div>';
$pdf->writeHTMLCell(30, 5, 86, 39, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 106, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = '<div> DOES NOT MEET</div>';
$pdf->writeHTMLCell(30, 5, 109, 39, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(30, 5, 86, 43, 'requirements', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(30, 5, 110, 43, 'requirements', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(60, 0, 80, 48, '', 'T', 1, false, true, 'L', true);
$pdf->writeHTMLCell(60, 5, 83, 50, 'Reviewed By:____________________', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(60, 5, 83, 55, 'Office:__________________________', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(60, 5, 83, 61, 'Date (mm/dd/yyyy):_______________', 0, 1, false, true, 'L', true);
//...............
$pdf->setFont('Times', 'B', 10);
$pdf->MultiCell(90, 7, "Number of Support Affidavits in File", 0, 'C', 0, 1, 126, 33, true);
$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 156, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(30, 5, 160, 39, '1', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 177, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(30, 5, 181, 39, '2', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(63, 0, 140, 45, '', 'T', 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(30, 5, 142, 46, 'Remarks', 0, 1, false, true, 'L', true);
// upper box ended ............... upper box ended

$pdf->writeHTMLCell(190, 22, 13, 70, '', 1, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div><b>  &nbsp; &nbsp; <br> To be completed by an attorney or accredited
representative</b> (if any).</div>';
$pdf->writeHTMLCell(38, 21, 13.3, 70.5, $html, 'R', 1, true, true, 'C', true);
$pdf->SetFont('times', 'B', 15);

if(showData('i_864_g_28_box') =="Y") $g_28 = "checked"; else $g_28 = "";

$html = '<div><input type="checkbox" name="g-28" value="g-28" checked="'.$g_28.'" /></div>';
$pdf->writeHTMLCell(20, 20, 43.5, 73, $html, 0, 0, false, true, 'C', true);

//........

$pdf->SetFont('times', 'B', 10);
$html = '<div> <br>Select this box if <br>Form G-28 or<br>G-28I is attached.</div>';
$pdf->writeHTMLCell(30, 22, 59, 70, $html, 'R', 0, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b> Attorney State Bar Number </b> <br> (if applicable)</div>';
$pdf->writeHTMLCell(50, 22, 90, 72.5, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(50, 22, 90, 70, "", 'R', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 46.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 91, 82.5);

//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or Accredited Representative
USCIS Online Account Number </b>(if any)</div>';
$pdf->writeHTMLCell(60, 22, 142, 72, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 141.6, 82.2);
//...........
$pdf->Image('images/right_angle.jpg', 13.5, 94, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('times', '', 10);
$html = '<div><b>START HERE - Type or print in black ink. </b></div>';
$pdf->writeHTMLCell(80, 20, 20, 93.5, $html, 0, 0, false, true, 'L', true);
//.........
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('times', '', 12);
$html = '<div><b> part 1.   Basis For Filing Affidavit of Support</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 99, $html, 1, 1, true, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 1, 12, 107, '<div>I am the sponsor submitting this affidavit of support because (Select <b> only one</b> box).</div>', 0, 0, false, true, 'L', false);
// //..............


//.........

$pdf->SetFont('times', '', 10);
if (showData('i_864_affidavit_support_petitioner_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.a.   </b> </div>';
$pdf->writeHTMLCell(190, 1, 12, 112, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(190, 1, 19, 111, '  <input type="checkbox" name="peitioner" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(180, 1, 25, 112, ' I am the petitioner. I filed or am filing for the immigration of my relative.', 0, 0, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
if (showData('i_864_affidavit_support_alien_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell(190, 1, 12, 119, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(190, 1, 19, 118, '<input type="checkbox" name="alien_petietioner" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 1, 25, 119, 'I filed an alien worker petition on behalf of the
intending immigrant, who is related to me as my', 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('filed_an_alien_worker_petition_on_behalf', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 161, 119);
//............

$pdf->SetFont('times', '', 10);
if (showData('i_864_affidavit_support_ownership_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.c.   </b> </div>';
$pdf->writeHTMLCell(90, 1, 12, 127.5, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(190, 1, 19, 126.5, '  <input type="checkbox" name="have_ownership" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I have an ownership interest of at least 5 percent in </div>';
$pdf->writeHTMLCell(80, 1, 25, 127.5, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(180, 1, 25, 134, "which filed an alien worker petition on behalf of the intending immigrant, who is related to me as my ", 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('have_an_ownership_interest',105, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 98,  128);
$pdf->TextField('which_fields_an_alien_worker', 77, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 25, 139.3);
//......

$pdf->SetFont('times', '', 10);
if (showData('i_864_affidavit_support_sponsor_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>1.d.   </b>   </div>';
$pdf->writeHTMLCell(90, 1, 12, 147, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(190, 1, 19, 146, '<input type="checkbox" name="join_sponsor" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div> I am the only joint sponsor.</div>';
$pdf->writeHTMLCell(80, 1, 24.5, 147, $html, 0, 0, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.e.</b></div>';
$pdf->writeHTMLCell(90, 1, 12, 154, $html, 0, 0, false, true, 'L', true);
if (showData('i_864_affidavit_support_i_am_status') == "Y") $checked1 = "checked";
else $checked1 = "";
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="iam_the" value="Y" checked="' . $checked1 . '" />';
$pdf->writeHTMLCell(90, 1, 19, 153, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
if (showData('i_864_affidavit_support_first_status') == "Y") $checked2 = "checked";
else $checked2 = "";
if (showData('i_864_affidavit_support_second_status') == "Y") $checked3 = "checked";
else $checked3 = "";
$html = '<div>I am the  &nbsp;&nbsp;<input type="checkbox" name="iam_first" value="Y" checked="' . $checked2 . '" /> &nbsp;&nbsp;first &nbsp;&nbsp;<input type="checkbox" name="iam_first" value="Y" checked="' . $checked3 . '" />&nbsp;&nbsp;second of two joint sponsors.</div>';
$pdf->writeHTMLCell(90, 1, 25, 154, $html, 0, 0, false, true, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.f.</b</div>';
$pdf->writeHTMLCell(90, 1, 12, 161, $html, 0, 0, false, true, 'L', true);
if (showData('i_864_affidavit_support_substitute_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="original" value="Y" checked="' . $checked . '" />';
$pdf->writeHTMLCell(90, 1, 19, 161, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>The original petitioner is deceased. I am the substitute sponsor. I am</div>';
$pdf->writeHTMLCell(180, 1, 25, 161, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(180, 1, 25, 166, "the intending immigrant's", 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
//........
$pdf->TextField('part1_1f_original_petitioner', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 166);

//...............   

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: As a sponsor, you must include proof of your U.S. citizenship, U.S. national status, or lawful permanent resident
status.</b></div>';
$pdf->writeHTMLCell(190, 1, 12, 173, $html, 0, 0, false, true, 'L', true);

//...........

$pdf->SetFont('times', 'B', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 2. Information About You (Sponsor)</b></div>';
$pdf->writeHTMLCell(190, 1, 13, 185, $html, 1, 1, true, true, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html = "<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ponsor's Full Legal Name (<b>Do not</b> provide a nickname)</div>";
$pdf->writeHTMLCell(130, 1, 12, 193, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 19.8,198,'<div>Family Name (Last Name)</div>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, 84, 198, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 146, 198, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_last_tname', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8,203);
$pdf->TextField('information_about_you_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84,203);
$pdf->TextField('information_about_you_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146,203);

// ********************************
//  ******** End Page No 1 **********
//  *********************************/

// *******************************
//  ******** Start Page No 2 ********
//  *********************************/
// $pdf->AddPage('P', 'LETTER');
// $pdf->SetFont('times', '', 12);
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 2. Information About You (Sponsor) </b>(continued)</div>';
// $pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
// //.............

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(90, 7, 13, 25, "<b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sponsor's Current Mailing Address", 0, 1, false, false, 'L', true);
// $html = '<div>In Care Of Name (if any)   </div>';
// $pdf->writeHTMLCell(90, 7, 22, 30, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_care_of_name',181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 37);
// //........

// $pdf->SetFont('times', '', 10);
// $html = '<div>Street Number and Name</div>';
// $pdf->writeHTMLCell(90, 7, 22, 43.4, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_street', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 50);
// //...........
// if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="Apt1" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste1" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr1" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 50, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(50, 0, 144.2, 44, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 44, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 50);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>City or Town </div>';
// $pdf->writeHTMLCell(50, 5, 22, 58, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_city_town', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 63);
// //............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>State</div>';
// $pdf->writeHTMLCell(50, 4, 144, 58, $html, '', 0, 0, true, 'L');


// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("about_your_mailing_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 63);
// $pdf->SetFont('times', '', 10);
// $html = '<div>ZIP Code</div>';
// $pdf->writeHTMLCell(30, 3, 168, 58, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 63);
// //..............

// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7, 22, 70, 'Province', '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_province', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 75);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,88, 70, 'Postal Code', '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_postal_code', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 75);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = 'Country';
// $pdf->writeHTMLCell(90, 7, 124, 70, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 75);
// //..............

// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>3.</b> ';
// $pdf->writeHTMLCell(90, 7, 13, 84, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 10); // set font
// $html = 'Is your current mailing address the same as your physical address? ';
// $pdf->writeHTMLCell(120, 7, 21.4, 84, $html, '', 0, 0, true, 'L');
// if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 85, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 84, $html, 0, 1, false, true, 'J', true);
// //...........
// $pdf->SetFont('times', '', 10); // set font

// $pdf->SetFont('times', '', 10); // set font
// $html = 'If you answered "No" to <b>Item Number 3</b>., provide your physical address <b>in Item Number 4.</b>';
// $pdf->writeHTMLCell(190, 7, 21.4, 91, $html, '', 0, 0, true, 'L');

// //!.............
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'I', 10); // set font
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
// $pdf->SetFontSize(12); // set font
// //........
// $pdf->SetFont('times', '', 10);
// $html = '<div>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Street Number and Name</div>';
// $pdf->writeHTMLCell(90, 7, 13, 97, $html, 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_street2', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 103);
// //...........
// $isMailingAndPhysical = (showData('is_your_current_mailing_address_same_as_physical') == "Y") ? true : false;
// if($isMailingAndPhysical){
//     if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
//     else $checked_apt = "";
//     if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
//     else $checked_ste = "";
//     if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
//     else $checked_flr = "";
// }
// else{
//     if (showData('information_about_you_home_apt_ste_flr') == "apt") $checked_apt = "checked";
//     else $checked_apt = "";
//     if (showData('information_about_you_home_apt_ste_flr') == "ste") $checked_ste = "checked";
//     else $checked_ste = "";
//     if (showData('information_about_you_home_apt_ste_flr') == "flr") $checked_flr = "checked";
//     else $checked_flr = ""; 
// }
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="Apt2" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste2" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr2" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 103, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(50, 0, 144.2, 98, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 98, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_apt_ste_flr2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 103);
// //...........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>City or Town </div>';
// $pdf->writeHTMLCell(50, 5, 22, 111, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_city_town2', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 116.5);
// //............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div>State</div>';
// $pdf->writeHTMLCell(50, 4, 143.7, 111.3, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10); // set font
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("about_your_mailing_state2", 22, 7, $comboBoxOptions, array(), array(), 144.2, 116.5);
// $pdf->SetFont('times', '', 10);
// $html = '<div>ZIP Code</div>';
// $pdf->writeHTMLCell(30, 3, 167.2, 111.3, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('about_your_mailing_zipcode2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 116.5);
// //..............
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7, 22, 124, 'Province', '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_province2', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 129);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,87, 124, 'Postal Code', '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_postal_code2', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 129);
// //.............

// $pdf->SetFont('times', '', 10); // set font
// $html = 'Country';
// $pdf->writeHTMLCell(90, 7, 124, 124, $html, '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('about_your_mailing_address_country2', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 129);
// $pdf->SetFont('times', '', 11); // set font
// $pdf->writeHTMLCell(90, 7, 12, 140,"Other Information", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10); // set font

// //..............

// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7, 12, 147, '<b>5</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Domicile', '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('other_info_country_of_domicile', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 152);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,82, 147, '<b>6</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('other_info_date_of_birth', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 92, 152);
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,140, 147, '<b>7</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('other_info_country_of_birth', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 152);

// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,12, 160, '<b>8</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (Required)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('other_info_us_social_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 165);

// ///.............
// $pdf->SetFont('times', '', 10); // set font
// $html = '<div><b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Immigration Status</div>';
// $pdf->writeHTMLCell(90, 0, 12, 174, $html, '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(90, 0, 27, 180, "I am a U.S. citizen.", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(90, 0, 20, 179, $html, '', 0, 0, true, 'L');
// //.....
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 0, 27, 187, "I am a U.S. national.", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// if (showData('sponsor_other_information_us_national_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox" name="us_nation" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(90, 0, 20, 186, $html, '', 0, 0, true, 'L');
// //....
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 0, 27, 194, "I am a lawful permanent resident.", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// if (showData('sponsor_other_information_permanent_resident_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><input type="checkbox" name="us_lawfull" value="Y" checked="' . $checked . '" /></div>';
// $pdf->writeHTMLCell(90, 0, 20, 193, $html, '', 0, 0, true, 'L');
// //..........
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7, 12, 200, "<b>10</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sponsor's A-Number (if any) ", '', 0, 0, true, 'L');

// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('other_info_sponsor_a_number', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 31, 205);
// //.............
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(90, 7,90, 200, '<b>11</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('other_info_sponsor_uscis_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 205);
// $pdf->SetFont('times', '', 10); // set font
// $pdf->writeHTMLCell(190, 7,12, 215, 'Military Service (To be completed by petitioner sponsors only.)', '', 0, 0, true, 'L');
// //.........
// $pdf->SetFont('times', '', 10); // set font
// $html = '<b>12.</b>&nbsp;&nbsp;&nbsp;&nbsp;I am currently on <b>active duty</b> in the United States Armed Forces or U.S. Coast Guard.';
// $pdf->writeHTMLCell(150, 7, 12, 225, $html, '', 0, 0, true, 'L');
// if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
// else $checked_y = "";
// if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
// else $checked_N = "";
// $pdf->writeHTMLCell(120, 7, 178, 226, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 14); // set font
// $html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
// $pdf->writeHTMLCell(50, 7, 172, 225, $html, 0, 1, false, true, 'J', true);
//.............
//  ********************************
//  ******** End Page No 2 **********
//  *********************************

// ********************************
//  ******** Start Page No 3 ********
//  *********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 3. Information About the Principal Immigrant</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//.............
$pdf->SetFont('times', '', 10);
$html = "<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal Immigrant's Full Legal Name (<b>Do not</b> provide a nickname)</div>";
$pdf->writeHTMLCell(130, 1, 12, 24, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 1, 22,30,'<div>Family Name (Last Name)</div>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, 84, 30, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, 146, 30, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_last_tname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.8,35);
$pdf->TextField('information_about_you_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84,35);
$pdf->TextField('information_about_you_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146,35);

//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 13, 43, "<b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sponsor's Current Mailing Address", 0, 1, false, false, 'L', true);
$html = '<div>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 22, 48, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_care_of_name',181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 55);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22,61, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_street', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 68);
// ...........
if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="Apt1" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste1" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr1" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 68, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 62.5, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 62.5, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 68);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 75, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_city_town', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 80);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 75, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("about_your_mailing_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 80);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 75, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 80);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 87, 'Province', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 92);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,88, 87, 'Postal Code', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 92);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = 'Country';
$pdf->writeHTMLCell(90, 7, 124, 87, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 92);
//..............


$pdf->SetFont('times', '', 11); // set font
$pdf->writeHTMLCell(90, 7, 12, 101,"Other Information", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font

//..............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 12, 108, '<b>3</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_country_of_domicile', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 113);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,95, 108, '<b>4</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_date_of_birth', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 113);
///.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 12, 121, '<b>5</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_country_of_domicile', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 126.5);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,95, 121, '<b>6</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_date_of_birth', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 109, 126.5);
///.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 12, 134, '<b>7</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_country_of_domicile', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 139);
//........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 4. Information About the Immigrants You Are Sponsoring</b></div>';
$pdf->writeHTMLCell(191, 6, 13,150, $html, 1, 1, true, false, 'L', true);







$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am sponsoring the principal immigrant named in <b>Part 3.</b></div>';
$pdf->writeHTMLCell(190, 0, 12, 156.5, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 0, 27, 164, "Yes", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 42, 164, "No, I am sponsoring family members in <b>Part 4</b>. as the second joint sponsor or I am sponsoring family members<br>
who are immigrating more than six months after the principal immigrant.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 20, 163, $html, '', 0, 0, true, 'L');
if (showData('sponsor_other_information_us_citizen_status') == "N") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 35, 163, $html, '', 0, 0, true, 'L');
//.....
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 0, 12, 174, "<b>2.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 27, 174, "I am sponsoring the following family members immigrating at the same time or within six months of the principal<br>
immigrant named in <b>Part 3</b>. (List family members in <b>Item Numbers 4. - 7.</b> Do not include any relative listed on a separate<br>
visa petition.)", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_national_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_nation" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 20, 173, $html, '', 0, 0, true, 'L');
//....
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 0, 12, 189, "<b>3.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 27, 189, "I am sponsoring the following family members who are immigrating more than six months after the principal immigrant. (List<br>
family members in <b>Item Numbers 4. - 7</b>.)", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_permanent_resident_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_lawfull" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 20, 188, $html, '', 0, 0, true, 'L');
// //..........
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Family Member 1</b>';
$pdf->writeHTMLCell(90, 7, 12,200,  $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 19,206,  'Family Name (Last Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 91.5,206,  'Given Name (First Name)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 154,206,  'Middle Name (if applicable)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3_last_name', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 211.2);
$pdf->TextField('p5_3_first_name', 60.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 92.5, 211.2);
$pdf->TextField('p5_3_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 211.2);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 19,218.5,  'Relationship to Principal Immigrant', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 91.5,218.5,  'Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 136,218.5,  'Alien Registration Number (A-Number, if any)', '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 19,232.7,  'USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 137,225.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 20,239.4, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_3_dob_name', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 224);
$pdf->TextField('p5_3_a_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 92.5, 224);
$pdf->TextField('p5_3_uscis_number', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 141, 224);
$pdf->TextField('p5_3_uscis_number', 54, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 238);

// ********************************
//  ******** End Page No 3 **********
//  *********************************/

// ********************************
//  ******** Start Page No 4 ********
//  *********************************/

//  $pdf->AddPage('P', 'LETTER'); // page number 8

//  $pdf->SetFont('times', '', 12);
//  $pdf->setCellPaddings(1, 1, 0, 1);
//  $html = '<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
//  Information, Declaration, Certification, and
//  Signature</b>(continued)</div>';
//  $pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L', true);
//  ********************************
//  ******** End Page No 4 **********
//  *********************************/

//  ********************************
//  ******** Start Page No 5 ********
//  *********************************/

//  $pdf->AddPage('P', 'LETTER'); // page number 8

//  $pdf->SetFont('times', '', 12);
//  $pdf->setCellPaddings(1, 1, 0, 1);
//  $html = '<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
//  Information, Declaration, Certification, and
//  Signature</b>(continued)</div>';
//  $pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L', true);


//  ********************************
//  ******** End Page No 8 **********
//  *********************************/

//  ********************************
//  ******** Start Page No 9 ********
//  *********************************/

$pdf->AddPage('P', 'LETTER'); // page number 8
$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 8. Sponsor\'s Contract, Contact Information, Certification, and Signature </b>(continued)</div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, true, 'L', true);

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 25, "<b>What Other Consequences Are There?</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 31, "If an intending immigrant becomes a lawful permanent resident in the United States based on a Form I-864 that you have signed, then,<br>
until your obligations under Form I-864 terminate, the U.S. Government may consider (deem) your income and assets as available to<br>
that person, in determining whether he or she is eligible for certain Federal means-tested public benefits and also for state or local<br>
means-tested public benefits, if the state or local government's rules provide for consideration (deeming) of your income and assets as<br>
available to the person.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 53.5, "This provision does <b>not</b> apply to public benefits specified in section 403(c) of the Welfare Reform Act such as emergency Medicaid,<br>
short-term, non-cash emergency relief; services provided under the National School Lunch and Child Nutrition Acts; immunizations<br>
and testing and treatment for communicable diseases; and means-tested programs under the Elementary and Secondary Education Act.", '', 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 70, "<b>What If I Do Not Fulfill My Obligations?</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 76, "If you do not provide sufficient support to the person who becomes a lawful permanent resident based on a Form I-864 that you<br>
signed, that person may sue you for this support.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 86.5, "If a Federal, state, local, or private agency provided any covered means-tested public benefit to the person who becomes a lawful<br>
permanent resident based on a Form I-864 that you signed, the agency may ask you to reimburse them for the amount of the benefits<br>
they provided. If you do not make the reimbursement, the agency may sue you for the amount that the agency believes you owe.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 101.5, "If you are sued, and the court enters a judgment against you, the person or agency that sued you may use any legally permitted<br>
procedures for enforcing or collecting the judgment. You may also be required to pay the costs of collection, including attorney fees.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 112.5, "If you do not file a properly completed Form I-865 within 30 days of any change of address, USCIS may impose a civil fine for your<br>
failing to do so.", '', 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 125, "<b>When Will These Obligations End?</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 131, "Your obligations under a Form I-864 that you signed will end if the person who becomes a lawful permanent resident based on that<br>
affidavit:", '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 22, 141, "<b>A.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 141, "Becomes a U.S. citizen;", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 148.5, "<b>B.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 148.5, "Has worked, or can receive credit for, 40 quarters of coverage under the Social Security Act;", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 155.5, "<b>C.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 155.5, "No longer has lawful permanent resident status and has departed the United States;", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 162.5, "<b>D.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 162.5, "Is subject to removal, but applies for and obtains, in removal proceedings, a new grant of adjustment of status,<br>
based on a new affidavit of support, if one is required; or", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 172.5, "<b>E.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 172.5, "Dies.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 182.5, "<b>NOTE</b>: Divorce does not terminate your obligations under Form I-864.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 190.5, "Your obligations under a Form I-864 that you signed also end if you die. Therefore, if you die, your estate is not required to take<br>
responsibility for the person's support after your death. However, your estate may owe any support that you accumulated before you<br>
died", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 204.5, "<b>NOTE</b>: : Select the box for either <b>Item A.</b> or <b>B</b>. in <b>Item Number 1</b>. If applicable, select the box for <b>Item Number 2</b>.", '', 1, false, 'L');

//.........

//  ********************************
//  ******** End Page No 9 **********
//  *********************************/

//  ********************************
//  ******** Start Page No 10 ********
//  *********************************/


$pdf->AddPage('P', 'LETTER'); // page number 8
$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 8. Sponsor\'s Contract, Contact Information, Certification, and Signature </b>(continued)</div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, true, 'L', true);

$html = '<div><b><i>Sponsor\'s Statement</i></b></div>';
$pdf->writeHTMLCell(190, 7, 13, 29, $html, 0, 1, true, true, 'L', true);
//.....................


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sponsor\'s Statement Regarding the Interpreter</div>';
$pdf->writeHTMLCell(90, 0, 12, 36, $html, '', 0, 0, true, 'L');
//..................
$pdf->writeHTMLCell(190, 0, 20, 43, "<b>A.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 34, 43, "I can read and understand English, and I have read and understand every question and instruction on this affidavit and<br>
my answer to every question.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 27, 42.5, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 0, 20, 53, "<b>B.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 34, 53, "The interpreter named in <b>Part 9</b>. read to me every question and instruction on this affidavit and my answer to every ", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 34, 58, "question in", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 124, 58, ", a language in which I am fluent, and I understood ", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 34, 63.4, "everything.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 27, 52.5, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('sponsor_interpreter_name', 72.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 52, 59);

//...............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 0, 12, 73, "<b>2.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 26, 73, "At my request, the preparer named in<b>Part 10.,</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 166, 73, ", prepared this affidavit", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(190, 0, 26, 78.5, "for me based only upon information I provided or authorized", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 19, 72.5, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('sponsor_preparer_name', 72.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),94, 73);
//...............

//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Sponsor\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 86.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 94, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 94, "Sponsor's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 115, 94, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 123, 94, "Sponsor's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 106, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 106, "Sponsor's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_Sponsor_daytime', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 99.5);
$pdf->TextField('p8_Sponsor_mobile', 80, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 99.5);
$pdf->TextField('p8_Sponsor_email', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 111.5);

//........................
$pdf->setFont('Times', '', 11.6);
$pdf->writeHTMLCell(191, 6.5, 13, 121, '<div><b><i>Sponsor\'s Declaration and Certification </i></b></div>', '', 1, true, 'L');
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 128, "Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS or the<br>
U.S. Department of State (DOS) may require that I submit original documents to USCIS or DOS at a later date. Furthermore, I<br>
authorize the release of any information from any of my records that USCIS or DOS may need to determine my eligibility for the<br>
immigration benefit I seek.", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 146.5, "I furthermore authorize release of information contained in this affidavit, in supporting documents, and in my USCIS or DOS records<br>
to other entities and persons where necessary for the administration and enforcement of U.S. immigration law.", '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 157, "I certify, under penalty of perjury, that all of the information in my affidavit and any document submitted with it were provided or<br>
authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my affidavit, and that all of<br>
this information is complete, true, and correct. ", '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 22, 171, "<b>A.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 171, "I know the contents of this affidavit of support that I signed;", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 178.5, "<b>B.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 178.5, "I have read and I understand each of the obligations described in Part 8., and I agree, freely and without any mental<br>
reservation or purpose of evasion, to accept each of those obligations in order to make it possible for the immigrant<br>
indicated in <b>Part 3</b>. to become a lawful permanent resident of the United States;", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 193.5, "<b>C.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 193.5, "I agree to submit to the personal jurisdiction of any Federal or state court that has subject matter jurisdiction of a lawsuit<br>
against me to enforce my obligations under this Form I-864EZ;
", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 203.5, "<b>D.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 203.5, "Each of the Federal income tax returns submitted in support of this affidavit are true copies, or are unaltered tax<br>
transcripts, of the tax returns I filed with the IRS;", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 213.5, "<b>E.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 213.5, "I understand that, if I am related to the sponsored immigrant by marriage, the termination of the marriage (by divorce,<br>
dissolution, annulment, or other legal process) will not relieve me of my obligations under this Form I-864EZ; and", '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(197, 5, 22, 224.5, "<b>F.</b>", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 32, 224.5, "I authorize the Social Security Administration to release information about me in its records to the USCIS and DOS.", '', 1, false, 'L');
//.........

$pdf->SetFont('times', '', 12);
$html = '<div><b><i>Sponsor\'s Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 235, $html, '', 1, true, 'L');
//..............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 242, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 242, "Preparer's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 242, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 255, "<b>NOTE TO ALL SPONSORS:</b> If you do not completely fill out this affidavit or fail to submit required documents listed in the
Instructions, USCIS or DOS may deny your request.", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 7, 21, 248, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_sponsor_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 248);
//.............
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 245.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//  ********************************
//  ******** End Page No 10 **********
//  *********************************/

//  ********************************
//  ******** Start Page No 11 ********
//  *********************************/

 $pdf->AddPage('P', 'LETTER');
 $pdf->setFillColor(220, 220, 220);
 $pdf->setFont('Times', '', 12);
 $pdf->setCellHeightRatio(1.2);
 $pdf->setCellPaddings(1, 0.5, 1, 1);
 $pdf->SetFontSize(11.6);
 $html = "<div><b>Part 9. Interpreter's Contact Information, Certification, and Signature </b></div>"; 
 $pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
 
 //............
 $pdf->setFont('Times', '', 10.5);
 $pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
 $pdf->writeHTMLCell(45, 6.5, 159, 19, showData('n_400_a_number'), 1, 1, false, 'L');
 //...............
 $html = '<div><b><i>Interpreter\'s Full Name</i></b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 27.7, $html, '', 1, true, 'L');
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 35, '<b>1.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 35, "Interpreter's Family Name (Last Name) ", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 114.6, 35, "Interpreter's Given Name (First Name)", '', 1, false, 'L');
 // //..............
 $pdf->writeHTMLCell(197, 5, 12, 50, '<b>2.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 50, "Interpreter's Business or Organization Name", '', 1, false, 'L');
 //..............
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p12_interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 40);
 $pdf->TextField('p12_interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 40);
 $pdf->TextField('p12_interpreter_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 55);
 //...............
 $pdf->setFont('Times', '', 11.6);
 $html = '<div><b><i>Interpreter\'s Contact Information </i></b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 63.7, $html, '', 1, true, 'L');
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 71, '<b>3.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 71, "Interpreter's Daytime Telephone Number ", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 115, 71, '<b>4.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 123, 71, "Interpreter's Mobile Telephone Number (if any) ", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 12, 84, '<b>5.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 84, "Interpreter's Email Address (if any) ", '', 1, false, 'L');
 //..............
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p12_interpreter_daytime', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 76);
 $pdf->TextField('p12_interpreter_mobile', 80, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 76);
 $pdf->TextField('p12_interpreter_email', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 89);
 
 //........................
 $pdf->setFont('Times', '', 11.6);
 $html = '<div><b><i>Interpreter\'s Certification and Signature</i></b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 97.6, $html, '', 1, true, 'L');
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p12_interpreter_fluent_english', 46.2, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 114, 106);
 //.........
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 106, 'I certify, under penalty of perjury, that: that I am fluent in English and', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 161, 106, ", and I have interpreted every ", '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 12, 112, "question on the affidavit and Instructions and interpreted the sponsor's answers to the questions in that language, and the sponsor<br>
informed me that they understood every instruction, question, and answer on the affidavit.", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 12, 122.5, '<b>6.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 122.5, "Interpreter's Signature", '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 155, 122.5, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
 //.............
 $pdf->writeHTMLCell(133, 6.4, 21, 127.5, "", 1, 1, false, 'L');
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p12_interpreter_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 127.5);
 //.....................
 //........................
 $pdf->setFont('Times', '', 12);
 $html = '<div><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing this Affidavit, if Other Than the Sponsor</b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 138, $html, 1, 1, true, 'L');
 //...............
 
 
 $html = '<div><b><i>Preparer\'s Full Name</i></b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 154, $html, '', 1, true, 'L');
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 162, '<b>1.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 162, "Preparer's Family Name (Last Name) ", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 114.6, 162, "Preparer's Given Name (First Name)", '', 1, false, 'L');
 // //..............
 $pdf->writeHTMLCell(197, 5, 12, 176, '<b>2.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 176, "Preparer's Business or Organization Name", '', 1, false, 'L');
 //..............
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p13_preparer_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 167);
 $pdf->TextField('p13_preparer_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 167);
 $pdf->TextField('p13_preparer_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 181);
 //...............
 $pdf->setFont('Times', '', 11.6);
 $html = '<div><b><i>Preparer\'s Contact Information </i></b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 190.7, $html, '', 1, true, 'L');
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 198, '<b>3.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 198, "Preparer's Daytime Telephone Number ", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 115, 198, '<b>4.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 123, 198, "Preparer's Mobile Telephone Number (if any) ", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 12, 211, '<b>5.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 211, "Preparer's Email Address (if any) ", '', 1, false, 'L');
 //..............
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p13_preparer_daytime', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 203);
 $pdf->TextField('p13_preparer_mobile', 80, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 203);
 $pdf->TextField('p13_preparer_email', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 216);
 
 //........................
 $pdf->setFont('Times', '', 11.6);
 $html = '<div><b><i>Preparer\'s Certification and Signature</i></b></div>';
 $pdf->writeHTMLCell(191, 6.5, 13, 226.6, $html, '', 1, true, 'L');
 $pdf->SetFont('courier', 'B', 10); // set font
 //.........
 $pdf->setFont('Times', '', 10);
 
 $pdf->writeHTMLCell(197, 5, 12, 234.5, "I certify, under penalty of perjury, that I prepared this affidavit for the sponsor at their request and with express consent and that all of<br>
the responses and information contained in and submitted with the affidavit are complete, true, and correct and reflects only<br>
information provided by the sponsor. The sponsor reviewed the responses and information and informed me that they understand the<br>
responses and information in or submitted with the affidavit.", '', 1, false, 'L');
 //..............
 $pdf->writeHTMLCell(197, 5, 12, 253, '<b>6.</b>', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 20, 253, "Preparer's Signature", '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 155, 253, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
 //.............
 $pdf->writeHTMLCell(133, 7, 21, 259, "", 1, 1, false, 'L');
 $pdf->SetFont('courier', 'B', 10); // set font
 $pdf->TextField('p13_preparer_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 258.2);
 //.............
 $pdf->SetFont('zapfdingbats', '', 22);  // symbol font
 $pdf->writeHTMLCell(82, 7, 12, 125.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L'); //.............
 $pdf->writeHTMLCell(82, 7, 12, 257, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');


//  ********************************
//  ******** End Page No 11 **********
//  *********************************/

//  ********************************
//  ******** Start Page No 12 ********
//  *********************************/
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
// 'uscis_online_account_number':' $attorneyData->uscis_online_account_number',
$js = "
var fields = {
    'Basis_For_Filing_Affidavit_of_Support':' " . showData('i_864_affidavit_support_sponsor') . " ',
    'filed_an_alien_worker_petition_on_behalf':' " . showData('i_864_affidavit_support_alien') . " ',
    'have_an_ownership_interest':' " . showData('i_864_affidavit_support_ownership_value1') . " ',
    'which_fields_an_alien_worker':' ". showData('i_864_affidavit_support_ownership_value2') . " ',
    'part1_1f_original_petitioner':' " . showData('i_864_affidavit_support_substitute') . " ',
    'information_about_you_last_tname':' " . showData('information_about_you_family_last_name') . " ',
    'information_about_you_first_name':' " . showData('information_about_you_given_first_name') . " ',
    'information_about_you_middle_name':' " . showData('information_about_you_middle_name') . " ',

   

    'other_information_cityzen_or_nationality':' " . showData('other_information_about_you_country_of_citizen') . " ',
    'other_information_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . " ',
    'other_information_alien_number':' " . showData('other_information_about_you_alien_registration_number') . " ',
    'other_information_uscis_online_number':' " . showData('other_information_about_you_uscis_online_account_number') . " ',
    'other_information_daytime_telephone':' " . showData('information_about_you_daytime_tel') . " ',
//page 1 end.....
   

'about_your_mailing_care_of_name':' " . showData('sponsor_family_member1_family_last_name') . " ',
'about_your_mailing_street':' " . showData('sponsor_family_member1_given_first_name') . " ',
'about_your_mailing_apt_ste_flr':' " . showData('sponsor_family_member1_middle_name') . " ',
'about_your_mailing_city_town':' " . showData('sponsor_family_member1_relationship') . " ',
'about_your_mailing_state':' " . showData('sponsor_family_member1_date_of_birth') . " ',
'about_your_mailing_zipcode':' " . showData('sponsor_family_member1_a_number') . " ',
'about_your_mailing_address_province':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',
'about_your_mailing_address_postal_code':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',
'about_your_mailing_address_country':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',

'about_your_mailing_street2':' " . showData('sponsor_family_member1_given_first_name') . " ',
'about_your_mailing_apt_ste_flr2':' " . showData('sponsor_family_member1_middle_name') . " ',
'about_your_mailing_city_town2':' " . showData('sponsor_family_member1_relationship') . " ',
'about_your_mailing_state2':' " . showData('sponsor_family_member1_date_of_birth') . " ',
'about_your_mailing_zipcode2':' " . showData('sponsor_family_member1_a_number') . " ',
'about_your_mailing_address_province2':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',
'about_your_mailing_address_postal_code2':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',
'about_your_mailing_address_country2':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',

'other_info_country_of_domicile':' " . showData('sponsor_family_member1_family_last_name') . " ',
'other_info_date_of_birth':' " . showData('sponsor_family_member1_given_first_name') . " ',
'other_info_country_of_birth':' " . showData('sponsor_family_member1_middle_name') . " ',
'other_info_us_social_number':' " . showData('sponsor_family_member1_relationship') . " ',
'other_info_sponsor_a_number':' " . showData('sponsor_family_member1_relationship') . " ',
'other_info_sponsor_uscis_number':' " . showData('sponsor_family_member1_relationship') . " ',

//page 2 end....... 

'sponsor_interpreter_name':' " . showData('sponsor_family_member1_family_last_name') . " ',
'sponsor_preparer_name':' " . showData('sponsor_family_member1_given_first_name') . " ',
'p8_Sponsor_daytime':' " . showData('sponsor_family_member1_middle_name') . " ',
'p8_Sponsor_mobile':' " . showData('sponsor_family_member1_relationship') . " ',
'p8_Sponsor_email':' " . showData('sponsor_family_member1_date_of_birth') . " ',
'p8_sponsor_signature_date':' " . showData('sponsor_family_member1_date_of_birth') . " ',

//page 10 end.......    
	'p12_interpreter_family_name':' " . showData('n_400_interpreter_family_last_name') . "', 
	'p12_interpreter_given_name':' " . showData('n_400_interpreter_given_first_name') . "', 
	'p12_interpreter_business_name':' " . showData('n_400_interpreter_business_name') . "', 
	'p12_interpreter_daytime':' " . showData('n_400_interpreter_daytime_tel') . "', 
	'p12_interpreter_mobile':' " . showData('n_400_interpreter_mobile') . "', 
	'p12_interpreter_email':' " . showData('n_400_interpreter_email') . "', 
	'p12_interpreter_fluent_english':' " . showData('n_400_interpreter_certification_language_skill') . "', 
	'p12_interpreter_signature_date':' " . showData('n_400_interpreter_sign_date') . "', 
	'p13_preparer_family_name':' " . showData('n_400_preparer_family_last_name') . "', 
	'p13_preparer_given_name':' " . showData('n_400_preparer_family_given_first_name') . "', 
	'p13_preparer_business_name':' " . showData('n_400_preparer_business_name') . "', 
	'p13_preparer_daytime':' " . showData('n_400_preparer_daytime_tel') . "', 
	'p13_preparer_mobile':' " . showData('n_400_preparer_mobile') . "', 
	'p13_preparer_email':' " . showData('n_400_preparer_email') . "', 
	'p13_preparer_signature_date':' " . showData('n_400_preparer_sign_date') . "',
//page 11 end.......    

    'part3_29_enter_total_number':' " . showData('sponsor_family_member5_total_number_of_immigrants') . " ',
    'information_you_sponsor_last_name':' " . showData('sponsor_family_last_name') . " ',
    'information_you_sponsor_first_name':' " . showData('sponsor_given_first_name') . " ',
    'information_you_sponsor_middle_name':' " . showData('sponsor_middle_name') . " ',
    'sponsor_mailing_address_care_of_name':' " . showData('sponsor_mailing_care_of_name') . " ',
    'sponsor_mailing_address_street_name_number':' " . showData('sponsor_mailing_street_number') . " ',
    'sponsor_mailing_address_apt_ste_flr':' " . showData('sponsor_mailing_apt_ste_flr_value') . " ',
    'sponsor_mailing_address_city_town':' " . showData('sponsor_mailing_city_town') . " ',
    'sponsor_mailing_address_state':' " . showData('sponsor_mailing_state') . " ',
    'sponsor_mailing_address_zipcode':' " . showData('sponsor_mailing_zip_code') . " ',
    'sponsor_mailing_address_province':' " . showData('sponsor_mailing_province') . " ',
    'sponsor_mailing_address_postal_code':' " . showData('sponsor_mailing_postal_code') . " ',
    'sponsor_mailing_address_country':' " . showData('sponsor_mailing_country') . " ',

    'sponsor_physical_address_street_name_number':' " . showData('sponsor_physical_street_number') . " ',
    'sponsor_physical_address_apt_ste_flr':' " . showData('sponsor_physical_apt_ste_flr_value') . " ',
    'sponsor_physical_address_city_town':' " . showData('sponsor_physical_city_town') . " ',
    'sponsor_physical_address_state':' " . showData('sponsor_physical_state') . " ',
    'sponsor_physical_address_zipcode':' " . showData('sponsor_physical_zip_code') . " ',
    'sponsor_physical_address_province':' " . showData('sponsor_physical_province') . " ',
    'sponsor_physical_address_postal_code':' " . showData('sponsor_physical_postal_code') . " ',
    'sponsor_physical_address_country':' " . showData('sponsor_physical_country') . " ',
    'sponsor_other_information_country':' " . showData('sponsor_other_information_country_of_domicile') . " ',
    'sponsor_other_information_date_of_birth':' " . showData('sponsor_other_information_date_of_birth') . " ',
    'sponsor_other_information_city_of_birth':' " . showData('sponsor_other_information_city_of_birth') . " ',
    'sponsor_other_information_state_province_of_birth':' " . showData('sponsor_other_information_province_of_birth') . " ',
    'sponsor_other_information_country_of_birth':' " . showData('sponsor_other_information_country_of_birth') . " ',
    'sponsor_other_information_us_social_security_number':' " . showData('sponsor_other_information_social_security_number') . " ',
    'sponsor_other_information_a_number':' " . showData('sponsor_other_information_a_number') . " ',
    'sponsor_other_information_uscis_online_number':' " . showData('sponsor_other_information_uscis_online_account_number') . " ',

//page 12 end.........    
    
    'part5_1':' " . showData('sponsor_household_size_provide_the_number') . " ',
    'part5_2_yourself':'   1',
    'part5_3_currently_married':' " . showData('sponsor_household_size_currently_married') . " ',
    'part5_4_depend_child':' " . showData('sponsor_household_size_dependent_children') . " ',
    'part5_5_other_depend':' " . showData('sponsor_household_size_other_dependents') . " ',
    'part5_6_sponsors':' " . showData('sponsor_household_size_sponsored_i864') . " ',
    'part5_7_optional':' " . showData('sponsor_household_size_siblings') . " ',
    'part5_8_household':'   1',
    'part_6_1_employed':' " . showData('sponsor_employment_as_an') . " ',
    'part_6_2_employer1':' " . showData('sponsor_employment_name_of_employer1') . " ',
    'part_6_3_employer2':' " . showData('sponsor_employment_name_of_employer2') . " ',
    'part_6_4_employed':' " . showData('sponsor_employment_occupation') . " ',
    'part_6_5_retired_date':' " . showData('sponsor_employment_retired_date') . " ',
    'part_6_6_unemployed_date':' " . showData('sponsor_employment_unemployed_date') . " ',
    'part_6_7_annual_income':' " . showData('sponsor_employment_current_annual_income') . " ',
    'person_1_name':' " . showData('sponsor_household_person1_name') . " ',
    'person_1_relation':' " . showData('sponsor_household_person1_relationship') . " ',
    'person_1_current_income':' " . showData('sponsor_household_person1_current_income') . " ',
    'person_2_name':' " . showData('sponsor_household_person2_name') . " ',
    'person_2_relation':' " . showData('sponsor_household_person2_relationship') . " ',
    'person_2_current_income':' " . showData('sponsor_household_person2_current_income') . " ',
    'person_3_name':' " . showData('sponsor_household_person3_name') . " ',
    'person_3_relation':' " . showData('sponsor_household_person3_relationship') . " ',
    'person_3_current_income':' ".showData('sponsor_household_person3_current_income')."',
    'person_4_name':' " . showData('sponsor_household_person4_name') . " ',
    'person_4_relation':' " . showData('sponsor_household_person4_relationship') . " ',
    'person_4_current_income':' " . showData('sponsor_household_person4_current_income') . " ',

//Page 4 end......

    'my_current_house_hold_income':' " . showData('sponsor_employment_current_household_income') . " ',
    'accompanying_dependent_name':' " . showData('sponsor_employment_accompanying_dependents') . " ',
    'most_recent_tax_year':' " . showData('sponsor_employment_most_recent_tax_year') . " ',
    '2nd_most_recent_tax_year':' " . showData('sponsor_employment_2nd_most_recent_tax_year') . " ',
    '3rd_most_recent_tax_year':' " . showData('sponsor_employment_3rd_most_recent_tax_year') . " ',
    'total_income':' " . showData('sponsor_employment_most_recent_total_income') . " ',
    '2nd_total_income':' " . showData('sponsor_employment_2nd_most_recent_total_income') . " ',
    '3rd_total_income':' " . showData('sponsor_employment_3rd_most_recent_total_income') . " ',
    'balance_saving_account':' " . showData('sponsor_assets_of_supplement_saving_accounts') . " ',
    'net_cash_value':' " . showData('sponsor_assets_of_supplement_real_estate_holdings') . " ',
    'cash_value_all_stock':' " . showData('sponsor_assets_of_supplement_stocks_bonds_certificates') . " ',
    'together_totals':' " . showData('sponsor_assets_of_supplement_add_together1') . " ',
    'use_asets_name_of_relative':' " . showData('sponsor_assets_of_supplement_name_of_relative') . " ',
    'house_hold_member_assets':' " . showData('sponsor_assets_of_supplement_household_member') . " ',
    'enter_balance_of_principals':' " . showData('sponsor_assets_of_supplement_immigrant_saving') . " ',
    'net_cash_value_of_principals':' " . showData('sponsor_assets_of_supplement_immigrant_real_estate_holdings') . " ',
    'current_cash_value_of_immigrants':' " . showData('sponsor_assets_of_supplement_immigrant_stocks_bonds_certificates') . " ',

//page 5 end........    

    'add_together_item_number6_8':' " . showData('sponsor_assets_of_supplement_add_together2') . " ',
    'add_together_item_number4_5_9':' " . showData('sponsor_assets_of_supplement_add_together3') . " ',

//page 6 end.....
    'the_interpreter_named':' " . showData('sponsor_statement_interpreter_named') . " ',
    'at_my_request_preparer_name':' " . showData('sponsor_statement_preparer_named') . " ',
    'sponsor_daytime_telephone_number':' " . showData('sponsor_daytime_tel') . " ',
    'sponsor_mobile_telephone_number':' " . showData('sponsor_mobile') . " ',
    'sponsor_email_address':' " . showData('sponsor_email') . " ',

//page 7 end.........
    'sponsor_signature_date':' " . showData('sponsor_sign_date') . " ',
    'interpreter_family_last_name':' " . showData('i_864_interpreter_family_last_name') . " ',
    'interpreter_given_first_name':' " . showData('i_864_interpreter_given_first_name') . " ',
    'interpreter_business_org_name':' " . showData('i_864_interpreter_business_name') . " ',
    'interpreter_mailing_address_street_name_number':' " . showData('i_864_interpreter_address_street_number') . " ',
    'interpreter_mailing_address_apt_ste_flr':' " . showData('i_864_interpreter_address_apt_ste_flr_value') . " ',
    'interpreter_mailing_address_city_town':' " . showData('i_864_interpreter_address_city_town') . " ',
    'interpreter_mailing_address_state':' " . showData('i_864_interpreter_address_state') . " ',
    'interpreter_mailing_address_zipcode':' " . showData('i_864_interpreter_address_zip_code') . " ',
    'interpreter_mailing_address_province':' " . showData('i_864_interpreter_address_province') . " ',
    'interpreter_mailing_address_postal_code':' " . showData('i_864_interpreter_address_postal_code') . " ',
    'interpreter_mailing_address_country':' " . showData('i_864_interpreter_address_country') . " ', 
    'interpreter_daytime_telephone_number':' " . showData('i_864_interpreter_daytime_tel') . " ',
    'interpreter_mobile_telephone_number':' " . showData('i_864_interpreter_mobile') . " ',
    'interpreter_email_address':' " . showData('i_864_interpreter_email') . " ',
    'interpreter_certification':' " . showData('i_864_interpreter_fluent_in_english') . " ',
    'interpreter_date_of_signature':' " . showData('i_864_interpreter_sign_date') . " ',
//page 8 end.......    
    'preparer_family_last_name':' " . showData('i_864_preparer_family_last_name') . " ',
    'preparer_given_first_name':' " . showData('i_864_preparer_given_first_name') . " ',
    'preparer_business_org_name':' " . showData('i_864_preparer_business_name') . " ',
    'preparer_mailing_address_street_name_number':' " . showData('i_864_preparer_address_street_number') . " ',
    'preparer_mailing_address_apt_ste_flr':' " . showData('i_864_preparer_address_apt_ste_flr_value') . " ',
    'preparer_mailing_address_city_town':' " . showData('i_864_preparer_address_city_town') . " ',
    'preparer_mailing_address_state':' " . showData('i_864_preparer_address_state') . " ',
    'preparer_mailing_address_zipcode':' " . showData('i_864_preparer_address_zip_code') . " ',
    'preparer_mailing_address_province':' " . showData('i_864_preparer_address_province') . " ',
    'preparer_mailing_address_postal_code':' " . showData('i_864_preparer_address_postal_code') . " ',
    'preparer_mailing_address_country':' " . showData('i_864_preparer_address_country') . " ',
    'preparer_daytime_telephone_number':' " . showData('i_864_preparer_daytime_tel') . " ',
    'preparer_mobile_telephone_number':' " . showData('i_864_preparer_mobile') . " ',
    'preparer_email_address':' " . showData('i_864_preparer_email') . " ',
    'preperer_date_of_signature':' " . showData('i_864_preparer_sign_date') . " ',


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
}";

$pdf->IncludeJS($js);
//Close and output PDF document
$pdf->Output('form I-864.pdf', 'I');
