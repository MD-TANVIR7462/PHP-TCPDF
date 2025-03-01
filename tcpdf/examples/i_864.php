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

// $pdf->AddPage('P', 'LETTER');

// // set style for barcode
// $style = array(
//     'border' => 2,
//     'vpadding' => 'auto',
//     'hpadding' => 'auto',
//     'fgcolor' => array(0, 0, 0),
//     'bgcolor' => false, //array(255,255,255)
//     'module_width' => 2, // width of a single module in points
//     'module_height' => 1 // height of a single module in points
// );



// // Logo
// $logo = 'homeland_security_logo.png';
// $pdf->Image($logo, 12, 11, 16, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

// $pdf->Cell(25, 5, '', 0, 0);
// $pdf->SetFont('times', 'B', 14);    // set font
// $pdf->MultiCell(180, 15, "Affidavit of Support Under Section 213A of the INA", 0, 'C', 0, 1, 17, 10, true);

// $pdf->SetFont('times', 'B', 10.5); // set font
// $pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
// $pdf->MultiCell(30, 5, "USCIS\nForm I-864", 0, 'C', 0, 1, 174.5, 6, true);

// $pdf->SetFont('times', 'B', 10.6);    // set font
// $pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

// $pdf->SetFont('times', '', 10.8);    // set font
// $pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

// $pdf->SetFont('times', '', 9);    // set font
// $pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
// $pdf->MultiCell(40, 5, "OMB No. 1615-0075\nExpires 01/31/2026", 0, 'C', 0, 1, 169, 18.5, true);

// $pdf->Ln(1.3);

// $top_border = array(
//     'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
// );
// $pdf->Cell(188.5, 0, '', $top_border, 1, 1);


// $pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
// $pdf->SetLineWidth(0.1); // set border width
// $pdf->SetDrawColor(0, 0, 0); // set color for cell border
// $pdf->SetFillColor(255, 255, 255); // set filling color
// $pdf->setCellHeightRatio(1); // set cell height ratio
// $pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

// // $pdf->Ln(1);
// // set filling color
// $pdf->SetLineWidth(0.4); // set border width
// $pdf->SetFillColor(220, 220, 220);
// $pdf->SetFont('times', 'B', 10); // set font
// $pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
// $pdf->setCellHeightRatio(1.2);

// $pdf->SetFont('times', 'B', 9); // set font
// $pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
// $pdf->SetFillColor(255, 255, 255);
// $pdf->MultiCell(190, 34.8, "", 1, 'C', 1, 1, 13, 32.5, true);

// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', 'B', 10);
// $pdf->setCellHeightRatio(1.1);
// $pdf->setCellPaddings(1, 1.5, 0, 0); // set cell padding
// $pdf->SetFontSize(11.6); // set font
// $pdf->MultiCell(15, 34, " For\nUSCIS\nUse\nOnly", 0, 'C', 0, 0, 13.3, 39.6, true);
// $pdf->MultiCell(15, 34, "", "R", 'C', 1, 1, 13.3, 33, true);

// $pdf->setFont('Times', 'B', 10);
// $pdf->MultiCell(90, 7, "Affidavit of Support Submitter", 0, 'C', 0, 1, 8, 32, true);
// $pdf->SetFont('times', '', 5);
// $pdf->setCellPaddings(0, 0, 0, 0);
// $pdf->writeHTMLCell(2, 1, 32, 40, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div>Petitioner</div>';
// $pdf->writeHTMLCell(30, 3, 35, 39, $html, 0, 1, false, true, 'L', true);
// //......
// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 32, 45, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div>Ist Joint Sponsor</div>';
// $pdf->writeHTMLCell(30, 3, 35, 44, $html, 0, 1, false, true, 'L', true);
// //.........

// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 32, 50, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div>2nd Joint Sponsor</div>';
// $pdf->writeHTMLCell(30, 3, 35, 49, $html, 0, 1, false, true, 'L', true);

// //.........

// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 32, 55, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div>Substitute Sponsor</div>';
// $pdf->writeHTMLCell(30, 3, 35, 54, $html, 0, 1, false, true, 'L', true);

// //.........

// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 32, 60, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div>5% Owner</div>';
// $pdf->writeHTMLCell(30, 3, 35, 59, $html, 0, 1, false, true, 'L', true);
// //.........
// $pdf->MultiCell(60, 34.8, "", 'LR', 'C', 0, 1, 80, 32.5, true);
// $pdf->setFont('Times', 'B', 10);
// $pdf->MultiCell(90, 7, "Section 213A Review", 0, 'C', 0, 1, 67, 33, true);
// //..........

// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 83, 40, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div>MEETS</div>';
// $pdf->writeHTMLCell(30, 5, 86, 39, $html, 0, 1, false, true, 'L', true);
// //.........

// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 106, 40, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $html = '<div> DOES NOT MEET</div>';
// $pdf->writeHTMLCell(30, 5, 109, 39, $html, 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(30, 5, 86, 43, 'requirements', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(30, 5, 110, 43, 'requirements', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 0, 80, 48, '', 'T', 1, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 5, 83, 50, 'Reviewed By:____________________', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 5, 83, 55, 'Office:__________________________', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 5, 83, 61, 'Date (mm/dd/yyyy):_______________', 0, 1, false, true, 'L', true);
// //...............
// $pdf->setFont('Times', 'B', 10);
// $pdf->MultiCell(90, 7, "Number of Support Affidavits in File", 0, 'C', 0, 1, 126, 33, true);
// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 156, 40, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 160, 39, '1', 0, 1, false, true, 'L', true);

// $pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(2, 1, 177, 40, '', 1, 1, false, true, 'L', false);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 181, 39, '2', 0, 1, false, true, 'L', true);
// $pdf->writeHTMLCell(63, 0, 140, 45, '', 'T', 1, false, true, 'L', true);
// $pdf->SetFont('times', 'B', 11);
// $pdf->writeHTMLCell(30, 5, 142, 46, 'Remarks', 0, 1, false, true, 'L', true);
// // upper box ended ............... upper box ended

// $pdf->writeHTMLCell(190, 22, 13, 70, '', 1, 1, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>  &nbsp; &nbsp; <br> To be completed by an attorney or accredited
// representative</b> (if any).</div>';
// $pdf->writeHTMLCell(38, 21, 13.3, 70.5, $html, 'R', 1, true, true, 'C', true);
// $pdf->SetFont('times', 'B', 15);

// if(showData('i_864_g_28_box') =="Y") $g_28 = "checked"; else $g_28 = "";

// $html = '<div><input type="checkbox" name="g-28" value="g-28" checked="'.$g_28.'" /></div>';
// $pdf->writeHTMLCell(20, 20, 43.5, 73, $html, 0, 0, false, true, 'C', true);

// //........

// $pdf->SetFont('times', 'B', 10);
// $html = '<div> <br>Select this box if <br>Form G-28 or<br>G-28I is attached.</div>';
// $pdf->writeHTMLCell(30, 22, 59, 70, $html, 'R', 0, false, true, 'L', true);
// //.......

// $pdf->SetFont('times', '', 10);
// $html = '<div><b> Attorney State Bar Number </b> <br> (if applicable)</div>';
// $pdf->writeHTMLCell(50, 22, 90, 72.5, $html, 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(50, 22, 90, 70, "", 'R', 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('attorney_state_bar_number', 46.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 91, 82.5);

// //..........


// $pdf->SetFont('times', '', 10);
// $html = '<div><b>Attorney or Accredited Representative
// USCIS Online Account Number </b>(if any)</div>';
// $pdf->writeHTMLCell(60, 22, 142, 72, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('uscis_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 141.6, 82.2);
// //...........
// $pdf->Image('images/right_angle.jpg', 13.5, 94, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
// $pdf->SetFont('times', '', 10);
// $html = '<div><b>START HERE - Type or print in black ink. </b></div>';
// $pdf->writeHTMLCell(80, 20, 20, 93.5, $html, 0, 0, false, true, 'L', true);
// //.........
// $pdf->SetFillColor(220, 220, 220);
// $pdf->setCellPaddings(0, 1, 0, 0);
// $pdf->SetFont('times', '', 12);
// $html = '<div><b> part 1.   Basis For Filing Affidavit of Support</b></div>';
// $pdf->writeHTMLCell(190, 7, 13, 99, $html, 1, 1, true, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 1, 12, 107, '<div>I am the sponsor submitting this affidavit of support because (Select <b> only one</b> box).</div>', 0, 0, false, true, 'L', false);
// // //..............


// //.........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864_affidavit_support_petitioner_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>1.a.   </b> </div>';
// $pdf->writeHTMLCell(190, 1, 12, 112, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(190, 1, 19, 111, '  <input type="checkbox" name="peitioner" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(180, 1, 25, 112, ' I am the petitioner. I filed or am filing for the immigration of my relative.', 0, 0, false, true, 'L', true);

// //...........

// $pdf->SetFont('times', '', 10);
// if (showData('i_864_affidavit_support_alien_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>1.b.</b></div>';
// $pdf->writeHTMLCell(190, 1, 12, 119, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(190, 1, 19, 118, '<input type="checkbox" name="alien_petietioner" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 1, 25, 119, 'I filed an alien worker petition on behalf of the
// intending immigrant, who is related to me as my', 0, 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('filed_an_alien_worker_petition_on_behalf', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 161, 119);
// //............

// $pdf->SetFont('times', '', 10);
// if (showData('i_864_affidavit_support_ownership_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>1.c.   </b> </div>';
// $pdf->writeHTMLCell(90, 1, 12, 127.5, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(190, 1, 19, 126.5, '  <input type="checkbox" name="have_ownership" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $html = '<div>I have an ownership interest of at least 5 percent in </div>';
// $pdf->writeHTMLCell(80, 1, 25, 127.5, $html, 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(180, 1, 25, 134, "which filed an alien worker petition on behalf of the intending immigrant, who is related to me as my ", 0, 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('have_an_ownership_interest',105, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 98,  128);
// $pdf->TextField('which_fields_an_alien_worker', 77, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 25, 139.3);
// //......

// $pdf->SetFont('times', '', 10);
// if (showData('i_864_affidavit_support_sponsor_status') == "Y") $checked = "checked";
// else $checked = "";
// $html = '<div><b>1.d.   </b>   </div>';
// $pdf->writeHTMLCell(90, 1, 12, 147, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 14);
// $pdf->writeHTMLCell(190, 1, 19, 146, '<input type="checkbox" name="join_sponsor" value="Y" checked="' . $checked . '" />', 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $html = '<div> I am the only joint sponsor.</div>';
// $pdf->writeHTMLCell(80, 1, 24.5, 147, $html, 0, 0, false, true, 'L', true);
// //........

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>1.e.</b></div>';
// $pdf->writeHTMLCell(90, 1, 12, 154, $html, 0, 0, false, true, 'L', true);
// if (showData('i_864_affidavit_support_i_am_status') == "Y") $checked1 = "checked";
// else $checked1 = "";
// $pdf->SetFont('times', '', 14);
// $html = '<input type="checkbox" name="iam_the" value="Y" checked="' . $checked1 . '" />';
// $pdf->writeHTMLCell(90, 1, 19, 153, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// if (showData('i_864_affidavit_support_first_status') == "Y") $checked2 = "checked";
// else $checked2 = "";
// if (showData('i_864_affidavit_support_second_status') == "Y") $checked3 = "checked";
// else $checked3 = "";
// $html = '<div>I am the  &nbsp;&nbsp;<input type="checkbox" name="iam_first" value="Y" checked="' . $checked2 . '" /> &nbsp;&nbsp;first &nbsp;&nbsp;<input type="checkbox" name="iam_first" value="Y" checked="' . $checked3 . '" />&nbsp;&nbsp;second of two joint sponsors.</div>';
// $pdf->writeHTMLCell(90, 1, 25, 154, $html, 0, 0, false, true, 'L', true);
// //..........

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>1.f.</b</div>';
// $pdf->writeHTMLCell(90, 1, 12, 161, $html, 0, 0, false, true, 'L', true);
// if (showData('i_864_affidavit_support_substitute_status') == "Y") $checked = "checked";
// else $checked = "";
// $pdf->SetFont('times', '', 14);
// $html = '<input type="checkbox" name="original" value="Y" checked="' . $checked . '" />';
// $pdf->writeHTMLCell(90, 1, 19, 161, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $html = '<div>The original petitioner is deceased. I am the substitute sponsor. I am</div>';
// $pdf->writeHTMLCell(180, 1, 25, 161, $html, 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(180, 1, 25, 166, "the intending immigrant's", 0, 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// //........
// $pdf->TextField('part1_1f_original_petitioner', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 166);

// //...............   

// $pdf->SetFont('times', '', 10);
// $html = '<div><b>NOTE: As a sponsor, you must include proof of your U.S. citizenship, U.S. national status, or lawful permanent resident
// status.</b></div>';
// $pdf->writeHTMLCell(190, 1, 12, 173, $html, 0, 0, false, true, 'L', true);

// //...........

// $pdf->SetFont('times', 'B', 12);
// $pdf->setCellPaddings(1, 1, 0, 1);
// $html = '<div><b>Part 2. Information About You (Sponsor)</b></div>';
// $pdf->writeHTMLCell(190, 1, 13, 185, $html, 1, 1, true, true, 'L', true);
// //..........
// $pdf->SetFont('times', '', 10);
// $html = "<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ponsor's Full Legal Name (<b>Do not</b> provide a nickname)</div>";
// $pdf->writeHTMLCell(130, 1, 12, 193, $html, 0, 0, false, true, 'L', true);
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(60, 1, 19.8,198,'<div>Family Name (Last Name)</div>', 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, 84, 198, '<div>Given Name (First Name)</div>', 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, 146, 198, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
// //................
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('information_about_you_last_tname', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.8,203);
// $pdf->TextField('information_about_you_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84,203);
// $pdf->TextField('information_about_you_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146,203);

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
$html = '<div><b>Part 2. Information About You (Sponsor) </b>(continued)</div>';
$pdf->writeHTMLCell(191, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 13, 25, "<b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sponsor's Current Mailing Address", 0, 1, false, false, 'L', true);
$html = '<div>In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 22, 30, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_care_of_name',181, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 37);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 22, 43.4, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_street', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 50);
//...........
if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="Apt1" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste1" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr1" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 50, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 44, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 44, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 50);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 58, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_city_town', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 63);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 144, 58, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("about_your_mailing_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 63);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 168, 58, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 63);
//..............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 70, 'Province', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 75);
//.............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,88, 70, 'Postal Code', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 75);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Country';
$pdf->writeHTMLCell(90, 7, 124, 70, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 75);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 84, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Is your current mailing address the same as your physical address? ';
$pdf->writeHTMLCell(120, 7, 21.4, 84, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 85, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 84, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10); // set font

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "No" to <b>Item Number 3</b>., provide your physical address <b>in Item Number 4.</b>';
$pdf->writeHTMLCell(190, 7, 21.4, 91, $html, '', 0, 0, true, 'L');

//!.............
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
//........
$pdf->SetFont('times', '', 10);
$html = '<div>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 97, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_street2', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 103);
//...........
$isMailingAndPhysical = (showData('is_your_current_mailing_address_same_as_physical') == "Y") ? true : false;
if($isMailingAndPhysical){
    if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
    else $checked_apt = "";
    if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
    else $checked_ste = "";
    if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
    else $checked_flr = "";
}
else{
    if (showData('information_about_you_home_apt_ste_flr') == "apt") $checked_apt = "checked";
    else $checked_apt = "";
    if (showData('information_about_you_home_apt_ste_flr') == "ste") $checked_ste = "checked";
    else $checked_ste = "";
    if (showData('information_about_you_home_apt_ste_flr') == "flr") $checked_flr = "checked";
    else $checked_flr = ""; 
}
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="Apt2" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="Ste2" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="Flr2" value="Flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(50, 0, 144, 103, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 144.2, 98, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 167, 98, "Number", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_apt_ste_flr2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 103);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 22, 111, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_city_town2', 119.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 116.5);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div>State</div>';
$pdf->writeHTMLCell(50, 4, 143.7, 111.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
    $comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("about_your_mailing_state2", 22, 7, $comboBoxOptions, array(), array(), 144.2, 116.5);
$pdf->SetFont('times', '', 10);
$html = '<div>ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 167.2, 111.3, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_mailing_zipcode2', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 116.5);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 22, 124, 'Province', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province2', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 129);
//.............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,87, 124, 'Postal Code', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code2', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 88, 129);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Country';
$pdf->writeHTMLCell(90, 7, 124, 124, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_country2', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 129);
$pdf->SetFont('times', '', 11); // set font
$pdf->writeHTMLCell(90, 7, 12, 140,"Other Information", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font

//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 12, 147, '<b>5</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Domicile', '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province2', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 152);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,82, 147, '<b>6</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code2', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 92, 152);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,140, 147, '<b>7</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code2', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 152);

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,12, 160, '<b>8</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (Required)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code2', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 165);

///.............
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Immigration Status</div>';
$pdf->writeHTMLCell(90, 0, 12, 174, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 0, 27, 180, "I am a U.S. citizen.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 20, 179, $html, '', 0, 0, true, 'L');
//.....
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 0, 27, 187, "I am a U.S. national.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_national_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_nation" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 20, 186, $html, '', 0, 0, true, 'L');
//....
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 0, 27, 194, "I am a lawful permanent resident.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_permanent_resident_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_lawfull" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 20, 193, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7, 12, 200, "<b>10</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sponsor's A-Number (if any) ", '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_province2', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 31, 205);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(90, 7,90, 200, '<b>11</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)', '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_mailing_address_postal_code2', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 205);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 7,12, 215, 'Military Service (To be completed by petitioner sponsors only.)', '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.</b>&nbsp;&nbsp;&nbsp;&nbsp;I am currently on <b>active duty</b> in the United States Armed Forces or U.S. Coast Guard.';
$pdf->writeHTMLCell(150, 7, 12, 225, $html, '', 0, 0, true, 'L');
if (showData('is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('is_your_current_mailing_address_same_as_physical') == "N") $checked_N = "checked";
else $checked_N = "";
$pdf->writeHTMLCell(120, 7, 178, 226, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$html = '<div><input type="checkbox" name="part1_3" value="Y" checked="' . $checked_y . '" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part1_3" value="N" checked="' . $checked_N . '" /></div>';
$pdf->writeHTMLCell(50, 7, 172, 225, $html, 0, 1, false, true, 'J', true);
//.............
//  ********************************
//  ******** End Page No 2 **********
//  *********************************

// ********************************
//  ******** Start Page No 3 ********
//  *********************************/

$pdf->AddPage('P', 'LETTER'); // page number 3
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->SetFont('times', '', 12);
$html = '<div><b> Part 3. Information About the Immigrants You
Are Sponsoring</b> (continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, true, 'L', true);
//.........

$pdf->SetFont('times', 'B', 10);
$pdf->SetFont('times', '', 10);
$html = '<div>Enter the total number of immigrants you are sponsoring on
this affidavit which includes the principal immigrant listed
in <b>Part 2.</b>, any immigrants listed in <b>Part 3., Item
Numbers 1. - 28.</b> and (if applicable), any immigrants listed
for these questions in <b>Part 11. Additional Information. </b>
Do not count the principal immigrant if you are only
sponsoring family members entering more than 6 months
after the principal immigrant.
</div>';
$pdf->writeHTMLCell(85, 7, 18, 29, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_29_enter_total_number', 18, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 86, 62);

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 4. Information About You (Sponsor) </b></div>';
$pdf->writeHTMLCell(91, 7, 13, 73.5, $html, 1, 1, true, true, 'L', true);


$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Sponsor\'s Full Name</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 83, $html, 0, 1, true, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp;&nbsp;&nbsp;Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 91, $html, 0, 0, false, true, 'L', true);

$html = '<div><b>1.b.</b>&nbsp;&nbsp;&nbsp;&nbsp;Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 100, $html, 0, 0, false, true, 'L', true);


$html = '<div><b>1.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 111, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_sponsor_last_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 93);

$pdf->TextField('information_you_sponsor_first_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 102);

$pdf->TextField('information_you_sponsor_middle_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 42, 111);

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Sponsor\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 122, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.</b>&nbsp;&nbsp;&nbsp;&nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_care_of_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 135);
//.....

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.</b>&nbsp;&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 142, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_street_name_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 144);

//...........
$pdf->SetFont('times', '', 10); // set font
if (showData('sponsor_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('sponsor_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('sponsor_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$html = '<div><b>2.c.&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="mail_apt2" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;<input type="checkbox" name="mail_ste2" value="Ste" checked="' . $checked_ste . '" />Ste. <input type="checkbox" name="mail_flr2" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_apt_ste_flr', 39.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  64.5, 153);


//......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.d.&nbsp;&nbsp;&nbsp;&nbsp;</b>City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 162, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_city_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 162);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.e.&nbsp;&nbsp;&nbsp;&nbsp;</b>State</div>';
$pdf->writeHTMLCell(50, 0, 12, 171, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="sponsor_mailing_address_state" size="0.75">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 170, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.f.</b>&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 45, 171, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_zipcode', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 171);

//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.g.</b>&nbsp;&nbsp;&nbsp;&nbsp;Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 180, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 180);
//...............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.h.</b>&nbsp;&nbsp;&nbsp;&nbsp;Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 12, 189, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 189);

//........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.i.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 196, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 201);
//.....

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is your current mailing address the same as your physical<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;address?</div>';
$pdf->writeHTMLCell(100, 0, 12, 209, $html, '', 0, 0, true, 'L');
if (showData('sponsor_is_your_current_mailing_address_same_as_physical') == "Y") $checked_y = "checked";
else $checked_y = "";
if (showData('sponsor_is_your_current_mailing_address_same_as_physical') == "N") $checked_n = "checked";
else $checked_n = "";

$html = '<div> <input type="checkbox" name="current_mailing" value="Y" checked="' . $checked_y . '" /> Yes &nbsp;&nbsp;
              <input type="checkbox" name="current_mailing" value="N" checked="' . $checked_n . '" /> No
</div>';
$pdf->writeHTMLCell(90, 0, 75, 215, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<div>If you answered "No" to <b>Item Number 3.</b>, provide your
physical address in <b>Item Numbers 4.a. - 4.h.</b></div>';
$pdf->writeHTMLCell(90, 0, 12, 221, $html, '', 0, 0, true, 'L');

//......

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Sponsor\'s Physical Address </b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 1, true, true, 'L', true);
//...............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp;and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 24, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_street_name_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 26);

//...........

$pdf->SetFont('times', '', 10); // set font
if (showData('sponsor_physical_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('sponsor_physical_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('sponsor_physical_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$html = '<div><b>4.b. </b>&nbsp; &nbsp;<input type="checkbox" name="physical_apt2" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;<input type="checkbox" name="physical_ste2" value="Ste" checked="' . $checked_ste . '" />Ste. <input type="checkbox" name="physical_flr2" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 35, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_apt_ste_flr', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  166, 35);


//......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.c. </b>&nbsp;&nbsp;City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 44, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_city_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 44); //............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.d.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 53, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="sponsor_physical_address_state" size="0.75">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 52, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.e.</b>&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 143, 53, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_zipcode', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 166, 53);

//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 62, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 62);
//...............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 112, 71, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 71);

//........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 77.6, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 83);

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 94, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Domicile </div>';
$pdf->writeHTMLCell(50, 0, 112, 101.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 107);
//.......


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 0, 112, 116, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_date_of_birth', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 116);

//........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 0, 112, 122.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_city_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 128);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>State or Province of Birth</div>';
$pdf->writeHTMLCell(60, 0, 112, 136, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_state_province_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 141);
//.......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth</div>';
$pdf->writeHTMLCell(60, 0, 112, 148, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_country_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 153);

//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>10.</b>&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (Required)</div>';
$pdf->writeHTMLCell(90, 0, 112, 160, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_us_social_security_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 165.5);
$pdf->Image('images/right_angle.jpg', 154, 167.5, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........


$pdf->SetFont('times', '', 10); // set font
$html = '<div>Citizenship or Residency</div>';
$pdf->writeHTMLCell(90, 0, 112, 174, $html, '', 0, 0, true, 'L');
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>11.a.</b></div>';
$pdf->writeHTMLCell(90, 0, 112, 180, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 0, 127, 180, "I am a U.S. citizen.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_citizen_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_citizen" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 120, 179, $html, '', 0, 0, true, 'L');
//.....
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>11.b.</b></div>';
$pdf->writeHTMLCell(90, 0, 112, 187, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 0, 127, 187, "I am a U.S. national.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_us_national_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_nation" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 120, 186, $html, '', 0, 0, true, 'L');
//....
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>11.c.</b></div>';
$pdf->writeHTMLCell(90, 0, 112, 195, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 0, 127, 195, "I am a lawful permanent resident.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
if (showData('sponsor_other_information_permanent_resident_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="us_lawfull" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 0, 120, 194, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>12.   &nbsp;  </b>       Sponsor\'s A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 202, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 207);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 0, 151, 207, 'A-', '', 0, 0, true, 'L');
$pdf->Image('images/right_angle.jpg', 148, 209, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>13.   &nbsp;  </b>       Sponsor\'s USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 215, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_uscis_online_number', 61.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.5, 220);
$pdf->Image('images/right_angle.jpg', 138, 222, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(95, 0, 112, 228, 'Military Service (To be completed by petitioner sponsors only.)', 0, 0, false, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>14.   &nbsp;  </b>      I am currently on <b>active duty</b> in the U.S. Armed Forces <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or U.S. Coast Guard.</div>';
$pdf->writeHTMLCell(90, 0, 112, 234, $html, '', 0, 0, true, 'L');
if (showData('sponsor_other_information_active_duty_status') == 'Y') $checked_y = 'checked';
else $checked_y = '';
if (showData('sponsor_other_information_active_duty_status') == 'N') $checked_n = 'checked';
else $checked_n = '';
$html = '<div><input type="checkbox" name="currently_active" value="Y" checked="' . $checked_y . '" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="currently_active" value="N" checked="' . $checked_n . '" />   No 
</div>';
$pdf->writeHTMLCell(60, 0, 177, 239, $html, '', 0, 0, true, 'L');


/********************************
 ******** End Page No 3 **********
 *********************************/

/********************************
 ******** Start Page No 4 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); // page number 4
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 1, 0, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(191, 19.5, 13, 17, '', 1, 0, false, 'L');
$pdf->MultiCell(15, 19, "For\nUSCIS\nUse\nOnly", "R", 'C', 1, 1, 13.3, 17.2, true);

//...........

$pdf->SetFont('times', '', 12);
$html = '<div><b> Part 5. Sponsor\'s Household Size</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 40, $html, 1, 1, true, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: Do not count any member of your household more
than once. <br> <br>
Persons you are sponsoring in this affidavit:</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 48, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.     </b>    Provide the number you entered in <b>Part 3., Item Number  <br>
&nbsp;  &nbsp; &nbsp;     29.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 66, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_1', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 72);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Persons NOT sponsored in this affidavit:</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.     </b>   Yourself</div>';
$pdf->writeHTMLCell(90, 7, 12, 84, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_2_yourself', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 84);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.     </b>   If you are currently married, enter "I" for your spouse.</div>';
$pdf->writeHTMLCell(90, 7, 12, 91, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3_currently_married', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 97);

//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.      </b>     If you have dependent children, enter the number here.</div>';
$pdf->writeHTMLCell(90, 7, 12, 104, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_4_depend_child', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 110);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.      </b>      If you have any other dependents, enter the number here.</div>';
$pdf->writeHTMLCell(90, 2, 12, 117, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_5_other_depend', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 123);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.      </b>       If you have sponsored any other persons on Form 1-864 or<br>  &nbsp;  &nbsp;  
       From I-864EZ who are now lawful permanent residents. <br>   &nbsp;  &nbsp; 
       enter the number here.
</div>';
$pdf->writeHTMLCell(90, 2, 12, 130, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_6_sponsors', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 140);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.      </b>      <b>OPTIONAL: </b>If you have siblings, parents, or adult<br>   &nbsp;   &nbsp;
children with the same principal residence who are<br>    &nbsp;   &nbsp;
combining their income with yours by submitting Form<br>    &nbsp;   &nbsp;
I-864A, enter the number here.
</div>';
$pdf->writeHTMLCell(90, 2, 12, 148, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_7_optional', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 164);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.      </b>      Add together <b>Part 5., Item Numbers 1. - 7.</b> and enter the<br>   &nbsp;   &nbsp;
number here.
</div>';
$pdf->writeHTMLCell(91, 2, 12, 170, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_8_household', 14.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.6, 178);
$pdf->SetFont('times', '', 10);
$html = '<div><b>Household Size: </b></div>';
$pdf->writeHTMLCell(60, 2, 62, 178, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html = '<div><b> Part 6. Sponsor\'s Employment and Income</b></div>';
$pdf->writeHTMLCell(91, 2, 13, 188, $html, 1, 1, true, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>I am currently:</b></div>';
$pdf->writeHTMLCell(90, 2, 12, 195, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_as_an_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>1.     </b>&nbsp;&nbsp;<input type="checkbox" name="employeed_as" value="Y" checked="' . $checked . '" />  Employed as a/an</div>';
$pdf->writeHTMLCell(90, 2, 12, 200, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_1_employed', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 206);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.     </b>&nbsp;&nbsp;Name of Employer 1</div>';
$pdf->writeHTMLCell(90, 7, 12, 213.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_2_employer1', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 219);


//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.     </b>&nbsp;&nbsp;Name of Employer 2 (if applicable)</div>';
$pdf->writeHTMLCell(90, 2, 12, 226, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_3_employer2', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 232);


//.........

$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_occupation_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>4.     </b>&nbsp;&nbsp;<input type="checkbox" name="employeed_as" value="Y" checked="' . $checked . '" />  Self-Employed as a/an (Occupation)</div>';
$pdf->writeHTMLCell(90, 2, 12, 240, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_4_employed', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 246);


//......page 4 left side   end .....//

$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_retired_date_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>5.     </b>&nbsp;&nbsp; &nbsp;<input type="checkbox" name="retired" value="Y" checked="' . $checked . '" />  Retired Since (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 2, 112, 38, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_5_retired_date', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 43);

//...........

$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_unemployed_date_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>6.     </b>&nbsp;&nbsp; &nbsp;<input type="checkbox" name="un_employeed" value="Y" checked="' . $checked . '" />Unemployed Since (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell(90, 7, 112, 49.6, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_6_unemployed_date', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 56);


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.     </b>&nbsp;&nbsp; &nbsp;My current individual annual income is:</div>';
$pdf->writeHTMLCell(90, 7, 112, 62, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 170, 68, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_7_annual_income', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 68);


//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>Income you are using from any other person who was
counted in your household size,</b> including, in certain
conditions, the intending immigrant. (See Form I-864
Instructions.) Please indicate name, relationship, and income.</div>';
$pdf->writeHTMLCell(90, 7, 112, 76, $html, 0, 1, false, true, 'L', true);


//..........person 1 

$pdf->SetFont('times', '', 10);
$html = '<div><b>Person 1</b></div>';
$pdf->writeHTMLCell(90, 2, 112, 96, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.      </b>  &nbsp;&nbsp;      Name</div>';
$pdf->writeHTMLCell(90, 2, 112, 102.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_1_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 108);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>9.      </b>  &nbsp;&nbsp;      Relationship</div>';
$pdf->writeHTMLCell(90, 2, 112, 115, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_1_relation', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 120.5);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>10.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$    </b></div>';
$pdf->writeHTMLCell(90, 2, 112, 129, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_1_current_income', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 129);



//..........person 2 

$pdf->SetFont('times', '', 10);
$html = '<div><b>Person 2</b></div>';
$pdf->writeHTMLCell(90, 2, 112, 137, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>11.    </b>&nbsp;    Name</div>';
$pdf->writeHTMLCell(90, 2, 112, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_2_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 148);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>12.     </b>&nbsp;     Relationship</div>';
$pdf->writeHTMLCell(90, 2, 112, 156, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_2_relation', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 161);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>13.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$    </b></div>';
$pdf->writeHTMLCell(90, 2, 112, 170, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_2_current_income', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 170);




//..........person 3 

$pdf->SetFont('times', '', 10);
$html = '<div><b>Person 3</b></div>';
$pdf->writeHTMLCell(90, 2, 112, 177, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>14.    </b>&nbsp;    Name</div>';
$pdf->writeHTMLCell(90, 2, 112, 183, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_3_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 188);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>15.     </b>&nbsp;     Relationship</div>';
$pdf->writeHTMLCell(90, 2, 112, 195, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_3_relation', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 200);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>16.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$    </b></div>';
$pdf->writeHTMLCell(90, 2, 112, 209, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_3_current_income', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 209);


//..........person 4 

$pdf->SetFont('times', '', 10);
$html = '<div><b>Person 4</b></div>';
$pdf->writeHTMLCell(90, 2, 112, 217, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>17.     </b>&nbsp;     Name</div>';
$pdf->writeHTMLCell(90, 2, 112, 223, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_4_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 228);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>18.      </b>&nbsp;      Relationship</div>';
$pdf->writeHTMLCell(90, 7, 112, 235.1, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_4_relation', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 240.5);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>19.        &nbsp;&nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$    </b></div>';
$pdf->writeHTMLCell(90, 2, 112, 249, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_4_current_income', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 249.5);

/********************************
 ******** End Page No 4 **********
 *********************************/

/********************************
 ******** Start Page No 5 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); // page number 5
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(0, 4, 0, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(191, 30, 13, 17, '', 1, 0, false, 'L');
$pdf->MultiCell(15, 29.5, "For\nUSCIS\nUse\nOnly", 0, 'C', 1, 1, 13.3, 17.2, true);

//..........
$pdf->setCellHeightRatio(1.6);
$pdf->MultiCell(45, 7, "Household Size", 0, 'C', 0, 0, 20, 1, false);
$pdf->SetFont('times', '', 10);
$html = '<div><input type="checkbox" name="house_hold1" value="1" checked=" " />  1   &nbsp; 
             <input type="checkbox" name="house_hold2" value="2" checked=" " />  2   &nbsp; 
             <input type="checkbox" name="house_hold3" value="3" checked=" " />  3<br><input type="checkbox" name="house_hold4" value="4" checked=" " />  4   &nbsp; 
             <input type="checkbox" name="house_hold5" value="5" checked=" " />  5   &nbsp; 
             <input type="checkbox" name="house_hold6" value="6" checked=" " />  6<br><input type="checkbox" name="house_hold7" value="7" checked=" " />  7   &nbsp; 
             <input type="checkbox" name="house_hold8" value="8" checked=" " />  8   &nbsp; 
             <input type="checkbox" name="house_hold9" value="9" checked=" " />  9<br><input type="checkbox" name="other" value="0" checked=" " />  others_______  
</div>';
$pdf->writeHTMLCell(90, 7, 30, 18, $html, 0, 1, false, true, 'L', true);
$pdf->setCellHeightRatio(1.1); // cell height 
$pdf->writeHTMLCell(1, 30, 62, 17, '', 'L', 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(60, 7, 67, 14, 'Poverty Guideline', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 7, 68, 20, 'Year:', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(15, 1, 78, 20, '2 0', 'B', 1, false, true, 'L', true);
$pdf->writeHTMLCell(38, 7, 62, 33, '', 'T', 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 30, 100, 17, '', 'L', 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 70, 30, 'Poverty Line:', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 67, 36, '$_____________', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(45, 7, 102, 14, 'Remarks', 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 6. Sponsor\'s Employment and Income  
</b>  (continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 50, $html, 1, 1, true, true, 'L', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 12, 63, '20.', 0, 0, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>My Current Annual Household Income</b> (Total all lines from <b>part 6. Item Numbers 7., 10., 13., 16.,</b> and <b>19.</b>; the total will be compared to Federal Poverty Guidelines on
Form I-864P.)</div>';
$pdf->writeHTMLCell(85, 7, 20, 63, $html, 0, 0, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 65.5, 77, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('my_current_house_hold_income', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 77);

$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_completed_form_i864_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>21.     </b>      <input type="checkbox" name="the_people" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 84, $html, 0, 1, false, true, 'L', true);
$html = '<div>The people listed in <b>Item Numbers 8., 11.. 14.</b>. and<br>
<b>17.</b> have completed Form I-864A.  I am filing along <br>
with this affidavit all necessary Form I-864As <br>
completed by these people.</div>';
$pdf->writeHTMLCell(80, 7, 25, 84, $html, 0, 0, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_accompanying_dependents_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>22.     </b>      <input type="checkbox" name="on_more_people" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 1, false, true, 'L', true);
$html = '<div>One or more of the people listed in <b>Item Numbers<br>
8., 11., 14.</b>, and <b>17.</b> do not need to complete Form<br>
I-864A because he or she is the intending immigrant<br>
and has no accompanying dependents.</div>';
$pdf->writeHTMLCell(80, 7, 25, 102, $html, 0, 0, false, true, 'L', true);

$pdf->writeHTMLCell(80, 7, 25, 119, 'Name', 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('accompanying_dependent_name', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 124);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Federal Income Tax Return Information</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 132, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div><b>23.a.    </b>      Have you filed a Federal income tax return for each of the  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
three most recent tax years? </div>';
$pdf->writeHTMLCell(95, 7, 12, 137, $html, 0, 1, false, true, 'L', true);
if (showData('sponsor_employment_federal_income_tax_status') == 'Y') $checked_y = 'checked';
else $checked_y = '';
if (showData('sponsor_employment_federal_income_tax_status') == 'N') $checked_n = 'checked';
else $checked_n = '';
$html = '<div> <input type="checkbox" name="tax_return" value="Y" checked="' . $checked_y . '" />   Yes   &nbsp; 
        <input type="checkbox" name="tax_return" value="N" checked="' . $checked_n . '" />    No        
</div>';
$pdf->writeHTMLCell(50, 7, 75, 142, $html, 0, 1, false, true, 'L', true);


$html = '<div><b>NOTE:</b> You<b> MUST</b> attach a photocopy or transcript of
your Federal income tax return for only the most recent
tax year.</div>';
$pdf->writeHTMLCell(83, 7, 22, 148, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_photocopies_or_transcripts_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>23.b.  </b><input type="checkbox" name="optional" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 1, false, true, 'L', true);
$html = '<div>(Optional) I have attached photocopies or transcripts
of my Federal income tax returns for my second and
third most recent tax years.</div>';
$pdf->writeHTMLCell(78, 7, 26, 162, $html, 0, 0, false, true, 'L', true);

$html = '<div>My total income (adjusted gross income on Internal Revenue
Service (IRS) Form 1040EZ) as reported on my Federal income
tax returns for the most recent three years was:</div>';
$pdf->writeHTMLCell(92, 7, 12, 178, $html, 0, 0, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div>Tax Year   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Total Income</div>';
$pdf->writeHTMLCell(90, 7, 50, 197, $html, 0, 1, false, true, 'L', true);

//..... for $ 
$pdf->writeHTMLCell(20, 7, 71, 202, '$', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(20, 7, 71, 209, '$', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(20, 7, 71, 216, '$', 0, 1, false, true, 'L', true);

$html = '<div><b>24.a.  </b>  Most Recent</div>';
$pdf->writeHTMLCell(90, 7, 12, 202, $html, 0, 1, false, true, 'L', true);

$html = '<div><b>24.b.  </b> 2nd Most Recent</div>';
$pdf->writeHTMLCell(90, 7, 12, 209, $html, 0, 1, false, true, 'L', true);


$html = '<div><b>24.c.  </b> 3rd Most Recent</div>';
$pdf->writeHTMLCell(90, 7, 12, 216, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('most_recent_tax_year', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 202.2);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('2nd_most_recent_tax_year', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 209);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('3rd_most_recent_tax_year', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 215.9);

//.......

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('total_income', 28.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 202.2);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('2nd_total_income', 28.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 209);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('3rd_total_income', 28.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 215.9);


$pdf->SetFont('times', '', 10);
if (showData('sponsor_employment_irs_required_level') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>25.  </b><input type="checkbox" name="not_require" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 225, $html, 0, 1, false, true, 'L', true);
$html = '<div>I was not required to file a Federal income tax return
as my income was below the IRS required level and I
have attached evidence to support this.</div>';
$pdf->writeHTMLCell(78, 7, 24, 225, $html, 0, 0, false, true, 'L', true);

// page 5 left end ..........

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 7. Use of Assets to Supplement Income </b> (Optional)</div>';
$pdf->writeHTMLCell(91, 7, 113, 49.5, $html, 1, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>If your income, or the total income for you and your household.
from <b>Part 6., Item Numbers 20.</b> or <b>24.a. - 24.c.</b>, exceeds the
Federal Poverty Guidelines for your household size, <b>YOU ARE
NOT REQUIRED</b> to complete this <b>Part 7.</b> Skip to <b>Part 8.</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 61, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div><b>Your Assets (Optional)</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 79, $html, 0, 1, false, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.  </b>&nbsp;&nbsp; &nbsp;Enter the balance of all savings and checking accounts.</div>';
$pdf->writeHTMLCell(90, 7, 112, 85, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 91, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('balance_saving_account', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 90.5);

//.........

$pdf->SetFont('times', '', 10);
$html = '<di><b>2.  </b>&nbsp;&nbsp; &nbsp;Enter the net cash value of real-estate holdings. (Net <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;value 
 means currvent assessed value minus mortgage debt.)</div>';
$pdf->writeHTMLCell(92, 7, 112, 98, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 108, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('net_cash_value', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 107.5);
//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b>&nbsp;&nbsp; &nbsp;Enter the net cash value of all stocks, bonds, certificates<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of deposit, and any other assets not already included in <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Item Number 1. or Item Number 2</b>.</div>';
$pdf->writeHTMLCell(93, 7, 112, 114, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 128, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('cash_value_all_stock', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 128);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>&nbsp;&nbsp; &nbsp;Add together <b>Item Numbers 1. - 3.</b> and enter the number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;here.</div>';
$pdf->writeHTMLCell(93, 7, 112, 135, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 10.2);
$pdf->writeHTMLCell(90, 7, 149, 140, '<div>TOTAL:&nbsp;&nbsp;&nbsp;$</div>', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('together_totals', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 140);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>Assets from Form I-864A. Part 4., Item Number 3.d., for:</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 148, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a.    </b>  Name of Relative</div>';
$pdf->writeHTMLCell(93, 7, 112, 155, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('use_asets_name_of_relative', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 160);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b.  </b>   Your household member\'s assets from Form I-864A <br> &nbsp; &nbsp; &nbsp; &nbsp; 
(optional).</div>';
$pdf->writeHTMLCell(90, 7, 112, 168, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 173, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('house_hold_member_assets', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 173);

//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>Assets of the principal sponsored immigrant</b>(optional).</div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>The principal sponsored immigrant is the person listed in <b>Part
2., Item Numbers 1.a. - 1.c.</b> Only include the assets if the
principal immigrant is being sponsored by this affidavit of
support.</div>';
$pdf->writeHTMLCell(90, 7, 112, 186, $html, 0, 1, false, true, 'L', true);

//................


$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </b>&nbsp;&nbsp; &nbsp;Enter the balance of the principal immigrant\'s savings and<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
checking accounts.</div>';
$pdf->writeHTMLCell(95, 7, 112, 205, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 212, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('enter_balance_of_principals', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 211);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.  </b>&nbsp;&nbsp; &nbsp;Enter the net cash value of all the principal immigrant\'s <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
real estate holdings. (Net value means investment value<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
minus mortgage debt.)</div>';
$pdf->writeHTMLCell(90, 7, 112, 218, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 227, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('net_cash_value_of_principals', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 227);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.  </b>&nbsp;&nbsp; &nbsp;Enter the current cash value of the principal immigrant\'s<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
stocks, bonds, certificates of deposit, and other assets not<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
included in <b>Item Number 6</b>. or <b>Item Number 7.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 234, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 165, 247, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_cash_value_of_immigrants', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 247);

/********************************
 ******** End Page No 5 **********
 *********************************/

/********************************
 ******** Start Page No 6 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); // page number 6

$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(0, 4, 0, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(191, 30, 13, 17, '', 1, 0, false, 'L');
$pdf->MultiCell(15, 29.5, "For\nUSCIS\nUse\nOnly", 0, 'C', 1, 1, 13.3, 17.2, true);

//..........
$pdf->setCellHeightRatio(1.6);
$pdf->MultiCell(45, 7, "Household Size", 0, 'C', 0, 0, 20, 1, false);
$pdf->SetFont('times', '', 10);
$html = '<div><input type="checkbox" name="house_hold1" value="1" checked=" " />  1   &nbsp; 
             <input type="checkbox" name="house_hold2" value="2" checked=" " />  2   &nbsp; 
             <input type="checkbox" name="house_hold3" value="3" checked=" " />  3<br><input type="checkbox" name="house_hold4" value="4" checked=" " />  4   &nbsp; 
             <input type="checkbox" name="house_hold5" value="5" checked=" " />  5   &nbsp; 
             <input type="checkbox" name="house_hold6" value="6" checked=" " />  6<br><input type="checkbox" name="house_hold7" value="7" checked=" " />  7   &nbsp; 
             <input type="checkbox" name="house_hold8" value="8" checked=" " />  8   &nbsp; 
             <input type="checkbox" name="house_hold9" value="9" checked=" " />  9<br><input type="checkbox" name="other" value="0" checked=" " />  others_______  
</div>';
$pdf->writeHTMLCell(90, 7, 30, 18, $html, 0, 1, false, true, 'L', true);
$pdf->setCellHeightRatio(1.1); // cell height 
$pdf->writeHTMLCell(1, 30, 62, 17, '', 'L', 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(60, 7, 67, 14, 'Poverty Guideline', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 7, 68, 20, 'Year:', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(15, 1, 78, 20, '2 0', 'B', 1, false, true, 'L', true);
$pdf->writeHTMLCell(38, 7, 62, 33, '', 'T', 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 30, 100, 17, '', 'L', 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 70, 30, 'Poverty Line:', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 67, 36, '$_____________', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Sponsor\'s Household  Income</b></div>';
$pdf->writeHTMLCell(50, 7, 102, 14, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'I', 8);
$html = '<div>( Page 5, Line 10 )</div>';
$pdf->writeHTMLCell(50, 7, 112, 18, $html, 0, 1, false, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html = '<div>$_______________________</div>';
$pdf->writeHTMLCell(50, 7, 102, 25, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b> Remarks </b></div>';
$pdf->writeHTMLCell(56, 15, 148, 13, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(56, 16, 148, 17, '', 'LB', 1, false, true, 'L', true);

$pdf->SetFont('times', 'I', 7.8);
$html = '<div>The total Value of all assets, Line 10, must equal 5 times (3 time for suposes and children of USC\'s, or 1 time for orphans to be formally adopted in the U.S) the difference between the poverty guidelines and sponsor\'s household income, Line 10. </div>';
$pdf->writeHTMLCell(100, 7, 102, 31, $html, 0, 1, false, true, 'L', true);
//............page 6 upper box end 

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 7. Use of Assets to Supplement Income 
</b>(Optional) (continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 49, $html, 1, 1, true, true, 'L', true);
//.......


$pdf->SetFont('times', '', 10);
$html = '<div><b>9.  </b>&nbsp;&nbsp;&nbsp;Add together <b>Item Numbers 6. - 8.</b> and enter the number<br> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;here</div>';
$pdf->writeHTMLCell(90, 7, 12, 61, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7,  65, 67, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_together_item_number6_8', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 67);

$pdf->SetFont('times', 'B', 10);
$html = '<div><b>Total Value of Assets </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 73, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>10.  </b>    Add together <b>Item Numbers 4., 5.b.</b>, and<b> 9.</b> and enter the<br>  &nbsp; &nbsp; &nbsp; 
number here.</div>';
$pdf->writeHTMLCell(90, 7, 12, 79, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 48, 88, 'TOTAL :', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 65, 88, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_together_item_number4_5_9', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 88);

//..........

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
Information, Declaration, Certification, and
Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 100, $html, 1, 1, true, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-864
Instructions before completing this part.</div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', 'BI', 12);
$html = '<div>Sponsor\'s Contract</div>';
$pdf->writeHTMLCell(90, 7, 13, 131.5, $html, 0, 1, true, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2); // cell height
$html = '<div>Please note that, by signing this Form I-864, you agree to
assume certain specific obligations under the Immigration and
Nationality Act (INA) and other Federal laws. The following
paragraphs describe those obligations. Please read the
following information carefully before you sign Form I-864. If
you do not understand the obligations, you may wish to consult
an attorney or accredited representative.</div>';
$pdf->writeHTMLCell(92, 7, 12, 139, $html, 0, 1, false, true, 'L', true);

$html = '<div><b>What is the Legal Effect of My Signing Form I-864? </b><br></div>';
$pdf->writeHTMLCell(92, 7, 12, 172, $html, 0, 1, false, true, 'L', true);

$html = '<div>
If you sign Form I-864 on behalf of any person (called the
intending immigrant) who is applying for an immigrant visa or
for adjustment of status to a lawful permanent resident, and that
intending immigrant submits Form I-864 to the U.S.
Government with his or her application for an immigrant visa or
adjustment of status, under INA section 213A, these actions
create a contract between you and the U.S. Government. The
intending immigrant becoming a lawful permanent resident is
he consideration for the contract.</div>';
$pdf->writeHTMLCell(92, 7, 12, 178, $html, 0, 1, false, true, 'L', true);



$html = '<div>
Under this contract, you agree that, in deciding whether the
intending immigrant can establish that he or she is not
inadmissible to the United States as a person likely to become a
public charge, the U.S. Government can consider your income
and assets as available for the support of the intending
immigrant.</div>';
$pdf->writeHTMLCell(92, 7, 12, 221, $html, 0, 1, false, true, 'L', true);

//......page 6 left side end 

$pdf->SetFont('times', '', 10);
$html = '<div><b>What If I Choose Not to Sign Form I-864?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 47, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>The U.S. Government cannot make you sign Form I-864 if you
do not want to do so. But if you do not sign Form I-864, the
intending immigrant may not become a lawful permanent
resident in the United States.</div>';
$pdf->writeHTMLCell(92, 7, 112, 53, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div><b>What Does Signing Form I-864 Require Me To Do?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 73, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>If an intending immigrant becomes a lawful permanent resident
in the United States based on a Form I-864 that you have
signed, then, until your obligations under Form I-864 terminate,
you must:</div>';
$pdf->writeHTMLCell(92, 7, 112, 80, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(92, 7, 117, 100, 'A.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(92, 7, 117, 135, 'B.', 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>Provide the intending immigrant any support
necessary to maintain him or her at an income that is
at least 125 percent of the Federal Poverty Guidelines
for his or her household size (100 percent if you are
the petitioning sponsor and are on active duty in the
U.S. Armed Forces or U.S. Coast Guard, and the
person is your husband, wife, or unmarried child
under 21 years of age): and</div>';
$pdf->writeHTMLCell(78, 7, 124, 100, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>Notify U.S. Citizenship and Immigration Services
(USCIS) of any change in your address, within 30
days of the change, by filing Form I-865.</div>';
$pdf->writeHTMLCell(78, 7, 124, 135, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div><b>What Other Consequences Are There?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 150, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>If an intending immigrant becomes a lawful permanent resident
in the United States based on a Form I-864 that you have
signed, then, until your obligations under Form I-864 terminate,
the U.S. Government may consider (deem) your income and
assets as available to that person, in determining whether he or
she is eligible for certain Federal means-tested public benefits
and also for state or local means-tested public benefits, if the
state or local government/s rules provide for consideration
(deeming) of your income and assets as available to the person.</div>';
$pdf->writeHTMLCell(92, 7, 112, 156, $html, 0, 1, false, true, 'L', true);

//...........


$pdf->SetFont('times', '', 10);
$html = '<div>This provision does <b>not</b> apply to public benefits specified in
section 403(c) of the Welfare Reform Act such as emergency
Medicaid, short-term, non-cash emergency relief; services
provided under the National School Lunch and Child Nutrition
Acts; immunizations and testing and treatment for
communicable diseases; and means-tested programs under the
Elementary and Secondary Education Act. </div>';
$pdf->writeHTMLCell(92, 7, 112, 197, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>What If I Do Not Fulfill My Obligations?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 229, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>If you do not provide sufficient support to the person who
becomes a lawful permanent resident based on a Form I-864
that you signed, that person may sue you for this support.</div>';
$pdf->writeHTMLCell(92, 7, 112, 236, $html, 0, 1, false, true, 'L', true);


/********************************
 ******** End Page No 6 **********
 *********************************/

/********************************
 ******** Start Page No 7 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); // page number 7

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
Information, Declaration, Certification, and
Signature</b>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>If a Federal, state, local, or private agency provided any covered
means-tested public benefit to the person who becomes a lawful
permanent resident based on a Form I-864 that you signed, the
agency may ask you to reimburse them for the amount of the
benefits they provided. If you do not make the reimbursement,
the agency may sue you for the amount that the agency believes
you owe.</div>';
$pdf->writeHTMLCell(92, 7, 12, 35, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html = '<div>If you are sued, and the court enters a judgment against you, the
person or agency that sued you may use any legally permitted
procedures for enforcing or collecting the judgment. You may
also be required to pay the costs of collection, including
attorney fees.</div>';
$pdf->writeHTMLCell(92, 7, 12, 67, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html = '<div>If you do not file a properly completed Form I-865 within 30
days of any change of address, USCIS may impose a civil fine
for your failing to do so.</div>';
$pdf->writeHTMLCell(92, 7, 12, 90, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div><b>When Will These Obligations End?</b></div>';
$pdf->writeHTMLCell(92, 7, 12, 104, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html = '<div>Your obligations under a Form I-864 that you signed will end if
the person who becomes a lawful permanent resident based on
that affidavit:</div>';
$pdf->writeHTMLCell(92, 7, 12, 110, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 16, 125, 'A.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 16, 133, 'B.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 16, 143, 'C.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 16, 153, 'D.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 16, 168, 'E.', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Becomes a U.S. citizen;</div>';
$pdf->writeHTMLCell(90, 7, 22, 125, $html, 0, 1, false, true, 'L', true);


$html = '<div>Has worked, or can receive credit for, 40 quarters of
coverage under the Social Security Act;</div>';
$pdf->writeHTMLCell(85, 7, 22, 133, $html, 0, 1, false, true, 'L', true);


$html = '<div>No longer has lawful permanent resident status and
has departed the United States;</div>';
$pdf->writeHTMLCell(90, 7, 22, 143, $html, 0, 1, false, true, 'L', true);


$html = '<div>Is subject to removal, but applies for and obtains, in
removal proceedings, a new grant of adjustment of
status, based on a new affidavit of support, if one is
required; or</div>';
$pdf->writeHTMLCell(85, 7, 22, 153, $html, 0, 1, false, true, 'L', true);
$html = '<div>Dies.</div>';
$pdf->writeHTMLCell(90, 7, 22, 168, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Divorce <b>does not</b> terminate your obligations under
Form I-864.</div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Your obligations under a Form I-864 that you signed also end if
you die. Therefore, if you die, your estate is not required to <br>
take responsibility for the person\'s support after your death. <br>
However, your estate may owe any support that you<br>
accumulated before you died.</div>';
$pdf->writeHTMLCell(93, 7, 12, 184, $html, 0, 1, false, true, 'L', true);
//..........
$pdf->setCellHeightRatio(1);
$pdf->SetFont('times', 'BI', 12);
$pdf->setCellPaddings(1, 0.5, 0, 0);
$html = '<div>Sponsor\'s Statement</div>';
$pdf->writeHTMLCell(92, 6, 12, 208, $html, 0, 1, true, true, 'L', true);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b>
If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 214.4, $html, 0, 1, false, true, 'L', true);


if (showData('sponsor_statement_english_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>1.a    </b>    <input type="checkbox" name="sponsor_1a" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 225, $html, 0, 1, false, true, 'L', true);

$html = '<div>I can read and understand English, and I have read<br>
and understand every question and instruction on this
affidavit and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 24, 225, $html, 0, 1, false, true, 'L', true);

//..........page 7 left side end ..
if (showData('sponsor_statement_interpreter_named_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>1.b    </b>    <input type="checkbox" name="sponsor_1b" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(80, 7, 112, 16, $html, 0, 1, false, true, 'L', true);

$html = '<div>The interpreter named in <b>Part 9.</b> read to me every
question and instruction on this affidavit and my
answer to every question in <br><br><br>
a language in which I am fluent, and I understood everything.
</div>';
$pdf->writeHTMLCell(80, 1, 124, 16, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('the_interpreter_named', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 31);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(80, 1, 203, 32.5, ',', 0, 1, false, true, 'L', true); // comma 1
$pdf->writeHTMLCell(80, 1, 203, 53, ',', 0, 1, false, true, 'L', true); // comma 2

//...........

$pdf->SetFont('times', '', 10);
if (showData('sponsor_statement_preparer_named_status') == 'Y') $checked = 'checked';
else $checked = '';
$html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="sponsor_1c" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(80, 1, 112, 46, $html, 0, 1, false, true, 'L', true);

$html = '<div>At my request, the preparer named in <b>Part 10.</b>, <br><br><br>
prepared this affidavit for me based only upon
nformation I provided or authorized.
</div>';
$pdf->writeHTMLCell(80, 1, 124, 46, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('at_my_request_preparer_name', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 52);
$pdf->setCellHeightRatio(1);
$pdf->SetFont('times', 'BI', 12);
$pdf->setCellPaddings(1, 0.5, 0, 0);
$html = '<div>Sponsor\'s Contact Information</div>';
$pdf->writeHTMLCell(92, 6, 112, 70, $html, 0, 1, true, true, 'L', true);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.    </b>     Sponsor\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 1, 112, 76, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_daytime_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 81.5);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.    </b>     Sponsor\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 1, 112, 88, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mobile_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 93.5);

//...............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.    </b>     Sponsor\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 1, 112, 101, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 106.5);

//........
$pdf->setCellHeightRatio(1);
$pdf->SetFont('times', 'BI', 12);
$pdf->setCellPaddings(1, 0.5, 0, 0);
$html = '<div>Sponsor\'s Declaration and Certification</div>';
$pdf->writeHTMLCell(92, 6, 112, 116, $html, 0, 1, true, true, 'L', true);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->SetFont('times', '', 10);
$html = '<div>Copies of any documents I have submitted are exact
photocopies of unaltered, original documents, and I understand
that USCIS or the U.S. Department of State (DOS) may require
that I submit original documents to USCIS or DOS at a later
late. Furthermore, I authorize the release of any information
from any and all of my records that USCIS or DOS may need to
determine my eligibility for the benefit that I seek.</div>';
$pdf->writeHTMLCell(92, 1, 112, 122, $html, 0, 1, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html = '<div>I furthermore authorize release of information contained in this
affidavit, in supporting documents, and in my USCIS or DOS
records, to other entities and persons where necessary for the
administration and enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(92, 1, 112, 153.7, $html, 0, 1, false, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html = '<div>I certify, under penalty of perjury, that all of the information in
my affidavit and any document submitted with it were provided
or authorized by me, that I reviewed and understand all of the
information contained in, and submitted with, my affidavit and
that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(92, 1, 112, 172.6, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 1, 116, 195, 'A.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 1, 116, 205, 'B.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 1, 116, 236, 'C.', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>I know the contents of this affidavit of support that I
signed;</div>';
$pdf->writeHTMLCell(80, 1, 122, 195, $html, 0, 1, false, true, 'L', true);


$html = '<div>I have read and I understand each of the obligations<br>
described in <b>Part 8</b>., and I agree, freely and without<br>
any mental reservation or purpose of evasion, to<br>
accept each of those obligations in order to make it<br>
possible for the immigrants indicated in <b>Part 3</b>. to<br>
become lawful permanent residents of the United
States;</div>';
$pdf->writeHTMLCell(80, 1, 122, 205, $html, 0, 1, false, true, 'L', true);

$html = '<div>I agree to submit to the personal jurisdiction of any
Federal or state court that has subject matter
jurisdiction of a lawsuit against me to enforce my
obligations under this Form I-864;</div>';
$pdf->writeHTMLCell(80, 1, 122, 236, $html, 0, 1, false, true, 'L', true);




/********************************
 ******** End Page No 7 **********
 *********************************/

/********************************
 ******** Start Page No 8 ********
 *********************************/


$pdf->AddPage('P', 'LETTER'); // page number 8

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
Information, Declaration, Certification, and
Signature</b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L', true);

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 19, 34,  'D.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 19, 52, 'E.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 19, 75, 'F.', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Each of the Federal income tax returns submitted in<br>
support of this affidavit are true copies, or are<br>
unaltered tax transcripts, of the tax returns I filed<br>
with the IRS; </div>';
$pdf->writeHTMLCell(80, 7, 27, 34, $html, 0, 1, false, true, 'L', true);


$html = '<div>I understand that, if I am related to the sponsored<br>
immigrant by marriage, the termination of the<br>
marriage (by divorce, dissolution, annulment, or<br>
other legal process) will not relieve me of my<br>
obligations under this Form I-864; and</div>';
$pdf->writeHTMLCell(80, 7, 27, 52, $html, 0, 1, false, true, 'L', true);


$html = '<div>I authorize the Social Security Administration to<br>
release information about me in its records to<br>
USCIS and DOS.</div>';
$pdf->writeHTMLCell(80, 7, 27, 75, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', 'BI', 12);
$html = '<div> Sponsor\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 92, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.      </b>      Sponsor\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 100, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(81.5, 7, 21.5, 106, '', 1, 1, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.   </b>     Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 116, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_signature_date', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 72, 116);


$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE TO ALL SPONSORS: </b>If you do not completely fill
out this affidavit or fail to submit required documents listed in
the Instructions, USCIS or DOS may deny your affidavit.</div>';
$pdf->writeHTMLCell(90, 7, 12, 124, $html, 0, 1, false, true, 'L', true);

//..............


$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 9. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 142, $html, 1, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(90, 7, 12, 156, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'BI', 12);
$html = '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 164, $html, 0, 1, true, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.    </b>     Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 12, 172, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_last_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 177.5);


//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.    </b>      Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(80, 7, 12, 185, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_given_first_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 190.5);


//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.       </b>    &nbsp;&nbsp;      Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 197, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_business_org_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 202.5);



//.........page 8 left side end ..


$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Interpreters\'s Mailing Address </b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 1, true, true, 'L', true);
//...............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp;and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 24, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name_number', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 143, 26);

//...........

$pdf->SetFont('times', '', 10); // set font
if (showData('i_864_interpreter_address_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('i_864_interpreter_address_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('i_864_interpreter_address_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$html = '<div><b>3.b. </b>&nbsp;<input type="checkbox" name="physical_apt2" value="Apt" checked="' . $checked_apt . '" />Apt. &nbsp;&nbsp;<input type="checkbox" name="physical_ste2" value="Ste" checked="' . $checked_ste . '" />Ste. <input type="checkbox" name="physical_flr2" value="Flr" checked="' . $checked_flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 35, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  164, 35);


//......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.c. </b>&nbsp;&nbsp;City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 44, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_city_town', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 143, 44);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.d.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 53, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="interpreter_mailing_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 52, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.e.</b>&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 144, 53, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_zipcode', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 53);

//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 62, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_province', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 141, 62);
//...............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 112, 71, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_postal_code', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 141, 71);

//........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 78, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 84);

//.............

$pdf->SetFont('times', 'BI', 12);
$html = '<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(92, 7, 112, 94, $html, 0, 1, true, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html = '<div><b>4.    </b>     Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 112, 102, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_daytime_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 107.5);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.    </b>     Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 115, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mobile_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 120.5);

//...............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.    </b>     Interpreter\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 128, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 133.5);
//.........

$pdf->SetFont('times', 'BI', 12);
$html = '<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(92, 7, 113, 144, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(80, 7, 112, 152, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certification', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 159);


$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.4);
$html = '<div>I am fluent in English and<br>
which is the same language specified in <b>Part 8., Item Number
1.b.</b>, and I have read to this sponsor in the identified language
every question and instruction on this affidavit and his or her
answer to every question. The sponsor informed me that he or
she understands every instruction, question, and answer on the
affidavit, including the <b>Sponsor\'s Declaration and
Certification</b>, and has verified the accuracy of every answer.
</div>';
$pdf->writeHTMLCell(92, 7, 112, 159, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', 'BI', 12);
$pdf->setCellHeightRatio(1.1);
$html = '<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 113, 203, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.      </b>       Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 112, 210, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(84, 7, 121, 216, '', 1, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.      </b>       Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 225, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_date_of_signature', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 225);


/********************************
 ******** End Page No 10 **********
 *********************************/

/********************************
 ******** Start Page No 11 ********
 *********************************/

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


/********************************
 ******** End Page No 11 **********
 *********************************/

/********************************
 ******** Start Page No 12 ********
 *********************************/
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

    'mailing_address_care_of_name':' " . showData('information_about_you_us_mailing_care_of_name') . " ',
    'mailing_address_street_name_number':' " . showData('information_about_you_us_mailing_street_number') . " ',
    'mailing_address_apt_ste_flr':' " . showData('information_about_you_us_mailing_apt_ste_flr_value') . " ',
    'mailing_address_city_town':' " . showData('information_about_you_us_mailing_city_town') . " ',
    'mailing_address_state':' " . showData('information_about_you_us_mailing_city_town') . " ',
    'mailing_address_zipcode':' " . showData('information_about_you_us_mailing_zip_code') . " ',
    'mailing_address_province':' " . showData('information_about_you_us_mailing_province') . " ',
    'mailing_address_postal_code':' " . showData('information_about_you_us_mailing_postal_code') . " ',
    'mailing_address_country':' " . showData('information_about_you_us_mailing_country') . " ',

    'other_information_cityzen_or_nationality':' " . showData('other_information_about_you_country_of_citizen') . " ',
    'other_information_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . " ',
    'other_information_alien_number':' " . showData('other_information_about_you_alien_registration_number') . " ',
    'other_information_uscis_online_number':' " . showData('other_information_about_you_uscis_online_account_number') . " ',
    'other_information_daytime_telephone':' " . showData('information_about_you_daytime_tel') . " ',
//page 1 end.....
    'family_member1_las_tname':' " . showData('sponsor_family_member1_family_last_name') . " ',
    'family_member1_first_name':' " . showData('sponsor_family_member1_given_first_name') . " ',
    'family_member1_middle_name':' " . showData('sponsor_family_member1_middle_name') . " ',
    'family_member1_relation_to_immigrant':' " . showData('sponsor_family_member1_relationship') . " ',
    'family_member1_date_of_birth':' " . showData('sponsor_family_member1_date_of_birth') . " ',
    'family_member1_alien_number':' " . showData('sponsor_family_member1_a_number') . " ',
    'family_member1_uscis_online_account':' " . showData('sponsor_family_member1_uscis_online_account_number') . " ',

    'family_member2_las_tname':' " . showData('sponsor_family_member2_family_last_name') . " ',
    'family_member2_first_name':' " . showData('sponsor_family_member2_given_first_name') . " ',
    'family_member2_middle_name':' " . showData('sponsor_family_member2_middle_name') . " ',
    'family_member2_relation_to_immigrant':' " . showData('sponsor_family_member2_relationship') . " ',
    'family_member2_date_of_birth':' " . showData('sponsor_family_member2_date_of_birth') . " ',
    'family_member2_alien_number':' " . showData('sponsor_family_member2_a_number') . " ',
    'family_member2_uscis_online_account':' " . showData('sponsor_family_member2_uscis_online_account_number') . " ',

    'family_member3_las_tname':' " . showData('sponsor_family_member3_family_last_name') . " ',
    'family_member3_first_name':' " . showData('sponsor_family_member3_given_first_name') . " ',
    'family_member3_middle_name':' " . showData('sponsor_family_member3_middle_name') . " ',
    'family_member3_relation_to_immigrant':' " . showData('sponsor_family_member3_relationship') . " ',
    'family_member3_date_of_birth':' " . showData('sponsor_family_member3_date_of_birth') . " ',
    'family_member3_alien_number':' " . showData('sponsor_family_member3_a_number') . " ',
    'family_member3_uscis_online_account':' " . showData('sponsor_family_member3_uscis_online_account_number') . " ',

    'family_member4_las_tname':' " . showData('sponsor_family_member4_family_last_name') . " ',
    'family_member4_first_name':' " . showData('sponsor_family_member4_given_first_name') . " ',
    'family_member4_middle_name':' " . showData('sponsor_family_member4_middle_name') . " ',
    'family_member4_relation_to_immigrant':' " . showData('sponsor_family_member4_relationship') . " ',
    'family_member4_date_of_birth':' " . showData('sponsor_family_member4_date_of_birth') . " ',
    'family_member4_alien_number':' " . showData('sponsor_family_member4_a_number') . " ',
    'family_member4_uscis_online_account':' " . showData('sponsor_family_member4_uscis_online_account_number') . " ',

    'family_member5_las_tname':' " . showData('sponsor_family_member5_family_last_name') . " ',
    'family_member5_first_name':' " . showData('sponsor_family_member5_given_first_name') . " ',
    'family_member5_middle_name':' " . showData('sponsor_family_member5_middle_name') . " ',
    'family_member5_relation_to_immigrant':' " . showData('sponsor_family_member5_relationship') . " ',
    'family_member5_date_of_birth':' " . showData('sponsor_family_member5_date_of_birth') . " ',
    'family_member5_alien_number':' " . showData('sponsor_family_member5_a_number') . " ',
    'family_member5_uscis_online_account':' " . showData('sponsor_family_member5_uscis_online_account_number') . " ',

//page 2 end....... 

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

//page 3 end.........    
    
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
