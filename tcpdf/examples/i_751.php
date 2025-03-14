<?php

// require_once('formheader.php');   //database connection file 

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

        $this->Cell(40, 6, "Form I-751  Edition 04/01/24", 0, 0, 'L');



        // $barcode_image = "images/I-751-footer-pdf417-$this->page.png";
        $barcode_image = "images/i751/I-751-footer-pdf417-$this->page.png";

        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);


        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 158, 264.5, true);
    }
}



$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-751');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(13.7, 15.3, 12.8, true);


// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);




/********************************
 ******** Page No 1 **********
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

// define barcode style


// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);    // set font
$pdf->MultiCell(100, 15, "Petition to Remove Conditions on Residence", 0, 'C', 0, 1, 55, 11, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-751", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0038\nExpires 02/28/2026", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(190, 55, 13, 35, '',  1,  0, false, false, 'C', true);
$pdf->writeHTMLCell(15, 54.5, 13.2, 35.2, '',  'R',  1, true, true, 'L', true);
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(15, 30, 13, 50, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(30, 15, 50, 35, 'Receipt', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(30, 15, 118, 35, 'Action Block', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(30, 15, 170, 35, 'Remarks', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(72.5, 1, 28.5, 53, '',  'B',  1, false, true, 'L', false);
$pdf->writeHTMLCell(72.5, 1, 28.5, 58, '',  'B',  1, false, true, 'L', false);
$pdf->writeHTMLCell(72.5, 1, 28.5, 69, '',  'B',  1, false, true, 'L', false);

$pdf->writeHTMLCell(30, 15, 35, 56, 'Reloc Sent', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(30, 15, 68, 56, 'Reloc Received', 0, 1, false, true, 'C', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(30, 15, 32, 62, "Date (dd/mm/yyyy)\n_____/_____/____/", 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(30, 15, 68, 62, "Date (dd/mm/yyyy)\n_____/_____/____/", 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(30, 15, 68, 73, "Date (dd/mm/yyyy)\n_____/_____/____/", 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(30, 15, 32, 73, "Date (dd/mm/yyyy)\n_____/_____/____/", 0, 1, false, true, 'C', true);
$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(3, 1, 30, 85.5, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html = "<div><b>Petitioner interview on </b>(mm/dd/yyyy) ____/___/___/</div>";
$pdf->writeHTMLCell(80, 5, 32, 84, $html, "R", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(3, 1, 115, 85.5, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9.5);
$html = "<div><b>Approved under INA 216(c)(4)(C) Battered Spouse/Child</b></div>";
$pdf->writeHTMLCell(90, 5, 115, 84, $html, 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(1, 27, 64, 57, '',  'R',  1, false, true, 'L', false);
$pdf->writeHTMLCell(1, 49, 100, 35, '',  'R',  1, false, true, 'L', false);
$pdf->writeHTMLCell(1, 49, 168, 35, '',  'R',  1, false, true, 'L', false);

$pdf->writeHTMLCell(174.3, 1, 28.5, 84, '',  'T',  1, false, true, 'L', false);

//table end 


// table 2 start 
$pdf->writeHTMLCell(190, 18, 13, 92, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(1, 18, 56, 92, '',  'R',  1, false, true, 'L', false);
$html = "<div><b>To be completed by an attorney or accredited representative </b>(if any).</div>";
$pdf->writeHTMLCell(45, 10, 13, 92, $html, 0, 1, false, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 11);
$html = '<div> <input type="checkbox" name="agree" value="1" checked=" " />  Select this box if Form G-28 is <br> attached.</div>';
$pdf->writeHTMLCell(40, 18, 53, 92, $html, 'R', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 18, 93, 92, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 102);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 138, 92, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 102);
//....table 2 end .........

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 16, 110, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 10, 110, false); // angle 1
$pdf->StopTransform();

//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About You, the Conditional Resident</b></div>';
$pdf->writeHTMLCell(90, 12, 13, 117, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 129, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 131);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 138, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 140);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 149, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 149);

//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Other Names Used </b></div>';
$pdf->writeHTMLCell(90, 5, 13, 158, $html, 0, 1, true, false, 'L', true);

//......
$pdf->SetFont('times', '', 10);
$html = '<div>List all other names you have ever used, including aliases,
maiden name, and nicknames. If you need extra space to
complete this section, use the space provided in <b>Part 11.
Additional Information.<b/></div>';
$pdf->writeHTMLCell(90, 12, 13, 165, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 181, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_your_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 183);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 190, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_your_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 192);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 7, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_your_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 201);

//......
$pdf->writeHTMLCell(91, 2, 12, 210, '', 'T', 1, false, false, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 12, 210, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other2_your_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 212);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 12, 219, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other2_your_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 221);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 7, 12, 229, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other2_your_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 230);
//......
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Other Information </b></div>';
$pdf->writeHTMLCell(90, 5, 13, 238.5, $html, 0, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b> Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 4, 12, 246, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_date_of_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 68, 247);
//........

//.....page 1 left end ...................

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 112, 115, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 120.5);
//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.   </b> Country of Citizenship or Nationality (provide all that <br> &nbsp; &nbsp; &nbsp; apply)</div>';
$pdf->writeHTMLCell(90, 7, 112, 127, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_country_of_citizen', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 137);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.   </b> Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 145, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_align_reg_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 150);
$pdf->SetFont('times', '', 12);
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell(10, 7, 145, 150, $html, 0, 1, false, true, 'J', true);
//.....
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 120, 86, false); // angle 2
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 133, 91, false); // angle 3
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 127, 107, false); // angle 4
$pdf->StopTransform();

//...
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.   </b> U.S. Social Security Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 157, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_social_security_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 162);
//....

$pdf->SetFont('times', '', 10);
$html = '<div><b>9.   </b>  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 169, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_usis_onl_acnt_number', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 139, 174);
//....
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 12);
$html = '<div><b> Marital Status </b></div>';
$pdf->writeHTMLCell(90, 5, 113, 183, $html, 0, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.   </b> Marital Status</div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div> <input type="checkbox" name="single" value="single" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 118, 195, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 124, 195.5, "Single", 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div> <input type="checkbox" name="married" value="married" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 136, 195, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 142, 195.5, "Married", 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div> <input type="checkbox" name="divorced" value="divorced" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 156, 195, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 162, 195.5, "Divorced", 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div> <input type="checkbox" name="widowed" value="widowed" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 176, 195, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 182, 195.5, "Widowed", 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>11.</b>&nbsp;&nbsp;&nbsp;Date of Marriage (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(60, 5, 112, 202, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_date_of_marriage', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 202);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>12.</b>&nbsp;&nbsp;&nbsp;Place of Marriage </div>';
$pdf->writeHTMLCell(60, 5, 112, 208, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_place_of_marriage', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 213.5);
//........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 112, 220, "<b>13.</b>", 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(90, 7, 119, 220, "If the marriage through which you gained conditional <br>
residence has ended, provide the date it ended (date of <br>
divorce or date of death) (mm/dd/yyyy)", 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_date_of_death', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 233);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>14.</b>&nbsp;&nbsp;&nbsp;Conditional Residence Expires On (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 6, 112, 241, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_residence_expire_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 247);



/********************************
 ******** End Page No 1 **********
 *********************************/

/********************************
 ******** Start Page No 2 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 2


$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html = '<div><b>Part 1. Information About You, the Conditional Resident</b>(continued)</div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 0, true, true, 'L', true);



//..........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b> Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 30, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>15.a. </b>&nbsp; In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mail_in_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 42);
//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>15.b.</b></div>';
$pdf->writeHTMLCell(40, 12, 12, 50, $html, 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(40, 12, 22, 46, "Street Number<br>and Name", 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mail_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 46, 51);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>15.c. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 60, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11); // set font
$html = '<div><input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 21, 60, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mail_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 59.5);

//......

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 5, 12, 68, "<b>15.d.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 5, 22, 68, "City or Town", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mail_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 67.7);
//............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 0, 12, 76,"<b>15.e.</b>", '', 0, 0, true, 'L');
$pdf->writeHTMLCell(50, 0, 22, 76,"State", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="information_about_you_mail_state" size="0.75">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 30, 74.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>15.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 76, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mail_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 76);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>16. </b></div>';
$pdf->writeHTMLCell(8, 7, 12, 83, $html, 0, 1, false, true, 'J', true);
$html = '<div>Is your physical address different than your mailing address? </div>';
$pdf->writeHTMLCell(84, 7, 22, 83, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="address" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="address" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 75, 87, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>If you answered "Yes" to <b>Item Number 16.</b>, provide your
physical address below.</div>';
$pdf->writeHTMLCell(85, 7, 22, 93, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b> Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 103, $html, 0, 0, true, true, 'L', true);


//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>17.a. </b>&nbsp;&nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 110, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_physical_in_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 114.5);
//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>17.b.</b></div>';
$pdf->writeHTMLCell(40, 12, 12, 122, $html, 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(40, 12, 22, 118, "Street Number<br>and Name", 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_physical_mail_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 46, 123);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>17.c. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 132, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11); // set font
$html = '<div><input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 21, 132, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_physical_apt_ste_flr', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 132);

//......

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>17.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 141, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_physical_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 140.5);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>17.e.</b>&nbsp;&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="information_physical_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 149, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>17.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 149);

//..........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Additional Information About You </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 158, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>18. </b></div>';
$pdf->writeHTMLCell(8, 7, 12, 165, $html, 0, 1, false, true, 'L', true);
$html = '<div>Are you in removal, deportation, or rescission
proceedings?</div>';
$pdf->writeHTMLCell(86, 7, 19, 165, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="additional" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="additional" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 75, 170, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>19. </b></div>';
$pdf->writeHTMLCell(8, 7, 12, 176, $html, 0, 1, false, true, 'J', true);
$html = '<div>Was a fee paid to anyone other than an attorney in 
  connection with this petition? </div>';
$pdf->writeHTMLCell(86, 7, 19, 176, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="fee_paid" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="fee_paid" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 75, 181, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>20. </b></div>';
$pdf->writeHTMLCell(8, 7, 12, 187, $html, 0, 1, false, true, 'J', true);
$html = '<div>Have you ever been arrested, detained, charged, indicted,
fined, or imprisoned for breaking or violating any law or
ordinance (excluding traffic regulations), or committed
any crime which you were not arrested in the United
States or abroad?</div>';
$pdf->writeHTMLCell(86, 10, 19, 187, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="ever_arrested" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="ever_arrested" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(92, 7, 75, 206, $html, 0, 1, false, true, 'J', true);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div>If you answered "Yes" to <b>Item Number 20.</b>, provide a detailed
explanation in <b>Part 11. Additional Information</b> or on a
separate sheet of paper, and refer to the <b>What Initial Evidence
Is Required</b> section of the Form 1-751 instructions to determine
what criminal history document to include with your petition.</div>';
$pdf->writeHTMLCell(92, 15, 13, 214, $html, 0, 1, false, true, 'L', false);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>21. </b></div>';
$pdf->writeHTMLCell(8, 7, 112, 17, $html, 0, 1, false, true, 'J', true);
$html = '<div>If you are married, is this a different marriage than the
one through which you gained conditional resident status? </div>';
$pdf->writeHTMLCell(85, 7, 119, 17, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="are_married" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="are_married" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 170, 26.5, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>22. </b></div>';
$pdf->writeHTMLCell(8, 7, 112, 31, $html, 0, 1, false, true, 'J', true);
$html = '<div>Have you resided at any other address since you became a
permanent resident?</div>';
$pdf->writeHTMLCell(85, 7, 119, 31, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="resided" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="resided" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 170, 36.5, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>If you answered "Yes" to <b>Item Number 22.</b>, provide a list of all<br>
addresses where you have resided since becoming a permanent<br>
resident and the dates you resided at those locations in the space<br>
provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(100, 7, 112, 44, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>23. </b></div>';
$pdf->writeHTMLCell(8, 7, 112, 65, $html, 0, 1, false, true, 'J', true);
$html = '<div>Is your spouse or parent\'s spouse currently serving with or
employed by the U.S. Government and serving outside
the United States?</div>';
$pdf->writeHTMLCell(85, 7, 119, 65, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="spouse_parent" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="spouse_parent" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 170, 75, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 2. Biographic Information </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 85, $html, 1, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.     </b>     Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(90, 7, 112, 92, $html, 0, 1, false, false, 'J', true);
//.........

$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="ethnicity" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 97, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 97, "Hispanic or Latino ", 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="ethnicity" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 103, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 103, "Not Hispanic or Latino ", 0, 1, false, true, 'J', true);
//..........



$pdf->SetFont('times', '', 10);
$html = '<div><b>2.     </b>     Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(90, 7, 112, 108, $html, 0, 1, false, false, 'J', true);

//....
$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="white" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 113, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 113, "White ", 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="asian" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 118.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 118.5, "Asian ", 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="black_2" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 123.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 123.5, "Black or African American ", 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="american" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 128.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 128.5, "American Indian or Alaska Native ", 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="native" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 117, 133.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 123.5, 133.5, "Native Hawaiian or Other Pacific Islander", 0, 1, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.   </b>  Height </div>';
$pdf->writeHTMLCell(30, 7, 112, 140, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Feet </div>';
$pdf->writeHTMLCell(90, 7, 155, 141.3, $html, 0, 0, false, true, 'J', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$html = '<div>
<select name="biographic_info_feet" size="0.5">
    <option value=" ">FT </option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 162, 141, $html, 0, 0, false, true, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div>Inches  </div>';
$pdf->writeHTMLCell(90, 7, 177.5, 141.3, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$html1 = '<div>
<select name="biographic_info_inches" size="0.5">
    <option value=" ">Inc</option>
    <option value="2">0</option>
    <option value="2">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 188.5, 141, $html1, 0, 0, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.    </b>   Weight  </div>';
$pdf->writeHTMLCell(50, 7, 112, 150, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div> Pounds </div>';
$pdf->writeHTMLCell(50, 7, 171, 151, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->setCellHeightRatio(2); // set cell height ratio
$html = <<<EOD
<input type="text" name="biographic_info_pound1" value="" size="1.5" maxlength="2" />&nbsp;<input type="text" name="biographic_info_pound2" value="" size="1.5" maxlength="2" />&nbsp;<input type="text" name="biographic_info_pound3" value="" size="1.5" maxlength="2" />
EOD;

// output the HTML content
$pdf->writeHTMLCell(90, 7, 184, 150, $html, 0, 0, false, true, 'J', true);

$pdf->setCellHeightRatio(1.1); // set cell height ratio
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 112, 157, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 11);
$html = '<div>   
<input type="checkbox" name="black" value="black_eye" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="blue" value="blue" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="brown" value="brown" checked="" /> 
</div>';
$pdf->writeHTMLCell(90, 7, 115, 163, $html, 0, 0, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>Black  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Brown</div>';
$pdf->writeHTMLCell(90, 7, 122, 163, $html, 0, 0, false, true, 'J', true);
//......................
$pdf->SetFont('times', '', 11);
$html = '<div>   
<input type="checkbox" name="gray1" value="gray" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="green " value="green" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="hazel " value="hazel" checked="" />  
</div>';
$pdf->writeHTMLCell(90, 7, 115, 169, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Gray  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Green &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hazel</div>';
$pdf->writeHTMLCell(90, 7, 122, 169, $html, 0, 0, false, true, 'J', true);
//................................
$pdf->SetFont('times', '', 11);
$html = '<div>   
<input type="checkbox" name="maroon" value="maroon" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="pink" value="pink" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="unknown" value="unknown" checked="" />   
</div>';
$pdf->writeHTMLCell(90, 7, 115, 175, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Maroon  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pink &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unknown/Other</div>';
$pdf->writeHTMLCell(90, 7, 122, 175, $html, 0, 0, false, true, 'J', true);









//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 112, 182, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 11);
$html = '<div>   
<input type="checkbox" name="blad" value="blad" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="black_hair" value="black" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="blond" value="blond" checked="" /> 
</div>';
$pdf->writeHTMLCell(90, 7, 115, 188, $html, 0, 0, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html = '<div>Bald (No hair)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Black &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Brown</div>';
$pdf->writeHTMLCell(90, 7, 122, 188, $html, 0, 0, false, true, 'J', true);


//..........................
$pdf->SetFont('times', '', 11);
$html = '<div>   
<input type="checkbox" name="brown " value="brown" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="gray " value="gray" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="red " value="red" checked="" />
</div>';
$pdf->writeHTMLCell(90, 7, 115, 194, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Brown &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gray&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Red</div>';
$pdf->writeHTMLCell(90, 7, 122, 194, $html, 0, 0, false, true, 'J', true);


//..........................
$pdf->SetFont('times', '', 11);
$html = '<div>   
<input type="checkbox" name=" sandy" value=" sandy" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="white" value="white" checked="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="unknown2" value="unknown" checked="" />
</div>';
$pdf->writeHTMLCell(90, 7, 115, 200, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Sandy &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;White&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unknown/Other</div>';
$pdf->writeHTMLCell(90, 7, 122, 200, $html, 0, 0, false, true, 'J', true);
/********************************
 ******** End Page No 2 **********
 *********************************/

/********************************
 ******** Start Page No 3 ********
 *********************************/
$pdf->AddPage('P', 'LETTER'); //page number 03
//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 3. Basis for Petition </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Joint Filing</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 26, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>My conditional residence is based on my marriage or my<br>
parent\'s marriage to a U.S. citizen or lawful permanent resident,<br>
and I am filing this joint petition together with (Select <b>only one<br>
box</b>):</div>';
$pdf->writeHTMLCell(98, 7, 12, 34, $html, 0, 0, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 53, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="my_spouse" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 53, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div> My spouse.</div>';
$pdf->writeHTMLCell(50, 7, 25, 53, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 60, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="my_parent" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 60, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>My parent\'s spouse because I am unable to be
included in a joint petition filed by my parent and my
parent\'s spouse.</div>';
$pdf->writeHTMLCell(80, 7, 26, 60, $html, 0, 1, false, true, 'L', true);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>OR</b> (Select <b>all</b> applicable boxes in the next section.)</div>';
$pdf->writeHTMLCell(80, 7, 12, 78, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Waiver or Individual Filing Request</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 85, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>My conditional residence is based on my marriage or my
parent\'s marriage to a U.S. citizen or lawful permanent resident,
I am unable to file a joint petition with my spouse or my
parent\'s spouse, because</div>';
$pdf->writeHTMLCell(92, 7, 12, 93, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 112, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="decased" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 112, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>My spouse is deceased.</div>';
$pdf->writeHTMLCell(50, 7, 25, 112, $html, 0, 1, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 119, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="marriage_enter" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 119, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>My marriage was entered in good faith, but the
marriage was terminated through divorce or
annulment.</div>';
$pdf->writeHTMLCell(80, 7, 26, 119, $html, 0, 1, false, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.e. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 134, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="p3_1d" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 134, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I entered the marriage in good faith, and, during the
marriage, I was battered, or was the subject of
extreme cruelty, by my U.S. citizen or lawful
permanent resident spouse.</div>';
$pdf->writeHTMLCell(80, 7, 26, 134, $html, 0, 1, false, true, 'L', true);

//.......


$pdf->SetFont('times', '', 10);
$html = '<div><b>1.f. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 154, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="parent_enter" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 154, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>My parent entered the marriage in good faith, and,
during the marriage, I was battered, or was subjected
to extreme cruelty, by my parent\'s U.S. citizen or
lawful permanent resident spouse or by my
conditional resident parent.</div>';
$pdf->writeHTMLCell(80, 7, 26, 154, $html, 0, 1, false, true, 'L', true);




//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.g. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 179, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="termination" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 179, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>The termination of my status and removal from the
United States would result in an extreme hardship.</div>';
$pdf->writeHTMLCell(80, 7, 26, 179, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 4. Information About the U.S. Citizen or
Lawful Permanent Resident Spouse. If Filing as
a Child Separately, Information About the U.S.
Citizen or Lawful Permanent Resident
Stepparent Through Whom You Gained Your
Conditional Residence.</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 190, $html, 1, 0, true, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>Relationship</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 225, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 232, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="former_spouse" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 232, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Spouse or Former Spouse</div>';
$pdf->writeHTMLCell(50, 7, 25, 232, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b></div>';
$pdf->writeHTMLCell(50, 7, 12, 240, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="former_parent" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 19, 240, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Parent\'s Spouse or Former Spouse</div>';
$pdf->writeHTMLCell(80, 7, 26, 240, $html, 0, 1, false, true, 'J', true);
//...........page 3 left side end ..................................
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 25, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146, 27);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 34, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146, 36);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 7, 112, 45, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146, 45);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 54, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 164, 54);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>U.S. Social Security Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 112, 62, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_us_social_security', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 67);

//........


//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>A-Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 112, 74, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 79);
$pdf->SetFont('times', '', 10);
$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 148, 80, $html, 0, 1, false, true, 'J', true);

//..........
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 120, 1, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 123, 12, false); // angle 2
$pdf->StopTransform();
//.............

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 88, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 95, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 120, 95, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 97);

//.............................

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 106, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div> <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 120, 106, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 106);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 115, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 115);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 124, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="physical_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 124, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 124);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.f.</b> &nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 133);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 142, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 142);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 149, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121.5, 154);

//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 5. Information About Your Children</b></div>';
$pdf->writeHTMLCell(90, 6.5, 113, 163, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Provide information on all of your children. If you need extra 
space to complete this section, use the space provided in <br>
<b>Part 11. Additional Information</b>.</div>';
$pdf->writeHTMLCell(90, 7, 112, 170, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>Child 1</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 185, $html, '', 0, 0, true, 'L');
//.............


$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 190, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children1_information_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146, 192);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 199, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children1_information_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146, 201);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;Middle Name  </div>';
$pdf->writeHTMLCell(35, 7, 112, 210, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children1_information_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 146, 210);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 219, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children1_information_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171, 219);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>A-Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 112, 226, $html, 0, 1, false, true, 'J', true);
$html = '<div><b>A-</b</div>';
$pdf->writeHTMLCell(20, 7, 148, 228.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children1_information_a_number', 49.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154.5, 228);


//..........
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 131, 187, false); // angle 1
//$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 123, 12, false); // angle 2
$pdf->StopTransform();
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child living with you ? </div>';
$pdf->writeHTMLCell(70, 7, 112, 236, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child_living" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child_living" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 236, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child applying with you ? </div>';
$pdf->writeHTMLCell(70, 7, 112, 244, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child_applying" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child_applying" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 244, $html, 0, 1, false, true, 'J', true);
//........


/********************************
 ******** End Page No 3 **********
 *********************************/

/********************************
 ******** Start Page No 4 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');  // page number 4


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 5. Information About Your Children </b> (Continued) </div>';
$pdf->writeHTMLCell(90, 11, 13, 17, $html, 1, 0, true, false, 'L', false);

//...........


$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 30, $html, 0, 0, true, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 37, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 19, 37, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('child1_physical_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 39);
//.......................

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>6.b. </b></div>';
$pdf->writeHTMLCell(60, 0, 12, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div> <input type="checkbox" name="Apt5" value="Apt5" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste5" value="Ste5" checked="" />Ste. <input type="checkbox" name="Flr5" value="Flr5" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 19, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child1_physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 48);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.c.</b>&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 57, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child1_physical_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 57);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="child1_physical_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child1_physical_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69.5, 66);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 75, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child1_physical_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 75);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.g.</b>&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 84, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child1_physical_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 84);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>6.h.</b>&nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 90, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child1_physical_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.5, 95);

//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>Child 2</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 104, $html, '', 0, 0, true, 'L');
//.............


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 12, 110, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children2_information_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 112);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 12, 119, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children2_information_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 121);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.&nbsp;&nbsp;&nbsp;&nbsp;</b>Middle Name  </div>';
$pdf->writeHTMLCell(35, 7, 12, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children2_information_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 130);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 12, 139, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children2_information_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 73, 139);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>A-Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 12, 145, $html, 0, 1, false, true, 'J', true);
$html = '<div><b>A-</b</div>';
$pdf->writeHTMLCell(20, 7, 47, 149, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children2_information_a_number', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 148);


//..........
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 42, 158, false); // angle 1 left side 
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 86.5, 31, false); // angle 2 right side 
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 161, 155, false); // angle 1 riht side 
$pdf->StopTransform();
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child living with you ? </div>';
$pdf->writeHTMLCell(70, 7, 12, 156, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child2_living" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child2_living" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 75, 156, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>11.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child applying with you ? </div>';
$pdf->writeHTMLCell(70, 7, 12, 162, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child2_applying" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child2_applying" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 75, 162, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFillColor(220, 220, 220);
//...........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 169, $html, 0, 0, true, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>12.a. </b></div>';
$pdf->writeHTMLCell(30, 0, 12, 176, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 22, 176, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('child2_physical_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 178);

//........


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>12.b. </b>';
$pdf->writeHTMLCell(60, 0, 12, 187, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div> <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 21, 187, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child2_physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 187);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 196, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child2_physical_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 196);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.d.</b>&nbsp;&nbsp;&nbsp;&nbsp;State &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 205, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="child2_physical_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 205, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child2_physical_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69.5, 205);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 214, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child2_physical_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 214);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.g.</b>&nbsp;&nbsp;&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 223, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child2_physical_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 223);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.h.</b>&nbsp;&nbsp;&nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 230, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child2_physical_address_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 236);

//.......... page 4 left side end ...............................................

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>Child 3</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, '', 0, 0, true, 'L');
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>13.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 22, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children3_information_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 24);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>13.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 31, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children3_information_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 33);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>13.c.&nbsp;&nbsp;&nbsp;&nbsp;</b>Middle Name  </div>';
$pdf->writeHTMLCell(35, 7, 112, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children3_information_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 42);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 51, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children3_information_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 51);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>15.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>A-Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 112, 57, $html, 0, 1, false, true, 'J', true);
$html = '<div><b>A-</b</div>';
$pdf->writeHTMLCell(20, 7, 147.6, 62.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children3_information_a_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 62);


//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>16.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child living with you ? </div>';
$pdf->writeHTMLCell(70, 7, 112, 70, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child3_living" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child3_living" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 70, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>17.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child applying with you ? </div>';
$pdf->writeHTMLCell(70, 7, 112, 77, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child3_applying" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child3_applying" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 77, $html, 0, 1, false, true, 'J', true);

//...........


$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 85, $html, 0, 0, true, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>18.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 92, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 122, 92, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('child3_physical_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 94);


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>18.b. </b></div>';
$pdf->writeHTMLCell(60, 0, 112, 103, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div> <input type="checkbox" name="Apt5" value="Apt5" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste5" value="Ste5" checked="" />Ste. <input type="checkbox" name="Flr5" value="Flr5" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 120, 103, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child3_physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 103);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>18.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 112, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child3_physical_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 112);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>18.d.</b> &nbsp; State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>18.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 121, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="child3_physical_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 121, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child3_physical_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 121);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>18.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child3_physical_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 130);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>18.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child3_physical_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 139);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>18.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 145, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child3_physical_address_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122.5, 150);

//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>Child 4</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 160, $html, '', 0, 0, true, 'L');
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>19.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 166, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children4_information_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 168);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>19.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 112, 175, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children4_information_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 177);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>19.c.&nbsp;&nbsp;&nbsp;&nbsp;</b>Middle Name  </div>';
$pdf->writeHTMLCell(35, 7, 112, 186, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children4_information_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 186);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>20.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 195, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children4_information_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 195);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>A-Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 112, 202, $html, 0, 1, false, true, 'J', true);
$html = '<div><b>A-</b</div>';
$pdf->writeHTMLCell(20, 7, 150, 207.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children4_information_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 157, 207);


//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child living with you ? </div>';
$pdf->writeHTMLCell(70, 7, 112, 216, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child4_living" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child4_living" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 216, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child applying with you ? </div>';
$pdf->writeHTMLCell(70, 7, 112, 223, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child4_applying" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child4_applying" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 223, $html, 0, 1, false, true, 'J', true);




/********************************
 ******** End Page No 4 **********
 *********************************/

/********************************
 ******** Start Page No 5 ********
 *********************************/




$pdf->AddPage('P', 'LETTER');  // page number 5


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Part 5. Information About Your Children </b> (Continued) </div>';
$pdf->writeHTMLCell(90, 11, 13, 17, $html, 1, 0, true, false, 'L', false);

//...........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 30, $html, 0, 0, true, false, 'L', false);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>24.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 37, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 22, 37, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('child4_physical_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 39);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>24.b.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div><input type="checkbox" name="Apt4" value="Apt4" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste4" value="Ste4" checked="" />Ste. <input type="checkbox" name="Flr4" value="Flr4" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 21, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child4_physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 48);

//.................
$pdf->SetFont('times', '', 10); // set font
$html = '<b>24.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 57, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child4_physical_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 57);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>24.d.</b>&nbsp;&nbsp; State  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>24.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="child4_physical_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child4_physical_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69.5, 66);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>24.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 75, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child4_physical_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 75);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>24.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 84, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child4_physical_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 84);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>24.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 90, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child4_physical_address_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 95);

//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>Child 5</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 104, $html, '', 0, 0, true, 'L');
//.............


$pdf->SetFont('times', '', 10);
$html = '<div><b>25.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 7, 12, 110, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children5_information_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 112);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>25.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 7, 12, 119, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children5_information_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 121);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>25.c.&nbsp;&nbsp;&nbsp;&nbsp;</b>Middle Name  </div>';
$pdf->writeHTMLCell(35, 7, 12, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children5_information_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 130);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>26.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 12, 139, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children5_information_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 73, 139);

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>27.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>A-Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 1, false, true, 'J', true);
$html = '<div><b>A-</b</div>';
$pdf->writeHTMLCell(20, 7, 50, 149, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('children5_information_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 148);


//..........
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 46, 155, false); // angle 1 left side 
$pdf->StopTransform();
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>28.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child living with you ? </div>';
$pdf->writeHTMLCell(70, 7, 12, 156, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child5_living" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child5_living" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 75, 156, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>29.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Is this child applying with you ? </div>';
$pdf->writeHTMLCell(70, 7, 12, 162, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="child5_applying" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="child5_applying" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 75, 162, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFillColor(220, 220, 220);
//...........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 169, $html, 0, 0, true, false, 'L', false);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>30.a. </b></div>';
$pdf->writeHTMLCell(30, 0, 12, 176, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 22, 176, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('child5_physical_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 178);
//..............

$pdf->SetFont('times', '', 10);
$html = '<div><b>30.b. </b></div>';
$pdf->writeHTMLCell(30, 0, 12, 187, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div><input type="checkbox" name="Apt_5" value="Apt_5" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste_5" value="Ste_5" checked="" />Ste. <input type="checkbox" name="Flr_5" value="Flr_5" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 21, 187, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child5_physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 187);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>30.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 196, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child5_physical_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 196);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>30.d.</b>&nbsp;&nbsp; State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>30.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 205, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="child5_physical_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 205, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child5_physical_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69.5, 205);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>30.f.</b> &nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 214, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child5_physical_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 214);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>30.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 223, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child5_physical_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 223);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>30.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 230, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('child5_physical_address_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22.5, 236);


//...........page 5 left end .........................................................



$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 6. Accommodations for Individuals With
Disabilities and/or Impairments</b></div>';
$pdf->writeHTMLCell(91, 12, 113, 17, $html, 1, 0, true, false, 'L', false);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: </b>  Read the information in the Form I-751 Instructions
before completing this part.</div>';
$pdf->writeHTMLCell(90, 7, 113, 30, $html, 0, 0, false,  'L');

//...........
$html = '<b>1. </b>';
$pdf->writeHTMLCell(20, 7, 112, 40, $html, 0, 0, false, 'L');
$html = '<div>Are you requesting an accommodation because of your
disabilities and/or impairments?</div>';
$pdf->writeHTMLCell(80, 7, 118, 40, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="accommodation" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="accommodation" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 45, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<b>2. </b>';
$pdf->writeHTMLCell(20, 7, 112, 52, $html, 0, 0, false, 'L');
$html = '<div>Are you requesting an accommodation because of your
spouse\'s disabilities and/or impairments?</div>';
$pdf->writeHTMLCell(80, 7, 118, 52, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="impairments" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="impairments" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 61, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<b>3. </b>';
$pdf->writeHTMLCell(20, 7, 112, 67, $html, 0, 0, false, 'L');
$html = '<div>Are you requesting an accommodation because of your
included children\'s disabilities and/or impairments?</div>';
$pdf->writeHTMLCell(80, 7, 118, 67, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="because" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="because" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(40, 7, 175, 77, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>If you answered "Yes" to <b>Item Numbers 1. - 3.</b>, select any
applicable box for <b>Item Numbers 4.a. - 4.c.</b> Provide
information on the disabilities and/or impairments for each
person. </div>';
$pdf->writeHTMLCell(90, 7, 112, 85, $html, 0, 0, false, 'L');

//........

$pdf->SetFont('times', '', 10);
$html = '<b>4.a. </b>';
$pdf->writeHTMLCell(20, 7, 112, 107, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="part6_4a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 119, 107, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I am deaf or hard of hearing and request the
following accommodation. (If you are requesting a
sign-language interpreter, indicate for which
language (for example, American Sign Language).):</div>';
$pdf->writeHTMLCell(78, 7, 124, 107, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(74, 20, 125, 127, "", 1, 0, false, 'L');
//..........



$pdf->SetFont('times', '', 10);
$html = '<b>4.b. </b>';
$pdf->writeHTMLCell(20, 7, 112, 150, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="part6_4b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 119, 150, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I am blind or have low vision and request the
following accommodation:</div>';
$pdf->writeHTMLCell(78, 7, 124, 150, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(74, 20, 125, 161, " ", 1, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html = '<b>4.c. </b>';
$pdf->writeHTMLCell(20, 7, 112, 185, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="part6_4c" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 119, 185, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I have another type of disability and/or impairment.
(Describe the nature of your disability and/or
impairment and the accommodation you are
requesting.):</div>';
$pdf->writeHTMLCell(78, 7, 124, 185, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(74, 20, 125, 205, " ", 1, 0, false, 'L');




/********************************
 ******** End Page No 5 **********
 *********************************/

/********************************
 ******** Start Page No 6 ********
 *********************************/


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 7. Petitioner\'s Statement, Contact
Information, Acknowledgement of Appointment
at USCIS Application Support Center,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, false, 'L', false);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b>Read the information on penalties in the <b>Penalties</b>
section of the Form I-751 Instructions before completing this
part.</div>';
$pdf->writeHTMLCell(91, 7, 12, 37, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: </b> If you selected <b>Box 1.a.</b> in <b>Part 3.</b>, your spouse must
also read and sign the petition in <b>Part 8.</b> Signature of a
conditional resident child under 14 years of age is not required;
a parent may sign for a child.</div>';
$pdf->writeHTMLCell(91, 7, 12, 53, $html, 0, 0, false, 'L');
//..........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Petitioner\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 73, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: </b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(91, 7, 12, 81, $html, 0, 0, false, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b></div>';
$pdf->writeHTMLCell(20, 7, 12, 92, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="part7_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 18, 92, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I can read and understand English, and have read and
understand every question and instruction on this
petition, as well as my answer to every question. I
have read and understand the <b>Acknowledgement of
Appointment at USCIS Application Support
Center.</b></div>';
$pdf->writeHTMLCell(80, 7, 24, 92, $html, 0, 0, false, 'L');
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b></div>';
$pdf->writeHTMLCell(20, 7, 12, 118, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="part7_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 19, 118, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div> The interpreter named in <b>Part 9.</b> has also read to me
every question and instruction on this petition, as well
as my answer to every question, in</div>';
$pdf->writeHTMLCell(80, 7, 24, 118, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(78, 7, 24, 133, " ", 1, 0, false, 'L');
$html = '<div>a language in which I am fluent. I understand every
question and instruction on this petition as translated
to me by my interpreter, and have provided complete
true, and correct responses in the language indicated
above. The interpreter named in <b>Part 9.</b> has also
read the <b>Acknowledgement of Appointment at
USCIS Application Support Center</b> to me, in the
language in which I am fluent, and I understand this
Application Support Center (ASC) <br>
Acknowledgement as read to me by my interpreter. </div>';
$pdf->writeHTMLCell(82, 7, 24, 140, $html, 0, 0, false, 'L');


//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>2. </b></div>';
$pdf->writeHTMLCell(20, 7, 12, 182, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div><input type="checkbox" name="part7_2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 17, 182, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I have requested the services of and consented to</div>';
$pdf->writeHTMLCell(80, 7, 22, 182, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(78, 7, 24, 188, " ", 1, 0, false, 'L');
$html = '<div>,</div>';
$pdf->writeHTMLCell(10, 7, 102, 190, $html, 0, 0, false, 'L');
$html = '<div>Who <input type="checkbox" name="part7_w" value="Y" checked=" " /> is <input type="checkbox" name="part7_is" value="Y" checked=" " /> is not an attorney or accredited
representative, preparing this petition for me. This
person who assisted me in preparing my petition has
reviewed the <b>Acknowledgement of Appointment at
USCIS Application Support Center</b> with me, and I
understand the ASC Acknowledgement.</div>';
$pdf->writeHTMLCell(82, 7, 24, 196, $html, 0, 0, false, 'L');


//......page 6 left side end .......................
//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Petitioner\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6.5, 113, 17, $html, 0, 0, true, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b>   Petitioner\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 27, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('petition_contact_daytime_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 32);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>  Petitioner\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 40, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('petition_contact_telephone_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 45);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b>  Petitioner\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 53, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('petition_contact_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 58);
//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Acknowledgement of Appointment at USCIS
Application Support Center</b></div>';
$pdf->writeHTMLCell(90, 12, 113, 68, $html, 0, 0, True, false, 'L', false);

//...........

$pdf->SetFont('times', ' ', 10);
$html = '<div>I, </div>';
$pdf->writeHTMLCell(10, 7, 113, 87, $html, 0, 0, false, 'L');
$html = '<div> ,</div>';
$pdf->writeHTMLCell(10, 7, 200, 86, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 118, 87, "", 1, 0, false, 'L');

$html = '<div>understand that the purpose of a USCIS ASC appointment is for me to provide fingerprints, photograph, and/or signature and to re-affirm that all of the information in my petition is complete, true, and correct and was provided by me. I understand that I will sign my name to the following declaration which USCIS will display to me at the time I provide my fingerprints, photograph, and/or signature during my ASC appointment.</div>';
$pdf->writeHTMLCell(93, 10, 112, 94, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', 'I', 10);
$html = '<div><b>By signing here, I declare under penalty of perjury
that I have reviewed and understand my application,
petition, or request as identified by the receipt
number displayed on the screen above, and a
supporting documents, applications, petitions, or
requests filed with my application, petition, or request
that I (or my attorney or accredited representative)
filed with USCIS, and that all of the information in
these materials is complete, true, and correct.</b></div>';
$pdf->writeHTMLCell(80, 10, 118, 125, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div>If conditional residence was based on a marriage, I further
certify that the marriage was entered into in accordance with the
laws of the place where the marriage took place and was not for
the purpose of procuring an immigration benefit.
<br><br>
I also understand that when I sign my name, provide my
fingerprints, and am photographed at the USCIS ASC, I will be
re-affirming that I willingly submit this petition; I have reviewed
the contents of this petition; all of the information in my petition
and all supporting documents submitted with my petition were
provided by me and are complete, truc, and correct; and if I was
assisted in completing this petition, the person assisting me also
reviewed this <b>Acknowledgement of Appointment at USCIS
Application Support Center</b> with me.</div>';
$pdf->writeHTMLCell(93, 10, 112, 165, $html, 0, 0, false, 'L');




/********************************
 ******** End Page No 6 **********
 *********************************/

/********************************
 ******** Start Page No 7 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');  // page number 7

$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 7. Petitioner\'s Statement, Contact
Information, Acknowledgement of Appointment
at USCIS Application Support Center,
Certification, and Signature</b>(continued)</div>';
$pdf->writeHTMLCell(91, 20, 13, 17, $html, 1, 0, true, false, 'L', false);

//.....
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Petitioner\'s Certification</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 40, $html, 0, 0, true, false, 'L', false);
//.....

$pdf->SetFont('times', '', 10);
$html = '<div>Copies of any documents I have submitted are exact photocopies
of unaltered, original documents, and I understand that USCIS
may require that I submit original documents to USCIS at a later
date. Furthermore, I authorize the release of any information from
any and all of my records that USCIS may need to determine my
eligibility for the immigration benefit that I seek
<br><br>
I furthermore authorize release of information contained in this
petition, in supporting documents, and in my USCIS records to
other entities and persons where necessary for the administration
and enforcement of U.S. immigration laws.
<br><br>
I certify under penalty of perjury, that the information in my
petition, my responses to each question, and any document
submitted with my petition were provided by me and are
complete, true, and correct.</div>';
$pdf->writeHTMLCell(91, 10, 12, 50, $html, 0, 0, false, true, 'L', false);
//.....

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html = '<div><b>Petitioner\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 118, $html, 0, 0, true, true, 'L', true);
//.....

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b>  Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 126, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 132, "", 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 6, 12, 142, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('petitioer_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 142);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE TO ALL PETITIONERS:</b> If you do not completely
fill out this petition or fail to submit required documents listed
in the Instructions, USCIS may deny your petition
<br><br>
<b>NOTE:</b> If you are filing based on claims of having been
battered or subjected to extreme cruelty waiver or individual
filing, you are not required to have the spouse\'s or individual
listed in <b>Part 4\'s</b> signature.</div>';
$pdf->writeHTMLCell(91, 10, 12, 152, $html, 0, 0, false, true, 'L', false);
//..........

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 8. Spouse\'s or Individual Listed in Part 4.\'s
Statement, Contact Information,
Acknowledgement of Appointment USCIS
Application Support Center, Certification, and
Signature </b>(if applicable)</div>';
$pdf->writeHTMLCell(91, 25, 13, 185, $html, 1, 0, true, false, 'L', false);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>Provide the following information about the spouse or
individual listed in <b>Part 4.</b>
<br><br>
<b>NOTE:</b> Read the information on penalties in the <b>Penalties</b>
section of the Form 1-751 Instructions before completing this
part.</div>';
$pdf->writeHTMLCell(91, 10, 12, 215, $html, 0, 0, false, true, 'L', false);


//.......... page 7 left side end ..............................................

$pdf->setCellHeightRatio(1.2); // set cell height ratio
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Spouse\'s or Individual\'s Statement</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 17, $html, 0, 0, true, false, 'L', false);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(91, 10, 112, 27, $html, 0, 0, false, true, 'L', false);

//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b></div>';
$pdf->writeHTMLCell(20, 7, 112, 37, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="part8_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 118, 37, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I can read and understand English, and have read and
understand every question and instruction on this
petition, as well as my answer to every question. I
have read and understand the <b>Acknowledgement of
Appointment at USCIS Application Support
Center.</b></div>';
$pdf->writeHTMLCell(80, 7, 124, 37, $html, 0, 0, false, 'L');

//..........

$html = '<div><b>1.b. </b> <input type="checkbox" name="part8_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 112, 64, $html, 0, 0, false, 'L');
$html = '<div> The interpreter named in Part 9. has also read to me
every question and instruction on this petition, as
well as the petitioner\'s answer to every question, in</div>';
$pdf->writeHTMLCell(80, 7, 124, 64, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(75, 7, 125, 78, "", 1, 0, false, 'L');

$html = '<div> ,</div>';
$pdf->writeHTMLCell(10, 7, 199, 78, $html, 0, 0, false, 'L');

$html = '<div>a language in which I am fluent. I understand every<br>
question and instruction on this petition as translated<br>
to me by my interpreter, and have provided complete,<br>
true, and correct responses in the language indicated<br>
above. The interpreter named in <b>Part 9</b>. has also<br>
read the <b>Acknowledgement of Appointment at<br>
USCIS Application Support Center</b> to me, in the<br>
language in which I am fluent, and I understand this<br>
Application Support Center (ASC) <br>
Acknowledgement as read to me by my interpreter</div>';
$pdf->writeHTMLCell(100, 7, 124, 85, $html, 0, 0, false, 'L');
//..........

$html = '<div><b>2. </b> <input type="checkbox" name="part8_2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 112, 130, $html, 0, 0, false, 'L');
$html = '<div>I have requested the services of and consented to</div>';
$pdf->writeHTMLCell(80, 7, 122, 130, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(78, 7, 124, 136, " ", 1, 0, false, 'L');
$html = '<div>,</div>';
$pdf->writeHTMLCell(10, 7, 202, 136, $html, 0, 0, false, 'L');
$html = '<div>Who <input type="checkbox" name="part8_w" value="Y" checked=" " /> is <input type="checkbox" name="part8_is" value="Y" checked=" " /> is not an attorney or accredited
representative, preparing this petition for me. This
person who assisted me in preparing my petition has
reviewed the <b>Acknowledgement of Appointment at
USCIS Application Support Center</b> with me, and I
understand the ASC Acknowledgement.</div>';
$pdf->writeHTMLCell(82, 7, 124, 143, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Spouse\'s or Individual\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6.5, 113, 174, $html, 0, 0, true, false, 'L', false);

//.............


$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b>   Spouse\'s or Individual\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_ind_daytime_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 188);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b> Spouse\'s or Individual\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(92, 7, 112, 196, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_ind_telephone_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 201);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b>  Spouse\'s or Individual\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 209, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_ind_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 214);



/********************************
 ******** End Page No 7 **********
 *********************************/

/********************************
 ******** Start Page No 8 ********
 *********************************/


$pdf->AddPage('P', 'LETTER');  // page number 8


$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 8. Spouse\'s or Individual Listed in Part 4.\'s
Statement, Contact Information,
Acknowledgement of Appointment USCIS
Application Support Center, Certification, and
Signature </b>(if applicable)  (continued)</div>';
$pdf->writeHTMLCell(91, 27, 13, 17, $html, 1, 0, true, false, 'L', false);
//...........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Acknowledgement of Appointment at USCIS
Application Support Center</b></div>';
$pdf->writeHTMLCell(91, 12, 13, 45, $html, 0, 0, true, false, 'L', false);

//.............


$pdf->SetFont('times', ' ', 10);
$html = '<div>I, </div>';
$pdf->writeHTMLCell(10, 7, 13, 60, $html, 0, 0, false, 'L');
$html = '<div> ,</div>';
$pdf->writeHTMLCell(10, 7, 100, 60, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 18, 60, "", 1, 0, false, 'L');
$html = '<div>understand that the purpose of a USCIS ASC appointment is
for me to provide my fingerprints, photograph, and/or
signature and to re-affirm that all of the information in my
petition is complete, true, and correct and was provided by me.
I understand that I will sign my name to the following
declaration which USCIS will display to me at the time I
provide my fingerprints, photograph, and/or signature during
my ASC appointment.</div>';
$pdf->writeHTMLCell(90, 7, 12, 66, $html, 0, 0, false, 'L');

//.........

$pdf->SetFont('times', 'IB', 10);
$html = '<div>By signing here, I declare under penalty of perjury
that I have reviewed and understand my application,
petition, or request as identified by the receipt
number displayed on the screen above, and all
supporting documents, applications, petitions, or
requests filed with my application, petition, or request
that I (or my attorney or accredited representative)
filed with USCIS, and that all of the information in
these materials is complete, true, and correct.</div>';
$pdf->writeHTMLCell(80, 7, 22, 101, $html, 0, 0, false, 'L');

//...........

$pdf->SetFont('times', ' ', 10);
$html = '<div>I also understand that when I sign my name, provide my
fingerprints, and am photographed at the USCIS ASC, I will be
re-affirming that I willingly submit this petition; I have reviewed the contents of this petition; all of the information in my petition and all supporting documents submitted with my petition were provided by me and are complete, true, and correct; and if I was assisted in completing this petition, the person assisting me also reviewed this <b>Acknowledgement of Appointment at USCIS Application Support Center </b>with me.</div>';
$pdf->writeHTMLCell(94, 7, 12, 140, $html, 0, 0, false, 'L');

//..........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Spouse\'s or Individual\'s Certification</b></div>';
$pdf->writeHTMLCell(91, 6.5, 13, 181, $html, 0, 0, true, false, 'L', false);

//.............

$pdf->SetFont('times', ' ', 10);
$html = '<div>Copies of any documents I have submitted are exact photocopies<br>
of unaltered, original documents, and I understand that USCIS<br>
may require that I submit original documents to USCIS at a later<br>
date. Furthermore, I authorize the release of any information from<br>
any and all of my records that USCIS may need to determine my<br>
eligibility for the immigration benefit that I seek.<br>
<br>

I furthermore authorize release of information contained in this<br>
petition, in supporting documents, and in my USCIS records to<br>
other entities and persons where necessary for the administration<br>
and enforcement of U.S. immigration laws.<br>
<br>

I certify under penalty of perjury, that the information in my<br>
petition, my responses to each question, and any document<br>
submitted with my petition were provided by me and are<br>
complete, true, and correct.</div>';
$pdf->writeHTMLCell(100, 7, 12, 188, $html, 0, 0, false, 'L');


//..........page 7 left side end .....................................................

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Spouse\'s or Individual\'s Signature</b></div>';
$pdf->writeHTMLCell(91, 6.5, 113, 17, $html, 0, 0, true, false, 'L', false);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b>  Spouse\'s or Individual\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 112, 24, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 121, 30, "", 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 112, 39, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_ind_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 174, 40);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE TO ALL SPOUSES OR INDIVIDUALS:</b> If you do
not completely fill out this petition or fail to submit required
documents listed in the instructions, USCIS may deny your
petition.</div>';
$pdf->writeHTMLCell(91, 10, 112, 49, $html, 0, 0, false, true, 'L', false);
//..........

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 9. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 12, 113, 68, $html, 1, 0, true, false, 'L', false);
//...........


$pdf->SetFont('times', '', 10);
$html = '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(91, 5, 112, 81, $html, 0, 0, false, true, 'L', false);
//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 87, $html, 0, 0, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b> Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 112, 94, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('intepreter_family_lastname', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 100);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b> Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(92, 7, 112, 108, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('intepreter_family_firstname', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 114);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b> &nbsp; Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 121, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('intepreter_org_busines_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 127);
//............
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Interpreter\'s Mailing Address </b></div>';
$pdf->writeHTMLCell(91, 6, 113, 136, $html, 0, 0, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(30, 7, 112, 141, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 7, 121, 142, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailig_street_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 145);

//....................


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.b. </b></div>';
$pdf->writeHTMLCell(60, 0, 112, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div><input type="checkbox" name="Apt9" value="Apt9" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste9" value="Ste9" checked="" />Ste. <input type="checkbox" name="Flr9" value="Flr9" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 120, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailig_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 154);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 162, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailig_city_or_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 163);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> 3.e.</b>&nbsp;&nbsp; ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 171, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="interpreter_mailig_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 171, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailig_zip_code', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 172);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 180, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailig_province', 58.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 181);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 190, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailig_postal_code', 58.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 190);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 197, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailig_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121.5, 203);

//............
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 212, $html, 0, 0, true, false, 'L', false);
//.............
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4. </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 220, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 226);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5. </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 233, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 239);



/********************************
 ******** End Page No 8 **********
 *********************************/

/********************************
 ******** Start Page No 9 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');  // page number 9

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 9. Interpreter\'s Contact Information,
Certification, and Signature</b> (continued)</div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 0, true, false, 'L', false);
//...........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 31, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 11);
$html = '<div><b>I certify that:</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 38, $html, 0, 0, false, false, 'L', false);
//............

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I am fluent in English and</div>';
$pdf->writeHTMLCell(90, 5, 12, 43, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_9_fluent_english', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 51, 42);
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>,  which</div>';
$pdf->writeHTMLCell(20, 5, 91, 43, $html, 0, 0, false, 'L');

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>is the same language provided in <b>Part 7., Item Number 1.b.</b>;
I have read to this petitioner every question and instruction on
this petition, as well as the answer to every question,in the 
language provided in <b>Part 7., Item Number 1.b.</b>; and
<br><br>

I have read the <b>Acknowledgement of Appointment at USCIS
Application Support Center</b> to the petitioner in the same
language provided in <b> Part 7., Item Number 1.b</b>.
<br><br>

The petitioner has informed me that he or she understands every
instruction and question on the petition, as well as the answer to
every question, and the petitioner verified the accuracy of every
answer; and
<br><br>

The petitioner has also informed me that he or she understands
the ASC Acknowledgement and that byappearing for a USCIS
ASC biometric services appointment and providing his or her
fingerprints, photograph, and/or signature, he or she is
re-affirming that the contents of this petition and all supporting
documentation are complete, true, and correct.</div>';
$pdf->writeHTMLCell(90, 20, 12, 48, $html, 0, 0, false, 'L');
//..........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Interpreter\'s Signature </b></div>';
$pdf->writeHTMLCell(91, 6, 13, 140, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b>  Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 153, "", 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 162);

//.........

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 10. Contact Information, Statement,
Certification, and Signature of the Person
Preparing this Petition, If Other Than the
Petitioner</b></div>';
$pdf->writeHTMLCell(91, 12, 13, 172, $html, 1, 0, true, false, 'L', false);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(90, 7, 12, 193, $html, 0, 1, false, true, 'J', true);

//...........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 200, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b> Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Preparer_family_lastname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 212);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b> Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(92, 7, 12, 219, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Preparer_family_firstname', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 224);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b> &nbsp; Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 231, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Preparer_org_busines_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 236);

//.............gage 9 left side end .......................................

//............
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Preparer\'s Mailing Address </b></div>';
$pdf->writeHTMLCell(91, 6, 113, 17, $html, 0, 0, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(30, 7, 112, 23, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 7, 120, 23, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailig_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 25);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.b. </b></div>';
$pdf->writeHTMLCell(60, 0, 112, 34, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font
$html = '<div><input type="checkbox" name="Apt9" value="Apt9" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste9" value="Ste9" checked="" />Ste. <input type="checkbox" name="Flr9" value="Flr9" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 119, 34, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailig_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 34);

//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 43, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailig_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 43);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> 3.e.</b>&nbsp;&nbsp; ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 52, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="preparer_mailig_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 52, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailig_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 52);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 61, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparerr_mailig_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 61);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 70, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailig_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 70);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 76, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailig_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121.5, 82);

//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6.5, 113, 92, $html, 0, 0, true, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b>   Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 100, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_daytime_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 106);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>  Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 115, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_telephone_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 121);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b>  Preparer\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 130, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 136);
//..........

//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Preparer\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 6.5, 113, 145, $html, 0, 0, true, false, 'L', false);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a. </b> </div>';
$pdf->writeHTMLCell(20, 7, 112, 152, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="part10_7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 119, 152, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I am not an attorney or accredited representative
but have prepared this petition on behalf of the
petitioner and with the petitioner\'s consent.</div>';
$pdf->writeHTMLCell(80, 7, 124, 152, $html, 0, 0, false, 'L');
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b. </b></div>';
$pdf->writeHTMLCell(20, 7, 112, 167, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 11.5);
$html = '<div><input type="checkbox" name="part10_7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 119, 167, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div> I am an attorney or accredited representative and
my representation of the petitioner in this case<br>
<input type="checkbox" name="part10_7c" value="Y" checked=" " /> extends <input type="checkbox" name="part10_7d" value="Y" checked=" " /> does not extend beyond the
preparation of this petition.</div>';
$pdf->writeHTMLCell(80, 7, 124, 167, $html, 0, 0, false, 'L');

$html = '<div><b>NOTE:</b> If you are an attorney or accredited
representative whose representation extends
beyond preparation of this petition, you must
submit a completed Form G-28, Notice of Entry
of Appearance as Attorney or Accredited
Representative, with this petition.</div>';
$pdf->writeHTMLCell(80, 7, 124, 185, $html, 0, 0, false, 'L');



/********************************
 ******** End Page No 9 **********
 *********************************/

/********************************
 ******** Start Page No 10 ********
 *********************************/



$pdf->AddPage('P', 'LETTER');  // page number 10

$pdf->SetFont('times', '', 12);
$html = '<div><b>Part 10. Contact Information, Statement,
Certification, and Signature of the Person
Preparing this Petition, If Other Than the
Petitioner</b> (continued)</div>';
$pdf->writeHTMLCell(91, 20, 13, 17, $html, 1, 0, true, false, 'L', false);

//..........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Preparer\'s Certification</b></div>';
$pdf->writeHTMLCell(90, 6.5, 13, 40, $html, 0, 0, true, false, 'L', false);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div>By my signature, I certify, swear, or affirm, under penalty of perjury, that I prepared this petition on behalf of, at the request of, and with the express consent of the petitioner. I completed this petition based only on responses the petitioner provided to me. After completing the petition, I reviewed it and all of the petitioner\'s responses with the petitioner, who agreed with every answer on the petition. If the petitioner supplied additional information concerning a question on the petition, I recorded it on the petition.I have also read the <b>Acknowledgement of Appointment at USCIS Application Support Center</b> to the petitioner and the petitioner has informed me that he or she understands the ASC Acknowledgement</div>';
$pdf->writeHTMLCell(93, 7, 12, 48, $html, 0, 0, false, 'L');

//..........

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Preparer\'s Signature </b></div>';
$pdf->writeHTMLCell(91, 6, 13, 110, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.a.  </b>  Preparer\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 118, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 124, "", 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 133, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 74, 133);



/********************************
 ******** End Page No 10 **********
 *********************************/

/********************************
 ******** Start Page No 11 ********
 *********************************/


$pdf->AddPage('P', 'LETTER');  // page number 11

$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div>Part 11. Additional Information </div>';
$pdf->writeHTMLCell(93, 7, 13, 18, $html, 1, 1, true, 'L');
//........
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html = '<div>If you need extra space to provide any additional information
within this petition, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this petition or attach a separate sheet of 
paper. Type or print your name and A-Number (if any) at the
top of each sheet; indicate the<b> Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
$pdf->writeHTMLCell(95, 25, 12, 26, $html, 0, 1, 0, true, 'L', false, false);
//...........

$pdf->SetFont('times', 'I', 11);
$html = '<div><b>Your Full Name</b></div>';
$pdf->writeHTMLCell(92, 6, 13, 63, $html, 0, 0, true, false, 'L', false);
//............




$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 68, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(60, 7, 45, 74, '', 1, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_family_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 43, 71);
//........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 77, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(62, 7, 45, 84, '', 1, 0, fals3, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_given_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 43, 80);
//.......
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 90, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(62, 7, 45, 94, '', 1, 0, fals3, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_middle_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 43, 89);
//.......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 97, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 60, 101,);

$pdf->setFont('Times', '', 12);
$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell(7, 7, 53, 101, $html, 0, 0, false, 'L');
//............






//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 109, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_3a', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 114);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 109, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_3b', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 114);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 109, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 114);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 123, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 120.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 124.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 128.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 133.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 138, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 142.8, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 147.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 151.2, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 155.8, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->writeHTMLCell(82, 63.3, 21.5, 123.2, '', 1,  0, false, false, 'C', true); // all side border
$pdf->TextField('additional_information_3d', 82.5, 63.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_130_additional_info_3d')), 21.5, 123);
$pdf->setCellHeightRatio(1.2);

//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 185.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_4a', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 191);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 185.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_4b', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 191);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 185.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 191);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 199.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->setCellHeightRatio(1.8);

$pdf->writeHTMLCell(82, 1, 21.6, 190.7, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 195.1, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 2, 21.6, 199.7, '',  "BLR",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 204.3, '',  "BLR",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 208.2, '',  "BLR",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 213, '',  "BLR",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 217.8, '',  "BLR",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 221.6, '',  "BLR",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 226.1, '',  "BLR",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 230.1, '',  "BLR",  0, false, false, 'C', true); // line 10

// $pdf->writeHTMLCell(82,66, 21.5, 194, '',"TL",  0, false, false, 'C', true); // all side border
$pdf->TextField('additional_information_4d', 82.5, 57.8, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_130_additional_info_4d')), 21.5, 199.9);
$pdf->setCellHeightRatio(1.2);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_5a', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_5b', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 30.7, '',  "TLR",  0, false, false, 'C', false); // Top line
$pdf->writeHTMLCell(81.6, 1, 122.6, 28.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 32.5, '',  "BLR",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 36.8, '',  "BLR",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 41.3, '',  "BLR",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 45.8, '',  "BLR",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 50, '',  "BLR",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 54.8, '',  "BLR",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 59.6, '', "BLR",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 64.3, '',  "BLR",  0, false, false, 'C', true); // line 9

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_5d', 82, 59, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_130_additional_info_5d')), 122.5, 30.5);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 90.2, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_6a', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 95.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 90.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_6b', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 95.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 90.5, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 95.5);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 106, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 104.7, '',  "TLR",  0, false, false, 'C', false); //Top line
$pdf->writeHTMLCell(81.6, 1, 122.6, 101.7, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 106.5, '',  "BLR",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 111.3, '',  "BLR",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 116.3, '',  "BLR",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 121, '',  "BLR",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 125.5, '',  "BLR",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 130, '',  "BLR",  0, false, false, 'C', true);   // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 134.6, '',  "BLR",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 139, '',  "BLR",  0, false, false, 'C', true);   // line 9

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('dditional_information_6d', 82, 59.4, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_130_additional_info_6d')), 122.5, 104.5);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 165.9, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_7a', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 171.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 165.9, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_7b', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 171.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 165.9, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_751_additional_information_7c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 171.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 181, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 181.3, '',  "TLR",  0, false, false, 'C', false); // Top line
$pdf->writeHTMLCell(81.6, 1, 122.6, 178.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 183, '',  "BLR",  0, false, false, 'C', true);   // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 187.7, '',  "BLR",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 192, '',  "BLR",  0, false, false, 'C', true);   // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 196.5, '',  "BLR",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 201, '',  "BLR",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 205.5, '',  "BLR",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 210, '',  "BLR",  0, false, false, 'C', true);   // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 214.5, '',  "BLR",  0, false, false, 'C', true); // line 9
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_7d', 82, 59, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_130_additional_info_7d')), 122.5, 181);









$js = "
var fields = {
    'attorney_statebar_number':' ',
    'attorney_uscis_online_number':' ',

    'your_lastname':' ',
    'your_firstname':' ',
    'your_middlename':' ',

    'other_your_lastname':' ',
    'other_your_firstname':' ',
    'other_your_middlename':' ',

    'other2_your_lastname':' ',
    'other2_your_firstname':' ',
    'other2_your_middlename':' ',

    'other_info_date_of_birth':' ',
    'other_info_country_of_birth':' ',
    'other_info_country_of_citizen':' ',
    'other_info_align_reg_number':' ',
    'other_info_social_security_number':' ',
    'other_info_usis_onl_acnt_number':' ',
    'other_info_date_of_marriage':' ',
    'other_info_place_of_marriage':' ',
    'other_info_date_of_death':' ',
    'other_info_residence_expire_date':' ',

    'information_about_you_mail_in_care_name':' ',
    'information_about_you_mail_street':' ',
    'information_about_you_mail_apt_ste_flr':' ',
    'information_about_you_mail_city_town':' ',
    'information_about_you_mail_state':' ',
    'information_about_you_mail_zipcode':' ',
    'information_physical_in_care_name':' ',
    'information_physical_mail_street':' ',
    'information_physical_apt_ste_flr':' ',
    'information_physical_city_town':' ',
    'information_physical_state':' ',
    'information_physical_zipcode':' ',

    'biographic_info_feet':' ',
    'biographic_info_inches':' ',
    'biographic_info_pound3':' ',
    'biographic_info_pound2':' ',
    'biographic_info_pound1':' ',
//page-2
    'other_information_lastname':' ',
    'other_information_firstname':' ',
    'other_information_middlename':' ',
    'other_information_date_of_birth':' ',
    'other_information_us_social_security':' ',
    'other_information_a_number':' ',

    'physical_address_street':' ',
    'physical_address_apt_ste_flr':' ',
    'physical_address_city_or_town':' ',
    'physical_address_state':' ',
    'physical_address_zip_code':' ',
    'physical_address_province':' ',
    'physical_address_postal_code':' ',
    'physical_address_country':' ',

    'children1_information_lastname':' ',
    'children1_information_firstname':' ',
    'children1_information_middlename':' ',
    'children1_information_date_of_birth':' ',
    'children1_information_a_number':' ',

    'child1_physical_address_street':' ',
    'child1_physical_address_apt_ste_flr':' ',
    'child1_physical_address_city_or_town':' ',
    'child1_physical_address_state':' ',
    'child1_physical_address_zip_code':' ',
    'child1_physical_address_province':' ',
    'child1_physical_address_postal_code':' ',
    'child1_physical_address_country':' ',

    'children2_information_lastname':' ',
    'children2_information_firstname':' ',
    'children2_information_middlename':' ',
    'children2_information_date_of_birth':' ',
    'children2_information_a_number':' ',


    'child2_physical_address_street':' ',
    'child2_physical_address_apt_ste_flr':' ',
    'child2_physical_address_city_or_town':' ',
    'child2_physical_address_state':' ',
    'child2_physical_address_zip_code':' ',
    'child2_physical_address_province':' ',
    'child2_physical_address_postal_code':' ',
    'child2_physical_address_country':' ',

    'children3_information_lastname':' ',
    'children3_information_firstname':' ',
    'children3_information_middlename':' ',
    'children3_information_date_of_birth':' ',
    'children3_information_a_number':' ',

    'child3_physical_address_street':' ',
    'child3_physical_address_apt_ste_flr':' ',
    'child3_physical_address_city_or_town':' ',
    'child3_physical_address_state':' ',
    'child3_physical_address_zip_code':' ',
    'child3_physical_address_province':' ',
    'child3_physical_address_postal_code':' ',
    'child3_physical_address_country':' ',

    'children4_information_lastname':' ',
    'children4_information_firstname':' ',
    'children4_information_middlename':' ',
    'children4_information_date_of_birth':' ',
    'children4_information_a_number':' ',

    'child4_physical_address_street':' ',
    'child4_physical_address_apt_ste_flr':' ',
    'child4_physical_address_city_or_town':' ',
    'child4_physical_address_state':' ',
    'child4_physical_address_zip_code':' ',
    'child4_physical_address_province':' ',
    'child4_physical_address_postal_code':' ',
    'child4_physical_address_country':' ',

    'children5_information_lastname':' ',
    'children5_information_firstname':' ',
    'children5_information_middlename':' ',
    'children5_information_date_of_birth':' ',
    'children5_information_a_number':' ',

    'child5_physical_address_street':' ',
    'child5_physical_address_apt_ste_flr':' ',
    'child5_physical_address_city_or_town':' ',
    'child5_physical_address_state':' ',
    'child5_physical_address_zip_code':' ',
    'child5_physical_address_province':' ',
    'child5_physical_address_postal_code':' ',
    'child5_physical_address_country':' ',
    'petition_contact_daytime_number':' ',
    'petition_contact_telephone_number':' ',
    'petition_contact_email':' ',

    'petitioer_date_of_signature':' ',
    'spouse_ind_daytime_number':' ',
    'spouse_ind_telephone_number':' ',
    'spouse_ind_email':' ',

    'spouse_ind_date_of_signature':' ',
    'intepreter_family_lastname':' ',
    'intepreter_family_firstname':' ',
    'intepreter_org_busines_name':' ',

    'interpreter_mailig_street_number':' ',
    'interpreter_mailig_apt_ste_flr':' ',
    'interpreter_mailig_city_or_town':' ',
    'interpreter_mailig_state':' ',
    'interpreter_mailig_zip_code':' ',
    'interpreter_mailig_province':' ',
    'interpreter_mailig_postal_code':' ',
    'interpreter_mailig_country':' ',
    'interpreter_contact_telephone':' ',
    'interpreter_contact_email':' ',

    'part_9_fluent_english':' ',
    'interpreter_date_of_signature':' ',
    'Preparer_family_lastname':' ',
    'Preparer_family_firstname':' ',
    'Preparer_org_busines_name':' ',

    'preparer_mailig_street_number':' ',
    'preparer_mailig_apt_ste_flr':' ',
    'preparer_mailig_city_or_town':' ',
    'preparer_mailig_state':' ',
    'preparer_mailig_zip_code':' ',
    'preparerr_mailig_province':' ',
    'preparer_mailig_postal_code':' ',
    'preparer_mailig_country':' ',

    'preparer_contact_daytime_number':' ',
    'preparer_contact_telephone_number':' ',
    'preparer_contact_email':' ',
    'preparer_date_of_signature':' ',


    'i_751_additional_information_family_name':' ',
    'i_751_additional_information_given_name':' ',
    'i_751_additional_information_middle_name':' ',
    'i_751_additional_information_a_number':' ',
    'i_751_additional_information_3a':' ',
    'i_751_additional_information_3b':' ',
    'i_751_additional_information_3c':' ',
    'i_751_additional_information_3d':' ',
    'i_751_additional_information_4a':' ',
    'i_751_additional_information_4b':' ',
    'i_751_additional_information_4c':' ',
    'i_751_additional_information_4d':' ',
    'i_751_additional_information_5a':' ',
    'i_751_additional_information_5b':' ',
    'i_751_additional_information_5c':' ',
    'i_751_additional_information_5d':' ',
    'i_751_additional_information_6a':' ',
    'i_751_additional_information_6b':' ',
    'i_751_additional_information_6c':' ',
    'i_751_additional_information_6d':' ',
    'i_751_additional_information_7a':' ',
    'i_751_additional_information_7b':' ',
    'i_751_additional_information_7c':' ',
    'i_751_additional_information_7d':' '


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
$pdf->Output('I-751.pdf', 'I');
