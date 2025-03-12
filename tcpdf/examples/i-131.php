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
            // return;
            // $this->Cell(0, 30, '<< Company Heading >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');

            /* $top_border = array(
			   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
			);
			$this->Cell(184, 0, '', $top_border, 1, 1); */

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

        $this->Cell(40, 6, "Form I-131  04/24/19  C", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/I-131-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        $bottom_image = "images/I-131-bottom-pdf417-$this->page.png";
        $this->Image($bottom_image, 15, 225, 188, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // bottom Barcode PDF417

        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);


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
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
$pdf->writeHTMLCell(148, 60, 13, 32, "", 1, 1, false, false, 'J', true);
$pdf->SetFillColor(220, 220, 220); // set filling color
$pdf->writeHTMLCell(13, 21, 13.4, 32.4, '', 'R', 1, true, true, 'J', true);
$pdf->SetFont('times', 'B', 10);
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(12, 30, 13, 33, $html, 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(15, 30, 50, 32, 'Receipt', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(25, 30, 110, 32, 'Action Block', 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(1, 60, 90, 32, '', 'R', 1, false, true, 'J', true); //middle vertical(|) line 
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
$pdf->SetFont('times', '', 8);
$html = '<div>Re-entry Permit<i> (Update "Mail To" Section)</i></div>';
$pdf->writeHTMLCell(30, 7, 18, 72, $html, 0, 1, false, false, 'J', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 50, 73, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8);
$html = '<div>Refugee Travel Document <i> (Update "Mail To" Section)</i></div>';
$pdf->writeHTMLCell(40, 7, 52, 72, $html, 0, 1, false, true, 'L', true);
//.....


$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 15, 82, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8);
$html = '<div>Single Advance Parole</i></div>';
$pdf->writeHTMLCell(30, 7, 18, 82, $html, 0, 1, false, false, 'J', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 50, 82, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 8);
$html = '<div> Multiple Advance Parole
Valid Until: ____/____/____</div>';
$pdf->writeHTMLCell(40, 7, 52, 81, $html, 0, 1, false, false, 'L', true);
//.....

$pdf->writeHTMLCell(70, 1, 91, 65, '', 'B', 1, false, true, 'J', true); //horizontal (---) line 
//.........
$pdf->SetFont('times', '', 9);
$html = '<div><b>Mail To <br><i>(Re-entry &<br>Refugee Only)</i></b></div>';
$pdf->writeHTMLCell(18, 7, 91, 70, $html, 0, 1, false, false, 'L', true);
//.....

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 110, 73, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 9);
$html = '<div>Address in <i>Part 1</i></i></div>';
$pdf->writeHTMLCell(30, 7, 113, 73, $html, 0, 1, false, true, 'J', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 110, 78, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 9);
$html = '<div>US Consulate at:_______________</i></div>';
$pdf->writeHTMLCell(50, 7, 113, 78, $html, 0, 1, false, false, 'J', false);
//.....


$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(2, 2, 110, 83, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->SetFont('times', '', 9);
$html = '<div>Intl DHS Ofc at:_______________</div>';
$pdf->writeHTMLCell(50, 7, 113, 83, $html, 0, 1, false, true, 'J', false);





//right side table start 
$pdf->writeHTMLCell(40, 60, 163, 32, "", 1, 1, false, true, 'J', true);

$pdf->SetFont('times', 'B', 10);
$html = '<div>To Be Completed by an Attorney/ Representative,<br> if any.</div>';
$pdf->writeHTMLCell(28, 7, 167, 33, $html, 0, 1, false, true, 'C', false);
//.....

$pdf->SetFont('times', '', 10);
$html = '<div> <input type="checkbox" name="g28box" value="1" checked=" " />  Fill in box if G-28 is attached to represent the applicant.</div>';
$pdf->writeHTMLCell(37, 7, 163, 55, $html, 0, 0, false, true, 'C', true);
$pdf->writeHTMLCell(40, 1, 163, 65, '', 'B', 1, false, true, 'J', true); //horizontal (---) line 

$pdf->SetFont('times', '', 10);
$html = '<div> <input type="checkbox" name="g28box" value="1" checked=" " />  Fill in box if G-28 is attached to represent the applicant.</div>';
$pdf->writeHTMLCell(37, 7, 163, 55, $html, 0, 0, false, true, 'C', true);
//............
$pdf->SetFont('times', '', 10);
$html = '<div>Attorney State License Number:  </div>';
$pdf->writeHTMLCell(30, 7, 165, 70, $html, 0, 0, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_licence', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 80);
//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>Start Here.</b> Type or Print in Black Ink</div>';
$pdf->writeHTMLCell(100, 7, 15, 92, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
//............
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 143, true); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 158, 101, true); // angle 2
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 200, 141, true); // angle 3
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 190, 165, true); // angle 4
$pdf->StopTransform();

$pdf->SetFillColor(220, 220, 220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 1. Information About You</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 98, $html, 1, 1, true, false, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 106, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 107);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 114, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 116);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 125, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 125);

//...........
$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 134, $html, 0, 0, true, false, 'L', false);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.</b>In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 12, 141, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_physical_care_of_name', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 147);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 154, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 19, 154, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_physical_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 156);


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt1" value="Apt1" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste1" value="Ste1" checked="" />Ste. <input type="checkbox" name="Flr1" value="Flr1" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 165, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 165);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.d.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 174, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 174);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.e.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 183, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="about_your_physical_state" size="0.50">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 183, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69.5, 183);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 192, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 192);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.h.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 201, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 201);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 210, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_country', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 35.5, 210);
//.......... left side end ...................


$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 108, $html, 0, 0, true, true, 'L', false);

//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b> Alien Registration Number (A-Number) </div>';
$pdf->writeHTMLCell(80, 10, 112, 116, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(80, 10, 150, 119, "A-", 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_alien_reg_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 122);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b> Country of Birth </div>';
$pdf->writeHTMLCell(80, 10, 112, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 135);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b> Country of Citizenship </div>';
$pdf->writeHTMLCell(80, 10, 112, 143, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_country_of_citizenship', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 148);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </b> Class of Admission </div>';
$pdf->writeHTMLCell(80, 10, 112, 156, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_class_of_admission', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 161);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.   </b>  Gender &nbsp; &nbsp;  <input type="checkbox" name="gender" value="male" checked=" " />  Male  &nbsp; &nbsp;  <input type="checkbox" name="gender" value="female" checked=" " />    Female </div>';
$pdf->writeHTMLCell(80, 10, 112, 169, $html, 0, 1, false, true, 'J', true);

//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.  </b> Date of Birth   &nbsp; &nbsp;  <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(80, 10, 112, 177, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_date_of_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 177);

//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>9.  </b>U.S. Social Security Number  <i>(if any)</i> </div>';
$pdf->writeHTMLCell(80, 10, 112, 187, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_us_social_security', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 193);
//..........page number 1 end-----------------------------------------------------------------------------------------------



// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2

$pdf->SetFillColor(220, 220, 220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 2. Application Type</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b><input type="checkbox" name="part2_1a" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 25, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I am a permanent resident or conditional resident of
the United States, and I am applying for a reentry
permit.</div>';
$pdf->writeHTMLCell(80, 7, 24, 25, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b><input type="checkbox" name="part2_1b" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I now hold U.S. refugee or asylec status, and I am
applying for a Refugee Travel Document.</div>';
$pdf->writeHTMLCell(80, 7, 24, 37, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b><input type="checkbox" name="part2_1c" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 47, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I am a permanent resident as a direct result of refugee
or asylee status, and I am applying for a Refugee
Travel Document.</div>';
$pdf->writeHTMLCell(80, 7, 24, 47, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d.  </b><input type="checkbox" name="part2_1d" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I am applying for an Advance Parole Document to
allow me to return to the United States after
temporary foreign travel.</div>';
$pdf->writeHTMLCell(80, 7, 24, 60, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.e.  </b><input type="checkbox" name="part2_1e" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 73, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I am outside the United States, and I am applying for
an Advance Parole Document.</div>';
$pdf->writeHTMLCell(80, 7, 24, 73, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.f.  </b><input type="checkbox" name="part2_1f" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 83, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I am applying for an Advance Parole Document for a
person who is outside the United States</div>';
$pdf->writeHTMLCell(80, 7, 24, 83, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>If you checked box "1.f." provide the following information
about that person in 2.a. through 2.p.</div>';
$pdf->writeHTMLCell(90, 7, 12, 93, $html, 0, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.  </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 105, $html, 0, 1, false, false, 'J', true);
$html = '<div>Family Name <br><i>(Last Name)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 105, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(60, 7, 42, 106, '', 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.  </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 115, $html, 0, 1, false, false, 'J', true);
$html = '<div>Given Name <br><i>(First Name)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 115, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(60, 7, 42, 116, '', 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.c. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 125, $html, 0, 1, false, false, 'J', true);
$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 20, 125, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(60, 7, 42, 125, '', 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.d. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 135, $html, 0, 1, false, false, 'J', true);
$html = '<div>Date of Birth <i> (mm/dd/yyyy) </i></div>';
$pdf->writeHTMLCell(80, 7, 20, 135, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(32, 7, 70, 135, '', 1, 1, false, true, 'J', true);
//........
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 52, 112, true); //page 2  angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 66, 132, true); // angle 2
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 82, 135, true); // angle 3
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 160, 95, true); // angle 4
$pdf->StopTransform();
//.....

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.e. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 26, $html, 0, 1, false, false, 'J', true);
$html = '<div>Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 120, 26, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 120, 31, '', 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.f. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 40, $html, 0, 1, false, false, 'J', true);
$html = '<div>Country of Citizenship</div>';
$pdf->writeHTMLCell(80, 7, 120, 40, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 120, 45, '', 1, 1, false, true, 'J', true);
//........


$pdf->SetFont('times', '', 10);
$html = '<div><b>2.g. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 55, $html, 0, 1, false, false, 'J', true);
$html = '<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120, 55, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 18);
$html = '<div>( &nbsp;  &nbsp;  &nbsp; &nbsp;)</div>';
$pdf->writeHTMLCell(80, 7, 155, 53, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(10, 7, 159, 54, "", 1, 1, false, true, 'J', true);
$pdf->writeHTMLCell(10, 7, 175, 54, "", 1, 1, false, true, 'J', true);
$pdf->writeHTMLCell(10, 7, 185, 54, "-", 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(13, 7, 190, 54, "", 1, 1, false, true, 'J', true);

//...........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'BI', 12);
$html = '<div>Physical Address (If you checked box 1.f.)</div>';
$pdf->writeHTMLCell(90, 7, 113, 62, $html, 0, 1, true, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.h.   </b> In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 112, 70, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('application_your_physical_care_of_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 75);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.i.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 82, $html, '', 0, 0, true, 'L');
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 119, 82, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicationt_your_physical_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 84);


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.j. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt5" value="Apt5" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste5" value="Ste5" checked="" />Ste. <input type="checkbox" name="Flr5" value="Flr5" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 93, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 93);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.k.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 102, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 102);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.l.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2.m.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 111, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="application_your_physical_state" size="0.50">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 111, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 111);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.n.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 120, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 120);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.o.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 129, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 129);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.p.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 138, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_country', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 135.5, 138);

//..........

$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 3. Processing Information</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 148, $html, 1, 1, true, false, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1. </b> Date of Intended Departure</div>';
$pdf->writeHTMLCell(90, 7, 12, 155, $html, 0, 1, false, false, 'J', true);
$html = '<div><i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 35, 160, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('date_of_independent_depreture', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 67, 160);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2. </b> Expected Length of Trip <i>(in days) </i></div>';
$pdf->writeHTMLCell(90, 7, 12, 169, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('except_day_of_length', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 82, 169);
//........
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 177, $html, 0, 1, false, false, 'J', true);
$html = '<div>Are you, or any person included in this application, now
in exclusion, deportation, removal, or rescission
proceedings?</div>';
$pdf->writeHTMLCell(80, 7, 19, 177, $html, 0, 1, false, true, 'J', true);
$html = '<div><input type="checkbox" name="part3" value="yes" checked=" " />    Yes <input type="checkbox" name="part3" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 70, 185, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b. </b>  If "Yes",  Name of DHS office:  </div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(80, 7, 22, 195, '', 1, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 157, $html, 0, 1, false, false, 'J', true);
$html = '<div>Have you ever before been issued a reentry permit or
Refugee Travel Document? <i>(If "Yes" give the following
information for the last document issued to you):</i></div>';
$pdf->writeHTMLCell(85, 7, 119, 157, $html, 0, 1, false, true, 'J', true);

$html = '<div><input type="checkbox" name="part34a" value="yes" checked=" " />    Yes <input type="checkbox" name="part34a" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 170, 168, $html, 0, 1, false, true, 'J', true);
//......


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 175, $html, 0, 1, false, false, 'J', true);
$html = '<div>Date of Issued <i> (mm/dd/yyyy) </i></div>';
$pdf->writeHTMLCell(80, 7, 120, 175, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(32, 7, 170, 175, '', 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.   </b>    Disposition <i> (attached, lost, etc.):</i> </div>';
$pdf->writeHTMLCell(90, 7, 112, 185, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(80, 7, 122, 190, '', 1, 1, false, true, 'J', true);
//........


$pdf->SetFont('times', 'B', 10);
$html = '<div>If you are applying for a non-DACA related Advance Parole Document, skip to Part 7;<i> DACA recipients must complete Part 4
before skipping to Part 7.</i></div>';
$pdf->writeHTMLCell(190, 7, 12, 210, $html, 0, 1, false, true, 'J', true);

//......page number 2 end --------------------------------------------------------------------------------------------------------


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 3. Processing Information</b><i>(continued)</i></div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>Where do you want this travel document sent? <i>(Check one)</i></div>';
$pdf->writeHTMLCell(90, 7, 12, 24, $html, 0, 1, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b><input type="checkbox" name="part3_5" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 1, false, false, 'J', true);
$html = '<div>To the U.S. address shown in <b>Part 1 (2.a through
2.i.)</b> of this form.</div>';
$pdf->writeHTMLCell(80, 7, 22, 30, $html, 0, 1, false, true, 'J', true);
//........


$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </b><input type="checkbox" name="part3_6" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 39, $html, 0, 1, false, false, 'J', true);
$html = '<div>To a U.S. Embassy or consulate at:</div>';
$pdf->writeHTMLCell(80, 7, 22, 39, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b>  City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(50, 6, 52, 45, '',  1,  1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.  </b>  Country </div>';
$pdf->writeHTMLCell(90, 7, 12, 53, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(60, 6, 42, 53, '',  1,  1, false, true, 'J', true);

//.......


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.  </b><input type="checkbox" name="part3_7" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 1, false, false, 'J', true);
$html = '<div>To a DHS office overseas at:</div>';
$pdf->writeHTMLCell(80, 7, 22, 60, $html, 0, 1, false, true, 'J', true);
//........
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b>  City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(50, 6, 52, 67, '',  1,  1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.  </b>  Country </div>';
$pdf->writeHTMLCell(90, 7, 12, 76, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(60, 6, 42, 76, '',  1,  1, false, true, 'J', true);


//........
$pdf->SetFont('times', '', 10);
$html = '<div>if you checked "6" or "7", where should the notice to pick up
he travel document be sent?</div>';
$pdf->writeHTMLCell(90, 7, 12, 84, $html, 0, 1, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.  </b><input type="checkbox" name="part3_8" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 95, $html, 0, 1, false, false, 'J', true);
$html = '<div>To the address shown in <b>Part 2 (2.h. through 2.p.)</b>
of this form.</div>';
$pdf->writeHTMLCell(80, 7, 22, 95, $html, 0, 1, false, true, 'J', true);
//........


$pdf->SetFont('times', '', 10);
$html = '<div><b>9.  </b><input type="checkbox" name="part3_9" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 105, $html, 0, 1, false, false, 'J', true);
$html = '<div>To the address shown in <b>Part 3 (10.a. through 10.i.)</b>
of this form.:</div>';
$pdf->writeHTMLCell(80, 7, 22, 105, $html, 0, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.a.   </b> In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 112, 25, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_your_physical_care_of_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 30);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.b. </b></div>';
$pdf->writeHTMLCell(30, 0, 112, 37, $html, '', 0, 0, true, 'L');
$html = '<div> Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 119, 37, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_your_physical_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 39);


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>10.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt5" value="Apt5" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste5" value="Ste5" checked="" />Ste. <input type="checkbox" name="Flr5" value="Flr5" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 48);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.d. </b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 57, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 57);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.e.</b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>10.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="processing_your_physical_state" size="0.50">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 66);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>10.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 75, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 75);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>10.h.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 84, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 84);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>10.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 93, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_country', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 135.5, 93);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>10.j. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 102, $html, 0, 1, false, false, 'J', true);
$html = '<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120, 102, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 18);
$html = '<div>( &nbsp;  &nbsp;  &nbsp; &nbsp;)</div>';
$pdf->writeHTMLCell(80, 7, 155, 101, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(10, 7, 160, 102, "", 1, 1, false, true, 'J', true);
$pdf->writeHTMLCell(10, 7, 175, 102, "", 1, 1, false, true, 'J', true);
$pdf->writeHTMLCell(10, 7, 185, 102, "-", 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(13, 7, 189, 102, "", 1, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', 'B', 12); // set font
$html = '<div>Part 4. Information About Your Proposed Travel</div>';
$pdf->writeHTMLCell(190, 7, 13, 115, $html, 1, 1, true, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.   </b>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 122, $html, 0, 1, false, false, 'J', true);
$html = '<div>Purpose of trip. <i>(If you need more space, continue on a
separate sheet of paper.)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 122, $html, 0, 1, false, true, 'J', true);
//........
$pdf->setFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="19" rows="7" name="part_4_1a">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 19, 130, $html, 0, 0, false, 'L');

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.   </b>  </div>';
$pdf->writeHTMLCell(90, 7, 112, 122, $html, 0, 1, false, false, 'J', true);
$html = '<div> List the countries you intend to visit. <i> (If you need more
space, continue on a separate sheet of paper.)</i></div>';
$pdf->writeHTMLCell(80, 7, 120, 122, $html, 0, 1, false, true, 'J', true);
//........
$pdf->setFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="19" rows="7" name="part_4_1b">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 119, 130, $html, 0, 0, false, 'L');

//.........
$pdf->SetFont('times', 'B', 12); // set font
$html = '<div>Part 5. Complete Only If Applying for a Re-entry Permit</div>';
$pdf->writeHTMLCell(190, 7, 13, 160, $html, 1, 1, true, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div>Since becoming a permanent resident of the United States (or
during the past 5 years, whichever is less) how much total time
have you spent outside the United States?</div>';
$pdf->writeHTMLCell(91, 7, 12, 168, $html, 0, 1, false, true, 'J', true);
//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 168, $html, 0, 1, false, true, 'J', true);

$html = '<div>Since you became a permanent resident of the United
States, have you ever filed a Federal income tax return as
a nonresident or failed to file a Federal income tax return
because you considered yourself to be a nonresident? <i>(If
"Yes" give details on a separate sheet of paper.)</i></div>';
$pdf->writeHTMLCell(85, 7, 118, 168, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part5_2" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part3" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 170, 188, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>   <input type="checkbox" name="part5_1a" value="1" checked=" " /> &nbsp;   less than 6 months</div>';
$pdf->writeHTMLCell(90, 7, 12, 184, $html, 0, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>   <input type="checkbox" name="part5_1b" value="1" checked=" " /> &nbsp;   6 months to 1 year</div>';
$pdf->writeHTMLCell(90, 7, 12, 189, $html, 0, 1, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>   <input type="checkbox" name="part5_1c" value="1" checked=" " /> &nbsp;    1 to 2 years</div>';
$pdf->writeHTMLCell(90, 7, 12, 194, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d.  </b>   <input type="checkbox" name="part5_1d" value="1" checked=" " /> &nbsp;    2 to 3 years</div>';
$pdf->writeHTMLCell(90, 7, 65, 184, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.e.  </b>   <input type="checkbox" name="part5_1e" value="1" checked=" " /> &nbsp;    3 to 4 years</div>';
$pdf->writeHTMLCell(90, 7, 65, 189, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.f.  </b>   <input type="checkbox" name="part5_1f" value="1" checked=" " /> &nbsp;     more than 4 years</div>';
$pdf->writeHTMLCell(90, 7, 65, 194, $html, 0, 1, false, true, 'J', true);

//........page number 3 end --------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 6. Complete Only If Applying for a Refugee Travel Document</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.  </b>  Country from which you are a refugee or asylee: </div>';
$pdf->writeHTMLCell(90, 7, 12, 24, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_country_you_are_refugee', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 29);

//.......
$pdf->SetFont('times', 'B', 10);
$html = '<div>If you answer "Yes" to any of the following questions, you
must explain on a separate sheet of paper. Include your
Name and A-Number on the top of each sheet.</div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, 0, 1, false, true, 'J', true);
//....

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b>  Do you plan to travel to the country
named above?</div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_2" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_2" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 70, 54, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div>Since you were accorded refugee/asylee status, have you ever:</div>';
$pdf->writeHTMLCell(91, 7, 12, 60, $html, 0, 1, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b>  Returned to the country named
above?</div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_3a" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_3a" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 70, 72, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b. </b> Applied for and/or obtained a national passport, passport <br>&nbsp; &nbsp; &nbsp; &nbsp;
renewal, or entry permit of that country? </div>';
$pdf->writeHTMLCell(91, 7, 12, 79, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_3b" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_3b" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 70, 87, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c. </b>Applied for and/or received any benefit from such country <br> &nbsp; &nbsp; &nbsp;
(for example, health insurance benefits)?</div>';
$pdf->writeHTMLCell(91, 7, 112, 25, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_3c" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_3c" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 170, 33, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div>Since you were accorded refugee/asylee status, have you, by
any legal procedure or voluntary act:</div>';
$pdf->writeHTMLCell(91, 7, 112, 40, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a. </b>Reacquired the nationality of the<br> &nbsp; &nbsp; &nbsp;  
country named above?</div>';
$pdf->writeHTMLCell(91, 7, 112, 50, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_4a" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_4a" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 170, 50, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b. </b> Acquired a new nationality?  </div>';
$pdf->writeHTMLCell(91, 7, 112, 60, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_4b" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_4b" value="no" checked=" " />   No</div>';
$pdf->writeHTMLCell(90, 7, 170, 60, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c. </b>  Been granted refugee or asylec <br>  &nbsp; &nbsp; &nbsp;
status n any other country?</div>';
$pdf->writeHTMLCell(91, 7, 112, 70, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="part6_4c" value="yes" checked=" " />   &nbsp;   Yes  <input type="checkbox" name="part6_4c" value="no" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 170, 70, $html, 0, 1, false, true, 'J', true);

//......
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 7. Complete Only If Applying for Advance Parole </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 95, $html, 1, 1, true, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div>On a separate sheet of paper, explain how you qualify for an
Advance Parole Document, and what circumstances warran
issuance of advance parole. Include copies of any documents
you wish considered. <i>(See instructions.)</i></div>';
$pdf->writeHTMLCell(91, 7, 12, 103, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1. </b>How many trips do you intend to use this document?</div>';
$pdf->writeHTMLCell(91, 7, 12, 119, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div><input type="checkbox" name="part7_1" value="yes" checked=" " />   &nbsp;   One Trip   <input type="checkbox" name="part7_1" value="no" checked=" " />   More than one trip </div>';
$pdf->writeHTMLCell(90, 7, 50, 124, $html, 0, 1, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div>If the person intended to receive an Advance Parole Document
is outside the United States, provide the location (City or Town
and Country) of the U.S. Embassy or consulate or the DHS
overseas office that you want us to notify.</div>';
$pdf->writeHTMLCell(91, 7, 12, 130, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a. </b>City or Town  </div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_7_city_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 152);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b. </b>Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_7_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 165);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div>If the travel document will be delivered to an overseas office,
where should the notice to pick up the document be sent?:</div>';
$pdf->writeHTMLCell(90, 7, 12, 173, $html, 0, 1, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>3. </b>  <input type="checkbox" name="part7_3" value="1" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 185, $html, 0, 1, false, true, 'J', true);
$html = '<div>To the address shown in<b> Part 2 (2.h. through 2.p.)</b>
of this form. </div>';
$pdf->writeHTMLCell(75, 7, 22, 185, $html, 0, 1, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$html = '<div><b>4. </b>  <input type="checkbox" name="part7_4" value="1" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 198, $html, 0, 1, false, true, 'J', true);
$html = '<div>To the address shown in <b>Part 7 (4.a. through 4.i.)</b>
of this form.</div>';
$pdf->writeHTMLCell(75, 7, 22, 198, $html, 0, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.   </b> In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 112, 102, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part7_your_physical_care_of_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 107);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b. </b></div>';
$pdf->writeHTMLCell(30, 0, 112, 115, $html, '', 0, 0, true, 'L');
$html = '<div> Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 119, 115, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part7_your_physical_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 116);


$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt7" value="Apt7" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste7" value="Ste7" checked="" />Ste. <input type="checkbox" name="Flr7" value="Flr7" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 125, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 125);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.d. </b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 134, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 134);
//.......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.e. </b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<b>4.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="part7_your_physical_state" size="0.50">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 143);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 152, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 152);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.h.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 161, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 161);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 170, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_country', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 135.5, 170);

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.j. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, false, 'J', true);
$html = '<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120, 180, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 18);
$html = '<div>( &nbsp;  &nbsp;  &nbsp; &nbsp;)</div>';
$pdf->writeHTMLCell(80, 7, 155, 179, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(10, 7, 160, 180, "", 1, 1, false, true, 'J', true);
$pdf->writeHTMLCell(10, 7, 175, 180, "", 1, 1, false, true, 'J', true);
$pdf->writeHTMLCell(10, 7, 185, 180, "-", 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(13, 7, 189, 180, "", 1, 1, false, true, 'J', true);
//.........page number 4 end--------------------------------------------------------------------------


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 8. Signature of Applicant </b><i>(Read the information on penalties in the Form instructions before completing<br> &nbsp; &nbsp;
this Part.) If you are filing for a Re-entry Permit or Refugee Travel Document, you must be in the United
<br>&nbsp; &nbsp; States to file this application.</i></div>';
$pdf->writeHTMLCell(192, 10, 12, 17, $html, 1, 1, true, false, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1. </b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 33, $html, 0, 1, false, false, 'J', true);
$html = '<div>I certify, under penalty of perjury under the laws of the
United States of America, that this application and the
evidence submitted with it is all true and correct. I
authorize the release of any information from my records
that U.S. Citizenship and Immigration Services needs
to determine eligibility for the benefit I am seeking.</div>';
$pdf->writeHTMLCell(85, 7, 18, 33, $html, 0, 1, false, true, 'J', true);

$html = '<div>Signature of Applicant</div>';
$pdf->writeHTMLCell(85, 7, 18, 58, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 19, 64, "", 1, 1, false, true, 'J', true);

$pdf->SetFont('zapfdingbats', '', 20);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 63, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b>Date of Signature &nbsp;<i>(dd/mm/yyyy)</i> </div>';
$pdf->writeHTMLCell(80, 10, 112, 33, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('signature_applicant_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 174, 33);

//............
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(35);
$html = '<span style="font-family:zapfdingbats;">s</span>';
$pdf->writeHTMLCell(100, 100, 53, 105, $html, 0, 1, false, false, 'R', true);
$pdf->StopTransform();

//........

$pdf->SetFillColor(220, 220, 220);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 43, $html, 0, 1, false, true, 'J', true);
$html = '<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120, 43, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 18);
$html = '<div>( &nbsp;  &nbsp;  &nbsp; &nbsp;)</div>';
$pdf->writeHTMLCell(80, 7, 155, 42, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part8_daytime_phone_code', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 160, 43);
$pdf->TextField('part8_daytime_phone_number1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 175, 43);
$pdf->TextField('part8_daytime_phone_number2', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 189, 43);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(10, 7, 185, 43, "-", 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: </b>If you do not completely fill out this form or fail to
submit required documents listed in the instructions, your
application may be denied.</div>';
$pdf->writeHTMLCell(90, 7, 112, 53, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 9. Information About Person Who Prepared This Application, If Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 73, $html, 1, 1, true, false, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE: </b>If you are an attorney or representative, you must
submit a completed Form G-28, Notice of Entry of Appearance
as Attorney or Accredited Representative, along with this
application.</div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, true, 'J', true);
//........
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1);
$html = '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 96, $html, 0, 1, true, 'L');
$pdf->setFont('Times', '', 10);
$html = '<div>Provide the following information concerning the preparer.</div>';
$pdf->writeHTMLCell(90, 7, 12, 103, $html, 0, 0, false, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a. </b>&nbsp;Preparer\'s Family Name <i>(Last Name)</i> </div>';
$pdf->writeHTMLCell(95, 7, 12, 110, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 115);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b. </b>Preparer\'s Given Name <i>(First Name)</i></div>';
$pdf->writeHTMLCell(95, 7, 12, 123, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_first_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 128);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp;  Preparer\'s Business or Organization Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 136, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19, 141);
//.................
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1);
$html = '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, 0, 1, true, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(30, 0, 12, 158, $html, '', 0, 0, true, 'L');
$html = '<div> Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 19, 158, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_your_mailing_street_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 160);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt7" value="Apt7" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste7" value="Ste7" checked="" />Ste. <input type="checkbox" name="Flr7" value="Flr7" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62, 169);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c. </b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 178, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 178);
//.......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d. </b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="part9_your_mailing_state" size="0.50">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 187);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 196, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_postal_code', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 196);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 205, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 205);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 214, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_country', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 35, 214);

//........
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1);
$html = '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 83, $html, 0, 1, true, 'L');

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>  Preparer\'s Daytime Phone Number  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Extension</div>';
$pdf->writeHTMLCell(90, 7, 112, 90, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 18);
$html = '<div>( &nbsp;  &nbsp;  &nbsp; &nbsp;)</div>';
$pdf->writeHTMLCell(80, 7, 125, 94, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_daytime_phone_code', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 130, 95);
$pdf->TextField('part9_daytime_phone_number1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 95);
$pdf->TextField('part9_daytime_phone_number2', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 162, 95);
$pdf->TextField('part9_daytime_phone_extension', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180, 95);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(10, 7, 158, 95, "-", 0, 1, false, true, 'J', true);
//............
$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp;  Preparer\'s E-mail Address <i>(if any)</i></div>';
$pdf->writeHTMLCell(95, 7, 112, 105, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 110);
//.................
$pdf->setFont('Times', '', 10);
$html = '<div><b>Declaration</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 120, $html, 0, 0, false, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div>To be completed by all preparers, including attorneys and
authorized representatives: I declare that I prepared this benefit
request at the request of the applicant, that it is based on all the
information of which I have knowledge, and that the
information is true to the best of my knowledge.</div>';
$pdf->writeHTMLCell(90, 7, 112, 128, $html, 0, 0, false, 'L');

//............
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.a. </b>Signature <br>
 &nbsp; &nbsp; of Preparer </div>';
$pdf->writeHTMLCell(25, 7, 112, 150, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(65, 7, 137, 152, "", 1, 0, false, 'L');
//.................
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.b. </b>Date of Signature <i>(mm/ddyyyy)</i></div>';
$pdf->writeHTMLCell(90, 7, 112, 165, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 172, 165);

//............
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$html = '<span style="font-family:zapfdingbats;">t</span>';
$pdf->writeHTMLCell(10, 10, 170, 198, $html, 0, 1, false, false, 'R', true);
$pdf->StopTransform();
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE:  </b> If you require more space to provide any additional
information, use a separate sheet of paper. You must include
your Name and A-Number on the top of each sheet.</div>';
$pdf->writeHTMLCell(90, 7, 112, 175, $html, 0, 0, false, 'L');































$js = "
var fields = {
    'attorney_state_licence':' ',
    'about_your_lastname':' ',
    'about_your_firstname':' ',
    'about_your_middlename':' ',
    'about_your_physical_care_of_name':' ',
    'about_your_physical_street_number':' ',
    'about_your_physical_apt_ste_flr':' ',
    'about_your_physical_city_or_town':' ',
    'about_your_physical_state':' ',
    'about_your_physical_zip_code':' ',
    'about_your_physical_postal_code':' ',
    'about_your_physical_province':' ',
    'about_your_physical_country':' ',

    'other_information_alien_reg_number':' ',
    'other_information_country_of_birth':' ',
    'other_information_country_of_citizenship':' ',
    'other_information_class_of_admission':' ',
    'other_information_date_of_birth':' ',
    'other_information_us_social_security':' ',

    'application_your_physical_care_of_name':' ',
    'applicationt_your_physical_street_number':' ',
    'application_your_physical_apt_ste_flr':' ',
    'application_your_physical_city_or_town':' ',
    'application_your_physical_state':' ',
    'application_your_physical_zip_code':' ',
    'application_your_physical_postal_code':' ',
    'application_your_physical_province':' ',
    'application_your_physical_country':' ',

    'date_of_independent_depreture':' ',
    'except_day_of_length':' ',

    'processing_your_physical_care_of_name':' ',
    'processing_your_physical_street_number':' ',
    'processing_your_physical_apt_ste_flr':' ',
    'processing_your_physical_city_or_town':' ',
    'processing_your_physical_state':' ',
    'processing_your_physical_zip_code':' ',
    'processing_your_physical_postal_code':' ',
    'processing_your_physical_province':' ',
    'processing_your_physical_country':' ',
    'part_4_1a':' ',
    'part_4_1b':' ',
    'part_6_country_you_are_refugee':' ',
    'part_7_city_town':' ',
    'part_7_country':' ',

    'part7_your_physical_care_of_name':' ',
    'part7_your_physical_street_number':' ',
    'part7_your_physical_apt_ste_flr':' ',
    'part7_your_physical_city_or_town':' ',
    'part7_your_physical_state':' ',
    'part7_your_physical_zip_code':' ',
    'part7_your_physical_postal_code':' ',
    'part7_your_physical_province':' ',
    'part7_your_physical_country':' ',

    'signature_applicant_date_of_signature':' ',
    'part8_daytime_phone_code':' ',
    'part8_daytime_phone_number1':' ',
    'part8_daytime_phone_number2':' ',

    'part9_preparer_last_name':' ',
    'part9_preparer_first_name':' ',
    'part9_preparer_business_org_name':' ',

    'part9_your_mailing_street_number':' ',
    'part9_your_mailing_apt_ste_flr':' ',
    'part9_your_mailing_city_or_town':' ',
    'part9_your_mailing_state':' ',
    'part9_your_mailing_zip_code':' ',
    'part9_your_mailing_postal_code':' ',
    'part9_your_mailing_province':' ',
    'part9_your_mailing_country':' ',

    'part9_daytime_phone_code':' ',
    'part9_daytime_phone_number1':' ',
    'part9_daytime_phone_number2':' ',
    'part9_daytime_phone_extension':' ',

    'part9_preparer_email_address':' ',
    'part9_preparer_date_of_signature':' ',
    '':' ',





































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
