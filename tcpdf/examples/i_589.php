<?php

// require_once('formheader.php');   //database connection file 

require_once("localconfig.php");//local db file -->

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

      if ($this->page != 1) {
         $this->Cell(191, 2, '', $header_top_border, 1, 1);
      }

      if ($this->page >= 1 && $this->page < 11) {
         $this->SetFont('times', '', 8);
         $this->MultiCell(59, 10, 'Form  I-589  Edition 03/01/23', 0, 'L', 0, 1, 13.5, 264.5, true);
      }


      if ($this->page == 11) {
         $this->SetFont('times', '', 8);
         $this->MultiCell(59, 10, 'Form I-589   Supplement  A   Edition 03/01/23', 0, 'L', 0, 1, 13, 264.5, true);
      }

      if ($this->page == 12) {
         $this->SetFont('times', '', 8);
         $this->MultiCell(59, 10, 'Form I-589   Supplement B Edition 03/01/23', 0, 'L', 0, 1, 13, 264.5, true);
      }

      // Page number
      if ($this->page < 10) {
         $this->MultiCell(59, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages() , 0, 'R', 0, 1, 152.5, 264.5, true);
      }
      if ($this->page >= 10) {
         $this->MultiCell(59, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages() , 0, 'R', 0, 1, 151.5, 264.5, true);
      }
      $barcode_image = "images/i589/I-589-footer-pdf417-$this->page.png";
      $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

   }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-589');

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
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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



//!old header 

// $pdf->SetFont('times', 'B', 9);   // set font
// $pdf->MultiCell(80, 1, "Department of Homeland Security", 0, 'L', 0, 1, 12, 8, true);

// $pdf->SetFont('times', '', 9);   // set font
// $pdf->MultiCell(80, 1, "U.S. Citizenship and Immigration Services", 0, 'L', 0, 1, 12, 12, true);

// $pdf->SetFont('times', 'B', 9);   // set font
// $pdf->MultiCell(80, 1, "U.S. Department of Justice", 0, 'L', 0, 1, 12, 18, true);

// $pdf->SetFont('times', '', 9);   // set font
// $pdf->MultiCell(80, 1, "Executive Office for Immigration Review", 0, 'L', 0, 1, 12, 22, true);




// $pdf->SetFont('times', '', 9);   // set font
// $pdf->MultiCell(80, 1, "OMB No. 1615-0067; Expires 06/30/2026", 0, 'R', 0, 1, 124, 8, true);





// $pdf->SetFont('times', 'B', 14);   // set font
// $pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
// $pdf->MultiCell(80, 1, "I-589, Application for Asylum and for Withholding of Removal", 0, 'R', 0, 1, 129, 13, true);

// $pdf->Ln(1.3);

// $top_border = array(
//    'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
// );
// $pdf->Cell(188.5, 0, '', $top_border, 1, 1);


// $pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
// $pdf->SetLineWidth(0.1); // set border width
// $pdf->SetDrawColor(0, 0, 0); // set color for cell border
// $pdf->SetFillColor(255, 255, 255); // set filling color
// $pdf->setCellHeightRatio(1.1); // set cell height ratio
// $pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 29.65, false, 'T', 'C');
//!old header 

// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 12, 19, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);    // set font
$pdf->MultiCell(120, 15, "Application for Asylum and for
Withholding of Removal ", 0, 'C', 0, 1, 48, 5, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-589", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 15, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 20, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0067\nExpires 09/30/2027", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(3.2); // 5mm নিচে সরানো

$top_border = array(
    'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);

$pdf->Cell(188.5, 0, '', $top_border, 1, 1);



$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 32.65, false, 'T', 'C');




// ...........

$pdf->SetFont('times', 'B', 9.5);   // set font

$pdf->MultiCell(190, 1, "START HERE - Type or print in black ink. See the instructions for information about eligibility and how to complete and file this application. There is no filing fee for this application.", 0, 'L', 0, 1, 12, 33, true);

$pdf->SetFont('times', '', 9.5);
if (showData('i_589_holding_of_removal_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b>NOTE: </b>  <input type="checkbox" name="notice" value="N" checked="' . $checked . '"/> Check this box if you also want to apply for withholding of removal under the Convention Against Torture.</div>';
$pdf->writeHTMLCell(190, 1, 12, 42.5, $html, 0, 1, false, false, 'L', true);
// //...........

$pdf->SetFillColor(220, 220, 220);
$pdf->writeHTMLCell(189.6, 1, 13, 48, "", "T", 1, false, true, 'C', true);
$pdf->writeHTMLCell(189.6, 1, 13, 248.9, "", "B", 1, false, true, 'C', true);

$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(189, 3, 13.3, 48.2, "Part A.I. Information About You", "B", 1, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div><b>1. </b> Alien Registration Number(s) (A-Number) <i>(if any) </i></div>';
$pdf->writeHTMLCell(100, 1, 13, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_alien_registration_number', 70, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_alien_registration_number')), 13, 59);
$pdf->writeHTMLCell(1, 10, 82, 55, "", "R", 1, false, true, 'C', true);  //verticale line | .
//..............

$pdf->SetFont('times', '', 9);
$html = '<div><b>2. </b> U.S. Social Security Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 1, 59, 54, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_us_social_security_number', 53, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_social_security_number')), 83, 59);
$pdf->writeHTMLCell(1, 10, 135, 55, "", "R", 1, false, true, 'C', true);  //verticale line | .

//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3. </b> USCIS Online Account Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 1, 115, 54, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_uscis_online_account_number', 66.3, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_uscis_online_account_number')), 136, 59);

$pdf->writeHTMLCell(189.6, 1, 13, 65, "", "T", 1, false, true, 'C', true);  // 1,2,3.end

//..................


$pdf->SetFont('times', '', 9);
$html = '<div><b>4. </b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 1, 13, 64, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_complete_lastname', 77, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_family_last_name')), 13, 69);
$pdf->writeHTMLCell(1, 10, 89, 65, "", "R", 1, false, true, 'C', true);  //verticale line | .
//..............

$pdf->SetFont('times', '', 9);
$html = '<div><b>5. </b>  First Name </div>';
$pdf->writeHTMLCell(100, 1, 50, 64, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_first_name', 52, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_given_first_name')), 90, 69);
$pdf->writeHTMLCell(1, 10, 141, 65, "", "R", 1, false, true, 'C', true);  //verticale line | .

//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>6. </b> Middle Name</div>';
$pdf->writeHTMLCell(100, 1, 103, 64, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_middle_name', 60.6, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_middle_name')), 142, 69);

$pdf->writeHTMLCell(189.6, 1, 13, 69, "", "B", 1, false, true, 'C', true);  // 4,5,6 .end
//.......
$pdf->SetFont('times', '', 9);
$html = '<div><b>7. </b> What other names have you used <i>(include maiden name and aliases)?</i></div>';
$pdf->writeHTMLCell(100, 1, 13, 74, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_other_name_used', 189.5, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_other_names')), 13, 79);
$pdf->writeHTMLCell(189.6, 1, 13, 79, "", "B", 1, false, true, 'C', true);  // 7 .end
//...........
$pdf->SetFont('times', '', 9);
$html = '<div><b>8. </b> Residence in the U.S. <i>(where you physically reside)</i></div>';
$pdf->writeHTMLCell(100, 1, 13, 84, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(189.6, 1, 13, 85, "", "B", 1, false, true, 'C', true);  // 7 horizontal line .end

//...........
$pdf->SetFont('times', '', 8.7);
$html = '<div> Street Number and Name </div>';
$pdf->writeHTMLCell(100, 1, 13, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_street_number_name', 130, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_us_mailing_street_number')), 13, 94);
//..........
$pdf->SetFont('times', '', 8.7);
$html = '<div> Apt. Number </div>';
$pdf->writeHTMLCell(100, 1, 143, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_apt_number', 59.4, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_us_mailing_apt_ste_flr_value')), 143, 94);

$pdf->writeHTMLCell(1, 9, 142, 91, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(189.6, 1, 13, 94, "", "B", 1, false, true, 'C', true);  // 8 horizontal line .end
//...............

$pdf->SetFont('times', '', 8.7);
$html = '<div> City </div>';
$pdf->writeHTMLCell(100, 1, 13, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_city', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_us_mailing_city_town')), 13, 103);
//..........
$pdf->SetFont('times', '', 8.7);
$html = '<div> State </div>';
$pdf->writeHTMLCell(100, 1, 67, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_state', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_us_mailing_state')), 68, 103);
//............
$pdf->SetFont('times', '', 8.7);
$html = '<div> Zip Code </div>';
$pdf->writeHTMLCell(100, 1, 117, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_zipcode', 32, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_us_mailing_zip_code')), 118, 103);
//.............

$pdf->SetFont('times', '', 8.7);
$html = '<div> Telephone Number <br> (  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  )</div>';
$pdf->writeHTMLCell(100, 1, 149, 99, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_telephone_code', 10, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_phone_value1')), 152, 103);
$pdf->TextField('a_i_residence_telephone_number', 37.8, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_phone_value2')), 165, 103);
// ............
// 
$pdf->writeHTMLCell(1, 9, 67, 100, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(1, 9, 117, 100, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(1, 9, 149, 100, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(189.6, 1, 13, 103, "", "B", 1, false, true, 'C', true);

$pdf->writeHTMLCell(189.6, 1, 13, 107, "", "B", 1, false, true, 'C', true);
$pdf->writeHTMLCell(189.6, 60, 13, 48, "", "L", 1, false, true, 'C', true);
$pdf->writeHTMLCell(189.6, 60, 13, 108, "", "L", 1, false, true, 'C', true);
$pdf->writeHTMLCell(189.6, 60, 13, 168, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(189.6, 60, 202.5, 48, "", "L", 1, false, true, 'C', true);
$pdf->writeHTMLCell(189.6, 60, 202.5, 108, "", "L", 1, false, true, 'C', true);
$pdf->writeHTMLCell(189.6, 60, 202.5, 168, "", "L", 1, false, true, 'C', true);

// ..............20
$pdf->SetFont('times', '', 8.7);
$html = '<div><b>(NOTE</b>: <i>You must be residing in the United States to submit this form.</i>)
</div>';
$pdf->writeHTMLCell(100, 4, 13, 107.8, $html, 0, 1, false, true, 'L', true);
//...............

$pdf->SetFont('times', '', 9);
$html = '<div><b>9. </b>Mailing Address in the U.S. <i>(if different than the address in Item Number 8)</i></div>';
$pdf->writeHTMLCell(120, 4, 13, 113, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(189.6, 1, 13, 113, "", "B", 1, false, true, 'C', true);  //9 horizontal line .end
// //...........

$pdf->SetFont('times', '', 9);
$html = '<div> In Care Of <i>(if applicable):</i> </div>';
$pdf->writeHTMLCell(100, 4, 13, 117, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_in_care_of', 130, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_mailing_care_of_name')), 13, 122);
// //.............
$pdf->SetFont('times', '', 9);
$html = '<div> Telephone Number <br> (  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  )</div>';
$pdf->writeHTMLCell(100, 4, 143, 117, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_telephone_code', 10, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_phone2_value1')), 146, 122);
$pdf->TextField('a_i_mailing_telephone_number', 44.7, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_phone2_value2')), 158, 122);
//............

$pdf->writeHTMLCell(1, 9, 142, 119, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(189.6, 1, 13, 122, "", "B", 1, false, true, 'C', true);  // 9 horizontal line .end
// //...............

$pdf->SetFont('times', '', 9);
$html = '<div> Street Number and Name </div>';
$pdf->writeHTMLCell(100, 4, 13, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_street_number_name', 130, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_mailing_street_number')), 13, 131);
// //..........
$pdf->SetFont('times', '', 9);
$html = '<div> Apt. Number </div>';
$pdf->writeHTMLCell(100, 4, 143, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_apt_number', 59.7, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_mailing_apt_ste_flr_value')), 142.8, 131);
$pdf->writeHTMLCell(1, 9, 142, 128, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(189.6, 1, 13, 131, "", "B", 1, false, true, 'C', true);  // 9 horizontal line .end
// //...........

$pdf->SetFont('times', '', 9);
$html = '<div> City </div>';
$pdf->writeHTMLCell(100, 4, 13, 137, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_city', 68, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_mailing_city_town')), 13, 141.4);
// //..........
$pdf->SetFont('times', '', 9);
$html = '<div> State </div>';
$pdf->writeHTMLCell(100, 4, 80, 137, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_state', 62, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_mailing_state')), 81, 141.4);
// //............
$pdf->SetFont('times', '', 9);
$html = '<div> Zip Code </div>';
$pdf->writeHTMLCell(100, 4, 143, 137, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_zipcode', 59.9, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('information_about_you_mailing_zip_code')), 143, 141.4);
// //.............
$pdf->writeHTMLCell(1,11, 142, 137, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(1,11, 80, 137, "", "R", 1, false, true, 'C', true);  //verticale line | .
$pdf->writeHTMLCell(1,11, 70, 148, "", "R", 1, false, true, 'C', true);  
$pdf->writeHTMLCell(189.6, 1, 13, 142, "", "B", 1, false, true, 'C', true);  // 9 horizontal line .end

// //...........

$pdf->SetFont('times', '', 10);
if (showData('other_information_about_you_gender') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('other_information_about_you_gender') == "female") $checked_female = "checked";
else $checked_female = "";

$html = '<div><b>10.  </b> Gender:  <input type="checkbox" name="gender" value="male" checked="' . $checked_male . '" />    Male   <input type="checkbox" name="gender" value="female" checked="' . $checked_female . '" /> Female </div>';
$pdf->writeHTMLCell(100, 4, 13, 149, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
if (showData('other_information_about_you_marital_status') == "single") $checked_single = "checked";
else $checked_single = "";
if (showData('other_information_about_you_marital_status') == "married") $checked_married = "checked";
else $checked_married = "";
if (showData('other_information_about_you_marital_status') == "divorced") $checked_divorce = "checked";
else $checked_divorce = "";
if (showData('other_information_about_you_marital_status') == "widowed") $checked_widowed = "checked";
else $checked_widowed = "";

$html = '<div><b>11.  </b>  Marital Status:&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="marital" value="single"   checked="' . $checked_single . '"/>&nbsp;&nbsp;&nbsp;&nbsp;Single&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="marital" value="married" checked="' . $checked_married . '"/>&nbsp;&nbsp;&nbsp;&nbsp;Married&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="divorced" value="divorced" checked="' . $checked_divorce . '"/>&nbsp;&nbsp;&nbsp;&nbsp;Divorced&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="widowed" value="widowed" checked="' . $checked_widowed . '"/>&nbsp;&nbsp;&nbsp;&nbsp;Widowed</div>';
$pdf->writeHTMLCell(120, 4, 71, 149, $html, 0, 1, false, true, 'L', true);
// //..........


$pdf->writeHTMLCell(189.6, 1, 13, 149, "", "B", 1, false, true, 'C', true);  // 10 horizontal line .end

// //..........


$pdf->SetFont('times', '', 9);
$html = '<div><b>12.  </b>  Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 154.6, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date_of_birth', 58, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_date_of_birth')), 13, 159.5);
// //...........
$pdf->SetFont('times', '', 9);
$html = '<div><b>13.  </b>  City and Country of Birth</div>';
$pdf->writeHTMLCell(120, 4, 71, 154.6, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_country_of_birth', 131.5, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_city_of_birth')), 71, 159.7);

$pdf->writeHTMLCell(1, 15, 70, 151, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(189.6, 1, 13, 160, "", "B", 1, false, true, 'C', true);  // 13 horizontal line .end
// //..........

$pdf->SetFont('times', '', 9);
$html = '<div><b>14.  </b>  Present Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 165.2, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_present_nationality', 58, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_country_of_citizen')), 13, 170);
// //........
$pdf->SetFont('times', '', 9);
$html = '<div><b>15.  </b> Nationality at Birth</div>';
$pdf->writeHTMLCell(120, 4, 71, 165.2, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_nationality_at_birth', 49, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_country_of_birth')), 71, 170);
// //.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>16.  </b>  Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(120, 4, 120, 165.2, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_race_ethnic_tribal', 50, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_race_ethnic')), 119.8, 170);
// //..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>17.  </b> Religion </div>';
$pdf->writeHTMLCell(100, 4, 170, 165.2, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_religion', 32.8, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_information_about_you_religion')), 170, 170);

$pdf->writeHTMLCell(1, 10.3, 70, 166, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(1, 10.3, 119, 166, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(1, 10.3, 169, 166, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(189.6, 1, 13, 170.5, "", "B", 1, false, true, 'C', true);  // 17 horizontal line .end
// //..........

$pdf->SetFont('times', '', 9);
$html = '<div><b>18. </b><i> Check the box, a through c, that applies:</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 175.8, $html, 0, 1, false, true, 'L', true);
// //........
$pdf->SetFont('times', '', 9.5);
if (showData('i_589_never_in_imgt_court_proceeding_status') == "Y") $checked_never = "checked";
else $checked_never = "";
if (showData('i_589_am_now_imgt_court_proceeding_status') == "Y") $checked_now = "checked";
else $checked_now = "";
if (showData('i_589_not_now_imgt_court_proceeding_status') == "Y") $checked_not_now = "checked";
else $checked_not_now = "";


$html = '<div><b>a. </b> <input type="checkbox" name="never_been" value="a" checked="' . $checked_never . '"/> I have never been in Immigration Court proceedings.</div>';
$pdf->writeHTMLCell(100, 4, 73.5, 175.8, $html, 0, 1, false, true, 'L', true);
// //.........

$pdf->SetFont('times', '', 9.5);
$html = '<div><b>b. </b> <input type="checkbox" name="iam_now" value="a" checked="' . $checked_now . '"/> I am now in Immigration Court proceedings. </div>';
$pdf->writeHTMLCell(100, 4, 17, 182, $html, 0, 1, false, true, 'L', true);
// //............
$pdf->SetFont('times', '', 9.5);
$html = '<div><b>c. </b> <input type="checkbox" name="iam_not_now" value="a" checked="' . $checked_not_now . '"/> I am <b>not</b> now in Immigration Court proceedings, but I have been in the past.</div>';
$pdf->writeHTMLCell(120, 4, 90, 182, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(189.6, 1, 13, 183, "", "B", 1, false, true, 'C', true);  // 18 horizontal line .end
// //..........

$pdf->SetFont('times', '', 9);
$html = '<div><b>19. </b><i> Complete 19 a through c. </i></div>';
$pdf->writeHTMLCell(100, 4, 13, 188, $html, 0, 1, false, true, 'L', true);
// //........

$pdf->SetFont('times', '', 9);
$html = '<div><b>a. </b> When did you last leave your country? <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(100, 4, 17, 193, $html, 0, 1, false, true, 'L', true);
// //............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_last_leave_country', 20, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_last_leave_country')), 90, 192.3);
$pdf->writeHTMLCell(20, 1, 90, 193, "", "B", 1, false, true, 'C', true);  // 17 horizontal line .end
// //.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>b. </b> What is your current I-94 Number, if any?</div>';
$pdf->writeHTMLCell(100, 4, 115, 193, $html, 0, 1, false, true, 'L', true);
// //............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_current_i-94_number', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_i94_number')), 175, 192.3);
$pdf->writeHTMLCell(25, 1, 175, 193, "", "B", 1, false, true, 'C', true);  // 17 horizontal line .end
// //...........

$pdf->SetFont('times', '', 9);
$html = '<div><b>c. </b>List each entry into the U.S. beginning with your most recent entry.<i> List date (mm/dd/yyyy), place, and your status for each entry. (Attach additional sheets as needed.)</i> </div>';
$pdf->writeHTMLCell(170, 4, 16, 199, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Date</div>';
$pdf->writeHTMLCell(100, 4, 18, 208, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date1', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_date')), 26, 208);
$pdf->writeHTMLCell(25, 1, 26, 208.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end

// //.........
$pdf->SetFont('times', '', 9);
$html = '<div>Date</div>';
$pdf->writeHTMLCell(100, 4, 18, 215, $html, 0, 1, false, true, 'L', true);
// //............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date2', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_date2')), 26, 215);
$pdf->writeHTMLCell(25, 1, 26, 215.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end
// //...........

$pdf->SetFont('times', '', 9);
$html = '<div>Date</div>';
$pdf->writeHTMLCell(100, 4, 18, 222, $html, 0, 1, false, true, 'L', true);
// //............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date3', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_date3')), 26, 222);
$pdf->writeHTMLCell(25, 1, 26, 222.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end
// //..............................

$pdf->SetFont('times', '', 9);
$html = '<div>Place</div>';
$pdf->writeHTMLCell(100, 4, 53, 208, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_place1', 40, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_place')), 62, 208);
$pdf->writeHTMLCell(40, 1, 62, 208.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end

// //.....................

$pdf->SetFont('times', '', 9);
$html = '<div>Place</div>';
$pdf->writeHTMLCell(100, 4, 53, 215, $html, 0, 1, false, true, 'L', true);
// //............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_place2', 40, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_place2')), 62, 215);
$pdf->writeHTMLCell(40, 1, 62, 215.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end
//..............

$pdf->SetFont('times', '', 9);
$html = '<div>Place</div>';
$pdf->writeHTMLCell(100, 4, 53,222, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_place3', 40, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_place3')), 62, 222);
$pdf->writeHTMLCell(40, 1, 62,222.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end

// //..........................................................

//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Status</div>';
$pdf->writeHTMLCell(100, 4, 105, 208, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_status1', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_status')), 115,208);
$pdf->writeHTMLCell(25, 1, 115, 208.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end

//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Status</div>';
$pdf->writeHTMLCell(100, 4, 105, 215, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_status2', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_status2')), 115, 215);
$pdf->writeHTMLCell(25, 1, 115, 215.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end
// //...........

$pdf->SetFont('times', '', 9);
$html = '<div>Status</div>';
$pdf->writeHTMLCell(100, 4, 105, 222, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_status3', 25, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_status3')), 115,222);
$pdf->writeHTMLCell(25, 1, 115, 222.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end

//...........................
$pdf->SetFont('times', '', 9);
$html = '<div>Date Status Expired</div>';
$pdf->writeHTMLCell(100, 4, 142, 208, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date_status_expired', 30, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_most_recent_entry_expires_date')), 170, 208);
$pdf->writeHTMLCell(30, 1, 170, 208.4, "", "B", 1, false, true, 'C', true);  // 19 horizontal line .end
//........
$pdf->writeHTMLCell(189.6, 1, 13, 224, "", "B", 1, false, true, 'C', true);
// //.........


$pdf->SetFont('times', '', 9);
$html = '<div><b>20. </b> What country issued your last passport or travel<br> &nbsp; &nbsp; &nbsp;
document?</div>';
$pdf->writeHTMLCell(80, 4, 13, 229, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_country_issued', 71, 6.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_94_imgt_country_issuance_passport')), 13, 236.6);
//........

$pdf->SetFont('times', '', 9);
$html = '<div><b>21. </b> Passport Number</div>';
$pdf->writeHTMLCell(80, 4, 85, 230, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_passport_number', 54, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_passport_number')), 115, 229.9);
// //........


$pdf->SetFont('times', '', 9);
$html = '<div>Travel Document Number</div>';
$pdf->writeHTMLCell(80, 4, 85, 236, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_travel_document_number', 47, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_travel_document_number')), 122, 236.4);
//........
$pdf->SetFont('times', '', 9);
$html = '<div><b>22. </b> Expiration Date <br>  &nbsp; &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 4, 170, 229, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_expiration_date', 33.4, 6.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('other_information_about_you_expiry_date_issuance_passport')), 169, 236.6);
//........
$pdf->writeHTMLCell(189.6, 1, 13, 237, "", "B", 1, false, true, 'C', true); // horizontal line 

$pdf->writeHTMLCell(1, 13, 83, 230, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(1, 13, 168, 230, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(85, 1, 84, 230.3, "", "B", 1, false, true, 'C', true); // horizontal line 2

//.................

$pdf->SetFont('times', '', 9);
$html = '<div><b>23. </b> What is your native language <i>(include dialect, if applicable)?</i></div>';
$pdf->writeHTMLCell(110, 4, 13, 242, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_is_your_native_language', 86, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_native_language')), 13, 248.2);
//........

$pdf->SetFont('times', '', 9);
if (showData('i_589_fluent_in_english_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_fluent_in_english_status') == "N") $checked_N = "checked";
else $checked_N = "";

$html = '<div><b>24. </b>Are you fluent in English? <br>  &nbsp; &nbsp; &nbsp;  <input type="checkbox" name="fluent_english" value="Y" checked="' . $checked_Y . '"/>  Yes    &nbsp;   <input type="checkbox" name="fluent_english" value="N" checked="' . $checked_N . '" />   No   </div>';
$pdf->writeHTMLCell(100, 4, 99, 242.2, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>25.</b>What other languages do you speak fluently?</div>';
$pdf->writeHTMLCell(100, 4, 140, 242, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_other_language_speak_fluently', 62.8,6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_fluent_other_language')), 139.8, 248.2);
//............
$pdf->writeHTMLCell(1, 11, 98, 243.3, "", "R", 1, false, true, 'C', false);  //verticale line | .
$pdf->writeHTMLCell(1, 11, 138.8, 243.3, "", "R", 1, false, true, 'C', false);  //verticale line | .

$pdf->writeHTMLCell(1, 26.3, 13, 228, "", "L", 1, false, true, 'C', false);
$pdf->writeHTMLCell(1, 26.3, 202.5, 228, "", "L", 1, false, true, 'C', false);

//..................

// $pdf->SetFont('times', '', 9);
// $html = '<div><b>For EOIR use only.</b></div>';
// $pdf->writeHTMLCell(60, 3, 30, 232, $html, 0, 1, false, true, 'L', true);

// $pdf->SetFont('times', '', 9);
// $html = '<div><b>For USCIS use only.</b></div>';
// $pdf->writeHTMLCell(15, 1, 70, 232, $html, 0, 1, false, true, 'C', true);

// $html = '<div><b>Action:</b></div>';
// $pdf->writeHTMLCell(50, 1, 70, 232, $html, 0, 1, false, true, 'C', true);

// $html = '<div><b>Decision:</b></div>';
// $pdf->writeHTMLCell(50, 1, 130, 232, $html, 0, 1, false, true, 'C', true);

// //.............
// $html = '<div>Interview Date: _____________________</div>';
// $pdf->writeHTMLCell(100, 1, 90, 236, $html, 0, 1, false, true, 'L', true);

// $html = '<div>Approval Date: ____________________</div>';
// $pdf->writeHTMLCell(100, 1, 148, 236, $html, 0, 1, false, true, 'L', true);

// $html = '<div>Asylum Officer ID No.: ______________</div>';
// $pdf->writeHTMLCell(100, 1, 90, 242, $html, 0, 1, false, true, 'L', true);

// $html = '<div>Denial Date: ______________________</div>';
// $pdf->writeHTMLCell(100, 1, 148, 242, $html, 0, 1, false, true, 'L', true);

// $html = '<div>Referral Date: _____________________</div>';
// $pdf->writeHTMLCell(100, 1, 148, 248, $html, 0, 1, false, true, 'L', true);

// $pdf->writeHTMLCell(1, 26.3, 13, 228, "", "L", 1, false, true, 'C', false);
// $pdf->writeHTMLCell(1, 21.3, 68, 233, "", "R", 1, false, true, 'C', false);
// $pdf->writeHTMLCell(1, 26.3, 202.5, 228, "", "L", 1, false, true, 'C', false);

/******************************
 ******** End Page No 1 ******
 ******************************/

/******************************
 ******** Start Page No 2 ****
 ******************************/

$pdf->AddPage('P', 'LETTER');  // page number 2
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(191, 5, 13, 17, "Part A.II. Information About Your Spouse and Children", 1, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div><b>Your spouse</b></div>';
$pdf->writeHTMLCell(60, 5, 12, 24, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
if (showData('i_589_not_married_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div> <input type="checkbox" name="not_married" value="Y" checked="' . $checked . '"/>     I am not married. (Skip to <b>Your Children</b> below.)</div>';
$pdf->writeHTMLCell(100, 5, 60, 24, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 92, 13, 55, "", 1, 1, false, false, 'L', true); //table 1 start 
//..........//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_alien_registration_number', 56, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_a_number')), 13, 62);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_passport_idcard_number', 39, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_passport_id_number')), 69, 62);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_of_birth', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_date_of_birth')), 108, 62);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_social_security_number', 54, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_social_security_number')), 149, 62);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 66, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_complete_last_name', 56, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_family_last_name')), 13, 74);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 66, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_firstname', 39, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_given_first_name')), 69, 74);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 66, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_middlename', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_family_middle_name')), 108, 74);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8.</b>  Other names used <i>(include <br> &nbsp; &nbsp; maiden name and aliases) </i></div>';
$pdf->writeHTMLCell(100, 4, 150, 66, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_other_name_used_include_maiden', 54, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_other_name')), 149, 74);

//............
$pdf->writeHTMLCell(190, 1, 13, 56, "", "B", 1, false, false, 'L', true);
$pdf->writeHTMLCell(1, 33, 68, 55, "", "R", 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 24, 107, 55, "", "R", 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 24, 148, 55, "", "R", 1, false, true, 'L', true);
//.............
$pdf->writeHTMLCell(190, 1, 13, 73, "", "B", 1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>9.</b> Date of Marriage <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_of_marriage', 56, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_date_of_marriage')), 13, 83);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10.</b> Place of Marriage</div>';
$pdf->writeHTMLCell(100, 4, 70, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_place_of_mariage', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_marriage_place_country')), 69, 83);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>11.</b> City and Country of Birth </div>';
$pdf->writeHTMLCell(100, 4, 120, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_city_country_birth', 82, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('current_spouse_birth_place_country')), 121, 83);
//............

$pdf->writeHTMLCell(1, 9, 120, 79, "", "R", 1, false, true, 'L', true);
//.............
$pdf->writeHTMLCell(190, 1, 13, 82, "", "B", 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html = '<div><b>12.</b>  Nationality  <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 87, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_nationality_citizenship', 65, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_nationality')), 13, 92);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>13. </b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 78, 87, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_race_ethnic_tribal_group', 66, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_race_ethnic')), 78, 92);
//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_current_spouse_gender') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_current_spouse_gender') == "female") $checked_female = "checked";
else $checked_female = "";

$html = '<div><b>14. </b> Gender <br>  &nbsp;  &nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="gender2" value="m" checked="' . $checked_male . '"/>  &nbsp; Male  &nbsp; <input type="checkbox" name="gender2" value="f" checked="' . $checked_female . '"/>  &nbsp;  Female</div>';
$pdf->writeHTMLCell(100, 4, 145, 87, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 9, 77, 88, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 9, 143, 88, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(190, 1, 13,92, "", "B", 1, false, true, 'L', true);

//.............
$pdf->SetFont('times', '', 9);
if (showData('i_589_current_spouse_in_usa_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_current_spouse_in_usa_status') == "N") $checked_N = "checked";
else $checked_N = "";

$html = '<div><b>15.</b>  Is this person in the U.S.?  <br>  &nbsp;  &nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="person_us" value="y" checked="' . $checked_Y . '"/>  Yes <i>(Complete Blocks 16 to 24.) </i>  &nbsp; &nbsp; <input type="checkbox" name="person_us" value="n" checked="' . $checked_N . '"/>   No <i>(Specify location)</i> :</div>';
$pdf->writeHTMLCell(100, 4, 13, 97, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_15_in_us', 98, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_in_usa')), 105, 99.8);

$pdf->writeHTMLCell(98, 1, 105, 100, "", "B", 1, false, true, 'L', true);
$pdf->writeHTMLCell(190, 1, 13, 101, "", "B", 1, false, true, 'L', true);
//............


//..........//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>16.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 106, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_place_of_last_entry_us', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_place_of_last_entry')), 13, 114);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>17.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 106, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_last_entry_us', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_date_of_last_entry')), 59, 114);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>18.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 106, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_I94number_ifany', 43, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_i94_number')), 108, 114);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>19.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 106, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_status_when_last_admited', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_visa_type')), 151, 114);
//............

$pdf->writeHTMLCell(1, 12, 58, 107, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 26, 107, 107, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 26, 150, 107, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(190, 1, 13, 113, "", "B", 1, false, true, 'L', true);
// //..........//............


$pdf->SetFont('times', '', 9);
$html = '<div><b>20.</b> What is your spouse\'s<br> &nbsp; &nbsp; &nbsp;
current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 118, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_what_is_your_spouse_current_status', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_current_status')), 13, 127);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>21.</b> What is the expiration date of his/her <br>&nbsp;&nbsp;&nbsp;
authorized stay, if any? (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 53, 118, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_authorization_expiration_date', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_expiration_date')), 53, 127);
//............

$pdf->SetFont('times', '', 9);
if (showData('i_589_current_spouse_immigration_proceedings') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_current_spouse_immigration_proceedings') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>22.</b>Is your spouse in Immigration<br> &nbsp; &nbsp;
Court proceedings? <br> &nbsp; &nbsp;  <input type="checkbox" name="spouse" value="y" checked="' . $checked_Y . '"/>  Yes &nbsp; &nbsp; <input type="checkbox" name="spouse" value="n" checked="' . $checked_N . '"/> No   </div>';
$pdf->writeHTMLCell(100, 4, 107.3, 118, $html, 0, 1, false, true, 'L', true);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>23.</b> If previously in the U.S., date of<br>&nbsp; &nbsp; 
previous arrival <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 151, 118, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_of_priviews_arrival', 52, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_current_spouse_previous_arrival_date')), 151, 127);
// //............
$pdf->writeHTMLCell(1, 14, 52, 119, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(190, 1, 13, 127, "", "B", 1, false, true, 'L', true);
// //...........
$pdf->SetFont('times', '', 9);
if (showData('i_589_current_spouse_immigration_proceedings') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_current_spouse_immigration_proceedings') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>24.</b> If in the U.S., is your spouse to be included in this application? <i>(Check the appropriate box.)</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 132, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div> <input type="checkbox" name="include" value="y" checked="' . $checked_Y . '"/>  Yes';
$pdf->writeHTMLCell(190, 5, 15, 136, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div> <input type="checkbox" name="include" value="n" checked="' . $checked_N . '"/> No  </div>';
$pdf->writeHTMLCell(190, 5, 15, 141, $html, 0, 1, false, true, 'L', true);
//............
// $pdf->writeHTMLCell(190, 1, 13, 125, "", "B", 1, false, true, 'L', true); // table end --------------------

//...........
$pdf->SetFont('times', '', 9);
$html = '<div><b>Your Children</b>. List <b>all</b> of your children, regardless of age, location, or marital status. </div>';
$pdf->writeHTMLCell(180, 4, 13, 147, $html, 0, 1, false, true, 'L', true);

if (showData('i_589_no_children_status') == "Y") $checked_no = "checked";
else $checked_no = "";
if (showData('i_589_have_children_status') == "N") $checked_have = "checked";
else $checked_have = "";
$html = '<div><input type="checkbox" name="children" value="y" checked="' . $checked_no . '"/> I do not have any children.  <i>(Skip to Part A.III., Information about your background.)</i>
<br><input type="checkbox" name="children" value="n" checked="' . $checked_have . '"/> &nbsp;&nbsp;  I have children. &nbsp;  &nbsp;  &nbsp;   Total number of children:  ____________</div>';
$pdf->writeHTMLCell(190, 5, 15, 152, $html, 0, 1, false, true, 'L', true);

//...........
$pdf->SetFont('times', '', 9);
$html = '<div> <b>(NOTE:</b> <i>Use Form I-589 Supplement A or attach additional sheets of paper and documentation if you have more than four children.)</i></div>';
$pdf->writeHTMLCell(180, 4, 13, 161, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(190, 88, 13, 168, "", 1, 1, false, false, 'L', true); //!table 2 start 
//.........//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_alien_registration_number', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_alien_registration_number')), 13, 176);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_passport_idcard_number', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_passport_id_card_number')), 70, 176);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_marital_status', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_marital_status')), 108, 176);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_social_security_number', 49, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_social_security_number')), 154, 176);
//............
$pdf->writeHTMLCell(1, 34.7, 69, 168, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 34.7, 107, 168, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 34.7, 153, 168, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 176, "", "B", 1, false, true, 'L', true); // horizontal line ----
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_complete_last_name', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_complete_last_name')), 13, 186);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_firstname', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_first_name')), 70, 186);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_middlename', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_middle_name')), 108, 186);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_date_of_birth', 49, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_birth')), 154, 186);

$pdf->writeHTMLCell(190, 1, 13, 186, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 191, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_city_country_birth', 57, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_city_country_of_birth')), 13, 196);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 191, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p_a_ii_10_nationality_citizenship', 38, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_nationality')), 70, 196);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 191, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_race_ethnic_tribal_group', 46, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_ethnic_group')), 108, 196);
//............
$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_gender') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_child_gender') == "female") $checked_female = "checked";
else $checked_female = "";
$html = '<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child_gender" value="m" checked="' . $checked_male . '"/>  Male  &nbsp;  <input type="checkbox" name="child_gender" value="f" checked="' . $checked_female . '"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 191, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 197, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_location_if_not_in_us') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_location_if_not_in_us') == "N") $checked_N = "checked";
else $checked_N = "";

$html = '<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child_us3" value="y" checked="' . $checked_Y . '" />  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child_us3" value="n" checked="' . $checked_N . '"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 203, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_is_this_us', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_location_if_not_in_us')), 143, 203);
//............
$pdf->writeHTMLCell(60, 1, 143, 203, "", "B", 1, false, true, 'L', true); // horizontal line -----
$pdf->writeHTMLCell(190, 1, 13, 204, "", "B", 1, false, true, 'L', true); // horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 209, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_place_of_last_entry_us', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_place_of_last_entry')), 13, 217);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 209, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_date_last_entry_us', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_last_entry')), 59, 217);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 209, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_I94number_ifany', 42, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_i94_number')), 108, 217);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 209, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_status_when_last_admited', 53, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_status_when_last_admitted')), 150, 217);
//............
$pdf->writeHTMLCell(1, 12, 58, 210, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 210, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 210, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 216.3, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13,221, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_current_status', 56, 5.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_current_status')), 13, 229);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70,221, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_what_is_expiration_date', 59, 5.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_expiration_date_of_stay')), 69, 229);
//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_child_in_court_proceedings') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_child_in_court_proceedings') == "N") $checked_N = "checked";
else $checked_N = "";


$html = '<div><b>20. </b> Is your child in Immigration Court proceedings? <br> <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding_page2" value="y" checked="' . $checked_Y . '" />  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding_page2" value="n" checked="' . $checked_N . '"/> No</div>';
$pdf->writeHTMLCell(180, 4, 129, 221, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 12, 68, 222.6, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 222.6, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 229, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_include_child_in_application') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_include_child_in_application') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br><br> &nbsp; &nbsp; &nbsp;<input type="checkbox" name="inc_application" value="y" checked="' . $checked_Y . '"/>   Yes    <br><br> &nbsp; &nbsp; &nbsp;<input type="checkbox" name="inc_application" value="n" checked="' . $checked_N . '" />   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 234, $html, 0, 1, false, true, 'L', true);
/******************************
 ******** End Page No 2 ******
 ******************************/

/******************************
 ******** Start Page No 3 ****
 ******************************/








$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part A.II. Information About Your Spouse and Children</b> (continued)</div>';
$pdf->writeHTMLCell(190, 5, 13, 15, $html3, 1, 1, true, true, 'L', true);

$pdf->writeHTMLCell(190, 78, 13, 22, "", 1, 1, false, false, 'L', true); // page 3 table 1 start ---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_alien_registration_number', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_alien_registration_number2')), 13, 29);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_passport_idcard_number', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_passport_id_card_number2')), 70.2, 29);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_marital_status', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_marital_status2')), 108, 29);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_social_security_number', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_social_security_number2')), 155, 29);
//............

$pdf->writeHTMLCell(1, 33, 69, 22, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 33, 107, 22, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 33, 153, 22, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 29, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_complete_last_name', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_complete_last_name2')), 13, 39);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_firstname', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_first_name2')), 70, 39);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_middlename', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_middle_name2')), 108, 39);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_date_of_birth', 49, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_birth2')), 154, 39);

$pdf->writeHTMLCell(190, 1, 13, 39, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_city_country_birth', 57, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_city_country_of_birth2')), 13, 49);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_nationality_citizenship', 38, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_nationality2')), 70, 49);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_race_ethnic_tribal_group', 46, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_ethnic_group2')), 108, 49);
//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_gender2') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_child_gender2') == "female") $checked_female = "checked";
else $checked_female = "";

$html = '<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child2_gender" value="m" checked="' . $checked_male . '" />  Male  &nbsp;  <input type="checkbox" name="child2_gender" value="f" checked="' . $checked_female . '" />  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 44, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 50, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_in_us2') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_in_us2') == "N") $checked_N = "checked";
else $checked_N = "";

$html = '<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child_us" value="y" checked="' . $checked_Y . '"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child_us" value="n" checked="' . $checked_N . '"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 55.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_is_this_us', 60, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_location_if_not_in_us2')), 143, 55.8);
//............
$pdf->writeHTMLCell(60, 1, 143, 56, "", "B", 1, false, true, 'L', true); // horizontal line -----
$pdf->writeHTMLCell(190, 1, 13, 57, "", "B", 1, false, true, 'L', true); // horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_place_of_last_entry_us', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_place_of_last_entry2')), 13, 70);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_date_last_entry_us', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_last_entry2')), 59, 70);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_I94number_ifany', 42, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_i94_number2')), 108, 70);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_status_when_last_admited', 53, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_status_when_last_admitted2')), 150, 70);
//............
$pdf->writeHTMLCell(1, 12, 58, 63, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 63, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 63, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 69, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 74, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_current_status', 56, 5.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_current_status2')), 13, 82);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 74, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_what_is_expiration_date', 59, 5.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_expiration_date_of_stay2')), 69, 82);
//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_child_in_court_proceedings2') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_child_in_court_proceedings2') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>20. </b> Is your child in Immigration Court proceedings? <br> <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding_page3_section1" value="y" checked="' . $checked_Y . '"/>  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding_page3_section1" value="n" checked="' . $checked_N . '"/> No</div>';
$pdf->writeHTMLCell(180, 4, 130, 74, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 12, 68, 75, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 75, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 82, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9);
if (showData('i_589_include_child_in_application2') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_include_child_in_application2') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application" value="y" checked="' . $checked_Y . '"/>   Yes   <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application" value="n" checked="' . $checked_N . '"/>   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 87, $html, 0, 1, false, true, 'L', true);

//............page 3 table 1 end ------------------------------------------------------------------

$pdf->writeHTMLCell(190, 78, 13, 100, "", 1, 1, false, false, 'L', true); // page 3 table 2 start ---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_alien_registration_number', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_alien_registration_number3')), 13, 107);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_passport_idcard_number', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_passport_id_card_number3')), 70, 107);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_marital_status', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_marital_status3')), 108, 107);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_social_security_number', 49, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_social_security_number3')), 154, 107);
//............

$pdf->writeHTMLCell(1, 33, 69, 100, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 33, 107, 100, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 33, 153, 100, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 107, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_complete_last_name', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_complete_last_name3')), 13, 117);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_firstname', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_first_name3')), 70, 117);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_middlename', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_middle_name3')), 108, 117);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_date_of_birth', 49, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_birth3')), 154, 117);

$pdf->writeHTMLCell(190, 1, 13, 117, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_city_country_birth', 57, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_city_country_of_birth3')), 13, 127);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_nationality_citizenship', 38, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_nationality3')), 70, 127);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_race_ethnic_tribal_group', 46, 6.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_ethnic_group3')), 108, 127);
//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_gender3') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_child_gender3') == "female") $checked_female = "checked";
else $checked_female = "";

$html = '<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child2_gender_section2" value="m" checked="' . $checked_male . '"/>  Male  &nbsp;  <input type="checkbox" name="child2_gender_section2" value="f" checked="' . $checked_female . '"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 122, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 128, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_in_us3') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_in_us3') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child_us2" value="y" checked="' . $checked_Y . '" />  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child_us2" value="n" checked="' . $checked_N . '" /> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 134, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_is_this_us', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_location_if_not_in_us3')), 143, 134);
//............
$pdf->writeHTMLCell(60, 1, 143, 134, "", "B", 1, false, true, 'L', true); // horizontal line -----
$pdf->writeHTMLCell(190, 1, 13, 135.5, "", "B", 1, false, true, 'L', true); // horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_place_of_last_entry_us', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_place_of_last_entry3')), 13, 148);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_date_last_entry_us', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_last_entry3')), 59, 148);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_I94number_ifany', 42, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_i94_number3')), 108, 148);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_status_when_last_admited', 53, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_status_when_last_admitted3')), 150, 148);
//............
$pdf->writeHTMLCell(1, 12, 58, 141, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 141, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 141, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 147, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 152, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_current_status', 56, 5.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_current_status3')), 13, 160);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 152, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_section2_child2_what_is_expiration_date', 59, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_expiration_date_of_stay3')), 69, 160);
//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_include_child_in_application3') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_include_child_in_application3') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>20. </b> Is your child in Immigration Court proceedings? <br> <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding_page3_section2" value="y" checked="' . $checked_Y . '" />  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding_page3_section2" value="n" checked="' . $checked_N . '" /> No</div>';
$pdf->writeHTMLCell(180, 4, 129, 152, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 12, 68, 153, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 153, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 160, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9);
if (showData('i_589_child_child_in_court_proceedings3') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_child_in_court_proceedings3') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application_section2" value="y" checked="' . $checked_Y . '"/>   Yes    
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application_section2" value="n" checked="' . $checked_N . '"/>   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 165, $html, 0, 1, false, true, 'L', true);

//............page 3 table 2 end ----------------------------------

$pdf->writeHTMLCell(190, 76, 13, 178, "", 1, 1, false, false, 'L', true); // page 3 table 3 start ---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_alien_registration_number', 57, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_alien_registration_number4')), 13, 185);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_passport_idcard_number', 38, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_passport_id_card_number4')), 70, 185);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_marital_status', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_marital_status4')), 108, 185);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_social_security_number', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_social_security_number4')), 154, 185);
//............

$pdf->writeHTMLCell(1, 30, 69, 178, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 30, 107, 178, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 30, 153, 178, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 184, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_complete_last_name', 57, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_complete_last_name4')), 13, 194);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_firstname', 38, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_first_name4')), 70, 194);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_middlename', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_middle_name4')), 108, 194);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_date_of_birth', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_birth4')), 154, 194);

$pdf->writeHTMLCell(190, 1, 13, 193, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 198, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_city_country_birth', 57, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_city_country_of_birth4')), 13, 203);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 198, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_nationality_citizenship', 38, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_nationality4')), 70, 203);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 198, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_race_ethnic_tribal_group', 46, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_ethnic_group4')), 108, 203);
//............
$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_gender4') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_child_gender4') == "female") $checked_female = "checked";
else $checked_female = "";
$html = '<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child3_gender" value="m" checked="' . $checked_male . '"/>  Male  &nbsp;  <input type="checkbox" name="child3_gender" value="f" checked="' . $checked_female . '"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 198, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 203, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_in_us4') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_in_us4') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child3_us" value="y" checked="' . $checked_Y . '"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child3_us" value="n" checked="' . $checked_N . '"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 208.4, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_is_this_us', 60, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_location_if_not_in_us4')), 143, 209);
//............
$pdf->writeHTMLCell(60, 1, 143, 208, "", "B", 1, false, true, 'L', true); // horizontal line -----
$pdf->writeHTMLCell(190, 1, 13, 209, "", "B", 1, false, true, 'L', true); // horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 213.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_place_of_last_entry_us', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_place_of_last_entry4')), 13, 221);
//............

$pdf->SetFont('times', '', 8.8);
$html = '<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 213.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_date_last_entry_us', 49, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_last_entry4')), 59, 221);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 213.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_I94number_ifany', 42, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_i94_number4')), 108, 221);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 213.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_status_when_last_admited', 53, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_status_when_last_admitted4')), 150, 221);
//............
$pdf->writeHTMLCell(1, 11.2, 58, 214.8, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 11.2, 107, 214.8, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 11.2, 149, 214.8, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 220, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html = '<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 225, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_current_status', 55, 5.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_current_status4')), 13, 233);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 225, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_what_is_expiration_date', 59, 5.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_expiration_date_of_stay4')), 69, 233);
//............

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_child_child_in_court_proceedings4') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_child_in_court_proceedings4') == "N") $checked_N = "checked";
else $checked_N = "";

$html = '<div><b>20. </b> Is your child in Immigration Court proceedings? <br> <br>&nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding3" value="y" checked="' . $checked_Y . '"/>  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding3" value="n" checked="' . $checked_N . '"/> No</div>';
$pdf->writeHTMLCell(180, 4, 129, 225, $html, 0, 1, false, true, 'L', true);
//............

$pdf->writeHTMLCell(1, 12.5, 68, 226, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12.5, 127, 226, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 233, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9.7);
if (showData('i_589_include_child_in_application4') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_include_child_in_application4') == "N") $checked_N = "checked";
else $checked_N = "";

$html = '<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl3_application" value="y" checked="' . $checked_Y . '"/>   Yes    </div>';
$pdf->writeHTMLCell(190, 7, 13, 239, $html, 0, 1, false, true, 'L', true);
$html = '<div><input type="checkbox" name="incl3_application" value="n" checked="' . $checked_N . '"/>&nbsp;  No </div>';
$pdf->writeHTMLCell(190, 7, 15.5, 247, $html, 0, 1, false, true, 'L', true);

/******************************
 ******** End Page No 3 *******
 ******************************/

/******************************
 ******** Start Page No 4*****
 ******************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part A.III. Information About Your Background</b></div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div><b>1. </b>List your last address where you lived before coming to the United States. If this is not the country where you fear persecution, also list the last<br>&nbsp; &nbsp; 
address in the country where you fear persecution. <i>(List Address, City/Town, Department, Province, or State and Country.)</i><br>&nbsp;&nbsp; 
(<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.)</i></div>';
$pdf->writeHTMLCell(190, 7, 13, 23, $html, 0, 1, false, true, 'L', true);

//.............table 1 start ..............

$pdf->writeHTMLCell(190, 23, 13, 36, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html = '<div>  Number and Street<br>
<i>(Provide if available)</i></div>';
$pdf->writeHTMLCell(80, 5, 18, 35, $html, 0, 1, false, true, 'L', true);
//......
$html = '<div>City/Town</div>';
$pdf->writeHTMLCell(80, 5, 57, 37, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Department, Province, or State</div>';
$pdf->writeHTMLCell(80, 5, 84, 37, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Country</div>';
$pdf->writeHTMLCell(80, 5, 137, 37, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Dates</div>';
$pdf->writeHTMLCell(80, 5, 175, 35, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 158, 38, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 38, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 38, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 46, "", "B", 1, false, true, 'C', true); // horizontal line ..
//.......

$pdf->writeHTMLCell(1, 23, 50, 36, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 23, 79, 36, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 23, 130, 36, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 23, 155, 36, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 15.5, 178, 43.5, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_live_address_number_and_street1', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_1', '0')), 13, 44);
$pdf->TextField('a_iii_live_address_number_and_street2', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_1', '1')), 13, 52);
//.........
$pdf->TextField('a_iii_live_address_city_town1', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_1', '0')), 51, 44);
$pdf->TextField('a_iii_live_address_city_town2', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_1', '1')), 51, 52);
//.........
$pdf->TextField('a_iii_live_address_dept_province_state1', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_1', '0')), 80, 44);
$pdf->TextField('a_iii_live_address_dept_province_state2', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_1', '1')), 80, 52);
//.........
$pdf->TextField('a_iii_live_address_country1', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_1', '0')), 131, 44);
$pdf->TextField('a_iii_live_address_country2', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_1', '1')), 131, 52);
//.........

$pdf->TextField('a_iii_live_address_date_from1', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_1', '0')), 156, 44);
$pdf->TextField('a_iii_live_address_date_from2', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_1', '1')), 156, 52);
//.........
$pdf->TextField('a_iii_live_address_date_to1', 24, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_1', '0')), 179, 44);
$pdf->TextField('a_iii_live_address_date_to2', 24, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_1', '1')), 179, 52);
//.........page 4 table 1 end -----------------------------------------------------------

$pdf->SetFont('times', '', 9);
$html = '<div><b>2. </b> Provide the following information about your residences during the past 5 years. List your present address first.<br> &nbsp; &nbsp; &nbsp;(<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 60, $html, 0, 1, false, true, 'L', true);

//........table 2 start .....................

$pdf->writeHTMLCell(190, 42, 13, 69, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html = '<div>  Number and Street</div>';
$pdf->writeHTMLCell(80, 5, 18, 70, $html, 0, 1, false, true, 'L', true);
//......
$html = '<div>City/Town</div>';
$pdf->writeHTMLCell(80, 5, 57, 70, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Department, Province, or State</div>';
$pdf->writeHTMLCell(80, 5, 84, 70, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Country</div>';
$pdf->writeHTMLCell(80, 5, 137, 70, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Dates</div>';
$pdf->writeHTMLCell(80, 5, 175, 68, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 158, 71, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 71, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 71, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 78, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 85, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 92, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 99, "", "B", 1, false, true, 'C', true); // horizontal line ..
//.......
$pdf->writeHTMLCell(1, 42, 50, 69, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 42, 79, 69, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 42, 130, 69, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 42, 155, 69, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 34.5, 178, 76.5, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_residence_address_number_and_street1', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_2', '0')), 13, 77);
$pdf->TextField('a_iii_residence_address_number_and_street2', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_2', '1')), 13, 84);
$pdf->TextField('a_iii_residence_address_number_and_street3', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_2', '2')), 13, 91);
$pdf->TextField('a_iii_residence_address_number_and_street4', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_2', '3')), 13, 98);
$pdf->TextField('a_iii_residence_address_number_and_street5', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_number_street_2', '4')), 13, 105);

//.........
$pdf->TextField('a_iii_residence_address_city_town1', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_2', '0')), 51, 77);
$pdf->TextField('a_iii_residence_address_city_town2', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_2', '1')), 51, 84);
$pdf->TextField('a_iii_residence_address_city_town3', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_2', '2')), 51, 91);
$pdf->TextField('a_iii_residence_address_city_town4', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_2', '3')), 51, 98);
$pdf->TextField('a_iii_residence_address_city_town5', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_city_town_2', '4')), 51, 105);
//.........
$pdf->TextField('a_iii_residence_address_dept_province_state1', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_2', '0')), 80, 77);
$pdf->TextField('a_iii_residence_address_dept_province_state2', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_2', '1')), 80, 84);
$pdf->TextField('a_iii_residence_address_dept_province_state3', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_2', '2')), 80, 91);
$pdf->TextField('a_iii_residence_address_dept_province_state4', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_2', '3')), 80, 98);
$pdf->TextField('a_iii_residence_address_dept_province_state5', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_province_state_2', '4')), 80, 105);
//.........
$pdf->TextField('a_iii_residence_address_country1', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_2', '0')), 131, 77);
$pdf->TextField('a_iii_residence_address_country2', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_2', '1')), 131, 84);
$pdf->TextField('a_iii_residence_address_country3', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_2', '2')), 131, 91);
$pdf->TextField('a_iii_residence_address_country4', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_2', '3')), 131, 98);
$pdf->TextField('a_iii_residence_address_country5', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_country_2', '4')), 131, 105);
//.........

$pdf->TextField('a_iii_residence_address_date_from1', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_2', '0')), 156, 77);
$pdf->TextField('a_iii_residence_address_date_from2', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_2', '1')), 156, 84);
$pdf->TextField('a_iii_residence_address_date_from3', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_2', '2')), 156, 91);
$pdf->TextField('a_iii_residence_address_date_from4', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_2', '3')), 156, 98);
$pdf->TextField('a_iii_residence_address_date_from5', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_from_2', '4')), 156, 105);
//.........
$pdf->TextField('a_iii_residence_address_date_to1', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_2', '0')), 179, 77);
$pdf->TextField('a_iii_residence_address_date_to2', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_2', '1')), 179, 84);
$pdf->TextField('a_iii_residence_address_date_to3', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_2', '2')), 179, 91);
$pdf->TextField('a_iii_residence_address_date_to4', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_2', '3')), 179, 98);
$pdf->TextField('a_iii_residence_address_date_to5', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_date_to_2', '4')), 179, 105);
//.........page 4 table 2 ends ----------------------------

$pdf->SetFont('times', '', 9);
$html = '<div><b>3. </b>Provide the following information about your education, beginning with the most recent school that you attended. 
<br> &nbsp;&nbsp; &nbsp; (<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 112, $html, 0, 1, false, true, 'L', true);


//.....page 4 table 3 start ........................

$pdf->writeHTMLCell(190, 35, 13, 121, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Name  of  School</div>';
$pdf->writeHTMLCell(80, 5, 25, 122, $html, 0, 1, false, true, 'L', true);
//......
$html = '<div>Type of School</div>';
$pdf->writeHTMLCell(80, 5, 70, 122, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Location <i>(Address)</i></div>';
$pdf->writeHTMLCell(80, 5, 115, 122, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Attended</div>';
$pdf->writeHTMLCell(80, 5, 170, 120, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 154, 123, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 123, $html, 0, 1, false, true, 'L', true);
//.......
//.......
$pdf->writeHTMLCell(190, 1, 13, 123, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 130, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 137, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 144, "", "B", 1, false, true, 'C', true); // horizontal line ..
//.......
$pdf->writeHTMLCell(1, 35, 55, 121, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 35, 103, 121, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 35, 150, 121, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 27, 177, 129, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_name_of_school1', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_name_of_school_1', '0')), 13, 129);
$pdf->TextField('a_iii_education_name_of_school2', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_name_of_school_1', '1')), 13, 136);
$pdf->TextField('a_iii_education_name_of_school3', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_name_of_school_1', '2')), 13, 143);
$pdf->TextField('a_iii_education_name_of_school4', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_name_of_school_1', '3')), 13, 150);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_type_of_school1', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_type_of_school_1', '0')), 56, 129);
$pdf->TextField('a_iii_education_type_of_school2', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_type_of_school_1', '1')), 56, 136);
$pdf->TextField('a_iii_education_type_of_school3', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_type_of_school_1', '2')), 56, 143);
$pdf->TextField('a_iii_education_type_of_school4', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_type_of_school_1', '3')), 56, 150);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_location_address1', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_location_address_1', '0')), 104, 129);
$pdf->TextField('a_iii_education_location_address2', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_location_address_1', '1')), 104, 136);
$pdf->TextField('a_iii_education_location_address3', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_location_address_1', '2')), 104, 143);
$pdf->TextField('a_iii_education_location_address4', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_location_address_1', '3')), 104, 150);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_attend_from1', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_from_1', '0')), 151, 129);
$pdf->TextField('a_iii_education_attend_from2', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_from_1', '1')), 151, 136);
$pdf->TextField('a_iii_education_attend_from3', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_from_1', '2')), 151, 143);
$pdf->TextField('a_iii_education_attend_from4', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_from_1', '3')), 151, 150);
//.........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_attend_to1', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_to_1', '0')), 178, 129);
$pdf->TextField('a_iii_education_attend_to2', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_to_1', '1')), 178, 136);
$pdf->TextField('a_iii_education_attend_to3', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_to_1', '2')), 178, 143);
$pdf->TextField('a_iii_education_attend_to4', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_education_attended_to_1', '3')), 178, 150);
//......... page 4 table 3 end -------------------------------------------------------------------------------------------------


$pdf->SetFont('times', '', 9);
$html = '<div><b>4. </b> Provide the following information about your employment during the past 5 years. List your present employment first.<br>&nbsp;&nbsp;&nbsp; (<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)
</div>';
$pdf->writeHTMLCell(190, 7, 13, 158, $html, 0, 1, false, true, 'L', true);



//.......page 4 table 4............. 

$pdf->writeHTMLCell(190, 27, 13, 167, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Name and Address of  Employer</div>';
$pdf->writeHTMLCell(80, 5, 32, 167, $html, 0, 1, false, true, 'L', true);
//......
$html = '<div>Your Occupation</div>';
$pdf->writeHTMLCell(80, 5, 105, 167, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Dates</div>';
$pdf->writeHTMLCell(80, 5, 172, 166, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 154, 169, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 169, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 168, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 175, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 182, "", "B", 1, false, true, 'C', true); // horizontal line ..
//........
$pdf->writeHTMLCell(1, 27, 90, 167, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 27, 148, 167, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 20, 176, 174, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_name_and_address_employer1', 78, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_name_address_1', '0')), 13, 174);
$pdf->TextField('a_iii_name_and_address_employer2', 78, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_name_address_1', '1')), 13, 181);
$pdf->TextField('a_iii_name_and_address_employer3', 78, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_name_address_1', '2')), 13, 188);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_your_employment_occupation1', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_occupation_1', '0')), 91, 174);
$pdf->TextField('a_iii_your_employment_occupation2', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_occupation_1', '1')), 91, 181);
$pdf->TextField('a_iii_your_employment_occupation3', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_occupation_1', '2')), 91, 188);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_your_employment_date_from1', 28, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_dates_from_1', '0')), 149, 174);
$pdf->TextField('a_iii_your_employment_date_from2', 28, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_dates_from_1', '1')), 149, 181);
$pdf->TextField('a_iii_your_employment_date_from3', 28, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_dates_from_1', '2')), 149, 188);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_your_employment_date_to1', 26, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_dates_to_1', '0')), 177, 174);
$pdf->TextField('a_iii_your_employment_date_to2', 26, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_dates_to_1', '1')), 177, 181);
$pdf->TextField('a_iii_your_employment_date_to3', 26, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_employer_dates_to_1', '2')), 177, 188);
//............page 4 table 4 end -------------------------------------------------------------------

$pdf->SetFont('times', '', 9);
$html = '<div><b>5. </b>Provide the following information about your parents and siblings (brothers and sisters). Check the box if the person is deceased.<br> &nbsp;&nbsp;&nbsp; (<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 195, $html, 0, 1, false, true, 'L', true);


//.......page 4 table 5.............

$pdf->writeHTMLCell(190, 48, 13, 204, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Full Name</div>';
$pdf->writeHTMLCell(80, 5, 35, 204, $html, 0, 1, false, true, 'L', true);
//......
$html = '<div>City/Town and Country of Birth</div>';
$pdf->writeHTMLCell(80, 5, 80, 204, $html, 0, 1, false, true, 'L', true);
//.......
$html = '<div>Current Location</div>';
$pdf->writeHTMLCell(80, 5, 157, 204, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 204, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 211, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 218, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 225, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 232, "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 239, "", "B", 1, false, true, 'C', true); // horizontal line ..

//........
$pdf->writeHTMLCell(1, 48, 70, 204, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 48, 132, 204, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........
$html = '<div><i>Mother</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 210, $html, 0, 1, false, true, 'L', true);
//..........
$html = '<div><i>Father</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 217, $html, 0, 1, false, true, 'L', true);
//..........
$html = '<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 224, $html, 0, 1, false, true, 'L', true);
//.......
//..........
$html = '<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 231, $html, 0, 1, false, true, 'L', true);
//.......//..........
$html = '<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 238, $html, 0, 1, false, true, 'L', true);
//.......//..........
$html = '<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 245, $html, 0, 1, false, true, 'L', true);
//......................

if (showData('info_about_your_background_mother_deceased') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="decase1" value="Y" checked="' . $checked . '" /> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 210, $html, 0, 1, false, true, 'L', true);
//.......
if (showData('info_about_your_background_father_deceased') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="decase2" value="Y" checked="' . $checked . '" /> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 217, $html, 0, 1, false, true, 'L', true);
//.......
if (showData('info_about_your_background_sibling1_deceased') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="decase3" value="Y" checked="' . $checked . '" /> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 224, $html, 0, 1, false, true, 'L', true);
//.......
if (showData('info_about_your_background_sibling2_deceased') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="decase4" value="Y" checked="' . $checked . '" /> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 231, $html, 0, 1, false, true, 'L', true);
//.......
if (showData('info_about_your_background_sibling3_deceased') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="decase5" value="Y" checked="' . $checked . '" /> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 238, $html, 0, 1, false, true, 'L', true);
//.......
if (showData('info_about_your_background_sibling4_deceased') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="decase6" value="Y" checked="' . $checked . '" /> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 245, $html, 0, 1, false, true, 'L', true);

//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_full_name_mother', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_mother_name')), 25, 210);
$pdf->TextField('a_iii_full_name_father', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_father_name')), 25, 217);
$pdf->TextField('a_iii_full_name_sibling1', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling1_name')), 25, 224);
//............
$pdf->TextField('a_iii_full_name_sibling2', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling2_name')), 25, 231);
//............
$pdf->TextField('a_iii_full_name_sibling3', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling3_name')), 25, 238);
//............
$pdf->TextField('a_iii_full_name_sibling4', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling4_name')), 25, 245);
//............

$pdf->TextField('a_iii_city_town_country_of_birth_mother', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_mother_birth_place')), 71, 210);
$pdf->TextField('a_iii_city_town_country_of_birth_father', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_father_birth_place')), 71, 217);
$pdf->TextField('a_iii_city_town_country_of_birth_sibling1', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling1_birth_place')), 71, 224);
//............
$pdf->TextField('a_iii_city_town_country_of_birth_sibling2', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling2_birth_place')), 71, 231);
//............
$pdf->TextField('a_iii_city_town_country_of_birth_sibling3', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling3_birth_place')), 71, 238);
//............
$pdf->TextField('a_iii_city_town_country_of_birth_sibling4', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling4_birth_place')), 71, 245);
//............

$pdf->TextField('a_iii_current_location_mother', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_mother_current_location')), 153, 210);
$pdf->TextField('a_iii_current_location_father', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_father_current_location')), 153, 217);
$pdf->TextField('a_iii_current_location_sibling1', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling1_current_location')), 153, 224);
//............
$pdf->TextField('a_iii_current_location_sibling2', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling2_current_location')), 153, 231);
//............
$pdf->TextField('a_iii_current_location_sibling3', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling3_current_location')), 153, 238);
//............
$pdf->TextField('a_iii_current_location_sibling4', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('info_about_your_background_sibling4_current_location')), 153, 245);
/******************************
 ******** End Page No 4 *******
 ******************************/

/******************************
 ******** Start Page No 5*****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 5
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part B. Information About Your Application</b></div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 9);
$html = '<div><b>NOTE:</b> Use Form I-589 Supplement B, or attach additional sheets of paper as needed to complete your responses to the questions contained in 
Part B.)</div>';
$pdf->writeHTMLCell(188, 7, 13, 23, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(189, 1, 14, 27, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........

$pdf->SetFont('times', '', 9);
$html = '<div>When answering the following questions about your asylum or other protection claim (withholding of removal under 241(b)(3) of the INA or 
withholding of removal under the Convention Against Torture), you must provide a detailed and specific account of the basis of your claim to asylum 
or other protection. To the best of your ability, provide specific dates, places, and descriptions about each event or action described. You must attach 
documents evidencing the general conditions in the country from which you are seeking asylum or other protection and the specific facts on which 
you are relying to support your claim. If this documentation is unavailable or you are not providing this documentation with your application, explain 
why in your responses to the following questions. </div>';
$pdf->writeHTMLCell(192, 7, 13, 33, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Refer to Instructions, Part 1. Filing Instructions, Section II., Basis of Eligibility, Parts A. - D., Section V., Completing the Form, Part B.; and 
Section VII. Additional Evidence That You Should Submit,for more information on completing this section of the form.</div>';
$pdf->writeHTMLCell(192, 7, 13, 57, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html = '<div><b>1. </b> Why are you applying for asylum or withholding of removal under section 241(b)(3) of the INA, or for withholding of removal under the<br>&nbsp; &nbsp; &nbsp;  
Convention Against Torture? Check the appropriate box(es) below and then provide detailed answers to questions A and B below.</div>';
$pdf->writeHTMLCell(192, 7, 13, 67, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html = '<div>I am seeking asylum or withholding of removal based on:</div>';
$pdf->writeHTMLCell(190, 7, 18, 76, $html, 0, 1, false, true, 'L', true);





$pdf->SetFont('times', '', 12);
if (showData('info_about_you_removal_based') == "race") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="race" value="r"  checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(190, 7, 18, 80, $html, 0, 1, false, true, 'L', true);
if (showData('info_about_you_removal_based') == "religion") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="religion" value="r"  checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(190, 7, 18, 86, $html, 0, 1, false, true, 'L', true);
if (showData('info_about_you_removal_based') == "nationality") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="nationality" value="r"  checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(190, 7, 18, 92, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Race</div>';
$pdf->writeHTMLCell(190, 7, 24, 81, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Religion</div>';
$pdf->writeHTMLCell(190, 7, 24, 87, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Nationality</div>';
$pdf->writeHTMLCell(190, 7, 24, 93, $html, 0, 1, false, true, 'L', true);
//.............
if (showData('info_about_you_removal_based') == "political_opinion") $checked = "checked";
else $checked = "";
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="political" value="r" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(190, 7, 80, 80, $html, 0, 1, false, true, 'L', true);
if (showData('info_about_you_removal_based') == "membership_in_particular_social_group") $checked = "checked";
else $checked = "";

$html = '<div><input type="checkbox" name="particular" value="r" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(190, 7, 80, 86, $html, 0, 1, false, true, 'L', true);
if (showData('info_about_you_removal_based') == "info_about_you_removal_based") $checked = "checked";
else $checked = "";
$html = '<div><input type="checkbox" name="torture" value="r" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(190, 7, 80, 92, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Political opinion</div>';
$pdf->writeHTMLCell(190, 7, 86, 81, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Membership in a particular social group</div>';
$pdf->writeHTMLCell(190, 7, 86, 87, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>Torture Convention</div>';
$pdf->writeHTMLCell(190, 7, 86, 93, $html, 0, 1, false, true, 'L', true);
//.............
$pdf->writeHTMLCell(189, 1, 14, 95, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........


$pdf->SetFont('times', '', 9);
$html = '<div><b>A. </b> Have you, your family, or close friends or colleagues ever experienced harm or mistreatment or threats in the past by anyone?</div>';
$pdf->writeHTMLCell(192, 7, 13, 101, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('i_589_harm_or_mistreatment_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_harm_or_mistreatment_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="threats" value="t" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="threats" value="t" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 105, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>  If "Yes," explain in detail:<br> 
1. What happened;<br>  
2. When the harm or mistreatment or threats occurred;<br>  
3. Who caused the harm or mistreatment or threats; and<br>  
4. Why you believe the harm or mistreatment or threats occurred.</div>';
$pdf->writeHTMLCell(190, 7, 18, 111, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 40, 20, 132, showData('i_589_hard_mistreatment_value'), 1, 1, false, true, 'L', true); // table box --------------
//.............
$pdf->writeHTMLCell(189, 1, 14, 170, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........

$pdf->SetFont('times', '', 9);
$html = '<div><b>B. </b>  Do you fear harm or mistreatment if you return to your home country?</div>';
$pdf->writeHTMLCell(192, 7, 13, 176, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('i_589_return_to_home_country_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_return_to_home_country_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="mistreatment" value="t"v checked="' . $checked_Y . '" />   Yes    &nbsp; &nbsp; <input type="checkbox" name="mistreatment" value="t"v checked="' . $checked_N . '" />  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 180, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>  If "Yes," explain in detail:<br> 
1. What harm or mistreatment you fear;<br> 
2. Who you believe would harm or mistreat you; and<br> 
3. Why you believe you would or could be harmed or mistreated.</div>';
$pdf->writeHTMLCell(190, 7, 18, 187, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 40, 20, 205, showData('i_589_return_to_home_country_value'), 1, 1, false, true, 'L', true); // table box --------------
/******************************
 ******** End Page No 5 *******
 ******************************/

/******************************
 ******** Start Page No 6*****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 6
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part B. Information About Your Application</b>(continued)</div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 9);
$html = '<div><b>2. </b>   Have you or your family members ever been accused, charged, arrested, detained, interrogated, convicted and sentenced, or imprisoned in any<br> &nbsp;&nbsp;&nbsp; 
country other than the United States (including for an immigration law violation)?</div>';
$pdf->writeHTMLCell(192, 7, 13, 25, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('i_589_accused_charged_arrested_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_accused_charged_arrested_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="violation" value="v" checked="' . $checked_Y . '" />   Yes    &nbsp; &nbsp; <input type="checkbox" name="violation" value="v" checked="' . $checked_N . '" />  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 32, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div> If "Yes," explain the circumstances and reasons for the action.</div>';
$pdf->writeHTMLCell(190, 7, 18, 38, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 20, 43, showData('i_589_accused_charged_arrested_value'), 1, 1, false, true, 'L', true); // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 73, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3.A.</b>Have you or your family members ever belonged to or been associated with any organizations or groups in your home country, such as, but not<br> &nbsp;&nbsp;&nbsp; &nbsp; 
limited to, a political party, student group, labor union, religious organization, military or paramilitary group, civil patrol, guerrilla organization,<br> &nbsp;&nbsp;&nbsp; &nbsp; 
ethnic group, human rights group, or the press or media?</div>';
$pdf->writeHTMLCell(192, 7, 13, 80, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('i_589_associate_organization_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_associate_organization_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="human_right" value="h" checked="' . $checked_Y . '" />   Yes    &nbsp; &nbsp; <input type="checkbox" name="human_right" value="h" checked="' . $checked_N . '" />  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 92, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," describe for each person the level of participation, any leadership or other positions held, and the length of time you or your family 
members were involved in each organization or activity.</div>';
$pdf->writeHTMLCell(190, 7, 18, 98, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 107, showData('i_589_associate_organization_value'), 1, 1, false, true, 'L', true); // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 138, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html = '<div><b>3.B. </b>  Do you or your family members continue to participate in any way in these organizations or groups?</div>';
$pdf->writeHTMLCell(192, 7, 13, 145, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('i_589_family_member_participate_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_family_member_participate_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="participate" value="h" checked="' . $checked_Y . '" />   Yes    &nbsp; &nbsp; <input type="checkbox" name="participate" value="h" checked="' . $checked_N . '" />  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 150, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," describe for each person your or your family members\' current level of participation, any leadership or other positions currently held,<br>
and the length of time you or your family members have been involved in each organization or group.</div>';
$pdf->writeHTMLCell(190, 7, 18, 157, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 166, showData('i_589_family_member_participate_value'), 1, 1, false, true, 'L', true); // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 196, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4. </b> Are you afraid of being subjected to torture in your home country or any other country to which you may be returned?</div>';
$pdf->writeHTMLCell(192, 7, 13, 202, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
if (showData('i_589_other_country_returned_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_other_country_returned_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="afraid" value="h" checked="' . $checked_Y . '" />   Yes    &nbsp; &nbsp; <input type="checkbox" name="afraid" value="h" checked="' . $checked_N . '" />  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 207, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," explain why you are afraid and describe the nature of torture you fear, by whom, and why it would be inflicted. </div>';
$pdf->writeHTMLCell(190, 7, 18, 214, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 220, showData('i_589_other_country_returned_value'), 1, 1, false, true, 'L', true); // table box --------------
/******************************
 ******** End Page No 6 *******
 ******************************/

/******************************
 ******** Start Page No 7*****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 7
$pdf->SetFont('times', '', 10);
$html3 = '<div><b>Part C. Additional Information About Your Application</b></div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//.............
$pdf->SetFont('times', '', 9);
$html = '<div>(<b>NOTE:</b> Use Form I-589 Supplement B, or attach additional sheets of paper as needed to complete your responses to the questions contained in 
Part C.)</div>';
$pdf->writeHTMLCell(188, 7, 13, 24, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(189, 1, 14, 28, "", "B", 1, false, true, 'L', true); //.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html = '<div><b>1. </b>  Have you, your spouse, your child(ren), your parents or your siblings ever applied to the U.S. Government for refugee status, asylum, or<br>&nbsp; &nbsp;&nbsp;   
withholding of removal?</div>';
$pdf->writeHTMLCell(188, 7, 13, 34, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
if (showData('i_589_refugee_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_refugee_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="refugee" value="h" checked="' . $checked_Y . '" />   Yes    &nbsp; &nbsp; <input type="checkbox" name="refugee" value="h" checked="' . $checked_N . '" />  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 41, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," explain the decision and what happened to any status you, your spouse, your child(ren), your parents, or your siblings received as a 
result of that decision. Indicate whether or not you were included in a parent or spouse\'s application. If so, include your parent or spouse\'s A - number in your response.<br><br>

If you were previously denied asylum by USCIS, an immigration judge, or the Board of Immigration Appeals, describe any change(s) in 
conditions in your country or your own personal circumstances since the date of the denial that may affect your eligibility for asylum.
</div>';
$pdf->writeHTMLCell(184, 7, 18, 48, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 71, showData('i_589_refugee_value'), 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 101, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html = '<div><b>2.A. </b>After leaving the country from which you are claiming asylum, did you or your spouse or child(ren) who are now in the United States travel <br>&nbsp; &nbsp; &nbsp; &nbsp;
through or reside in any other country before entering the United States? </div>';
$pdf->writeHTMLCell(188, 7, 13, 108, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
if (showData('i_589_spouse_before_entering_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_spouse_before_entering_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="reside" value="r" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="reside" value="r" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 116, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 9);
$html = '<div><b>2.B. </b>Have you, your spouse, your child(ren), or other family members, such as your parents or siblings, ever applied for or received any lawful status<br>&nbsp; &nbsp; &nbsp; &nbsp; 
in any country other than the one from which you are now claiming asylum?</div>';
$pdf->writeHTMLCell(192, 7, 13, 122, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_589_applied_for_received_lawful_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_applied_for_received_lawful_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="claiming" value="r" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="claiming" value="r" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 130, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes" to either or both questions (2A and/or 2B), provide for each person the following: the name of each country and the length of stay, the<br>
person\'s status while there, the reasons for leaving, whether or not the person is entitled to return for lawful residence purposes, and whether the<br>
person applied for refugee status or for asylum while there, and if not, why he or she did not do so.</div>';
$pdf->writeHTMLCell(190, 7, 18, 137, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 150, showData('i_589_applied_for_received_lawful_value'), 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 180, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>3. </b>Have you, your spouse or your child(ren) ever ordered, incited, assisted or otherwise participated in causing harm or suffering to any person<br>&nbsp;&nbsp;&nbsp; 
because of his or her race, religion, nationality, membership in a particular social group or belief in a particular political opinion?</div>';
$pdf->writeHTMLCell(192, 7, 13, 188, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_589_particular_political_opinion_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_particular_political_opinion_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="ordered" value="0" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="ordered" value="1" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 198, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," describe in detail each such incident and your own, your spouse\'s, or your child(ren)\'s involvement.</div>';
$pdf->writeHTMLCell(190, 7, 18, 204, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 35, 19, 210, showData('i_589_particular_political_opinion_value'), 1, 1, false, true, 'L', true);  // table box --------------

/******************************
 ******** End Page No 7 *******
 ******************************/

/******************************
 ******** Start Page No 8*****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 8
$pdf->SetFont('times', '', 10);
$html3 = '<div><b>Part C. Additional Information About Your Application</b>(continued)</div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>4. </b> After you left the country where you were harmed or fear harm, did you return to that country?</div>';
$pdf->writeHTMLCell(192, 7, 13, 24, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_589_harmed_or_fear_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_harmed_or_fear_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="return" value="r" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="return" value="r" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 29, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," describe in detail the circumstances of your visit(s) (for example, the date(s) of the trip(s), the purpose(s) of the trip(s), and the length 
of time you remained in that country for the visit(s).)</div>';
$pdf->writeHTMLCell(185, 7, 18, 36, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 45, 19, 45, showData('i_589_harmed_or_fear_value'), 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 87, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>5. </b> Are you filing this application more than 1 year after your last arrival in the United States?</div>';
$pdf->writeHTMLCell(192, 7, 13, 93, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_589_last_arrival_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_last_arrival_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="arrival" value="r" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="arrival" value="r" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 98, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," explain why you did not file within the first year after you arrived. You must be prepared to explain at your interview or hearing why 
you did not file your asylum application within the first year after you arrived. For guidance in answering this question, see <b>Instructions, Part 
1. Filing Instructions, Section V. Completing the Form, Part C.</b></div>';
$pdf->writeHTMLCell(185, 7, 18, 105, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 45, 19, 118, showData('i_589_last_arrival_value'), 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 162, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html = '<div><b>6. </b> Have you or any member of your family included in the application ever committed any crime and/or been arrested, charged, convicted, or<br>&nbsp; &nbsp; &nbsp;  
sentenced for any crimes in the United States (including for an immigration law violation)?</div>';
$pdf->writeHTMLCell(192, 7, 13, 168, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
if (showData('i_589_included_the_application_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_included_the_application_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="crimes" value="r" checked="' . $checked_Y . '"/>   Yes    &nbsp; &nbsp; <input type="checkbox" name="crimes" value="r" checked="' . $checked_N . '"/>  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 177, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>If "Yes," for each instance, specify in your response: what occurred and the circumstances, dates, length of sentence received, location, the 
duration of the detention or imprisonment, reason(s) for the detention or conviction, any formal charges that were lodged against you or your 
relatives included in your application, and the reason(s) for release.<br><br>

If you have been arrested in the United States, you must submit a certified copy of all arrest reports, court dispositions, sentencing documents, 
and any other relevant documents.
</div>';
$pdf->writeHTMLCell(185, 7, 18, 185, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 45, 19, 208, showData('i_589_included_the_application_value'), 1, 1, false, true, 'L', true);  // table box --------------
/******************************
 ******** End Page No 8 *******
 ******************************/

/******************************
 ******** Start Page No 9*****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 9
$pdf->SetFont('times', '', 10);
$html3 = '<div><b>Part D. Your Signature</b></div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//.............
$pdf->SetFont('times', '', 9);
$html = '<div>I certify, under penalty of perjury under the laws of the United States of America, that this application and the evidence submitted with it are all true<br>
and correct. Title 18, United States Code, Section 1546(a), provides in part: Whoever knowingly makes under oath, or as permitted under penalty of<br>
perjury under Section 1746 of Title 28, United States Code, knowingly subscribes as true, any false statement with respect to a material fact in any<br>
application, affidavit, or other document required by the immigration laws or regulations prescribed thereunder, or knowingly presents any such<br>
application, affidavit, or other document containing any such false statement or which fails to contain any reasonable basis in law or fact - shall be<br>
fined in accordance with this title or imprisoned for up to 25 years. I certify that I am physically present in the United States or seeking admission at<br>
a Port of Entry when I execute this application. I authorize the release of any information from my immigration record that U.S. Citizenship and<br>
Immigration Services (USCIS) needs to determine eligibility for the benefit I am seeking.</div>';
$pdf->writeHTMLCell(190, 7, 12, 24, $html, 0, 1, false, true, 'J', true);
//.........

//.........
$pdf->writeHTMLCell(192, 1, 13, 52, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............
$pdf->SetFont('times', 'B', 9);
$html = '<div><i>WARNING:</i> Applicants who are in the United States unlawfully are subject to removal if their asylum or withholding claims are not
granted by an asylum officer or an immigration judge. Any information provided in completing this application may be used as a basis for
the institution of, or as evidence in, removal proceedings even if the application is later withdrawn. Applicants determined to have
knowingly made a frivolous application for asylum will be permanently ineligible for any benefits under the Immigration and Nationality
Act. You may not avoid a frivolous finding simply because someone advised you to provide false information in your asylum application. If
filing with USCIS, unexcused failure to appear for an appointment to provide biometrics (such as fingerprints) and your biographical
information within the time allowed may result in an asylum officer dismissing your asylum application or referring it to an immigration
judge. Failure without good cause to provide DHS with biometrics or other biographical information while in removal proceedings may
result in your application being found abandoned by the immigration judge. See sections 208(d)(5)(A) and 208(d)(6) of the INA and 8 CFR
sections 208.10, 1208.10, 208.20, 1003.47(d) and 1208.20.</div>';
$pdf->writeHTMLCell(190, 7, 12, 58, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(190, 10, 12, 99, "", 1, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$html = '<div>Print your complete name.</div>';
$pdf->writeHTMLCell(43, 7, 12, 98, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_print_your_complete_name', 92, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_print_complete_name')), 12, 103);
//............
$pdf->writeHTMLCell(1, 10, 103, 99, "", "R", 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$html = '<div>Write your name in your native alphabet.</div>';
$pdf->writeHTMLCell(70, 7, 105, 98, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_write_your_name_alphabet', 97.9, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_native_alphabet_name')), 104, 103);
//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_spouse_child_assist_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_spouse_child_assist_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div>Did your spouse, parent, or child(ren) assist you in completing this application?  <input type="checkbox" name="assist" value="N" checked="' . $checked_N . '"/>  No  <input type="checkbox" name="assist" value="Y" checked="' . $checked_Y . '"/>  Yes    <i>(If "Yes," list the name and relationship.)</i></div>';
$pdf->writeHTMLCell(190, 7, 12, 110, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_name', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_signature_name1')), 12, 117);
$pdf->TextField('partd_relation_ship', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_signature_relationship1')), 60, 117);
$pdf->TextField('partd_name2', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_signature_name2')), 107, 117);
$pdf->TextField('partd_relation_ship2', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_signature_relationship2')), 157, 117);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><i>(Name)</i></div>';
$pdf->writeHTMLCell(45, 7, 12, 123, $html, "T", 1, false, true, 'C', true);
$html = '<div><i>(Relationship)</i></div>';
$pdf->writeHTMLCell(45, 7, 60, 123, $html, "T", 1, false, true, 'C', true);

$html = '<div><i>(Name)</i></div>';
$pdf->writeHTMLCell(45, 7, 107, 123, $html, "T", 1, false, true, 'C', true);
$html = '<div><i>(Relationship)</i></div>';
$pdf->writeHTMLCell(45, 7, 157, 123, $html, "T", 1, false, true, 'C', true);

//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_someone_other_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_someone_other_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div>Did someone other than your spouse, parent, or child(ren) prepare this application?  &nbsp; &nbsp; &nbsp;  <input type="checkbox" name="application" value="N" checked="' . $checked_N . '"/>  No  &nbsp; &nbsp;  <input type="checkbox" name="application" value="Y" checked="' . $checked_Y . '"/>  Yes    <i>(If "Yes," complete Part E.)</i></div>';
$pdf->writeHTMLCell(190, 7, 12, 128, $html, 0, 1, false, true, 'L', true);

//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_represented_by_counsel_status') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_represented_by_counsel_status') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div>Asylum applicants may be represented by counsel. Have you been provided with a list of<br>persons who may be available to assist you, at little or no cost, with your asylum claim?    &nbsp;  &nbsp;  &nbsp;   <input type="checkbox" name="asy_aapli" value="N" checked="' . $checked_N . '"/>  No  &nbsp; &nbsp;  <input type="checkbox" name="asy_aapli" value="Y" checked="' . $checked_Y . '"/>  Yes   </div>';
$pdf->writeHTMLCell(190, 7, 12, 133, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Signature of Applicant <i>(The person in Part. A.I.)</i></div>';
$pdf->writeHTMLCell(70, 7, 20, 142, $html, 0, 1, false, true, 'C', true);


$pdf->SetFont('times', 'B', 15);
$html = '<div>[ ______________________________ ]</div>';
$pdf->writeHTMLCell(170, 7, 20, 147, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 147, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_date_of_signature', 50, 6.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_represented_by_counsel_date_of_signature')), 120, 147);
//................
$pdf->SetFont('times', '', 9);
$html = '<div>Sign your name so it all appears within the brackets</div>';
$pdf->writeHTMLCell(100, 7, 27, 153, $html, 0, 1, false, true, 'L', true);

$html = '<div>Date of signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 120, 154, $html, "T", 1, false, true, 'C', true);
//.........
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part E. Declaration of Person Preparing Form, if Other Than Applicant, Spouse, Parent, or Child</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 162, $html3, 1, 1, true, true, 'L', true);
//.............

$pdf->SetFont('times', '', 9);
$html = '<div>I declare that I have prepared this application at the request of the person named in Part D, that the responses provided are based on all information of 
which I have knowledge, or which was provided to me by the applicant, and that the completed application was read to the applicant in his or her 
native language or a language he or she understands for verification before he or she signed the application in my presence. I am aware that the 
knowing placement of false information on the Form I-589 may also subject me to civil penalties under 8 U.S.C. 1324c and/or criminal penalties 
under 18 U.S.C. 1546(a).</div>';
$pdf->writeHTMLCell(190, 6, 12, 169, $html, 0, 1, false,   true,  'L',  true);
//.............

$pdf->writeHTMLCell(190, 31, 13, 189, "", 1, 1, false,   true,  'L',  true);  //............table box --------start
//................
$pdf->SetFont('times', '', 9);
$html = '<div>Signature of Preparer</div>';
$pdf->writeHTMLCell(100, 7, 13, 188, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('times', '', 9);
$html = '<div>Print Complete Name of Preparer</div>';
$pdf->writeHTMLCell(100, 7, 85, 188, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_print_complete_name_of_preparer', 118, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_name_person_preparing')), 85, 193);

$pdf->writeHTMLCell(190, 1, 13, 194, "", "B", 1, false,   true,  'L',  true);  //.........horizontal line--------
$pdf->writeHTMLCell(1, 11, 84, 189, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
//................
$pdf->SetFont('times', '', 9);
$html = '<div>Daytime Telephone Number</div>';
$pdf->writeHTMLCell(100, 7, 13, 199, $html, 0, 1, false, true, 'L', true);
//................

$pdf->SetFont('times', '', 9);
$html = '<div>Address of Preparer: Street Number and Name</div>';
$pdf->writeHTMLCell(100, 7, 70, 199, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('times', '', 10);
$html = '<div>(  &nbsp;  &nbsp;  &nbsp;  &nbsp;  )</div>';
$pdf->writeHTMLCell(100, 7, 13, 204, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_daytime_telephone_code', 7, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_phone_area_code')), 16, 204);
$pdf->TextField('part_e_daytime_telephone_number', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_phone_number')), 26, 204);
$pdf->TextField('part_e_address_of_preparer_street', 134, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_address_street')), 69, 204);

$pdf->writeHTMLCell(190, 1, 13, 204, "", "B", 1, false,   true,  'L',  true);  //.........horizontal line--------

$pdf->writeHTMLCell(1, 10, 68, 200, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
//................

//................
$pdf->SetFont('times', '', 9);
$html = '<div>Apt. Number</div>';
$pdf->writeHTMLCell(100, 7, 13, 209, $html, 0, 1, false, true, 'L', true);


$html = '<div>City </div>';
$pdf->writeHTMLCell(100, 7, 55, 209, $html, 0, 1, false, true, 'L', true);


$html = '<div>State </div>';
$pdf->writeHTMLCell(100, 7, 110, 209, $html, 0, 1, false, true, 'L', true);

$html = '<div>Zip Code </div>';
$pdf->writeHTMLCell(100, 7, 162, 209, $html, 0, 1, false, true, 'L', true);

//................

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_preparer_address_aptnumber', 41, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_address_apartment')), 13, 214);

$pdf->TextField('part_e_preparer_address_city', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_address_city')), 54, 214);
$pdf->TextField('part_e_preparer_address_state', 52, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_address_state')), 109, 214);

$pdf->TextField('part_e_preparer_address_zipcode', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_person_preparing_address_zip')), 161, 214);

$pdf->writeHTMLCell(1, 10, 53, 210, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
$pdf->writeHTMLCell(1, 10, 108, 210, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
$pdf->writeHTMLCell(1, 10, 160, 210, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
//................

$pdf->writeHTMLCell(190, 28, 13, 223, "", 1, 1, false,   true,  'L',  true);  //............table box 2 -----------

$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(40, 27.5, 13.3, 223.2, "", "R", 1, true, true, 'C', true);
//............

$pdf->SetFont('times', '', 9);
$html = '<div><b>To be completed by an 
attorney or accredited 
representative</b> (if any).</div>';
$pdf->writeHTMLCell(40, 20, 13, 229, $html, 0, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 9);
if (showData('i_589_g28_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<div><b><input type="checkbox" name="g28" value="Y" checked="' . $checked . '"/> &nbsp;  &nbsp; Select this box if 
Form G-28 is 
attached.</b></div>';
$pdf->writeHTMLCell(30, 20, 52, 229, $html, 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(1, 27.5, 82, 223.2, "", "R", 1, false, true, 'C', true); //.......horizontal line 
$pdf->writeHTMLCell(1, 27.5, 130, 223.2, "", "R", 1, false, true, 'C', true); //.......horizontal line 
//...............
$pdf->SetFont('times', '', 9);
$html = '<div><b>Attorney State Bar Number </b>(if 
applicable)</div>';
$pdf->writeHTMLCell(45, 20, 85, 225, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_attorney_state_bar_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 85, 235);

//...............
$pdf->SetFont('times', '', 9);
$html = '<div><b>Attorney or Accredited Representative 
USCIS Online Account Number </b> (if any) </div>';
$pdf->writeHTMLCell(60, 20, 134, 225, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_attorney_online_account_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 134, 235);
/******************************
 ******** End Page No 9 *******
 ******************************/

/******************************
 ******** Start Page No 10*****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 10
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part F. To Be Completed at Asylum Interview, if Applicable</b></div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//...............

$pdf->SetFont('times', '', 9);
$html = '<div><b>NOTE:</b><i> You will be asked to complete this part when you appear for examination before an asylum officer of the Department of Homeland Security, U.S. Citizenship and Immigration Services (USCIS).</i></div>';
$pdf->writeHTMLCell(191, 7, 12, 24, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(191, 7, 12, 28, "", "B", 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 9.3);
if (showData('i_589_asylum_interview_all_true_status') == "Y") $checked_all = "checked";
else $checked_all = "";
if (showData('i_589_not_asylum_interview_true_status') == "Y") $checked_not = "checked";
else $checked_not = "";

$html = '<div>I swear (affirm) that I know the contents of this application that I am signing, including the attached documents and supplements, that they are 
<input type="checkbox" name="swer" value="Y" checked="' . $checked_all . '"/>  all true or <input type="checkbox" name="swer" value="N" checked="' . $checked_not . '"/>  not all true to the best of my knowledge and that correction(s) numbered ______ to ______ were made by me or at my request. 
Furthermore, I am aware that if I am determined to have knowingly made a frivolous application for asylum I will be permanently ineligible for any 
benefits under the Immigration and Nationality Act, and that I may not avoid a frivolous finding simply because someone advised me to provide 
false information in my asylum application.</div>';
$pdf->writeHTMLCell(185, 7, 12, 36, $html, 0, 1, false, true, 'L', true);
//..............
$pdf->SetFont('times', '', 9);
$html = '<div>Signed and sworn to before me by the above named applicant on:</div>';
$pdf->writeHTMLCell(190, 7, 100, 57, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Signature of Applicant</div>';
$pdf->writeHTMLCell(70, 7, 22, 73, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Date <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 110, 73, $html, "T", 1, false, true, 'C', true);
//...........


$pdf->SetFont('times', '', 9);
$html = '<div>Write Your Name in Your Native Alphabet</div>';
$pdf->writeHTMLCell(70, 7, 22, 90, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Signature of Asylum Officer</div>';
$pdf->writeHTMLCell(80, 7, 110, 90, $html, "T", 1, false, true, 'C', true);

//...........
$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Part G. To Be Completed at Removal Hearing, if Applicable</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 100, $html3, 1, 1, true, true, 'L', true);
//...............

$pdf->SetFont('times', '', 9);
$html = '<div><b>NOTE:</b><i> You will be asked to complete this Part when you appear before an immigration judge of the U.S. Department of Justice, Executive Office 
for Immigration Review (EOIR), for a hearing. </i></div>';
$pdf->writeHTMLCell(191, 7, 12, 110, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(191, 7, 12, 114, "", "B", 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 9);
$html = '<div>I swear (affirm) that I know the contents of this application that I am signing, including the attached documents and supplements, that they are 
<input type="checkbox" name="affirm" value="Y"/> all true or <input type="checkbox" name="affirm" value="N"/> not all true to the best of my knowledge and that correction(s) numbered ______ to ______ were made by me or at my request. 
Furthermore, I am aware that if I am determined to have knowingly made a frivolous application for asylum I will be permanently ineligible for any 
benefits under the Immigration and Nationality Act, and that I may not avoid a frivolous finding simply because someone advised me to provide 
false information in my asylum application.</div>';
$pdf->writeHTMLCell(180, 7, 12, 124, $html, 0, 1, false, true, 'L', true);

//..............
$pdf->SetFont('times', '', 9);
$html = '<div>Signed and sworn to before me by the above named applicant on:</div>';
$pdf->writeHTMLCell(190, 7, 100, 148, $html, 0, 1, false, true, 'L', true);
//...........

//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Signature of Applicant</div>';
$pdf->writeHTMLCell(70, 7, 22, 165, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Date <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 110, 165, $html, "T", 1, false, true, 'C', true);
//...........

$pdf->SetFont('times', '', 9);
$html = '<div>Write Your Name in Your Native Alphabet</div>';
$pdf->writeHTMLCell(70, 7, 22, 185, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html = '<div>Signature of Immigration Judge</div>';
$pdf->writeHTMLCell(80, 7, 110, 185, $html, "T", 1, false, true, 'C', true);
/******************************
 ******** End Page No 10 *******
 ******************************/

/******************************
 ******** Start Page No 11 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');  // page number 11

$pdf->SetFont('times', 'B', 13);
$html = '<div>Supplement A, Form I-589</div>';
$pdf->writeHTMLCell(80, 7, 137, 5, $html, 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(191, 20, 13, 17, "", 1, 1, false, true, 'C', true);

$pdf->writeHTMLCell(191, 1, 13, 20, "", "B", 1, false, true, 'C', true); //......horizontal line ---------------
$pdf->writeHTMLCell(1, 20, 103, 17, "", "R", 1, false, true, 'C', true); //......horizontal line ---------------
//.........
$pdf->SetFont('times', '', 9);
$html = '<div>A-Number <i>(If available)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 16, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html = '<div>Date</div>';
$pdf->writeHTMLCell(80, 7, 105, 16, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_date', 100, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_removal_hearing_date')), 104, 21);

//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Applicant\'s Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 26, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Applicant\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 104, 26, $html, 0, 1, false, true, 'L', true);



$pdf->writeHTMLCell(191, 11, 13, 40, "", 1, 1, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 12);
$html = '<div><b>List All of Your Children, Regardless of Age or Marital Status</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 40, $html, 0, 1, false, true, 'L', true);
//...............

$pdf->SetFont('times', '', 9);
$html = '<div><b>(NOTE:</b><i> Use this form and attach additional pages and documentation as needed, if you have more than four children)</i></div>';
$pdf->writeHTMLCell(191, 7, 13, 45, $html, 0, 1, false, true, 'L', true);
//.............

$pdf->writeHTMLCell(191, 172, 13, 55, "", 1, 1, false, true, 'L', true); // table start ------------------------------------

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>1. </b>Alien Registration Number (A-Number)<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_alien_registration_number', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_alien_registration_number5')), 13, 63);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>2. </b> Passport/ID Card Number<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_passport_idcard_number', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_passport_id_card_number5')), 69, 63);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>3. </b> Marital Status <i>(Married, Single,<br>&nbsp; &nbsp; Divorced, Widowed)  </div>';
$pdf->writeHTMLCell(80, 7, 112, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_marital_status', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_marital_status5')), 111, 63);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4. </b> U.S. Social Security Number<br>&nbsp; &nbsp;<i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_us_social_security_number', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_social_security_number5')), 158, 63);
//............
$pdf->writeHTMLCell(191, 1, 13, 63, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

$pdf->writeHTMLCell(1, 34, 68, 55, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 34, 110, 55, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 34, 157, 55, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------


//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>5. </b> Complete Last Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_complete_last_name', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_complete_last_name5')), 13, 73);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6. </b> First Name</div>';
$pdf->writeHTMLCell(80, 7, 70, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_first_name', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_first_name5')), 69, 73);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>7. </b> Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 112, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_middle_name', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_middle_name5')), 111, 73);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8. </b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_date_of_birth', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_birth5')), 158, 73);
//............
//............
$pdf->writeHTMLCell(191, 1, 13, 73, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------


//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>9. </b> City and Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 13, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_city_country_birth', 56, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_city_country_of_birth5')), 13, 83);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10. </b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_nationality_citizen', 42, 6.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_nationality5')), 69, 83);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>11. </b>Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(80, 7, 112, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_race_ethnic_tribal', 47, 6.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_ethnic_group5')), 111, 83);
//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_gender5') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_child_gender5') == "female") $checked_female = "checked";
else $checked_female = "";
$html = '<div><b>12. </b>Gender<br> &nbsp; &nbsp;<input type="checkbox" name="g_gender" value="m" checked="' . $checked_male . '"/> Male  <input type="checkbox" name="g_gender" value="F" checked="' . $checked_female . '"/>  Female </div>';
$pdf->writeHTMLCell(80, 7, 159, 78, $html, 0, 1, false, true, 'L', true);
//............

$pdf->writeHTMLCell(191, 1, 13, 84, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------
//............

//..........
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_in_us5') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_in_us5') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>13. </b>Is this child in the U.S. ?  <input type="checkbox" name="g_child" value="y" checked="' . $checked_Y . '"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  <input type="checkbox" name="g_child" value="n" checked="' . $checked_N . '"/>  No <i>(Specify location)</i>:</div>';
$pdf->writeHTMLCell(180, 7, 13, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_specify_location', 70, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_location_if_not_in_us5')), 133, 90);
//............
$pdf->writeHTMLCell(191, 1, 13, 91, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>14. </b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(80, 7, 13, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_place_last_entry_in_us', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_place_of_last_entry5')), 13, 104);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>15. </b>Date of last entry into the<br>  &nbsp;  &nbsp;
U.S. <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_date_last_entry_us', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_last_entry5')), 69, 104);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>16. </b> I-94 Number <i>(If any)</i></div>';
$pdf->writeHTMLCell(80, 7, 112, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_I_94_number_if_any', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_i94_number5')), 111, 104);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>17. </b>Status when last admitted<br> &nbsp; &nbsp; <i>(Visa type, if any)</i> </div>';
$pdf->writeHTMLCell(80, 7, 159, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_status_when_last_submited', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_status_when_last_admitted5')), 159, 104);
//............
$pdf->writeHTMLCell(191, 1, 13, 104, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

$pdf->writeHTMLCell(1, 13, 68, 97, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 13, 110, 97, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 13, 157, 97, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>18. </b>  What is your child\'s current status?</div>';
$pdf->writeHTMLCell(80, 7, 13, 110, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_your_child_current_status', 61, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_current_status5')), 13, 118);
//..........

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>19. </b> What is the expiration date of his/her<br> &nbsp;  &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 75, 110, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_authorized_expire_date', 62, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_expiration_date_of_stay5')), 74, 118);
//..........

//..........
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_child_in_court_proceedings5') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_child_in_court_proceedings5') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>20.</b>Is your child in Immigration Court proceedings?<br><br> &nbsp; &nbsp;  <input type="checkbox" name="g_proceding" value="y" checked="' . $checked_Y . '" />   Yes   &nbsp;  &nbsp;  <input type="checkbox" name="g_proceding" value="n" checked="' . $checked_N . '" />   No </div>';
$pdf->writeHTMLCell(80, 7, 136, 110, $html, 0, 1, false, true, 'L', true);


//............
$pdf->writeHTMLCell(191, 1, 13, 119, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

$pdf->writeHTMLCell(1, 14, 73, 110, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 14, 135, 110, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i></div>';
$pdf->writeHTMLCell(180, 7, 13, 124, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
if (showData('i_589_include_child_in_application5') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_include_child_in_application5') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="if_in" value="y" checked="' . $checked_Y . '" /> &nbsp;  Yes <i>(Attach one photograph of your child in the upper right corner of Page 9 on the extra copy of the application submitted for this person.) </i> <br><br><input type="checkbox" name="if_in" value="n" checked="' . $checked_N . '" /> &nbsp;  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 128, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(191, 1, 13, 135, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------



//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>1. </b>Alien Registration Number (A-Number)<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_alien_registration_number', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_alien_registration_number6')), 13, 148);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>2. </b> Passport/ID Card Number<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_passport_idcard_number', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_passport_id_card_number6')), 69, 148);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>3. </b> Marital Status <i>(Married, Single,<br>&nbsp; &nbsp; Divorced, Widowed)  </div>';
$pdf->writeHTMLCell(80, 7, 112, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_marital_status', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_marital_status6')), 111, 148);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>4. </b> U.S. Social Security Number<br>&nbsp; &nbsp;<i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_us_social_security_number', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_social_security_number6')), 158, 148);
//............
$pdf->writeHTMLCell(191, 1, 13, 148, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

$pdf->writeHTMLCell(1, 34, 68, 140, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 34, 110, 140, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 34, 157, 140, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------


//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>5. </b> Complete Last Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_complete_last_name', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_complete_last_name6')), 13, 158);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>6. </b> First Name</div>';
$pdf->writeHTMLCell(80, 7, 70, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_first_name', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_first_name6')), 70, 158);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>7. </b> Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 112, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_middle_name', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_middle_name6')), 112, 158);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>8. </b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_date_of_birth', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_birth6')), 159, 158);
//............
//............
$pdf->writeHTMLCell(191, 1, 13, 158, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------


//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>9. </b> City and Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 13, 163, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_city_country_birth', 56, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_city_country_of_birth6')), 13, 168);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>10. </b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 163, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_nationality_citizen', 42, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_nationality6')), 69, 168);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>11. </b>Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(80, 7, 112, 163, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_race_ethnic_tribal', 47, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_ethnic_group6')), 111, 168);
//............
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_gender6') == "male") $checked_male = "checked";
else $checked_male = "";
if (showData('i_589_child_gender6') == "female") $checked_female = "checked";
else $checked_female = "";
$html = '<div><b>12. </b>Gender<br> &nbsp; &nbsp;<input type="checkbox" name="g2_gender" value="N" checked="' . $checked_male . '" /> Male  <input type="checkbox" name="g2_gender" value="F" checked="' . $checked_female . '"/>  Female </div>';
$pdf->writeHTMLCell(80, 7, 159, 163, $html, 0, 1, false, true, 'L', true);
//............

$pdf->writeHTMLCell(191, 1, 13, 169, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------
//............

//..........
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_in_us6') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_in_us6') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>13. </b>Is this child in the U.S. ?  <input type="checkbox" name="g2_child" value="y" checked="' . $checked_Y . '"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  <input type="checkbox" name="g2_child" value="n" checked="' . $checked_N . '"/>  No <i>(Specify location)</i>:</div>';
$pdf->writeHTMLCell(180, 7, 13, 175, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_specify_location', 70, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_location_if_not_in_us6')), 133, 175);
//............
$pdf->writeHTMLCell(191, 1, 13, 176, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>14. </b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(80, 7, 13, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_place_last_entry_in_us', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_place_of_last_entry6')), 13, 189);

//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>15. </b>Date of last entry into the<br>  &nbsp;  &nbsp;
U.S. <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_date_last_entry_us', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_date_of_last_entry6')), 69, 189);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>16. </b> I-94 Number <i>(If any)</i></div>';
$pdf->writeHTMLCell(80, 7, 112, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_I_94_number_if_any', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_i94_number6')), 111, 189);
//............
$pdf->SetFont('times', '', 9);
$html = '<div><b>17. </b>Status when last admitted<br> &nbsp; &nbsp; <i>(Visa type, if any)</i> </div>';
$pdf->writeHTMLCell(80, 7, 159, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_status_when_last_submited', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_status_when_last_admitted6')), 158, 189);
//............
$pdf->writeHTMLCell(191, 1, 13, 189, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

$pdf->writeHTMLCell(1, 13, 68, 182, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 13, 110, 182, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 13, 157, 182, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>18. </b>  What is your child\'s current status?</div>';
$pdf->writeHTMLCell(80, 7, 13, 195, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_your_child_current_status', 61, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_current_status6')), 13, 203);
//..........

//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>19. </b> What is the expiration date of his/her<br> &nbsp;  &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 75, 195, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_authorized_expire_date', 62, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_589_child_expiration_date_of_stay6')), 74, 203);
//..........

//..........
$pdf->SetFont('times', '', 9);
if (showData('i_589_child_medical_condition6') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_child_medical_condition6') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><b>20.</b>Is your child in Immigration Court proceedings?<br><br> &nbsp; &nbsp;  <input type="checkbox" name="g2_proceding" value="y"checked="' . $checked_Y . '" />   Yes   &nbsp;  &nbsp;  <input type="checkbox" name="g2_proceding" value="n"checked="' . $checked_N . '" />   No </div>';
$pdf->writeHTMLCell(80, 7, 136, 195, $html, 0, 1, false, true, 'L', true);


//............
$pdf->writeHTMLCell(191, 1, 13, 204, "", "B", 1, false, true, 'L', true); //.......horizontal line -----------------

$pdf->writeHTMLCell(1, 14, 73, 195, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
$pdf->writeHTMLCell(1, 14, 135, 195, "", "R", 1, false, true, 'L', true); // ........verticale line ------------------
//..........
$pdf->SetFont('times', '', 9);
$html = '<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i></div>';
$pdf->writeHTMLCell(180, 7, 13, 209, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
if (showData('i_589_include_child_in_application6') == "Y") $checked_Y = "checked";
else $checked_Y = "";
if (showData('i_589_include_child_in_application6') == "N") $checked_N = "checked";
else $checked_N = "";
$html = '<div><input type="checkbox" name="if_in2" value="y" checked="' . $checked_Y . '"/> &nbsp;  Yes <i>(Attach one photograph of your child in the upper right corner of Page 9 on the extra copy of the application submitted for this person.) </i> <br><br><input type="checkbox" name="if_in2" value="n" checked="' . $checked_N . '"/> &nbsp;  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 213, $html, 0, 1, false, true, 'L', true);
/******************************
 ******** End Page No 11 *******
 ******************************/

/******************************
 ******** Start Page No 12*****
 ******************************/
$pdf->AddPage('P', 'LETTER');

$pdf->SetFont('times', 'B', 13);
$html = '<div>Supplement B, Form I-589</div>';
$pdf->writeHTMLCell(80, 7, 137, 5, $html, 0, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 12);
$html3 = '<div><b>Additional Information About Your Claim to Asylum</b></div>';
$pdf->writeHTMLCell(191, 5, 13, 17, $html3, 1, 1, true, true, 'L', true);
//...............
$pdf->writeHTMLCell(191, 20, 13, 27, "", 1, 1, false, true, 'C', true);
$pdf->writeHTMLCell(191, 1, 13, 30, "", "B", 1, false, true, 'C', true); //......horizontal line ---------------
$pdf->writeHTMLCell(1, 20, 103, 27, "", "R", 1, false, true, 'C', true); //......horizontal line ---------------
//.........
$pdf->SetFont('times', '', 9);
$html = '<div>A-Number <i>(If available)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 26, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$html = '<div>Date</div>';
$pdf->writeHTMLCell(80, 7, 105, 26, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_asylum_date', 100, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('additional_info_claim_to_asylum_date')), 104, 31);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Applicant\'s Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 36, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div>Applicant\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 104, 36, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>NOTE:</b> <i>Use this as a continuation page for any additional information requested. Copy and complete as needed.</i></div>';
$pdf->writeHTMLCell(180, 7, 13, 50, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(190, 7, 13, 52, "", "B", 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$html = '<div><b>Part</b></div>';
$pdf->writeHTMLCell(180, 7, 13, 60, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>Question</b></div>';
$pdf->writeHTMLCell(180, 7, 13, 68, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_asylum_part', 30, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('additional_info_claim_to_asylum_part')), 30, 60);
$pdf->writeHTMLCell(29.5, 1, 30, 60, '', "B", 1, false, true, 'L', true);
$pdf->TextField('additional_asylum_question', 30, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('additional_info_claim_to_asylum_question')), 30, 68);
$pdf->writeHTMLCell(29.5, 1, 30, 68, '', "B", 1, false, true, 'L', true);

//............
$pdf->SetFont('courier', 'B', 10);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('i_589_aditional_info1', 190, 177, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('additional_info_claim_to_asylum_value')), 14, 79);
















// 'part_e_attorney_online_account_number':' $attorneyData->uscis_online_account_number ',
// 'part_e_attorney_state_bar_number':' $attorneyData->bar_number',
$js = "
var fields = {
   'i_589_aditional_info1':' ',



    

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
$pdf->Output('I-589.pdf', 'I');
