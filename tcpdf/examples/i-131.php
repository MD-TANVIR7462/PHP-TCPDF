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

        // $bottom_image = "images/I-131-bottom-pdf417-$this->page.png";
        // $this->Image($bottom_image, 15, 225, 188, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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





















/******************************
 ******** End Page No 5 ******
 ******************************/

/******************************
 ******** Start Page No 6 ****
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
 ******** End Page No 5 ******
 ******************************/

/******************************
 ******** Start Page No 6 ****
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
 ******** End Page No 6 ******
 ******************************/

/******************************
 ******** Start Page No 7 ****
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
$pdf->TextField('p8_additional_info_5d', 183,20.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_5d')), 21, 153);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.2, 154, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.2, 161, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.8,20.5, 21, 153, '', 1, 1, false, 'L');
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
