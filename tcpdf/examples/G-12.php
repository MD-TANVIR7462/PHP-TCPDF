<?php

//require_once('form_header.php');   //database connection file 

//  require_once("config.php");
// $allDataCountry = indexByQueryAllData("SELECT * FROM countries");

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');




// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    //Page header
    public function Header() {
        $this->SetY(13);
		if ($this->page > 1){
		  // return;
			// $this->Cell(0, 30, '<< Company Heading >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			
			/* $top_border = array(
			   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
			);
			$this->Cell(184, 0, '', $top_border, 1, 1); */
			
			$this->SetLineWidth(2); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');
			
			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
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
        $image_file = K_PATH_IMAGES.'homeland_security_logo.JPG';
           $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        /* $this->SetFont('helvetica', 'B', 20); */
        // Title
        /* $this->Cell(0, 15, '<< Company Heading >>', 0, false, 'C', 0, '', 0, false, 'M', 'M'); */
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form G-28  09/17/18 ", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'jpg', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
		
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
$pdf->SetTitle('Form G-28');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    'fgcolor' => array(0,0,0),
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

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(100, 15, "Notice of Entry of Appearance\nas Attorney or Accredited Representative", 0, 'C', 0, 1, 55, 9, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "DHS\nForm G-28 ", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0105\nExpires 05/31/2021", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);


$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About Attorney or
Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 12, 13, 33, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b> USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 47, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_online_account_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 53);
//.....
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 43, 67, false); // angle 2
$pdf->StopTransform();
//.........
$pdf->SetFillColor(220,220,220);
//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Name of Attorney or Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 5, 13, 62, $html, 0, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 70, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 72);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 79, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_given_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 81);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 90, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 90);

//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Address of Attorney or Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 100, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 110, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 19, 110, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 112);

//.........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 121, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 121);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 130);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="representative_address_state" size="0.50">';
$html .= '<option value=""> </option>';
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 139);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 148, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 148);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0,  12, 157, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 157);

//........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 163, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 169);

//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Contact Information of Attorney or Accredited
Representative</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 179, $html, 0, 0, true, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>   Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_daytime_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 195);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 202, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_telephone_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 207);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 214, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 219);
//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.  </b>  Fax Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_fax_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 231);

//..........page 1 left end 


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Eligibility Information for Attorney or
Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 12, 113, 33, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html = '<div>Select <b>all applicable</b> items.</div>';
$pdf->writeHTMLCell(90, 7, 112, 45, $html, 0, 0, false, 'L');


$html = '<div><b>1.a. </b> <input type="checkbox" name="part2_1a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 112, 50, $html, 0, 0, false, 'L');
$html = '<div> I am an attorney eligible to practice law in, and a
member in good standing of, the bar of the highest
courts of the following states, possessions, territories,
commonwealths, or the District of Columbia. If you
need extra space to complete this section, use the
space provided in <b>Part 6. Additional Information</b></div>';
$pdf->writeHTMLCell(80, 7, 123, 50, $html, 0, 0, false, 'L');
//..

$html = '<div>Licensing Authority </div>';
$pdf->writeHTMLCell(80, 7, 122, 76, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 123, 82, "", 1, 0, false, 'L');
//.....
$html = '<div><b>1.b.  </b>Bar Number (if applicable)</div>';
$pdf->writeHTMLCell(80, 7, 112, 90, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 120, 95, "", 1, 0, false, 'L');

//.....
$html = '<div><b>1.c.  </b></div>';
$pdf->writeHTMLCell(80, 7, 112, 103, $html, 0, 0, false, 'L');

$html = '<div>I (select <b>only one</b> box) <input type="checkbox" name="part2_1c" value="Y" checked=" " />  am not <input type="checkbox" name="part2_1c" value="Y" checked=" " />  am <br>
subject to any order suspending, enjoining, restraining,
disbarring, or otherwise restricting me in the practice of
law. If you are subject to any orders, use the space
provided in <b>Part 6. Additional Information</b> to provide
an explanation.</div>';
$pdf->writeHTMLCell(83, 7, 120, 103, $html, 0, 0, false, 'L');

//.........
$html = '<div><b>1.d.  </b>Name of Law Firm or Organization (if applicable)</div>';
$pdf->writeHTMLCell(80, 7, 112, 130, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 120, 135, "", 1, 0, false, 'L');
//..........

$html = '<div><b>2.a. </b><input type="checkbox" name="part2_2a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 112, 145, $html, 0, 0, false, 'L');
$html = '<div>I am an accredited representative of the following
qualified nonprofit religious, charitable, social
service, or similar organization established in the
United States and recognized by the Department of
Justice in accordance with 8 CFR part 1292.</div>';
$pdf->writeHTMLCell(80, 7, 123, 145, $html, 0, 0, false, 'L');

//.........
$html = '<div><b>2.b. </b> Name of Recognized Organization</div>';
$pdf->writeHTMLCell(80, 7, 112, 166, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 120, 172, "", 1, 0, false, 'L');
//..........

$html = '<div><b>2.c. </b>Date of Accreditation (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(43, 7, 160, 186, "", 1, 0, false, 'L');
//..........

$html = '<div><b>3.  </b>  <input type="checkbox" name="part2_3" value="Y" checked=" " /> I am associated with</div>';
$pdf->writeHTMLCell(80, 7, 112, 193, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 123, 198, "", 1, 0, false, 'L');
$html = '<div>the attorney or accredited representative of record
who previously filed Form G-28 in this case, and my
appearance as an attorney or accredited representative
for a limited purpose is at his or her request.</div>';
$pdf->writeHTMLCell(80, 7, 122, 206, $html, 0, 0, false, 'L');

//..........
$html = '<div><b>4.a.</b> <input type="checkbox" name="part2_4a" value="Y" checked=" " />  </div>';
$pdf->writeHTMLCell(80, 7, 112, 223, $html, 0, 0, false, 'L');
$html = '<div>I am a law student or law graduate working under the
direct supervision of the attorney or accredited
representative of record on this form in accordance
with the requirements in 8 CFR 292.1(a)(2).</div>';
$pdf->writeHTMLCell(80, 7, 123, 223, $html, 0, 0, false, 'L');

//.........
$html = '<div><b>2.b. </b> Name of Law Student or Law Graduate </div>';
$pdf->writeHTMLCell(80, 7, 112, 240, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 120, 245, "", 1, 0, false, 'L');

//..........page number 1 end-------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Notice of Appearance as Attorney or
Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div>If you need extra space to complete this section, use the space
provided in <b>Part 6. Additional Information.</b><br><br>
This appearance relates to immigration matters before
(select <b>only one </b> box):</div>';
$pdf->writeHTMLCell(80, 7, 12, 29, $html, 0, 0, false, true, 'L', true);


//..........
$html = '<div><b>1.a.</b> <input type="checkbox" name="part3_1a" value="Y" checked=" " />  </div>';
$pdf->writeHTMLCell(80, 7, 12, 50, $html, 0, 0, false, 'L');
$html = '<div>U.S. Citizenship and Immigration Services (USCIS)</div>';
$pdf->writeHTMLCell(80, 7, 23, 50, $html, 0, 0, false, 'L');
//..........

$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 56, $html, 0, 0, false, 'L');
$html = '<div>List the form numbers or specific matter in which
appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 56, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 20, 65, "", 1, 0, false, 'L');

//..........
$html = '<div><b>2.a.</b> <input type="checkbox" name="part3_2a" value="Y" checked=" " />  </div>';
$pdf->writeHTMLCell(80, 7, 12, 72, $html, 0, 0, false, 'L');
$html = '<div>U.S. Immigration and Customs Enforcement (ICE)</div>';
$pdf->writeHTMLCell(80, 7, 23, 72, $html, 0, 0, false, 'L');

//..........
$html = '<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 80, $html, 0, 0, false, 'L');
$html = '<div>List the specific matter in which appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 80, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 20, 85, "", 1, 0, false, 'L');

//..........
$html = '<div><b>3.a.</b> <input type="checkbox" name="part3_3a" value="Y" checked=" " />  </div>';
$pdf->writeHTMLCell(80, 7, 12, 93, $html, 0, 0, false, 'L');

$html = '<div> U.S. Customs and Border Protection (CBP)</div>';
$pdf->writeHTMLCell(80, 7, 23, 93, $html, 0, 0, false, 'L');

//..........
$html = '<div><b>3.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 100, $html, 0, 0, false, 'L');
$html = '<div>List the specific matter in which appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 100, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 20, 105, "", 1, 0, false, 'L');

//..........
$html = '<div><b>4. </b> Receipt Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 112, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_receipt_number', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 35, 117);
//.............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 50, 180, false); // angle 2
$pdf->Rotate(-60);
$pdf->MultiCell(30, 10, "s", '', 'R', 0, 1, 107, 140, false); // angle 3
$pdf->MultiCell(30, 10, "s", '', 'R', 0, 1, 122, 130, false); // angle 4
$pdf->StopTransform();
//........

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5. </b></div>';
$pdf->writeHTMLCell(80, 7, 12, 125, $html, 0, 0, false, 'L');
$html = '<div>I enter my appearance as an attorney or accredited
representative at the request of the (select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(85, 7, 17, 125, $html, 0, 0, false, 'L');
//.............
$pdf->SetFont('times', '', 10.5);
$html = '<div>  <input type="checkbox" name="applicant" value="Y" checked=" " />  Applicant    <input type="checkbox" name="petitioner" value="Y" checked=" " />    Petitioner    <input type="checkbox" name="requestor" value="Y" checked=" " />  Requestor <br>  <input type="checkbox" name="benev_drivative" value="Y" checked=" " />  Beneficiary/Derivative     <input type="checkbox" name="respondent" value="Y" checked=" " />   Respondent (ICE, CBP)  </div>';
$pdf->writeHTMLCell(85, 7, 15, 135, $html, 0, 0, false, 'L');

//.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 12);
$html = '<div>Information About Client (Applicant, Petitioner,
Requestor, Beneficiary or Derivative, Respondent,
or Authorized Signatory for an Entity)</div>';
$pdf->writeHTMLCell(90, 7, 13, 147, $html, 0, 1, true, 'L');


//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 165, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_representative_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 167);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 174, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_representative_given_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 176);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 185, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_representative_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 185);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a. </b>  Name of Entity (if applicable) </div>';
$pdf->writeHTMLCell(90, 10, 12, 193, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_name_of_entry', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 198);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b. </b> Title of Authorized Signatory for Entity (if applicable)  </div>';
$pdf->writeHTMLCell(90, 10, 12, 207, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_title_of_authorized_signatory', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 212);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.   </b>    Client\'s USCIS Online Account Number (if any) </div>';
$pdf->writeHTMLCell(90, 10, 12, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_client_uscis_online_account_number', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 40, 225);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>9. </b> Client\'s Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 10, 12, 234, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_client_registration_number', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 240);
//.......page 2 left side end..................................................................................

//...........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Client\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, false, 'L', false);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.  </b>  Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_daytime_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 30);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>11.  </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(92, 7, 112, 38, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_mobile_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 43);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>12.  </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 51, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 56);  

//...........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Mailing Address of Client</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 65, $html, 0, 0, true, false, 'L', false);

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Provide the client\'s mailing address. Do not provide
the business mailing address of the attorney or accredited
representative unless it serves as the safe mailing address on the
application or petition being filed with this Form G-28.</div>';
$pdf->writeHTMLCell(90, 7, 112, 72, $html, 0, 0, false, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>13.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 90, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 119, 90, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_mailing_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 92);

//.........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt3" value="Apt3" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste3" checked="" />Ste. <input type="checkbox" name="Flr3" value="Flr3" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 101, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 101);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 110);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.d.</b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>13.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 119, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="client_mailing_address_state" size="0.50">';
$html .= '<option value=""></option>';
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 119, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 119);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 128, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 128);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0,  112, 137, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 137);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 143, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 149);
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Client\'s Consent to Representation and
Signature</b></div>';
$pdf->writeHTMLCell(90, 12, 113, 160, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Consent to Representation and Release of
Information</b></div>';
$pdf->writeHTMLCell(90, 10, 113, 177, $html, 0, 0, true, false, 'L', false);

//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I have requested the representation of and consented to being
represented by the attorney or accredited representative named
in Part 1. of this form. According to the Privacy Act of 1
and U.S. Department of Homeland Security (DHS) policy, 1
also consent to the disclosure to the named attorney or
accredited representative of any records pertaining to me that
appear in any system of records of USCIS, ICE, or CBP.</div>';
$pdf->writeHTMLCell(90, 10, 112, 190, $html, '', 0, 0, true, 'L');
//.......page number 2 end------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Client\'s Consent to Representation and
Signature </b>(continued)</div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Options Regarding Receipt of USCIS Notices and
Documents</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 32, $html, 0, 0, true, false, 'L', false);
//......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>USCIS will send notices to both a represented party (the client)
and his, her, or its attorney or accredited representative either
through mail or electronic delivery. USCIS will send all secure
identity documents and Travel Documents to the client\'s U.S
mailing address.</div>';
$pdf->writeHTMLCell(92, 10, 12, 43, $html, '', 0, 0, true, 'L');

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If you want to have notices and/or secure identity documents sent to your attorney or accredited representative of  record rather than to you, please select <b>all applicable</b> items below You may change these elections through written notice to USCIS.</div>';
$pdf->writeHTMLCell(92, 10, 12, 65, $html, '', 0, 0, true, 'L');

//..........
$html = '<div><b>1.a. </b><input type="checkbox" name="part4_1a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 12, 83, $html, 0, 0, false, 'L');
$html = '<div>I request that USCIS send original notices on an
application or petition to the business address of my
ittorney or accredited representative as listed in this
form.</div>';
$pdf->writeHTMLCell(80, 7, 23, 83, $html, 0, 0, false, 'L');
//.......

$html = '<div><b>1.b. </b><input type="checkbox" name="part4_1b" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 12, 102, $html, 0, 0, false, 'L');
$html = '<div>I request that USCIS send any secure identity
document (Permanent Resident Card, Employment
Authorization Document, or Travel Document) that I
receive to the U.S. business address of my attorney or
accredited representative (or to a designated military
or diplomatic address in a foreign country (if
permitted)).</div>';
$pdf->writeHTMLCell(80, 7, 23, 102, $html, 0, 0, false, 'L');

//.......
$html = '<div><b>NOTE:</b> If your notice contains Form I-94,
Arrival-Departure Record, USCIS will send the
notice to the U.S. business address of your attorney
or accredited representative. If you would rather
have your Form I-94 sent directly to you, select
<b>Item Number 1.c.</b></div>';
$pdf->writeHTMLCell(80, 7, 23, 128, $html, 0, 0, false, 'L');

//.......

$html = '<div><b>1.c. </b><input type="checkbox" name="part4_1c" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 12, 152, $html, 0, 0, false, 'L');
$html = '<div>I request that USCIS send my notice containing Form
I-94 to me at my U.S. mailing address.</div>';
$pdf->writeHTMLCell(80, 7, 23, 152, $html, 0, 0, false, 'L');

//.......

//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Signature of Client or Authorized Signatory for an
Entity</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 165, $html, 0, 0, true, false, 'L', false);
//......

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 175, $html, 0, 0, false, 'L');
$html = '<div>Signature of Client or Authorized Signatory for an Entity</div>';
$pdf->writeHTMLCell(90, 7, 20, 175, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 21, 181, "", 1, 0, false, 'L');


$html = '<div><b>2.b.   </b>   Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 12, 192, $html, 0, 0, false, 'L');
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 179, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_client_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 192);
//.......page 3 left side end.................................................................

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Signature of Attorney or Accredited
Representative</b></div>';
$pdf->writeHTMLCell(91, 12, 113, 17, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>I have read and understand the regulations and conditions
contained in 8 CFR 103.2 and 292 governing appearances and
representation before DHS. I declare under penalty of perjury
under the laws of the United States that the information I have
provided on this form is true and correct.</div>';
$pdf->writeHTMLCell(90, 7, 112, 30, $html, 0, 0, false, 'L');
//.........

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 112, 53, $html, 0, 0, false, 'L');
$html = '<div>Signature of Attorney or Accredited Representative</div>';
$pdf->writeHTMLCell(90, 7, 120, 53, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 121, 58, "", 1, 0, false, 'L');

//.......

$html = '<div><b>1.b.   </b>   Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 68, $html, 0, 0, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_representative_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 68);


//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 112, 78, $html, 0, 0, false, 'L');
$html = '<div>Signature of Law Student or Law Graduate</div>';
$pdf->writeHTMLCell(90, 7, 120, 78, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 121, 83, "", 1, 0, false, 'L');

//.......

$html = '<div><b>2.b.   </b>   Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 93, $html, 0, 0, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_law_student_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 93);
//.............page number 3 end----------------------------------------------------------------
$pdf->AddPage('P', 'LETTER');  // page number 4

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 6. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 18, $html, 1, 1, true, 'L');
//........
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>If you need extra space to provide any additional information
within this form, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this form or attach a separate sheet of 
paper. Type or print your name  at the
top of each sheet; indicate the<b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
$pdf->writeHTMLCell(95, 25, 12, 26, $html, 0, 1, 0, true, 'L', false, false);
//...........


$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 60, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 61, '', 1, 0, false, 'L');
//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 70, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 71, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 80, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 81, '', 1, 0, false, 'L');
//.......


$pdf->setFont('Times', '', 10);
$html= '<div><b>2.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 99, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_2a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 105);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>2.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 99, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_2b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 105);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 99, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_2c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 105);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 113, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_2d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 20, 113, $html, 0, 0, false, 'L');

//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 188);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 188);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 188);
//.........


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 197, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 30, 20, 197, $html, 0, 0, false, 'L');

                                            //.......page 20. left end 
// ....... start right side 


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 23);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 23);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 23);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 33, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 32, $html, 0, 0, false, 'L');

//....5


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 104);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 104);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 104);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 114, $html, 0, 0, false, 'L');

//..........


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 186.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 186.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 186.5);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 198, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 119, 198, $html, 0, 0, false, 'L');
































































// 'attorney_statebar_number':' $attorneyData->bar_number',
// 'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',
$js = "
var fields = {
    'applicant_family_lastname':' " . showData('petitioner_family_last_name') . "',
    'applicant_given_firstname':' " . showData('petitioner_given_first_name') . "',
    'applicant_middlename':' " . showData('petitioner_middle_name') . "',
    'applicant_business_organization':' " . showData('i_290b_principal_immigrant_business_name') . "',
    'applicant_info_align_reg_number':' " . showData('petitioner_alien_registration_number') . "',
    'applicant_info_usis_online_account_number':' " . showData('petitioner_uscis_online_account_number') . "',
    'information_about_applicant_mail_in_care_name':' " . showData('petitioner_us_mailing_care_of_name') . "',
    'information_about_applicant_mail_street':' " . showData('petitioner_us_mailing_street_number') . "',
    'information_about_applicant_mail_apt_ste_flr':' " . showData('petitioner_us_mailing_apt_ste_flr_value') . "',
    'information_about_applicant_mail_city_town':' " . showData('petitioner_us_mailing_city_town') . "',
    'information_about_applicant_mail_state':' " . showData('petitioner_us_mailing_state') . "',
    'information_about_applicant_mail_zipcode':' " . showData('petitioner_us_mailing_zip_code') . "',
    'information_about_applicant_province':' " . showData('petitioner_us_mailing_province') . "',
    'information_about_applicant_postal_code':' " . showData('petitioner_us_mailing_postal_code') . "',
    'information_about_applicant_country':' " . showData('petitioner_us_mailing_country') . "',
//page 1 end.......    
    'information_about_uscis_form':' " . showData('i_290b_appeal_or_motion_uscis_form_no') . "',
    'receipt_number_for_the_applicant':' " . showData('i_290b_appeal_or_motion_receipt_number') . "',
    'part2_4_request_nominigrant_example':' " . showData('i_290b_appeal_or_motion_nonimmigrant_or_immigrant') . "',
    'part2_5_date_of_the_adverse_decision':' " . showData('i_290b_appeal_or_motion_adverse_decision_date') . "',
    'part2_office_that_issued_advarse_decision':' " . showData('i_290b_appeal_or_motion_adverse_decision') . "',
    'part4_1b_interpreter_question_and_instruction':' " . showData('i_290b_applicant_or_petitioner_interpreter_name') . "',
    'part4_applicant_daytime_telephone':' " . showData('i_290b_applicant_or_petitioner_daytime_tel') . "',
    'part4_applicant_mobile_telephone':' " . showData('i_290b_applicant_or_petitioner_mobile') . "',
    'part4_applicant_email_address':' " . showData('i_290b_applicant_or_petitioner_email') . "',
//page 2 end....
    
    'part5_interpreter_family_lastname':' " . showData('i_290b_interpreter_family_last_name') . "',
    'part5_interpreter_given_firstname':' " . showData('i_290b_interpreter_given_first_name') . "',
    'part5_interpreter_business_org_name':' " . showData('i_290b_interpreter_business_name') . "',
    'part5_interpreter_daytime_telephone':' " . showData('i_290b_interpreter_daytime_tel') . "',
    'part5_interpreter_mobile_telephone':' " . showData('i_290b_interpreter_mobile') . "',
    'part5_interpreter_email_address':' " . showData('i_290b_interpreter_email') . "',
    'part5_interpreter_certification_fluent_eng':' " . showData('i_290b_interpreter_fluent_english') . "',
    'part5_interpreter_signature':' " . showData('i_290b_interpreter_sign_date') . "',
    'part5_preparer_family_lastname':' " . showData('i_290b_preparer_family_last_name') . "',
    'part5_preparer_given_firstname':' " . showData('i_290b_preparer_given_first_name') . "',
    'part5_preparer_business_org_name':' " . showData('i_290b_preparer_business_name') . "',
    'part5_preparer_mailing_street_name':' " . showData('i_290b_preparer_address_street_number') . "',
    'part5_preparer_mailing_apt_flor':' " . showData('i_290b_preparer_address_apt_ste_flr_value') . "',
    'part5_prepare_mailing_city_town':' " . showData('i_290b_preparer_address_city_town') . "',
    'part5_preparer_mailing_state':' " . showData('i_290b_preparer_address_state') . "',
    'part5_prepare_mailing_zip_code':' " . showData('i_290b_preparer_address_zip_code') . "',
    'part5_prepare_mailing_province':' " . showData('i_290b_preparer_address_province') . "',
    'part5_preparer_mailing_postal_code':' " . showData('i_290b_preparer_address_postal_code') . "',
    'part5_preparer_mailing_country':' " . showData('i_290b_preparer_address_country') . "',
    'part5_prepare_daytime_telephone':' " . showData('i_290b_preparer_daytime_tel') . "',
    'part5_prepare_mobile_telephone':' " . showData('i_290b_preparer_mobile') . "',
    'part5_preparer_email_address':' " . showData('i_290b_preparer_email') . "',
    'part6_preparer_signature':' " . showData('i_290b_preparer_sign_date') . "',
//page 3 end......
    'i_290B_additional_info_family_last_name':' " . showData('i_290b_additional_info_last_name') . "',
    'i_290B_additional_info_given_first_name':' " . showData('i_290b_additional_info_first_name') . "',
    'i_290B_additional_info_middle_name':' " . showData('i_290b_additional_info_middle_name') . "',
    'i_290B_additional_info_a_number':' " . showData('i_290b_additional_info_a_number') . "',
    'i_290B_additional_info_page_number':' " . showData('i_290b_additional_info_3a_page_no') . "',
    'i_290B_additional_info_part_number':' " . showData('i_290b_additional_info_3b_part_no') . "',
    'i_290B_additional_info_item_number':' " . showData('i_290b_additional_info_3c_item_no') . "',
    'i_290B_additional_info_page_number1':' " . showData('i_290b_additional_info_4a_page_no') . "',
    'i_290B_additional_info_part_number1':' " . showData('i_290b_additional_info_4b_part_no') . "',
    'i_290B_additional_info_item_number1':' " . showData('i_290b_additional_info_4c_item_no') . "',
    'i_290B_additional_info_page_number2':' " . showData('i_290b_additional_info_5a_page_no') . "',
    'i_290B_additional_info_part_number2':' " . showData('i_290b_additional_info_5b_part_no') . "',
    'i_290B_additional_info_item_number2':' " . showData('i_290b_additional_info_5c_item_no') . "',
    'i_290B_additional_info_page_number3':' " . showData('i_290b_additional_info_6a_page_no') . "',
    'i_290B_additional_info_part_number3':' " . showData('i_290b_additional_info_6b_part_no') . "',
    'i_290B_additional_info_item_number3':' " . showData('i_290b_additional_info_6c_item_no') . "',
    'i_290B_additional_info_page_number4':' " . showData('i_290b_additional_info_7a_page_no') . "',
    'i_290B_additional_info_part_number4':' " . showData('i_290b_additional_info_7b_part_no') . "',
    'i_290B_additional_info_item_number4':' " . showData('i_290b_additional_info_7c_item_no') . "',    
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
$pdf->Output('G-28.pdf', 'I');