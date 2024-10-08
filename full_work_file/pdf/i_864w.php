<?php

require_once('formheader.php');   //database connection file 

//require_once("config.php");
//$allDataCountry = indexByQueryAlldata("SELECT * FROM countries");

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

            // $this->StartTransform();
            // $this->SetFillColor(0,0,0);
            // $this->Rotate(-270);
            // $this->SetFont('zapfdingbats', 'B', 10);
            // $this->MultiCell(10, 10, "t", '', 'R', 0, 0, 25, 150, false); header angle
            // $this->StopTransform();


            // $this->SetFont('times', 'B', 10);
            // $this->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
            // $this->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);


        }
        // parent::Header();

        // Logo
        /* $image_file = K_PATH_IMAGES.'logo_example.jpg';
           $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false); */
        // Set font
        /* $this->SetFont('helvetica', 'B', 20); */
        // Title
        /* $this->Cell(0, 15, '<< Company Heading >>', 0, false, 'C', 0, '', 0, false, 'M', 'M'); */
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-20);

        $header_top_border = array(
            'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
        );
        $this->Cell(191, 4, '', $header_top_border, 1, 1);

        // Set font
        $this->SetFont('times', '', 9);

        $this->Cell(40, 10, "Form I-864W  Edition 12/08/21  E  ", 0, 0, 'L');


        // if ($this->page == 1){
        //$barcode_image = "images/G-639-footer-pdf417-$this->page.png";
        // )
        //$this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);


        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 159, 266, true);

        // Page number
        //$created_date = date("F d, Y");
        //$this->Cell(40, 4, 'Form N-400 Edition 09/17/19');

        // $this->write2DBarcode('N-400|09/17/19|1', 'PDF417', 20, 120, 0, 20, $style, 'N');

        // $this->write2DBarcode('test');

        // set style for barcode
        /* $style = array(
            'border' => 0,
            'vpadding' => '0',
            'hpadding' => '0',
			'stretch' => true,
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 22, // width of a single module in points
            'module_height' => 2.5, // height of a single module in points
        ); */
        // set a barcode on the page footer
        //$this->setBarcode(date('Y-m-d H:i:s'));

        // $this->Cell(60, 4, '1025GEJ Approved February 26, 2018    ', $single_border_top, 0, 0);
        // $this->Cell(60, 4, '1025GEJ Approved February 26, 2018', 1, 0, 'L');
        // $this->MultiCell(60, 4,'1025GEJ Approved February 26, 2018','T','L',1,0);

        // $this->MultiCell(60, 4,'Ex Parte Motion for Alternative Service','T','C',1,0);

        // $this->write2DBarcode('N-400|09/17/19|'.$this->getAliasNumPage(), 'PDF417', 65, 265, 95, 0, $style, '');



        /* $logoX = 186; // 186mm. The logo will be displayed on the right side close to the border of the page
		$logoFileName = "barcode_1.jpg";
		$logoWidth = 15; // 15mm
		$logo = $this->PageNo() . ' | '. $this->Image($logoFileName, $logoX, $this->GetY()+2, $logoWidth);
 */

        // define barcode style
        /* $style = array(
			'position' => '',
			'align' => '',
			'stretch' => true,
			'fitwidth' => false,
			'cellfitalign' => '',
			'border' => true,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0,0,128),
			'bgcolor' => array(255,255,128),
			'text' => true,
			'label' => '',
			'font' => 'helvetica',
			'fontsize' => 12,
			'stretchtext' => 4
		);

		// CODE 39 EXTENDED + CHECKSUM
		// $pdf->SetLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
		// $this->write1DBarcode('tt', 'C39E+', '', '', 40, 15, 0.4, $style, '0');
		$this->write2DBarcode('N-400|09/17/19|', 'PDF417', 65, 265, 55, 25, $style, '0'); */

        // $this->Cell(80, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 1, 0, 'R', 0, '', 0, false, 'L', 'R');

    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-864W');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetMargins(13.7, 15.3, 12.8, true);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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

// define barcode style
/*$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);*/


// $html = '<h4>PDF Example</h4><br><p>Welcome to the Jungle</p>';

//$pdf->Text(50, 85, 'PDF417 (ISO/IEC 15438:2006)');

// $pdf->Ln(2);

// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(30, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13);    // set font
$pdf->MultiCell(120, 15, "Request for Exemption for Intending Immigrant's Affidavit of Support  ", 0, 'C', 0, 1, 45, 5, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "USCIS\nForm I-864W", 0, 'C', 0, 1, 170, 5.5, true);

$pdf->SetFont('times', 'B', 11);    // set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);    // set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);    // set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No.  1615-0075\nExpires 01/31/2026", 0, 'C', 0, 1, 169, 18.5, true);

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
//..............table 1 start
$pdf->SetFillColor(220, 220, 220);
$pdf->writeHTMLCell(189.6, 27, 13, 33, "", 1, 1, false, true, 'C', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(189, 5, 13.3, 33.3, "For Goverment Use Only", "B", 1, true, true, 'C', true);
//...........

$pdf->SetFont('times', 'B', 10);    // set font
$pdf->MultiCell(80, 15, "This Form 1-864W:", 0, 'L', 0, 1, 14, 39, true);


$pdf->SetFont('times', 'B', 10);    // set font
$pdf->MultiCell(80, 15, "DOES NOT MEET", 0, 'L', 0, 1, 18, 45, true);

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="table1_a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html = '<div>the requirements of
<br>exemption </div>';
$pdf->writeHTMLCell(90, 7, 18, 49, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 11);
$html = '<div> <input type="checkbox" name="table1_b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 52, 45, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);    // set font
$html = '<div><b>MEETS</b> the <br>requirements of
<br>exemption </div>';
$pdf->writeHTMLCell(90, 7, 58, 45, $html, 0, 1, false, true, 'J', true);



//............

$pdf->SetFont('times', '', 10);
$html = '<div>Reviewed By:</div>';
$pdf->writeHTMLCell(90, 7, 98, 45, $html, 0, 1, false, true, 'J', true);
//............

$pdf->writeHTMLCell(81, 27, 120, 50, "", "T", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Location:</div>';
$pdf->writeHTMLCell(90, 7, 98, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->writeHTMLCell(32, 27, 114, 56, "", "T", 1, false, true, 'C', true);


$pdf->SetFont('times', '', 10);
$html = '<div>Date (mm/dd/yyyy):</div>';
$pdf->writeHTMLCell(90, 7, 147, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->writeHTMLCell(25, 27, 177, 56, "", "T", 1, false, true, 'C', true);

//.......table 2start
$pdf->writeHTMLCell(190, 18.8, 13, 62, "", 1, 1, false, true, 'C', true);
$pdf->writeHTMLCell(39, 17.5, 13.5, 62.5, "", "R", 1, true, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>To be completed by an Attorney or Accredited Representative</b> (if any).  </div>';
$pdf->writeHTMLCell(40, 7, 15, 65, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 12);
$g_28 = showData("i_864w_g_28_checkbox") == "Y" ? "checked" : " ";
$html = '<div><b>  </b>   <input type="checkbox" name="attached4" value="Y" checked="' . $g_28 . '" /> </div>';
$pdf->writeHTMLCell(40, 15, 20, 63, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', 'B', 10);
$html = '<div>Select this box if<br>
Form G-28 or<br>
G-28I is attached.</div>';
$pdf->writeHTMLCell(40, 15, 61, 63, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 18, 92, 62, '',  'L',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 18, 138, 62, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell(50, 15, 93, 63, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 72);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or According Representative USCIS Online Account Number</b>(if any)</div>';
$pdf->writeHTMLCell(60, 15, 140, 62, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_or_according_representative', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 72);
//............table2end

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 17, 45, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. ", '', 'L', 0, 1, 17.5, 81, true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About You or Your Adopted
Child (Intending Immigrant)</b></div>';
$pdf->writeHTMLCell(90, 6, 12.9, 87, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b><i>Name of Requestor</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 101, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 109, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 110);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 118, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 119);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 128, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 128);
//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b><i>Mailing Address</i></b></div>';
$pdf->writeHTMLCell(90, 6.5, 14, 137, $html, 0, 1, true, false, 'L', true);

$pdf->SetFont('times', 'B I', 8);
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><i>(USPS ZIP Code Lookup)</i></a></div>';
$pdf->writeHTMLCell(90, 7, 14, 138, $html, 0, 1, false, false, 'R', true);
//...........
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.  </b>  In Care Of Name   </div>';
$pdf->writeHTMLCell(90, 7, 13, 145, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_incare', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 150);
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 157, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_street_number_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 158);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.c. </b></div>';
$pdf->writeHTMLCell(60, 0, 13, 167, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font

$apt =  (showData('information_about_you_us_mailing_apt_ste_flr') == 'apt') ? 'checked' : '';
$ste =  (showData('information_about_you_us_mailing_apt_ste_flr') == 'ste') ? 'checked' : '';
$flr =  (showData('information_about_you_us_mailing_apt_ste_flr') == 'flr') ? 'checked' : '';

$html = '<div> &nbsp;
<input type="checkbox" name="Apt" value="Apt" checked="' . $apt . '" /> Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste" value="Ste" checked="' . $ste . '" /> Ste. 
<input type="checkbox" name="Flr" value="Flr" checked="' . $flr . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 19, 167, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 62.5, 166);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 13, 174, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_city_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 174);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>2.e.</b> &nbsp; State</div>';
$pdf->writeHTMLCell(50, 4, 13, 182, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="requestor_mailing_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29, 182, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 45, 182, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 182);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 13, 190, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_mailing_address_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 190);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.h.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 13, 198, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 198);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.i.</b> &nbsp;&nbsp; Country';
$pdf->writeHTMLCell(90, 7, 13, 204, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 209);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 218, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Is your current mailing address the same as your physical
address? ';
$pdf->writeHTMLCell(90, 7, 21, 218, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font

$check_y =  (showData('864w_is_current_mailing_same_as_physical') == 'Y') ? 'checked' : '';
$check_n =  (showData('864w_is_current_mailing_same_as_physical') == 'N') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="part4_13" value="Y" checked="' . $check_y . '" />   Yes   &nbsp; 
<input type="checkbox" name="part4_13" value="N" checked="' . $check_n . '" /> No</div>';
$pdf->writeHTMLCell(80, 7, 80, 224, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "No" to <b>Item Number 3</b>., provide your
physical address.';
$pdf->writeHTMLCell(90, 7, 21, 230, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 93, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 94);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b. </b></div>';
$pdf->writeHTMLCell(60, 0, 113, 104, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font


$apt4b =  (showData('information_about_you_home_apt_ste_flr') == 'apt') ? 'checked' : '';
$ste4b =  (showData('information_about_you_home_apt_ste_flr') == 'ste') ? 'checked' : '';
$flr4b =  (showData('information_about_you_home_apt_ste_flr') == 'flr') ? 'checked' : '';

$html = '<div> &nbsp;
<input type="checkbox" name="Apt2" value="Apt" checked="' . $apt4b . '" /> Apt. &nbsp;&nbsp;
<input type="checkbox" name="ste2" value="Ste" checked="' . $ste4b . '" /> Ste. 
<input type="checkbox" name="Flr2" value="Flr" checked="' . $flr4b . '" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 119, 103.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 162, 102);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 112, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 110);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>4.d.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="physical_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 128, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.e.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171, 118);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 126);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 135, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 134);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 146);
//..............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 6.5, 113, 85, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b>Other Information </b></div>';
$pdf->writeHTMLCell(90, 6.5, 113, 155, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b> &nbsp; &nbsp; Date of Birth (mm/dd/yyyy)';
$pdf->writeHTMLCell(90, 7, 113, 162, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_date_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 167);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.</b> &nbsp; &nbsp; City or Town of Birth';
$pdf->writeHTMLCell(90, 7, 113, 175, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_city_or_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 180);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.</b> &nbsp; &nbsp; State or Province of Birth (if applicable)';
$pdf->writeHTMLCell(90, 7, 113, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_state_province', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 192);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.</b> &nbsp; &nbsp; Country of Birth';
$pdf->writeHTMLCell(90, 7, 113, 199, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_Country_of_Birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 204);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.</b> &nbsp; &nbsp; Alien Registration Number (A-Number)';
$pdf->writeHTMLCell(90, 7, 113, 212, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_alien_reg', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 217);
//..............

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 159, 170, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 10); // set font
$html = '<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 156, 218, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.</b>&nbsp; &nbsp;USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(90, 7, 113, 224, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_uscis_online', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 229);
//..............

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 149, 164, false); // angle 1
$pdf->StopTransform();

//...............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>11.</b>&nbsp; &nbsp;U.S. Social Security Number (Required)';
$pdf->writeHTMLCell(90, 7, 113, 237, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_info_us_social', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 242);
//..............

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 161, 193, false); // angle 1
$pdf->StopTransform();

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 2. Reason for Exemption</b></div>';
$pdf->writeHTMLCell(90, 6, 12.9, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'I am EXEMPT from filing Form I-864, Affidavit of Support 
Under Section 213A of the INA, because:';
$pdf->writeHTMLCell(90, 7, 12, 25, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.   </b> </div>';
$pdf->writeHTMLCell(50, 15, 12, 36, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 12);
$part2_1a = (showData('i_864w_i_have_earned_status') == 'Y') ? 'checked' : '';
$html = '<div><input type="checkbox" name="part2_1a" value="Y" checked="' . $part2_1a . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 36, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'I have earned (or can be credited with) 40 quarters 
<br>(credits) of coverage under the Social Security Act 
<br>(SSA). (Attach SSA earnings statements. Do not 
<br>count any quarters during which you received a 
<br>means-tested public benefit.)';
$pdf->writeHTMLCell(90, 7, 25, 36, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.   </b>   </div>';
$pdf->writeHTMLCell(50, 15, 12, 57.4, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 12);
$part2_1b = (showData('i_864w_i_am_under_18_year_status') == 'Y') ? 'checked' : '';
$html = '<div><input type="checkbox" name="part2_1b" value="Y" checked="' . $part2_1b . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 57, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'I am under 18 years of age, unmarried, immigrating 
<br>as the child of a U.S. citizen, and will automatically 
<br>become a U.S. citizen under the Child Citizenship 
<br>Act of 2000 upon my admission to the United States. ';
$pdf->writeHTMLCell(90, 7, 25, 57, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.    </b></div>';
$pdf->writeHTMLCell(50, 15, 12, 75, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 12);
$part2_1c = (showData('i_864w_i_am_filing_an_immigrant_visa_status') == 'Y') ? 'checked' : '';
$html = '<div><input type="checkbox" name="part2_1c" value="Y" checked="' . $part2_1c . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 75, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('times', '', 10); // set font
$html = 'I am filing for an immigrant visa or adjustment of 
<br>status as a self-petitioning widow(er) using Form 
<br>I-360, Petition for Amerasian, Widow(er), or Special 
Immigrant.';
$pdf->writeHTMLCell(90, 7, 25, 75, $html, '', 0, 0, true, 'L');

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d.</div>';
$pdf->writeHTMLCell(50, 15, 12, 92, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 12);
$part2_1d = (showData('i_864w_i_am_filing_an_immigrant_visa_adjustment_status') == 'Y') ? 'checked' : '';
$html = '<div><input type="checkbox" name="part2_1c" value="Y" checked="' . $part2_1d . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 92, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10); // set font
$html = 'I am filing for an immigrant visa or adjustment of 
<br>status as a battered spouse or child using Form I-360.';
$pdf->writeHTMLCell(90, 7, 25, 92, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 3. Requestor\'s (Intending Immigrant\'s) 
Contract, Statement, Contact Information, 
Declaration, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 106, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-864W 
Instructions before completing this part. ';
$pdf->writeHTMLCell(90, 7, 13, 123, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Requestor\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 6.6, 13, 135, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> 
<br>If applicable, select the box for <b>Item Number 2.</b>';
$pdf->writeHTMLCell(90, 7, 13, 143, $html, '', 0, 0, true, 'L');
// ,...............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.    </b> &nbsp; </div>';
$pdf->writeHTMLCell(50, 15, 12, 155, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 12);


$part3_1a =  (showData('i_864w_i_can_read_understand_english_status') == 'Y') ? 'checked' : '';

$html = '<div><input type="checkbox" name="part2_1a" value="Y" checked="' . $part3_1a . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 155, $html, 0, 1, false, true, 'L', true);
// ................
$pdf->SetFont('times', '', 10); // set font
$html = 'I can read and understand English, and I have read 
<br>and understand every question and instruction on this 
<br>request and my answer to every question.';
$pdf->writeHTMLCell(90, 7, 25, 155, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.    </b> &nbsp;</div>';
$pdf->writeHTMLCell(50, 15, 12, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 12);
$part3_1b =  (showData('i_864w_the_interpreter_named_in_status') == 'Y') ? 'checked' : '';

$html = '<div><input type="checkbox" name="part2_1b" value="Y" checked="' . $part2_1b . '" /></div>';
$pdf->writeHTMLCell(50, 15, 19, 168, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'The interpreter named in <b>Part 4.</b> read to me every 
<br>question and instruction on this request and my 
<br>answer to every question in';
$pdf->writeHTMLCell(90, 7, 25, 168, $html, '', 0, 0, true, 'L');

//$pdf->writeHTMLCell(75, 7, 26, 181, '',  1,  1, false, true, 'R', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_answer_to_every_question', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 181);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = ' a language in which I am fluent, and I understood
<br>everything.
 ';
$pdf->writeHTMLCell(90, 7, 26, 188, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7, 101, 184, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.     </b> &nbsp;&nbsp; &nbsp; &nbsp; At my request, the preparer named in <b>Part 5</b>.,';
$pdf->writeHTMLCell(90, 7, 13, 198, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 12); // set font

$part3_2 =  (showData('i_864w_at_my_request_the_preparer_named_status') == 'Y') ? 'checked' : '';

$html = '<input type="checkbox" name="2" value="Y" checked="' . $part3_2 . '"/>';
$pdf->writeHTMLCell(90, 7, 19, 198, $html, '', 0, 0, true, 'L');

//$pdf->writeHTMLCell(75, 7, 26, 203, '',  1,  1, false, true, 'R', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_at_my_request_preparer_name', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 203);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7, 101, 205, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'prepared this request for me based only upon
<br>information I provided or authorized. ';
$pdf->writeHTMLCell(90, 7, 25, 210, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Requestor\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 6.6, 114, 18, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. &nbsp;  &nbsp;&nbsp;</b> Requestor\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 114, 26, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_contact_info_daytime', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 31);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Requestor\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 114, 39, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_contact_info_mobile', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 44);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Requestor\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 114, 52, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_contact_info_email', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 57);
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Requestor\'s Declaration and Certification</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 68, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Copies of any documents I have submitted are exact 
<br>photocopies of unaltered, original documents, and I understand 
that U.S. Citizenship and Immigration Services (USCIS) or the 
U.S. Department of State (DOS) may require that I submit 
original documents to USCIS or DOS at a later date. 
Furthermore, I authorize the release of any information from 
<br>any and all of my records that USCIS or DOS may need to 
determine my eligibility for the immigration benefit that I seek.';
$pdf->writeHTMLCell(95, 7, 113, 76, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I furthermore authorize release of information contained in this 
request, in supporting documents, and in my USCIS or DOS 
records, to other entities and persons where necessary for the 
administration and enforcement of U.S. immigration law.';
$pdf->writeHTMLCell(95, 7, 113, 109, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that all of the information in 
my request and any document submitted with it were provided 
<br>or authorized by me, that I reviewed and understand all of the 
information contained in, and submitted with, my request, and 
that all of this information is complete, true, and correct.';
$pdf->writeHTMLCell(95, 7, 113, 127, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'In addition, I authorize the Social Security Administration 
<br>(SSA) to release information about me in its records to USCIS 
<br>and DOS.';
$pdf->writeHTMLCell(95, 7, 113, 149, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Requestor\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 166, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.</b> &nbsp;&nbsp;Requestor\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 113, 174, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(81.5, 7, 122, 179, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 113, 188, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169.5, 188);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE TO ALL REQUESTORS:</b> If you do not completely 
fill out this request or fail to submit required documents listed 
in the Instructions, USCIS or DOS may deny your request.
</div>';
$pdf->writeHTMLCell(92, 7, 113, 198, $html, 0, 1, false, true, 'J', true);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 4. Interpreter\'s Contact Information,
Certification, and Signature </b>  </div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//............

$pdf->SetFont('times', '', 10); // set font
$html = ' Provide the following information about the interpreter.';
$pdf->writeHTMLCell(95, 7, 12, 30, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 38, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.  </b> &nbsp; Interpreter\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 12, 46, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_family', 80.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 51);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.  </b> &nbsp; Interpreter\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 12, 58, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_given', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 63);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b> &nbsp; &nbsp;&nbsp; Interpreter\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 12, 71, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_business', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 23, 76);
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 86, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 13, 94, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name', 58.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  45, 95);
//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.b. </b>';
$pdf->writeHTMLCell(90, 7, 13, 104, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 11); // set font

$apt3a =  (showData('i_864w_interpreter_address_apt_ste_flr') == 'apt') ? 'checked' : '';
$ste3a =  (showData('i_864w_interpreter_address_apt_ste_flr') == 'ste') ? 'checked' : '';
$flr3a =  (showData('i_864w_interpreter_address_apt_ste_flr') == 'flr') ? 'checked' : '';

$html = '<div> &nbsp;
<input type="checkbox" name="apT1" value="apT1" checked="' . $apt3a . '"/> Apt. &nbsp;&nbsp; 
<input type="checkbox" name="sTe1" value="sTe1" checked="' . $ste3a . '"/> Ste. 
<input type="checkbox" name="fLr2" value="fLr2" checked="' . $flr3a . '"/> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 19, 104, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_apt_ste_flr', 40.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 63, 103);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 13, 112, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_city_or_town', 58.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  45, 111);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 13, 120, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="interpreter_mailing_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 120, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_zip_code', 32.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70.5, 119);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 13, 128, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_province', 59.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 127);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 13, 135, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_postal_code', 59.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 44, 135);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 13, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_country', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 146);
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(89.2, 7, 14, 155, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 13, 163, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_daytime', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 168);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 175, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_mobile', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 180);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_email', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 192);
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s  Certification</b></div>';
$pdf->writeHTMLCell(89.2, 7, 14, 203, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that:';
$pdf->writeHTMLCell(90, 7, 13, 210, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I am fluent in English and';
$pdf->writeHTMLCell(90, 7, 13, 216, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(90, 7, 103, 216, ",", '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_certification', 51.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 52, 215);
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'which is the same language specified in <b>Part 3., Item Number 
1.b.</b>, and I have read to this requestor in the identified language 
every question and instruction on this request and his or her 
answer to every question. The requestor informed me that he or 
she understands every instruction, question, and answer on the 
request, including the <b>Requestor\'s Declaration and 
<br>Certification</b>, and has verified the accuracy of every answer.';
$pdf->writeHTMLCell(95, 7, 13, 224, $html, '', 0, 0, true, 'L');




$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b>  &nbsp; &nbsp;Interpreter\'s Signature';
$pdf->writeHTMLCell(90, 7, 114, 26, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(80, 7, 124, 31, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b>  &nbsp; &nbsp;Date of Signature (mm/dd/yyyy)';
$pdf->writeHTMLCell(90, 7, 114, 40, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_signature_date', 33.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171, 40);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 5. Contact Information, Declaration, and
Signature of the Person Preparing this Request,
if Other Than the Requestor</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 51, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'Provide the following information about the preparer.';
$pdf->writeHTMLCell(90, 7, 113, 67, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 75, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a. </b>&nbsp;&nbsp;&nbsp;Preparer\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 113, 83, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_family', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 88);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b. </b>&nbsp;&nbsp;&nbsp;Preparer\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 113, 96, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_given', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 101);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 113, 109, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_business', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 114);
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Preparer\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 124, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 113, 132, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  146, 133);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>3.b.</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 11); // set font
$aptp5_3b =  (showData('i_864w_preparer_address_apt_ste_flr') == 'apt') ? 'checked' : '';
$step5_3b =  (showData('i_864w_preparer_address_apt_ste_flr') == 'ste') ? 'checked' : '';
$flrp5_3b =  (showData('i_864w_preparer_address_apt_ste_flr') == 'flr') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="Apt3b" value="Apt2" checked="' . $aptp5_3b . '"/>  Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste3b" value="Ste2" checked="' . $step5_3b . '"/> Ste. 
<input type="checkbox" name="Flr3b" value="Flr2" checked="' . $flrp5_3b . '"/> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 121, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 164, 142);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp; &nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 113, 152, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  146, 151);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 160, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_address_state" size="0.5">';
foreach ($allDataCountry as $record) {
    $html .= '<option value="' . $record->state_code . '">' . $record->state_code . ' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 130, 160, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 171, 160);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 169, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 169);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 178, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 178);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 185, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 190);
//............

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b><i>Preparer\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 114, 200, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.</b>&nbsp;&nbsp;&nbsp; &nbsp;Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 209, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 214);
//...............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.</b>&nbsp;&nbsp;&nbsp; &nbsp; Preparer\'s  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 223, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 228);
//...............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.</b>&nbsp;&nbsp;&nbsp; &nbsp; Preparer\'s Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 112, 237, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 242);
//...............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 5. Contact Information, Declaration, and
Signature of the Person Preparing this
Request, If Other than the Requestor</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 42, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.   </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 51, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);
$part5_7a = (showData('i_864w_i_am_not_attorney_accredited_representative_status') == 'Y') ? 'checked' : '';

$html = '<div><input type="checkbox" name="preparer7a" value="Y" checked="' . $part5_7a . '" /></div>';
$pdf->writeHTMLCell(90, 7, 19, 51, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div>I am not an attorney or accredited representative but 
<br>have prepared this request on behalf of the requestor 
<br>and with the requestor\'s consent. </div>';
$pdf->writeHTMLCell(90, 7, 26, 51, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.   </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 64, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 12);

$part5_7b = (showData('i_864w_i_am_an_attorney_accredited_representative_status') == 'Y') ? 'checked' : '';

$html = '<div><input type="checkbox" name="preparer7b" value="Y" checked="' . $part5_7b . '" /></div>';
$pdf->writeHTMLCell(90, 7, 19, 64, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html = '<div> I am an attorney or accredited representative and my <br>
&nbsp;representation of the applicant in this case </div>';
$pdf->writeHTMLCell(78, 7, 25, 64, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);

$part5_7b_ext = (showData('i_864w_7b_extends_status') == 'Y') ? 'checked' : '';
$part5_7b_not_ext = (showData('i_864w_7b_does_not_extends_status') == 'Y') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="extends" value="Y" checked="' . $part5_7b_ext . '"/> extends 
<input type="checkbox" name="dontextend" value="Y" checked="' . $part5_7b_not_ext . '"/> does not extend beyond the <br>&nbsp;preparation of this request.
</div>';
$pdf->writeHTMLCell(90, 7, 25, 72, $html, 0, 1, false, true, 'J', true);
//...........


$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> If you are an attorney or accredited representative you 
may be obliged to submit a completed Form G-28, Notice of 
Entry of Appearance as Attorney or Accredited Representative, 
or G-28I, Notice of Entry of Appearance as Attorney In Matters 
Outside the Geographical Confines of the United States, with 
this request. </div>';
$pdf->writeHTMLCell(93, 7, 12, 82, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b><i>Preparer\'s Certification</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 110, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>By my signature, I certify, under penalty of perjury, that I 
prepared this request at the request of the requestor. The 
requestor then reviewed this completed request and informed 
me that he or she understands all of the information contained 
in, and submitted with, his or her request, including the 
<b>Requestor\'s Declaration and Certification</b>, and that all of this 
information is complete, true, and correct. I completed this 
request based only on information that the requestor provided to 
me or authorized me to obtain or use.
</div>';
$pdf->writeHTMLCell(93, 7, 12, 118, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html = '<div><b><i>Preparer\'s Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 160, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.a.</b> &nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 168, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 20, 173, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>8.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 183, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('peparer_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 182);
//.............



$pdf->AddPage('P', 'LETTER');
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 6.  &nbsp;Additional Information</b><i></i></div>';
$pdf->writeHTMLCell(91, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>If you need extra space to provide any additional information
within this application, use the space below. If you need more
space than what is provided, you may make copies of this page

to complete and file with this application or attach a separate
sheet of paper. Type or print your name and A-Number (if any)
at the top of each sheet; indicate the <b>Page Number, Part
Number</b>, and <b>Item Number</b> to which your answer refers; and
sign and date each sheet.</div>';
$pdf->writeHTMLCell(93, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_family_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 61);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 68, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_given_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 70);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 79);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 1, false, false, 'L', true);
$pdf->Image('images/right_angle.jpg', 48, 92, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('times', '', 11);
$html = '<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 51, 90, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 57.9, 90);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 103);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 113, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 110.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 114.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 118.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 123.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 128, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 132.8, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 137.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 142.2, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 147, '',  "B",  0, false, false, 'C', true);   // line 9 
$pdf->writeHTMLCell(82, 1, 21.6, 151.8, '',  "B",  0, false, false, 'C', true);   // line 10 
$pdf->TextField('aditional_inf0_name_3d', 82.5, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864w_additional_info_3d')), 21.5, 113);
$pdf->setCellHeightRatio(1.2);

//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 186);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number1', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 186);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 186);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 191.8, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 196, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 200.6, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 204.9, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 209.9, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 214, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 217.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 222.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 227.1, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 231.1, '',  "B",  0, false, false, 'C', true); // line 10

$pdf->TextField('aditional_inf0_name_4d', 82.5, 63.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864w_additional_info_4d')), 21.5, 195);
$pdf->setCellHeightRatio(1.2);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number2', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number2', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number2', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 29.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 33.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 37.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 42.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 46.8, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 51, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 55.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 60.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 65.1, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(81.6, 1, 122.6, 70, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_5d', 82, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864w_additional_info_5d')), 122.5, 31);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122.5, 103);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number3', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 103);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number3', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 103);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 113, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 110.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 114.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 118.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 123.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 128, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 132.8, '',  "B",  0, false, false, 'C', true);  // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 137.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 142.2, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 147, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(81.6, 1, 122.6, 151.5, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_6d', 82, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864w_additional_info_6d')), 122.5, 113);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 186);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number4', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 186);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 181, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number4', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 186);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 196, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 192.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 196.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 200.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 205.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 209.8, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 214, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 218.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 223.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 228.1, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(81.6, 1, 122.6, 231.1, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_7d', 82, 63.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_864w_additional_info_7d')), 122.5, 195);


//..............



$js = "
var fields = {
    'attorney_state_bar_number':' $attorneyData->bar_number',
    'attorney_or_according_representative':' $attorneyData->uscis_online_account_number',
    'info_about_last_name':' " . showData('information_about_you_family_last_name') . "',
    'info_about_first_name':' " . showData('information_about_you_given_first_name') . "',
    'info_about_middle_name':' " . showData('information_about_you_middle_name') . "',

    'requestor_mailing_incare':' " . showData('information_about_you_us_mailing_care_of_name') . "',
    'requestor_mailing_street_number_name':' " . showData('information_about_you_us_mailing_street_number') . "',
    'requestor_mailing_apt_ste_flr':' " . showData('information_about_you_us_mailing_apt_ste_flr_value') . "',
    'requestor_mailing_city_town':' " . showData('information_about_you_us_mailing_city_town') . "',
    'requestor_mailing_state':' " . showData('information_about_you_us_mailing_state') . "',
    'requestor_mailing_zipcode':' " . showData('information_about_you_us_mailing_zip_code') . "',
    'requestor_mailing_address_province':' " . showData('information_about_you_us_mailing_province') . "',
    'requestor_mailing_address_postal_code':' " . showData('information_about_you_us_mailing_postal_code') . "',
    'requestor_mailing_address_country':' " . showData('information_about_you_us_mailing_country') . "',

    'physical_street_number_name':' " . showData('information_about_you_home_street_number') . "',
    'physical_apt_ste_flr':' " . showData('information_about_you_home_apt_ste_flr_value') . "',
    'physical_city_town':' " . showData('information_about_you_home_city_town') . "',
    'physical_state':' " . showData('information_about_you_home_state') . "',
    'physical_zipcode':' " . showData('information_about_you_home_zip_code') . "',
    'physical_province':' " . showData('information_about_you_home_province') . "',
    'physical_postal_code':' " . showData('information_about_you_home_postal_code') . "',
    'physical_country':' " . showData('information_about_you_home_country') . "',

    'other_info_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . "',
    'other_info_city_or_town':' " . showData('other_information_about_you_city_of_birth') . "',
    'other_info_state_province':' " . showData('other_information_about_you_province_of_birth') . "',
    'other_info_Country_of_Birth':' " . showData('other_information_about_you_country_of_birth') . "',
    'other_info_alien_reg':' " . showData('other_information_about_you_alien_registration_number') . "',
    'other_info_uscis_online':' " . showData('other_information_about_you_uscis_online_account_number') . "',
    'other_info_us_social':' " . showData('other_information_about_you_social_security_number') . "',

    'requestor_answer_to_every_question':' " . showData('i_864w_the_interpreter_named_in') . "',
    'requestor_at_my_request_preparer_name':' " . showData('i_864w_at_my_request_the_preparer_named') . "',

    'requestor_contact_info_daytime':' " . showData('i_864w_requestor_daytime_tel') . "',
    'requestor_contact_info_mobile':' " . showData('i_864w_requestor_mobile') . "',
    'requestor_contact_info_email':' " . showData('i_864w_requestor_email') . "',

    'requestor_date_of_signature':' " . showData('i_864w_requestor_sign_date') . "',
    'interpreter_contact_info_family':' " . showData('i_864w_interpreter_family_last_name') . "',
    'interpreter_contact_info_given':' " . showData('i_864w_interpreter_given_first_name') . "',
    'interpreter_contact_info_business':' " . showData('i_864w_interpreter_business_name') . "',

    'interpreter_mailing_address_street_name':' " . showData('i_864w_interpreter_business_name') . "',
    'interpreter_mailing_address_apt_ste_flr':' " . showData('i_864w_interpreter_address_apt_ste_flr_value') . "',
    'interpreter_mailing_address_city_or_town':' " . showData('i_864w_interpreter_address_city_town') . "',
    'interpreter_mailing_address_state':' " . showData('i_864w_interpreter_address_state') . "',
    'interpreter_mailing_address_zip_code':' " . showData('i_864w_interpreter_address_zip_code') . "',
    'interpreter_mailing_address_province':' " . showData('i_864w_interpreter_address_province') . "',
    'interpreter_mailing_address_postal_code':' " . showData('i_864w_interpreter_address_postal_code') . "',
    'interpreter_mailing_address_country':' " . showData('i_864w_interpreter_address_country') . "',

    'interpreter_contact_info_daytime':' " . showData('i_864w_interpreter_daytime_tel') . "',
    'interpreter_contact_info_mobile':' " . showData('i_864w_interpreter_mobile') . "',
    'interpreter_contact_info_email':' " . showData('i_864w_interpreter_email') . "',
    'interpreter_certification':' " . showData('i_864w_interpreter_fluent_in_english') . "',
    'interpreter_signature_date':' " . showData('i_864w_interpreter_sign_date') . "',

    'preparer_contact_info_family':' " . showData('i_864w_preparer_family_last_name') . "',
    'preparer_contact_info_given':' " . showData('i_864w_preparer_given_first_name') . "',
    'preparer_contact_info_business':' " . showData('i_864w_preparer_business_name') . "',

    'preparer_mailing_address_street_name':' " . showData('i_864w_preparer_address_street_number') . "',
    'preparer_mailing_address_apt_ste_flr':' " . showData('i_864w_preparer_address_apt_ste_flr_value') . "',
    'preparer_mailing_address_city_or_town':' " . showData('i_864w_preparer_address_city_town') . "',
    'preparer_mailing_address_state':' " . showData('i_864w_preparer_address_state') . "',
    'preparer_mailing_address_zip_code':' " . showData('i_864w_preparer_address_zip_code') . "',
    'preparer_mailing_address_province':' " . showData('i_864w_preparer_address_province') . "',
    'preparer_mailing_address_postal_code':' " . showData('i_864w_preparer_address_postal_code') . "',
    'preparer_mailing_address_country':' " . showData('i_864w_preparer_address_country') . "',

    'preparer_contact_info_daytime':' " . showData('i_864w_preparer_daytime_tel') . "',
    'preparer_contact_info_mobile':' " . showData('i_864w_preparer_mobile') . "',
    'preparer_contact_info_email':' " . showData('i_864w_preparer_email') . "',
    'peparer_date_of_signature':' " . showData('i_864w_preparer_sign_date') . "',

    'additional_info_family_last_name':' " . showData('i_864w_additional_info_last_name') . "',
    'additional_info_given_first_name':' " . showData('i_864w_additional_info_first_name') . "',
    'additional_info_middle_name':' " . showData('i_864w_additional_info_middle_name') . "',
    'additional_info_a_number':' " . showData('i_864w_additional_info_a_number') . "',
    
    'additional_info_page_number':' " . showData('i_864w_additional_info_3a_page_no') . "',
    'additional_info_part_number':' " . showData('i_864w_additional_info_3b_part_no') . "',
    'additional_info_item_number':' " . showData('i_864w_additional_info_3c_item_no') . "',

    'additional_info_page_number1':' " . showData('i_864w_additional_info_4a_page_no') . "',
    'additional_info_part_number1':' " . showData('i_864w_additional_info_4b_part_no') . "',
    'additional_info_item_number1':' " . showData('i_864w_additional_info_4c_item_no') . "',

    'additional_info_page_number2':' " . showData('i_864w_additional_info_5a_page_no') . "',
    'additional_info_part_number2':' " . showData('i_864w_additional_info_5b_part_no') . "',
    'additional_info_item_number2':' " . showData('i_864w_additional_info_5c_item_no') . "',

    'additional_info_page_number3':' " . showData('i_864w_additional_info_6a_page_no') . "',
    'additional_info_part_number3':' " . showData('i_864w_additional_info_6b_part_no') . "',
    'additional_info_item_number3':' " . showData('i_864w_additional_info_6c_item_no') . "',

    'additional_info_page_number4':' " . showData('i_864w_additional_info_7a_page_no') . "',
    'additional_info_part_number4':' " . showData('i_864w_additional_info_7b_part_no') . "',    
    'additional_info_item_number4':' " . showData('i_864w_additional_info_7c_item_no') . "',
    

    
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
$pdf->Output('I-864W.pdf', 'I');
