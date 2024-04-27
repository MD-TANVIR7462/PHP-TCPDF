<?php
require_once('formheader.php');   //database connection file 



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
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.3, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form I-864 Edition 12/08/21", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/i864/i-864-footer-pdf417-$this->page.jpg";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'jpg', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
		
		
    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-864');

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
$pdf->AddPage('P', 'LETTER');

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



// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 11, 16, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(180, 15, "Affidavit of Support Under Section 213A of the INA", 0, 'C', 0, 1, 17, 10, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-864", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0075\nExpires 12/31/2023", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);


$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

// $pdf->Ln(1);
// set filling color
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
$pdf->setCellHeightRatio(1.2);

$pdf->SetFont('times', 'B', 9); // set font
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(190, 34.8, "", 1, 'C', 1, 1, 13, 32.5, true);

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 10);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1.5, 0, 0); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(15, 34, " For\nUSCIS\nUse\nOnly", 0, 'C', 1, 1, 13.3, 33, true);

$pdf->setFont('Times', 'B', 10);
$pdf->MultiCell(90, 7, "Affidavit of Support Submitter", 0, 'C', 0, 1, 8, 32, true);
$pdf->SetFont('times', '', 5);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->writeHTMLCell(2, 1, 32, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div>Petitioner</div>';
$pdf->writeHTMLCell(30, 3, 35, 39, $html, 0, 1, false, true, 'L',true);
//......
$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 45, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div>Ist Joint Sponsor</div>';
$pdf->writeHTMLCell(30, 3, 35, 44, $html, 0, 1, false, true, 'L',true);
//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 50, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div>2nd Joint Sponsor</div>';
$pdf->writeHTMLCell(30, 3, 35, 49, $html, 0, 1, false, true, 'L',true);

//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 55, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div>Substitute Sponsor</div>';
$pdf->writeHTMLCell(30, 3, 35, 54, $html, 0, 1, false, true, 'L',true);

//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 32, 60, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div>5% Owner</div>';
$pdf->writeHTMLCell(30, 3, 35, 59, $html, 0, 1, false, true, 'L',true);
//.........
$pdf->MultiCell(60, 34.8, "", 'LR', 'C', 0, 1, 80, 32.5, true);
$pdf->setFont('Times', 'B', 10);
$pdf->MultiCell(90, 7, "Section 213A Review", 0, 'C', 0, 1, 67, 33, true);
//..........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 83, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div>MEETS</div>';
$pdf->writeHTMLCell(30, 5, 86, 39, $html, 0, 1, false, true, 'L',true);
//.........

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 106, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$html ='<div> DOES NOT MEET</div>';
$pdf->writeHTMLCell(30, 5, 109, 39, $html, 0, 1, false, true, 'L',true);
$pdf->writeHTMLCell(30, 5, 83, 43, 'requirements', 0, 1, false, true, 'L',true);
$pdf->writeHTMLCell(30, 5, 110, 43, 'requirements', 0, 1, false, true, 'L',true);
$pdf->writeHTMLCell(60, 0, 80, 48, '', 'T', 1, false, true, 'L',true);
$pdf->writeHTMLCell(60, 5, 83, 50, 'Reviewed By:________________', 0, 1, false, true, 'L',true);
$pdf->writeHTMLCell(60, 5, 83, 55, 'Office:______________________', 0, 1, false, true, 'L',true);
$pdf->writeHTMLCell(60, 5, 83, 61, 'Date (mm/dd/yyyy):_____________', 0, 1, false, true, 'L',true);
//...............
$pdf->setFont('Times', 'B', 10);
$pdf->MultiCell(90, 7, "Number of Support Affidavits in File", 0, 'C', 0, 1, 126, 33, true);
$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 150, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(30, 5, 154, 39, '1', 0, 1, false, true, 'L',true);

$pdf->SetFont('times', '', 5);
$pdf->writeHTMLCell(2, 1, 175, 40, '', 1, 1, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(30, 5, 179, 39, '2', 0, 1, false, true, 'L',true);
$pdf->writeHTMLCell(63, 0, 140, 45, '', 'T', 1, false, true, 'L',true);
$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(30, 5, 142, 46, 'Remarks', 0, 1, false, true, 'L',true);
// upper box ended ............... upper box ended

$pdf->writeHTMLCell(190, 22, 13, 70, '', 1, 1, false, true, 'L',true);
$pdf->SetFont('times', '', 10);
$html ='<div><b>  &nbsp; &nbsp; <br> To be completed by an attorney or accredited
representative</b> (if any).</div>';
$pdf->writeHTMLCell(38, 21, 13.3, 70.5, $html, 'R', 1, true, true, 'C',true);
$pdf->SetFont('times', 'B', 15);
$html ='<div><input type="checkbox" name="g-28" value="g-28" checked=" " /></div>';
$pdf->writeHTMLCell(20, 20, 43.5, 73, $html, 0, 0, false, true, 'C',true);

//........

$pdf->SetFont('times', 'B', 10);
$html ='<div> <br> Select this box if Form G-28 or
G-281 is attached.</div>';
$pdf->writeHTMLCell(30, 22, 57, 70, $html, 'R', 0, false, true, 'C',true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney State Bar Number </b> <br> (if applicable)</div>';
$pdf->writeHTMLCell(50, 22, 90, 70, $html, 'R', 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 48, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 82);

//..........


$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or Accredited Representative
USCIS Online Account Number </b>(if any)</div>';
$pdf->writeHTMLCell(60, 22, 142, 70, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_online_account_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 82);
//...........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 55, 205, false); // angle
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div><b>START HERE - Type or print in black ink. </b></div>';
$pdf->writeHTMLCell(80, 18, 17, 94, $html, 0, 0, false, true, 'L',true);
//.........
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(0, 1, 0, 0); 
$pdf->SetFont('times', '', 12);
$html ='<div><b> part 1.   Basis For Filing Affidavit of Support</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 99, $html, 1, 1, true, true, 'L',true);

$pdf->writeHTMLCell(20, 7, 3, 108, 'I,', 0, 0, false, false, 'C', true);
$pdf->writeHTMLCell(20, 7, 90, 108, ',', 0, 0, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Basis_For_Filing_Affidavit_of_Support', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 15, 108);
//..............
$pdf->SetFont('times', '', 10);
$html ='<div>am the sponsor submitting this affidavit of support because
(Select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(90, 7, 16, 115, $html, 0, 0, false, true, 'L',true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.   </b>   <input type="checkbox" name="peitioner" value="peitioner" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 124, $html, 0, 0, false, true, 'L',true);
$pdf->writeHTMLCell(80, 7, 25, 124, ' I am the petitioner. I filed or am filing for the
immigration of my relative.', 0, 0, false, true, 'L',true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.   </b>   <input type="checkbox" name="alien_petietioner" value="alien petietioner" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 133, $html, 0, 0, false, true, 'L',true);
$pdf->writeHTMLCell(80, 7, 25, 133, 'I filed an alien worker petition on behalf of the
intending immigrant, who is related to me as my.', 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('filed_an_alien_worker_petition_on_behalf', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 142);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.   </b>   <input type="checkbox" name="have_ownership" value="have ownership" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 148, $html, 0, 0, false, true, 'L',true);
$html ='<div>I have an ownership interest of at least 5 percent in <br><br><br>which filed an alien worker petition on behalf of the
intending immigrant, who is related to me as my </div>';
$pdf->writeHTMLCell(80, 7, 25, 148, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('have_an_ownership_interest', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25,  153  );

$pdf->TextField('which_fields_an_alien_worker', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 169);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.d.   </b>   <input type="checkbox" name="join_sponsor" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 175, $html, 0, 0, false, true, 'L',true);
$html ='<div> I am the only joint sponsor.</div>';
$pdf->writeHTMLCell(80, 7, 25, 175, $html, 0, 0, false, true, 'L',true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.e.   </b>   <input type="checkbox" name="iam_the" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 180, $html, 0, 0, false, true, 'L',true);
$html ='<div>I am the <input type="checkbox" name="iam_first" value="Y" checked=" " />  first <input type="checkbox" name="iam_first" value="Y" checked=" " />   second of two joint sponsors.</div>';
$pdf->writeHTMLCell(90, 7, 25, 180, $html, 0, 0, false, true, 'L',true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.f.    </b>    <input type="checkbox" name="original" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 184, $html, 0, 0, false, true, 'L',true);
$html ='<div>The original petitioner is deceased. I am the
substitute sponsor. I am the intending immigrant\'s</div>';
$pdf->writeHTMLCell(80, 7, 25, 184, $html, 0, 0, false, true, 'L',true);
//........
$pdf->TextField('which_fields_an_alien_worker', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 193.5);



$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: If you are filing this form as a sponsor, you must
include proof of your U.S. citizenship, U.S. national status.
or lawful permanent resident status.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 0, false, true, 'L',true);

//...........

$pdf->SetFont('times', 'B', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html ='<div><b>Part 2. Information About the Principal
Immigrant</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 214, $html, 1, 1, true, true, 'L',true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.    </b>       Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(30, 7, 12, 225, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>1.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(30, 7, 12, 235, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>1.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(30, 7, 12, 247, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_las_tname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 227);

$pdf->TextField('information_about_you_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 237);

$pdf->TextField('information_about_you_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 247);


//............

$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(0, 1, 0, 0); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b> Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 100, $html, 0, 1, true, true, 'L',true);
$pdf->SetFont('times', 'BI', 7);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input">(USPS ZIP Code Lookup)</a></div>';
$pdf->writeHTMLCell(90, 7, 175, 102, $html, 0, 0, false, true, 'L',true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 110, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_care_of_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 115);
//.....

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 122, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_street_name_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 124);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.c. </b>&nbsp; &nbsp; <input type="checkbox" name="mail_apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="mail_ste" value="Ste" checked="" />Ste. <input type="checkbox" name="mail_flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  163, 133);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.d. </b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 142, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 142);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.e.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 151, $html, '', 0, 0, true, 'L');

$html = '<select name="mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 151, $html, '', 0, 0, true, 'L');
$html= '<div><b>2.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 151, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 151);

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 160, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 160);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 112, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 169);

//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 174, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 179);
//.....

$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 0); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Information </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 188, $html, 0, 1, true, true, 'L',true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.     </b>     Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 112, 195, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_cityzen_or_nationality', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 200.5);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.     </b>   Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 209, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 209);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.     </b>   Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 216, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 135, 221, 'A-', 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_alien_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 221);

//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 267.7, 72, false); // angle
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 254.5, 75, false); // angle
$pdf->StopTransform();

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.     </b>   USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 228, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_uscis_online_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 138, 234);

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.     </b>     Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 241, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 246.5);
//........

$pdf->AddPage('P', 'LETTER'); // page number 2

$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 3. Information About the Immigrants You
Are Sponsoring</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L',true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.    </b>     I am sponsoring the principal immigrant named in <b>Part 2</b>.</div>';
$pdf->writeHTMLCell(90, 7, 12, 28, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="sponsoring" value="Y" checked=" " />  Yes  &nbsp; <input type="checkbox" name="sponsoring" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(90, 7, 18, 34, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div>(Applicable only if you are sponsoring
family members in Part 3. as the second
joint sponsor or if you are sponsoring
family members who are immigrating
more than six months after the principal
immigrant)</div>';
$pdf->writeHTMLCell(62, 7, 40, 34, $html, 0, 0, false, true, 'L',true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.     </b>      <input type="checkbox" name="sponsoring2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 58, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div>I am sponsoring the following family members
immigrating at the same time or within six months of
the principal immigrant named in <b>Part 2.</b> (Do not
include any relative listed on a separate visa petition.)</div>';
$pdf->writeHTMLCell(78, 7, 22, 58, $html, 0, 0, false, true, 'L',true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.     </b>      <input type="checkbox" name="sponsoring3" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 76, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div>I am sponsoring the following family members who
ire immigrating more than six months after the principal
immigrant.</div>';
$pdf->writeHTMLCell(78, 7, 22, 76, $html, 0, 0, false, true, 'L',true);
//....... family member 1

$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 1</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 89, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.    </b>       Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(30, 7, 12, 94, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>4.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(30, 7, 12, 103, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>4.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(30, 7, 12, 114, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member1_las_tname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 96);

$pdf->TextField('family_member1_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 105);

$pdf->TextField('family_member1_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 114);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.     </b>        Relationship to Principal Immigrant</div>';
$pdf->writeHTMLCell(90, 7, 12, 122, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member1_relation_to_immigrant', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 127.5);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.     </b>       Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 136, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member1_date_of_birth', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 136);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.     </b>   Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 144, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 37, 150, 'A-', 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member1_alien_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 150);
//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 53, 224, false); // family member 1  angle 1
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 58, 234, false); // family member 1  angle 2
$pdf->StopTransform();

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.     </b>   USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 157, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member1_uscis_online_account', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 38, 162.5);

//.... family member 2 ....

$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 2</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 171, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.    </b>       Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(30, 7, 12, 177, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>9.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(30, 7, 12, 186, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>9.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(30, 7, 12, 197, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member2_las_tname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 179);

$pdf->TextField('family_member2_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 188);

$pdf->TextField('family_member2_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 197);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.     </b>        Relationship to Principal Immigrant</div>';
$pdf->writeHTMLCell(90, 7, 12, 204, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member2_relation_to_immigrant', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 209.5);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.     </b>       Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 219, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member2_date_of_birth', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 61, 219);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.     </b>   Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 37, 231, 'A-', 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member2_alien_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 231.5);
//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 165,75, false); // family member 2  angle 1
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 178.5,73.5, false); // family member 2  angle 2
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 177, 174, false); // family member 5  angle 1
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 163, 170, false); // family member 5  angle 1
$pdf->StopTransform();

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.     </b>   USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 239, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member2_uscis_online_account', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 38, 245);
//.......... family member 3

$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 3</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 15, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a.    </b>       Family Name<br>   &nbsp;   &nbsp;   &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 112, 20, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>14.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 112, 28, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>14.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 112, 39, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member3_las_tname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 21.5);

$pdf->TextField('family_member3_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 30);

$pdf->TextField('family_member3_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 39);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.     </b>        Relationship to Principal Immigrant</div>';
$pdf->writeHTMLCell(90, 7, 112, 46, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member3_relation_to_immigrant', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 51.5);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.     </b>       Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member3_date_of_birth', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 161, 60);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.     </b>   Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 68, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 137, 73, 'A-', 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member3_alien_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 73);

//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 152, 142, false); // family member 3  angle 1
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 153, 153, false); // family member 3  angle 2
$pdf->StopTransform();

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.     </b>   USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 80, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member3_uscis_online_account', 68, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 85);

//..........family member 4  


$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 4</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 92, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.a.    </b>       Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 112, 97, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>19.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 112, 106, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>19.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 112, 117, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member4_las_tname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 99);

$pdf->TextField('family_member4_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 108);

$pdf->TextField('family_member4_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 117);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>20.     </b>        Relationship to Principal Immigrant</div>';
$pdf->writeHTMLCell(90, 7, 112, 124, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member4_relation_to_immigrant', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 129.5);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.     </b>       Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 138, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member4_date_of_birth', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 161, 138);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22.     </b>   Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 146, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 137, 152, 'A-', 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member4_alien_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 152);
//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 152, 220, false); // family member 4  angle 1
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 152, 233, false); // family member 4  angle 2
$pdf->StopTransform();

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23.     </b>   USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 159, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member4_uscis_online_account', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 164.5);

//.... family member 5 ....

$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 5</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 173, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>24.a.    </b>       Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 112, 179, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>24.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 112, 188, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>24.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 112, 199, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member5_las_tname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 181);

$pdf->TextField('family_member5_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 190);

$pdf->TextField('family_member5_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 199);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>25.     </b>        Relationship to Principal Immigrant</div>';
$pdf->writeHTMLCell(90, 7, 112, 206, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member5_relation_to_immigrant', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 211.5);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>26.     </b>       Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 221, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member5_date_of_birth', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 161, 221);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>27.     </b>   Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 228, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 137, 233, 'A-', 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member5_alien_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 233.5);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.     </b>   USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 241, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('family_member5_uscis_online_account', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 138, 246);

//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 177, 174, false); // family member 5  angle 1
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 163, 170, false); // family member 5  angle 1
$pdf->StopTransform();

$pdf->AddPage('P', 'LETTER'); // page number 3
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 3. Information About the Immigrants You
Are Sponsoring</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L',true);
//.........

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 12, 29, '29. ', 0, 0, false, true, 'L',true);
$pdf->SetFont('times', '', 10);
$html ='<div>Enter the total number of immigrants you are sponsoring on
this affidavit which includes the principal immigrant listed
in <b>Part 2.</b>, any immigrants listed in <b>Part 3., Item
Numbers 1. - 28.</b> and (if applicable), any immigrants listed
for these questions in <b>Part 11. Additional Information. </b>
Do not count the principal immigrant if you are only
sponsoring family members entering more than 6 months
after the principal immigrant.
</div>';
$pdf->writeHTMLCell(85, 7, 18, 29, $html, 0, 0, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_29_enter_total_number', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 60);

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 4. Information About You (Sponsor) </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 70, $html, 1, 1, true, true, 'L',true);


$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Sponsor\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 80, $html, 0, 1, true, true, 'L',true);



$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.    </b>       Family Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 88, $html, 0, 0, false, true, 'L',true);

$html ='<div><b>1.b.    </b>        Given Name<br>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 97, $html, 0, 0, false, true, 'L',true);


$html ='<div><b>1.c.    </b>       Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 108, $html, 0, 0, false, true, 'L',true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_sponsor_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 90);

$pdf->TextField('information_you_sponsor_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 99);

$pdf->TextField('information_you_sponsor_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 108);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Sponsor\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 121, $html, 0, 1, true, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_care_of_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 135);
//.....

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 142, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_street_name_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 144);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.c. </b>&nbsp; &nbsp; <input type="checkbox" name="mail_apt2" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="mail_ste2" value="Ste" checked="" />Ste. <input type="checkbox" name="mail_flr2" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  63, 153);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.d. </b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 162, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 162);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.e.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 12, 171, $html, '', 0, 0, true, 'L');

$html = '<select name="sponsor_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 171, $html, '', 0, 0, true, 'L');
$html= '<div><b>2.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 171, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 171);

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 180, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 180);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 12, 189, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 189);

//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 195, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mailing_address_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 200);
//.....

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.   </b>    Is your current mailing address the same as your physical<br>  &nbsp;  &nbsp;
 address?</div>';
$pdf->writeHTMLCell(90, 0, 12, 210, $html, '', 0, 0, true, 'L'); 

$html= '<div> <input type="checkbox" name="current_mailing" value="Y" checked=" " /> Yes &nbsp;&nbsp;
              <input type="checkbox" name="current_mailing" value="N" checked=" " /> No
</div>';
$pdf->writeHTMLCell(90, 0, 70, 215, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html= '<div>If you answered "No" to <b>Item Number 3.</b>, provide your
physical address in <b>Item Numbers 4.a. - 4.h.</b></div>';
$pdf->writeHTMLCell(90, 0, 12, 225, $html, '', 0, 0, true, 'L'); 

//......

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Sponsor\'s Physical Address </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, true, 'L',true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 24, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_street_name_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 26);

//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.b. </b>&nbsp; &nbsp; <input type="checkbox" name="physical_apt2" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="physical_ste2" value="Ste" checked="" />Ste. <input type="checkbox" name="physical_flr2" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 35, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  163, 35);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.c. </b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 44, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 44);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.d.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 53, $html, '', 0, 0, true, 'L');

$html = '<select name="sponsor_physical_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 53, $html, '', 0, 0, true, 'L');
$html= '<div><b>4.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 53, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 53);

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 62, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 62);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 112, 71, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 71);

//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 78, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_physical_address_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 84);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 94, $html, 0, 1, true, true, 'L',true);

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.          </b>         Country of Domicile </div>';
$pdf->writeHTMLCell(50, 0, 112, 100, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_country', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 105.5);
//.......


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>6.          </b>         Date of birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 0, 112, 115, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_date_of_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 115);

//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.      </b>       City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 0, 112, 121.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_city_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 127);
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>8.      </b>       State or Province of Birth</div>';
$pdf->writeHTMLCell(60, 0, 112, 135, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_state_province_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 140);
//.......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>9.      </b>       Country of Birth</div>';
$pdf->writeHTMLCell(60, 0, 112, 147, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_country_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 152);

//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.      </b>        U.S. Social Security Number (Required)</div>';
$pdf->writeHTMLCell(90, 0, 112, 159, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_us_social__security_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 164.5);
//........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 155, 225, false); // other info   angle 1
$pdf->Rotate(-120);
$pdf->MultiCell(10, 10, "t", '1', 'C', 0, 1, -43, 72.5, false); // angle 2
$pdf->MultiCell(10, 10, "t", '1', 'C', 0, 1, -39, 59, false); // other info   angle 3
$pdf->StopTransform();
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div>Citizenship or Residency</div>';
$pdf->writeHTMLCell(90, 0, 112, 174, $html, '', 0, 0, true, 'L');
//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>11.a.    </b>      <input type="checkbox" name="us_citizen" value="Y" checked=" " />   I am a U.S. citizen.</div>';
$pdf->writeHTMLCell(90, 0, 112, 180, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>11.b.    </b>      <input type="checkbox" name="us_nation" value="Y" checked=" " />   I am a U.S. national.</div>';
$pdf->writeHTMLCell(90, 0, 112, 187, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>11.c.    </b>      <input type="checkbox" name="us_lawfull" value="Y" checked=" " />    I am a lawful permanent resident.</div>';
$pdf->writeHTMLCell(90, 0, 112, 195, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10);// set font
$html= '<div><b>12.   &nbsp;  </b>       Sponsor\'s A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 202, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_a_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 207);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 0, 135, 207, 'A-', '', 0, 0, true, 'L');

//........

$pdf->SetFont('times', '', 10);// set font
$html= '<div><b>13.   &nbsp;  </b>       Sponsor\'s USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 215, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_other_information_uscis_online_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 138, 220);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(95, 0, 112, 228, 'Military Service (To be completed by petitioner sponsors only.)', 0, 0, false, 'L');

$pdf->SetFont('times', '', 10);// set font
$html= '<div><b>14.   &nbsp;  </b>      I am currently on <b>active duty</b> in the U.S. Armed Forces <br>      &nbsp;  &nbsp; &nbsp;  or U.S. Coast Guard.</div>';
$pdf->writeHTMLCell(90, 0, 112, 234, $html, '', 0, 0, true, 'L');

$html= '<div><input type="checkbox" name="currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell(60, 0, 170, 239, $html, '', 0, 0, true, 'L');


$pdf->AddPage('P', 'LETTER'); // page number 4


$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 1, 0, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(191, 19.5, 13, 17, '', 1, 0, false, 'L');
$pdf->MultiCell(15, 19, "For\nUSCIS\nUse\nOnly", 0, 'C', 1, 1, 13.3, 17.2, true);

//...........

$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 5. Sponsor\'s Household Size</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 40, $html, 1, 1, true, true, 'L',true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: Do not count any member of your household more
than once. <br> <br>
Persons you are sponsoring in this affidavit:</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 48, $html, 0, 1, false, true, 'L',true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.     </b>    Provide the number you entered in <b>Part 3., Item Number  <br>
&nbsp;  &nbsp; &nbsp;     29.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 66, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_1', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 72);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Persons NOT sponsored in this affidavit:</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, true, 'L',true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.     </b>   Yourself</div>';
$pdf->writeHTMLCell(90, 7, 12, 84, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_2_yourself', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 84);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.     </b>   If you are currently married, enter "I" for your spouse.</div>';
$pdf->writeHTMLCell(90, 7, 12, 91, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3_currently_married', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 97);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.      </b>     If you have dependent children, enter the number here.</div>';
$pdf->writeHTMLCell(90, 7, 12, 104, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_4_depend_child', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 110);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.      </b>      If you have any other dependents, enter the number here.</div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_5_other_depend', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 123);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.      </b>       If you have sponsored any other persons on Form 1-864 or<br>  &nbsp;  &nbsp;  
       From I-864EZ who are now lawful permanent residents. <br>   &nbsp;  &nbsp; 
       enter the number here.
</div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_6_sponsors', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 140);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.      </b>      <b>OPTIONAL: </b>If you have siblings, parents, or adult<br>   &nbsp;   &nbsp;
children with the same principal residence who are<br>    &nbsp;   &nbsp;
combining their income with yours by submitting Form<br>    &nbsp;   &nbsp;
I-864A, enter the number here.
</div>';
$pdf->writeHTMLCell(90, 7, 12, 148, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_7_optional', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 164);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.      </b>      Add together <b>Part 5., Item Numbers 1. - 7.</b> and enter the<br>   &nbsp;   &nbsp;
number here.
</div>';
$pdf->writeHTMLCell(90, 7, 12, 170, $html, 0, 1, false, true, 'L',true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_8_household', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 88, 178);
$pdf->SetFont('times', '', 10);
$html ='<div><b>Household Size: </b></div>';
$pdf->writeHTMLCell(60, 7, 60, 178, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 6. Sponsor\'s Employment and Income</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 188, $html, 1, 1, true, true, 'L',true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>I am currently:</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 195, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.     </b>      <input type="checkbox" name="employeed_as" value="Y" checked=" " />  Employed as a/an</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(85, 7, 18, 206, '', 1, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.     </b>      Name of Employer 1</div>';
$pdf->writeHTMLCell(90, 7, 12, 213.5, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(85, 7, 18, 219, '', 1, 1, false, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.     </b>     Name of Employer 2 (if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(85, 7, 18, 232, '', 1, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.     </b>      <input type="checkbox" name="employeed_as" value="Y" checked=" " />  Employed as a/an</div>';
$pdf->writeHTMLCell(90, 7, 12, 240, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(85, 7, 18, 246, '', 1, 1, false, true, 'L', true);

//......page 4 left side   end .....//

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.     </b>       <input type="checkbox" name="retired" value="Y" checked=" " />  Retired Since (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 38, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(40, 7, 164, 38, '', 1, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.     </b>      <input type="checkbox" name="un_employeed" value="Y" checked=" " />Unemployed Since (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell(90, 7, 112, 45.5, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(40, 7, 164, 52, '', 1, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>7.     </b>     My current individual annual income is:</div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 165, 66, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_annual_income', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 66);


//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Income you are using from any other person who was
counted in your household size,</b> including, in certain
conditions, the intending immigrant. (See Form I-864
Instructions.) Please indicate name, relationship, and income.</div>';
$pdf->writeHTMLCell(90, 7, 112, 73, $html, 0, 1, false, true, 'L', true);


//..........person 1 

$pdf->SetFont('times', '', 10);
$html ='<div><b>Person 1</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 93, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.      </b>  &nbsp;      Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 99.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_1_name', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 105);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.      </b>  &nbsp;      Relationship</div>';
$pdf->writeHTMLCell(90, 7, 112, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_1_relation', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 117.5);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $    </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_1_current_income', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 127);



//..........person 2 

$pdf->SetFont('times', '', 10);
$html ='<div><b>Person 2</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 134, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.    </b>&nbsp;    Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_2_name', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 145);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.     </b>&nbsp;     Relationship</div>';
$pdf->writeHTMLCell(90, 7, 112, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_2_relation', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 158);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; $    </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 167, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_2_current_income', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 167); 




//..........person 3 

$pdf->SetFont('times', '', 10);
$html ='<div><b>Person 3</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 174, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.    </b>&nbsp;    Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_3_name', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 185);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.     </b>&nbsp;     Relationship</div>';
$pdf->writeHTMLCell(90, 7, 112, 192, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_3_relation', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 197);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $    </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 206, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_3_current_income', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 206); 


//..........person 4 

$pdf->SetFont('times', '', 10);
$html ='<div><b>Person 4</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 214, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.     </b>&nbsp;     Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 219, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_4_name', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 224);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.      </b>&nbsp;      Relationship</div>';
$pdf->writeHTMLCell(90, 7, 112, 232, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_4_relation', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 237);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.        &nbsp;      Current Income     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $    </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 247, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('person_4_current_income', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 247); 

$pdf->AddPage('P', 'LETTER'); // page number 5

$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(0, 4, 0, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(191, 30, 13, 17, '', 1, 0, false, 'L');
$pdf->MultiCell(15, 29.5, "For\nUSCIS\nUse\nOnly", 0, 'C', 1, 1, 13.3, 17.2, true);

//..........
$pdf->setCellHeightRatio(1.6);
$pdf->MultiCell(45, 7, "Household Size", 0, 'C', 0, 0, 20, 1, false);
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="house_hold1" value="1" checked=" " />  1   &nbsp; 
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
$pdf->writeHTMLCell(15, 1, 78, 20, '20', 'B', 1, false, true, 'L', true);
$pdf->writeHTMLCell(38, 7, 62, 33, '', 'T', 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 30, 100, 17, '', 'L', 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 70, 30, 'Poverty Line:', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 67, 36, '$_____________', 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(45, 7, 102, 14, 'Remarks', 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html ='<div><b>Part 6. Sponsor\'s Employment and Income  
</b>  (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 50, $html, 1, 1, true, true, 'L',true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 12, 63, '20.', 0, 0, false, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>My Current Annual Household Income</b> (Total all lines from <b>part 6. Item Numbers 7., 10., 13., 16.,</b> and <b>19.</b>; the total will be compared to Federal Poverty Guidelines on
Form I-864P.)</div>';
$pdf->writeHTMLCell(85, 7, 20, 63, $html, 0, 0, false, true, 'L',true);

$pdf->writeHTMLCell(90, 7, 54, 77, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('my_current_house_hold_income', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 57, 77); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.     </b>      <input type="checkbox" name="the_people" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 84, $html, 0, 1, false, true, 'L', true);
$html ='<div>The people listed in <b>Item Numbers 8., 11.. 14.</b>. and
<b>17.</b> have completed Form I-864A. I am filing along
with this affidavit all necessary Form I-864 As
completed by these people.</div>';
$pdf->writeHTMLCell(80, 7, 24, 84, $html, 0, 0, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22.     </b>      <input type="checkbox" name="on_more_people" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 1, false, true, 'L', true);
$html ='<div>One or more of the people listed in <b>Item Numbers
8., 11., 14.</b>, and <b>17.</b> do not need to complete Form
I-864A because he or she is the intending immigrant
and has no accompanying dependents.</div>';
$pdf->writeHTMLCell(80, 7, 24, 102, $html, 0, 0, false, true, 'L', true);

$pdf->writeHTMLCell(80, 7, 24, 119, 'Name', 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('accompanying_dependent_name', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 124); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>Federal Income Tax Return Information</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 132, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>23.a.    </b>      Have you filed a Federal income tax return for each of the  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
three most recent tax years? </div>';
$pdf->writeHTMLCell(95, 7, 12, 137, $html, 0, 1, false, true, 'L', true);

$html ='<div> <input type="checkbox" name="tax_return" value="Y" checked=" " />   Yes   &nbsp; 
        <input type="checkbox" name="tax_return" value="N" checked=" " />    No        
</div>';
$pdf->writeHTMLCell(50, 7, 75, 142, $html, 0, 1, false, true, 'L', true);


$html ='<div><b>NOTE:</b> You<b> MUST</b> attach a photocopy or transcript of
your Federal income tax return for only the most recent
tax year.</div>';
$pdf->writeHTMLCell(83, 7, 22, 148, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>23.b.  </b><input type="checkbox" name="optional" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 1, false, true, 'L', true);
$html ='<div>(Optional) I have attached photocopies or transcripts
of my Federal income tax returns for my second and
third most recent tax years.</div>';
$pdf->writeHTMLCell(78, 7, 26, 162, $html, 0, 0, false, true, 'L', true);

$html ='<div>My total income (adjusted gross income on Internal Revenue
Service (IRS) Form 1040EZ) as reported on my Federal income
tax returns for the most recent three years was:</div>';
$pdf->writeHTMLCell(92, 7, 12, 178, $html, 0, 0, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Tax Year   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Total Income</div>';
$pdf->writeHTMLCell(90, 7, 50, 194, $html, 0, 1, false, true, 'L', true);

//..... for $ 
$pdf->writeHTMLCell(20, 7, 70, 202, '$', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(20, 7, 70, 209, '$', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(20, 7, 70, 216, '$', 0, 1, false, true, 'L', true);

$html ='<div><b>24.a.  </b>  Most Recent</div>';
$pdf->writeHTMLCell(90, 7, 12, 202, $html, 0, 1, false, true, 'L', true);

$html ='<div><b>24.b.  </b> 2nd Most Recent</div>';
$pdf->writeHTMLCell(90, 7, 12, 209, $html, 0, 1, false, true, 'L', true);


$html ='<div><b>24.c.  </b> 3rd Most Recent</div>';
$pdf->writeHTMLCell(90, 7, 12, 216, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('most_recent_tax_year', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 202.2);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('2nd_most_recent_tax_year', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 209);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('3rd_most_recent_tax_year', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 215.9);

//.......

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('total_income', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 202.2);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('2nd_total_income', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 209);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('3rd_total_income', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 215.9);


$pdf->SetFont('times', '', 10);
$html ='<div><b>25.  </b><input type="checkbox" name="not_require" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 230, $html, 0, 1, false, true, 'L', true);
$html ='<div>I was not required to file a Federal income tax return
as my income was below the IRS required level and I
have attached evidence to support this.</div>';
$pdf->writeHTMLCell(78, 7, 24, 230, $html, 0, 0, false, true, 'L', true);

// page 5 left end ..........

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 7. Use of Assets to Supplement Income </b> (Optional)</div>';
$pdf->writeHTMLCell(90, 7, 113, 50, $html, 1, 1, true, true, 'L',true);

$pdf->SetFont('times', '', 10);
$html ='<div>If your income, or the total income for you and your household.
from <b>Part 6., Item Numbers 20.</b> or <b>24.a. - 24.c.</b>, exceeds the
Federal Poverty Guidelines for your household size, <b>YOU ARE
NOT REQUIRED</b> to complete this <b>Part 7.</b> Skip to <b>Part 8.</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 63, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>Your Assets (Optional)</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 80, $html, 0, 1, false, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b>   Enter the balance of all savings and checking accounts.</div>';
$pdf->writeHTMLCell(90, 7, 112, 85, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 91, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('balance_saving_account', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 90.5); 

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>   Enter the net cash value of real-estate holdings. (Net value <br>&nbsp; &nbsp; &nbsp;
 means current assessed value minus mortgage debt.)</div>';
$pdf->writeHTMLCell(92, 7, 112, 98, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 108, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('net_cash_value', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 107.5);
//............


$pdf->SetFont('times', '', 10);
$html ='<div><b>3.  </b>  Enter the net cash value of all stocks, bonds, certificates of <br> &nbsp;&nbsp;&nbsp; deposit, and any other assets not already included in <br> &nbsp;&nbsp;&nbsp; <b>Item Number 1. or Item Number 2</b>.</div>';
$pdf->writeHTMLCell(93, 7, 112, 114, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 128, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('cash_value_all_stock', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 128);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.  </b>   Add together <b>Item Numbers 1. - 3.</b> and enter the number<br> &nbsp; &nbsp; &nbsp; 
here.</div>';
$pdf->writeHTMLCell(93, 7, 112, 135, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(90, 7, 133, 140, 'TOTAL:    $', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('together_totals', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 140);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>Assets from Form I-864A. Part 4., Item Number 3.d., for:</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 148, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.    </b>    Name of Relative</div>';
$pdf->writeHTMLCell(93, 7, 112, 155, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('use_asets_name_of_relative', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 160);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>  Your household member\'s assets from Form I-864A <br> &nbsp; &nbsp; &nbsp; &nbsp; 
(optional).</div>';
$pdf->writeHTMLCell(90, 7, 112, 168, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 173, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('house_hold_member_assets', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 173); 

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Assets of the principal sponsored immigrant</b>(optional).</div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div>The principal sponsored immigrant is the person listed in <b>Part
2., Item Numbers 1.a. - 1.c.</b> Only include the assets if the
principal immigrant is being sponsored by this affidavit of
support.</div>';
$pdf->writeHTMLCell(90, 7, 112, 186, $html, 0, 1, false, true, 'L', true);

//................


$pdf->SetFont('times', '', 10);
$html ='<div><b>6.  </b>    Enter the balance of the principal immigrant\'s savings and<br>&nbsp; &nbsp; &nbsp;
checking accounts.</div>';
$pdf->writeHTMLCell(90, 7, 112, 205, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 212, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('enter_balance_of_principals', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 211); 
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.  </b>    Enter the net cash value of all the principal immigrant\'s <br>&nbsp; &nbsp; &nbsp;
real estate holdings. (Net value means investment value<br>&nbsp; &nbsp; &nbsp;
minus mortgage debt.)</div>';
$pdf->writeHTMLCell(90, 7, 112, 218, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 227, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('net_cash_value_of_principals', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 227);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.  </b>    Enter the current cash value of the principal immigrant\'s<br>&nbsp; &nbsp; &nbsp;
stocks, bonds, certificates of deposit, and other assets not<br>&nbsp; &nbsp; &nbsp;
included in <b>Item Number 6</b>. or <b>Item Number 7.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 234, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 155, 247, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_cash_value_of_immigrants', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 247);
//...........page 5 end 

$pdf->AddPage('P', 'LETTER'); // page number 6

$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(0, 4, 0, 1); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->writeHTMLCell(191, 30, 13, 17, '', 1, 0, false, 'L');
$pdf->MultiCell(15, 29.5, "For\nUSCIS\nUse\nOnly", 0, 'C', 1, 1, 13.3, 17.2, true);

//..........
$pdf->setCellHeightRatio(1.6);
$pdf->MultiCell(45, 7, "Household Size", 0, 'C', 0, 0, 20, 1, false);
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="house_hold1" value="1" checked=" " />  1   &nbsp; 
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
$pdf->writeHTMLCell(15, 1, 78, 20, '20', 'B', 1, false, true, 'L', true);
$pdf->writeHTMLCell(38, 7, 62, 33, '', 'T', 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 30, 100, 17, '', 'L', 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 70, 30, 'Poverty Line:', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 7, 67, 36, '$_____________', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Sponsor\'s Household  Income</b></div>';
$pdf->writeHTMLCell(50, 7, 102, 14, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'I', 8);
$html ='<div>( Page 5, Line 10 )</div>';
$pdf->writeHTMLCell(50, 7, 112, 18, $html, 0, 1, false, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>$_______________________</div>';
$pdf->writeHTMLCell(50, 7, 102, 25, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b> Remarks </b></div>';
$pdf->writeHTMLCell(56, 15, 148, 13, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(56, 16, 148, 17, '', 'LB', 1, false, true, 'L', true);

$pdf->SetFont('times', 'I', 8);
$html ='<div>The total Value of all assets, Line 10, must equal 5 times (3 time for suposes and children of USC\'s, or 1 time for orphans to be formally adopted in the U.S) the difference between the poverty guidelines and sponsor\'s household income, Line 10. </div>';
$pdf->writeHTMLCell(100, 7, 102, 30, $html, 0, 1, false, true, 'L', true);
//............page 6 upper box end 

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html ='<div><b>Part 7. Use of Assets to Supplement Income 
</b>(Optional) (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 49, $html, 1, 1, true, true, 'L',true);
//.......


$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b>    Add together <b>Item Numbers 6. - 8.</b> and enter the number<br> &nbsp; &nbsp;&nbsp; here</div>';
$pdf->writeHTMLCell(90, 7, 12, 62, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 54, 67, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_together_item_number6_8', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 57, 67);

$pdf->SetFont('times', 'B', 10);
$html ='<div><b>Total Value of Assets </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 74, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.  </b>    Add together <b>Item Numbers 4., 5.b.</b>, and<b> 9.</b> and enter the<br>  &nbsp; &nbsp; &nbsp; 
number here.</div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 35, 90, 'TOTAL :', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 54, 90, '$', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_together_item_number4_5_9', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 57, 90);

//..........

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html ='<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
Information, Declaration, Certification, and
Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 100, $html, 1, 1, true, true, 'L',true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-864
Instructions before completing this part.</div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFont('times', 'BI', 12);
$html ='<div>Sponsor\'s Contract</div>';
$pdf->writeHTMLCell(90, 7, 13, 128, $html, 0, 1, true, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2); // cell height
$html ='<div>Please note that, by signing this Form I-864, you agree to
assume certain specific obligations under the Immigration and
Nationality Act (INA) and other Federal laws. The following
paragraphs describe those obligations. Please read the
following information carefully before you sign Form I-864. If
you do not understand the obligations, you may wish to consult
an attorney or accredited representative.</div>';
$pdf->writeHTMLCell(92, 7, 12, 135, $html, 0, 1, false, true, 'L', true);

$html='<div><b>What is the Legal Effect of My Signing Form I-864? </b><br></div>'; 
$pdf->writeHTMLCell(92, 7, 12, 168, $html, 0, 1, false, true, 'L', true);

$html='<div>
If you sign Form I-864 on behalf of any person (called the
intending immigrant) who is applying for an immigrant visa or
for adjustment of status to a lawful permanent resident, and that
intending immigrant submits Form I-864 to the U.S.
Government with his or her application for an immigrant visa or
adjustment of status, under INA section 213A, these actions
create a contract between you and the U.S. Government. The
intending immigrant becoming a lawful permanent resident is
he consideration for the contract.</div>';
$pdf->writeHTMLCell(92, 7, 12, 174, $html, 0, 1, false, true, 'L', true);



$html='<div>
Under this contract, you agree that, in deciding whether the
intending immigrant can establish that he or she is not
inadmissible to the United States as a person likely to become a
public charge, the U.S. Government can consider your income
and assets as available for the support of the intending
immigrant.</div>';
$pdf->writeHTMLCell(92, 7, 12, 218, $html, 0, 1, false, true, 'L', true);

//......page 6 left side end 

$pdf->SetFont('times', '', 10);
$html='<div><b>What If I Choose Not to Sign Form I-864?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 47, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>The U.S. Government cannot make you sign Form I-864 if you
do not want to do so. But if you do not sign Form I-864, the
intending immigrant may not become a lawful permanent
resident in the United States.</div>';
$pdf->writeHTMLCell(92, 7, 112, 53, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div><b>What Does Signing Form I-864 Require Me To Do?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 73, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>If an intending immigrant becomes a lawful permanent resident
in the United States based on a Form I-864 that you have
signed, then, until your obligations under Form I-864 terminate,
you must:</div>';
$pdf->writeHTMLCell(92, 7, 112, 80, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(92, 7, 117, 100, 'A.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(92, 7, 117, 135, 'B.', 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>Provide the intending immigrant any support
necessary to maintain him or her at an income that is
at least 125 percent of the Federal Poverty Guidelines
for his or her household size (100 percent if you are
the petitioning sponsor and are on active duty in the
U.S. Armed Forces or U.S. Coast Guard, and the
person is your husband, wife, or unmarried child
under 21 years of age): and</div>';
$pdf->writeHTMLCell(78, 7, 124, 100, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>Notify U.S. Citizenship and Immigration Services
(USCIS) of any change in your address, within 30
days of the change, by filing Form I-865.</div>';
$pdf->writeHTMLCell(78, 7, 124, 135, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div><b>What Other Consequences Are There?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 150, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>If an intending immigrant becomes a lawful permanent resident
in the United States based on a Form I-864 that you have
signed, then, until your obligations under Form I-864 terminate,
the U.S. Government may consider (deem) your income and
assets as available to that person, in determining whether he or
she is eligible for certain Federal means-tested public
and also for state or local means-tested public benefits, if the
state or local government\'s rules provide for consideration
(deeming) of your   income and assets as available to the person.</div>';
$pdf->writeHTMLCell(92, 7, 112, 156, $html, 0, 1, false, true, 'L', true);

//...........


$pdf->SetFont('times', '', 10);
$html='<div>This provision does <b>not</b> apply to public benefits specified in
section 403(c) of the Welfare Reform Act such as emergency
Medicaid, short-term, non-cash emergency relief; services
provided under the National School Lunch and Child Nutrition
Acts; immunizations and testing and treatment for
communicable diseases; and means-tested programs under the
Elementary and Secondary Education Act. </div>';
$pdf->writeHTMLCell(92, 7, 112, 197, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div><b>What If I Do Not Fulfill My Obligations?</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 229, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>If you do not provide sufficient support to the person who
becomes a lawful permanent resident based on a Form I-864
that you signed, that person may sue you for this support.</div>';
$pdf->writeHTMLCell(92, 7, 112, 236, $html, 0, 1, false, true, 'L', true);

//..........page 6 end ..........

$pdf->AddPage('P', 'LETTER'); // page number 7

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html ='<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
Information, Declaration, Certification, and
Signature</b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L',true);


$pdf->SetFont('times', '', 10);
$html='<div>If a Federal, state, local, or private agency provided any covered
means-tested public benefit to the person who becomes a lawful
permanent resident based on a Form I-864 that you signed, the
agency may ask you to reimburse them for the amount of the
benefits they provided. If you do not make the reimbursement,
the agency may sue you for the amount that the agency believes
you owe.</div>';
$pdf->writeHTMLCell(92, 7, 12, 35, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div>If you are sued, and the court enters a judgment against you, the
person or agency that sued you may use any legally permitted
procedures for enforcing or collecting the judgment. You may
also be required to pay the costs of collection, including
attorney fees.</div>';
$pdf->writeHTMLCell(92, 7, 12, 67, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div>If you do not file a properly completed Form I-865 within 30
days of any change of address, USCIS may impose a civil fine
for your failing to do so.</div>';
$pdf->writeHTMLCell(92, 7, 12, 90, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div><b>When Will These Obligations End?</b></div>';
$pdf->writeHTMLCell(92, 7, 12, 104, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div>Your obligations under a Form I-864 that you signed will end if
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
$html='<div>Becomes a U.S. citizen;</div>';
$pdf->writeHTMLCell(90, 7, 22, 125, $html, 0, 1, false, true, 'L', true);


$html='<div>Has worked, or can receive credit for, 40 quarters of
coverage under the Social Security Act;</div>';
$pdf->writeHTMLCell(85, 7, 22, 133, $html, 0, 1, false, true, 'L', true);


$html='<div>No longer has lawful permanent resident status and
has departed the United States;</div>';
$pdf->writeHTMLCell(90, 7, 22, 143, $html, 0, 1, false, true, 'L', true);


$html='<div>Is subject to removal, but applies for and obtains, in
removal proceedings, a new grant of adjustment of
status, based on a new affidavit of support, if one is
required; or</div>';
$pdf->writeHTMLCell(85, 7, 22, 153, $html, 0, 1, false, true, 'L', true);



$html='<div>Dies.</div>';
$pdf->writeHTMLCell(90, 7, 22, 168, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>NOTE:</b> Divorce <b>does not</b> terminate your obligations under
Form I-864.</div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div>Your obligations under a Form I-864 that you signed also end if
you die. Therefore, if you die, your estate is not required to
take responsibility for the person\'s support after your death.
However, your estate may owe any support that you
accumulated before you died.</div>';
$pdf->writeHTMLCell(90, 7, 12, 184, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'BI', 12);
$html='<div>Sponsor\'s Statement</div>';
$pdf->writeHTMLCell(92, 7, 12, 208, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b>
If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 215, $html, 0, 1, false, true, 'L', true);

$html='<div><b>1.a    </b>    <input type="checkbox" name="sponsor" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 225, $html, 0, 1, false, true, 'L', true);

$html='<div>I can read and understand English, and I have read
and understand every question and instruction on this
affidavit and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 24, 225, $html, 0, 1, false, true, 'L', true);

//..........page 7 left side end ..

$html='<div><b>1.b    </b>    <input type="checkbox" name="sponsor" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(80, 7, 112, 17, $html, 0, 1, false, true, 'L', true);

$html='<div>The interpreter named in <b>Part 9.</b> read to me every
question and instruction on this affidavit and my
answer to every question in <br><br><br>
a language in which I am fluent, and I understood everything.
</div>';
$pdf->writeHTMLCell(80, 7, 124, 17, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('the_interpreter_named', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124, 32);
$pdf->writeHTMLCell(80, 7, 203, 32, ',', 0, 1, false, true, 'L', true);// comma 1
$pdf->writeHTMLCell(80, 7, 203, 52, ',', 0, 1, false, true, 'L', true);// comma 2

//...........

$pdf->SetFont('times', '', 10);
$html='<div><b>2.    </b>      <input type="checkbox" name="sponsor" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(80, 7, 112, 47, $html, 0, 1, false, true, 'L', true);

$html='<div>At my request, the preparer named in <b>Part 10.</b>, <br><br><br>
prepared this affidavit for me based only upon
nformation I provided or authorized.
</div>';
$pdf->writeHTMLCell(80, 7, 124, 47, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('at_my_request_preparer_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124, 53);

$pdf->SetFont('times', 'BI', 12);
$html='<div>Sponsor\'s Contact Information</div>';
$pdf->writeHTMLCell(92, 7, 112, 71, $html, 0, 1, true, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div><b>3.    </b>     Sponsor\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 112, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_daytime_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 83.5);

//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>4.    </b>     Sponsor\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_mobile_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 95.5);

//...............

$pdf->SetFont('times', '', 10);
$html='<div><b>5.    </b>     Sponsor\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 102, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 107.5);

//........

$pdf->SetFont('times', 'BI', 12);
$html='<div>Sponsor\'s Declaration and Certification</div>';
$pdf->writeHTMLCell(92, 7, 112, 117, $html, 0, 1, true, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div>Copies of any documents I have submitted are exact
photocopies of unaltered, original documents, and I understand
that USCIS or the U.S. Department of State (DOS) may require
that I submit original documents to USCIS or DOS at a later
late. Furthermore, I authorize the release of any information
from any and all of my records that USCIS or DOS may need to
determine my eligibility for the benefit that I seek.</div>';
$pdf->writeHTMLCell(92, 7, 112, 125, $html, 0, 1, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html='<div>I furthermore authorize release of information contained in this
affidavit, in supporting documents, and in my USCIS or DOS
records, to other entities and persons where necessary for the
administration and enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(92, 7, 112, 157, $html, 0, 1, false, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html='<div>certify, under penalty of perjury, that all of the information in
my affidavit and any document submitted with it were provided
or authorized by me, that I reviewed and understand all of the
information contained in, and submitted with, my affidavit and
that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(92, 7, 112, 176, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 116, 199, 'A.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 116, 209, 'B.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 116, 236, 'C.', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div>I know the contents of this affidavit of support that I
signed;</div>';
$pdf->writeHTMLCell(80, 7, 122, 199, $html, 0, 1, false, true, 'L', true);


$html='<div>I have read and I understand each of the obligations
described in Part 8., and I agree, freely and without
any mental reservation or purpose of evasion, to
accept each of those obligations in order to make it
possible for the immigrants indicated in Part 3. to
become lawful permanent residents of the United
States;</div>';
$pdf->writeHTMLCell(80, 7, 122, 209, $html, 0, 1, false, true, 'L', true);


$html='<div>I agree to submit to the personal jurisdiction of any
Federal or state court that has subject matter
jurisdiction of a lawsuit against me to enforce my
obligations under this Form I-864;</div>';
$pdf->writeHTMLCell(80, 7, 122, 236, $html, 0, 1, false, true, 'L', true);
//...........page 7 end 


$pdf->AddPage('P', 'LETTER'); // page number 8

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1);
$html ='<div><b>Part 8. Sponsor\'s Contract, Statement, Contact
Information, Declaration, Certification, and
Signature</b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L',true);

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 16, 34,  'D.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 16, 48, 'E.', 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(90, 7, 16, 71, 'F.', 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div>Each of the Federal income tax returns submitted in
support of this affidavit are true copies, or are
unaltered tax transcripts, of the tax returns I filed
with the IRS;</div>';
$pdf->writeHTMLCell(80, 7, 22, 34, $html, 0, 1, false, true, 'L', true);


$html='<div>I understand that, if I am related to the sponsored
immigrant by marriage, the termination of the
marriage (by divorce, dissolution, annulment, or
other legal process) will not relieve me of my
obligations under this Form I-864; and</div>';
$pdf->writeHTMLCell(80, 7, 22, 48, $html, 0, 1, false, true, 'L', true);


$html='<div>I authorize the Social Security Administration to
release information about me in its records to
USCIS and DOS.</div>';
$pdf->writeHTMLCell(80, 7, 22, 71, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', 'BI', 12);
$html='<div> Sponsor\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 88, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div><b>6.a.      </b>      Sponsor\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 96, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(82, 7, 21, 102, '', 1, 1, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html='<div><b>6.b.   </b>     Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('sponsor_signature_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 112);


$pdf->SetFont('times', '', 10);
$html='<div><b>NOTE TO ALL SPONSORS: </b>If you do not completely fill
out this affidavit or fail to submit required documents listed in
the Instructions, USCIS or DOS may deny your affidavit.</div>';
$pdf->writeHTMLCell(90, 7, 12, 120, $html, 0, 1, false, true, 'L', true);

//..............


$pdf->SetFont('times', '', 12);
$html='<div><b>Part 9. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 138, $html, 1, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(90, 7, 12, 152, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'BI', 12);
$html='<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 160, $html, 0, 1, true, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>1.a.    </b>     Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 12, 168, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_last_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 173.5);


//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>1.b.    </b>      Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(80, 7, 12, 183, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_given_first_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 188.5);


//...........

$pdf->SetFont('times', '', 10);
$html='<div><b>2.       </b>    &nbsp;      Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 197, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_business_org_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 202.5);



//.........page 8 left side end ..


$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Interpreters\'s Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, true, 'L',true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 24, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 26);

//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="physical_apt2" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="physical_ste2" value="Ste" checked="" />Ste. <input type="checkbox" name="physical_flr2" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 35, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  163, 35);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.c. </b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 44, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 44);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.d.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 53, $html, '', 0, 0, true, 'L');

$html = '<select name="interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 53, $html, '', 0, 0, true, 'L');
$html= '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 53, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 53);

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 62, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 62);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 112, 71, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 71);

//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 78, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 84);

//.............

$pdf->SetFont('times', 'BI', 12);
$html='<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(92, 7, 112, 94, $html, 0, 1, true, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div><b>4.    </b>     Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 112, 102, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_daytime_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 107.5);

//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>5.    </b>     Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 115, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mobile_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 120.5);

//...............

$pdf->SetFont('times', '', 10);
$html='<div><b>6.    </b>     Interpreter\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 128, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 133.5);
//.........

$pdf->SetFont('times', 'BI', 12);
$html='<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(92, 7, 113, 144, $html, 0, 1, true, true, 'L', true);
 
$pdf->SetFont('times', '', 10);
$html='<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(80, 7, 112, 152, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certification', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 159);


$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.4);
$html='<div>I am fluent in English and<br>
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
$html='<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 113, 203, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div><b>7.a.      </b>       Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 112, 210, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(83, 7, 121, 216, '', 1, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div><b>7.b.      </b>       Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 227, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_date_of_signature', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169, 227);

//.........page 8 end 


$pdf->AddPage('P', 'LETTER'); // page number 9


$pdf->SetFont('times', '', 12);
$html='<div><b>Part 10. Contact Information, Declaration, and
Signature of the Person Preparing this Affidavit,
if Other Than the Sponsor</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div>Provide the following information about the preparer</div>';
$pdf->writeHTMLCell(90, 7, 12, 35, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'BI', 12);
$html='<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 43, $html, 0, 1, true, true, 'L', true);


//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>1.a.    </b>     Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 12, 50, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_last_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 55.5);


//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>1.b.    </b>      Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(80, 7, 12, 64, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_given_first_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 69.5);


//...........

$pdf->SetFont('times', '', 10);
$html='<div><b>2.       </b>    &nbsp;      Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_business_org_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 83.5);


$pdf->SetFont('times', 'BI', 12);
$html='<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(90, 7, 13, 94, $html, 0, 1, true, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.   </b>  Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 103, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 105);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="mail_apt2" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="mail_ste2" value="Ste" checked="" />Ste. <input type="checkbox" name="mail_flr2" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 114, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  63, 114);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.c. </b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 123, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 123);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.d.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 12, 132, $html, '', 0, 0, true, 'L');

$html = '<select name="preparer_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 132, $html, '', 0, 0, true, 'L');
$html= '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 132, $html, 0, 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 132);

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 141, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 141);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 12, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 150);

//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 157, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 162.5);

//............

$pdf->SetFont('times', 'BI', 12);
$html='<div> Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 13, 174, $html, 0, 1, true, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>4.      </b>       Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_daytime_telephone_number', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 186.5);


//.........

$pdf->SetFont('times', '', 10);
$html='<div><b>5.      </b>         Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 194, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mobile_telephone_number', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 199.5);


//...........

$pdf->SetFont('times', '', 10);
$html='<div><b>6.         </b>    &nbsp;         Preparer\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_email_address', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 212.5);

//.......... page 9 left end 

$pdf->SetFont('times', 'BI', 12);
$html='<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, true, 'L', true);


$pdf->SetFont('times', '', 11);
$html='<div><b>7.a. </b> <input type="checkbox" name="preparer_statement" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 27, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html='<div>I am not an attorney or accredited representative but
have prepared this affidavit on behalf of the sponsor
and with the sponsor\'s consent.</div>';
$pdf->writeHTMLCell(80, 7, 126, 27, $html, 0, 1, false, true, 'L', true);


//...........


$pdf->SetFont('times', '', 11);
$html='<div><b>7.b. </b> <input type="checkbox" name="preparer_statement7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 40, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html='<div> I am an attorney or accredited representative and my
representation of the sponsor in this case<br><input type="checkbox" name="preparer_statement7b1" value="Y" checked=" " />   extends     <input type="checkbox" name="preparer_statement7b2" value="Y" checked=" " /> does not extend beyond the preparation of this affidavit.<br><br>
<b>NOTE:</b> If you are an attorney or accredited
representative, you may be obliged to submit a
completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited
Representative, or G-281, Notice of Entry of
Appearance as Attorney In Matters Outside the
Geographical Confines of the United States, with this
ffidavit.</div>';
$pdf->writeHTMLCell(80, 7, 126, 40, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', 'BI', 12);
$html='<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 113, 95, $html, 0, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html='<div>By my signature, I certify, under penalty of perjury, that I
prepared this affidavit at the request of the sponsor. The
sponsor then reviewed this completed affidavit and informed
me that he or she understands all of the information contained
in, and submitted with, his or her affidavit, including the
<b>Sponsor\'s Declaration and Certification,</b> and that all of this
information is complete, true, and correct. I completed this
affidavit based only on information that the sponsor provided to
me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(91, 7, 112, 105, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('times', 'BI', 12);
$html='<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 113, 147, $html, 0, 1, true, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html='<div><b>8.a.      </b>       Preparer\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 112, 155, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(83, 7, 121, 161, '', 1, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html='<div><b>8.b.      </b>       Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 170, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preperer_date_of_signature', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169, 170);

//.....page 9 end 















$pdf->AddPage('P', 'LETTER'); // page number 10

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 11. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 18, $html, 1, 1, true, 'L');
//........
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>If you need extra space to provide any additional information
within this affidavit, use the space below. If you need more
space than what is provided, you may make copies of this page
to complete and file with this affidavit or attach a separate sheet
of paper. Type or print your name and A-Number (if any) at the
top of each sheet; indicate the <b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet</div>';
$pdf->writeHTMLCell(95, 25, 12, 26, $html, 0, 1, 0, true, 'L', false, false);
//...........
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 61, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 63, '', 1, 0, false, 'L');
//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 71, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 73, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 81, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 82, '', 1, 0, false, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 91, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 60, 91, '', 1, 0, false, 'L');
$pdf->StartTransform();
$pdf->Rotate(-31);
$pdf->SetFont('zapfdingbats', '', 10);  // symbol font
$pdf->writeHTMLCell(40, 7, 58, 119, TCPDF_FONTS::unichr(116), 0, 0, false, 'L');
$pdf->StopTransform();
$pdf->setFont('Times', '', 12);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(7, 7, 54, 91, $html, 0, 0, false, 'L');
//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 107.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 107.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 107.5);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 116, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 20, 116, $html, 0, 0, false, 'L');

//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 174, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 180);
//........


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 174, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 180);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 174, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 180);

//.........


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 190, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 20, 190, $html, 0, 0, false, 'L');

                                            //.......page 12. left end 
// ....... start right side 


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 23);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 23);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 23);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 33, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 70, 119, 32, $html, 0, 0, false, 'L');

//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 104);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 104);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 104);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 114, $html, 0, 0, false, 'L');

//..........


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 174, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 180);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 174, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 180);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 174, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 180);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 190, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_7d"> 
</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 190, $html, 0, 0, false, 'L');




$js = "
var fields = {
    'attorney_state_bar_number':' $attorney_state_bar_number',
    'uscis_online_account_number':' $uscis_online_account_number',
    'Basis_For_Filing_Affidavit_of_Support':' ',
    'filed_an_alien_worker_petition_on_behalf':' ',
    'have_an_ownership_interest':' ',
    'which_fields_an_alien_worker':' ',
    'information_about_you_middle_name':' ',
    'information_about_you_first_name':' ',
    'information_about_you_las_tname':' ',

    'mailing_address_care_of_name':' ',
    'mailing_address_street_name_number':' ',
    'mailing_address_apt_ste_flr':' ',
    'mailing_address_city_town':' ',
    'mailing_address_state':' ',
    'mailing_address_zipcode':' ',
    'mailing_address_province':' ',
    'mailing_address_postal_code':' ',
    'mailing_address_country':' ',

    'other_information_cityzen_or_nationality':' ',
    'other_information_date_of_birth':' ',
    'other_information_alien_number':' ',
    'other_information_uscis_online_number':' ',
    'other_information_daytime_telephone':' ',

    'family_member1_las_tname':' ',
    'family_member1_first_name':' ',
    'family_member1_middle_name':' ',
    'family_member1_relation_to_immigrant':' ',
    'family_member1_date_of_birth':' ',
    'family_member1_alien_number':' ',
    'family_member1_uscis_online_account':' ',

    'family_member2_las_tname':' ',
    'family_member2_first_name':' ',
    'family_member2_middle_name':' ',
    'family_member2_relation_to_immigrant':' ',
    'family_member2_date_of_birth':' ',
    'family_member2_alien_number':' ',
    'family_member2_uscis_online_account':' ',

    'family_member3_las_tname':' ',
    'family_member3_first_name':' ',
    'family_member3_middle_name':' ',
    'family_member3_relation_to_immigrant':' ',
    'family_member3_date_of_birth':' ',
    'family_member3_alien_number':' ',
    'family_member3_uscis_online_account':' ',

    'family_member4_las_tname':' ',
    'family_member4_first_name':' ',
    'family_member4_middle_name':' ',
    'family_member4_relation_to_immigrant':' ',
    'family_member4_date_of_birth':' ',
    'family_member4_alien_number':' ',
    'family_member4_uscis_online_account':' ',

    'family_member5_las_tname':' ',
    'family_member5_first_name':' ',
    'family_member5_middle_name':' ',
    'family_member5_relation_to_immigrant':' ',
    'family_member5_date_of_birth':' ',
    'family_member5_alien_number':' ',
    'family_member5_uscis_online_account':' ',

    'part3_29_enter_total_number':' ',
    'information_you_sponsor_last_name':' ',
    'information_you_sponsor_first_name':' ',
    'information_you_sponsor_middle_name':' ',

    'sponsor_mailing_address_care_of_name':' ',
    'sponsor_mailing_address_street_name_number':' ',
    'sponsor_mailing_address_apt_ste_flr':' ',
    'sponsor_mailing_address_city_town':' ',
    'sponsor_mailing_address_state':' ',
    'sponsor_mailing_address_zipcode':' ',
    'sponsor_mailing_address_province':' ',
    'sponsor_mailing_address_postal_code':' ',
    'sponsor_mailing_address_country':' ',

    'sponsor_physical_address_care_of_name':' ',
    'sponsor_physical_address_street_name_number':' ',
    'sponsor_physical_address_apt_ste_flr':' ',
    'sponsor_physical_address_city_town':' ',
    'sponsor_physical_address_state':' ',
    'sponsor_physical_address_zipcode':' ',
    'sponsor_physical_address_province':' ',
    'sponsor_physical_address_postal_code':' ',
    'sponsor_physical_address_country':' ',

    'sponsor_other_information_country':' ',
    'sponsor_other_information_date_of_birth':' ',
    'sponsor_other_information_city_of_birth':' ',
    'sponsor_other_information_state_province_of_birth':' ',
    'sponsor_other_information_country_of_birth':' ',
    'sponsor_other_information_us_social__security_number':' ',
    'sponsor_other_information_a_number':' ',
    'sponsor_other_information_uscis_online_number':' ',

    'part5_1':' ',
    'part5_2_yourself':' ',
    'part5_3_currently_married':' ',
    'part5_4_depend_child':' ',
    'part5_5_other_depend':' ',
    'part5_6_sponsors':' ',
    'part5_7_optional':' ',
    'part5_8_household':' ',
    'current_annual_income':' ',

    'person_1_name':' ',
    'person_1_relation':' ',
    'person_1_current_income':' ',

    'person_2_name':' ',
    'person_2_relation':' ',
    'person_2_current_income':' ',

    'person_3_name':' ',
    'person_3_relation':' ',
    'person_3_current_income':' ',

    'person_4_name':' ',
    'person_4_relation':' ',
    'person_4_current_income':' ',

    'my_current_house_hold_income':' ',
    'accompanying_dependent_name':' ',

    'most_recent_tax_year':' ',
    '2nd_most_recent_tax_year':' ',
    '3rd_most_recent_tax_year':' ',

    'total_income':' ',
    '2nd_total_income':' ',
    '3rd_total_income':' ',
    'balance_saving_account':' ',
    'net_cash_value':' ',
    'cash_value_all_stock':' ',
    'together_totals':' ',
    'use_asets_name_of_relative':' ',
    'house_hold_member_assets':' ',
    'enter_balance_of_principals':' ',
    'net_cash_value_of_principals':' ',
    'current_cash_value_of_immigrants':' ',
    'add_together_item_number6_8':' ',
    'add_together_item_number4_5_9':' ',
    'the_interpreter_named':' ',
    'at_my_request_preparer_name':' ',

    'sponsor_daytime_telephone_number':' ',
    'sponsor_mobile_telephone_number':' ',
    'sponsor_email_address':' ',

    'sponsor_signature_date':' ',
    'interpreter_family_last_name':' ',
    'interpreter_given_first_name':' ',
    'interpreter_business_org_name':' ',
   
    'interpreter_mailing_address_street_name_number':' ',
    'interpreter_mailing_address_apt_ste_flr':' ',
    'interpreter_mailing_address_city_town':' ',
    'interpreter_mailing_address_state':' ',
    'interpreter_mailing_address_zipcode':' ',
    'interpreter_mailing_address_province':' ',
    'interpreter_mailing_address_postal_code':' ',
    'interpreter_mailing_address_country':' ', 
    'interpreter_daytime_telephone_number':' ',
    'interpreter_mobile_telephone_number':' ',
    'interpreter_email_address':' ',
    'interpreter_certification':' ',
    'interpreter_date_of_signature':' ',

    'preparer_family_last_name':' ',
    'preparer_given_first_name':' ',
    'preparer_business_org_name':' ',

    'preparer_mailing_address_street_name_number':' ',
    'preparer_mailing_address_apt_ste_flr':' ',
    'preparer_mailing_address_city_town':' ',
    'preparer_mailing_address_state':' ',
    'preparer_mailing_address_zipcode':' ',
    'preparer_mailing_address_province':' ',
    'preparer_mailing_address_postal_code':' ',
    'preparer_mailing_address_country':' ',

    'preparer_daytime_telephone_number':' ',
    'preparer_mobile_telephone_number':' ',
    'preparer_email_address':' ',
    'preperer_date_of_signature':' ',

    'additional_information_3a':' ',
    'additional_information_3b':' ',
    'additional_information_3c':' ',
    'additional_information_4a':' ',
    'additional_information_4b':' ',
    'additional_information_4c':' ',
    'additional_information_4d':' ',
    'additional_information_5a':' ',
    'additional_information_5b':' ',
    'additional_information_5c':' ',
    'additional_information_5d':' ',
    'additional_information_6a':' ',
    'additional_information_6b':' ',
    'additional_information_6c':' ',
    'additional_information_6d':' ',
    'additional_information_7a':' ',
    'additional_information_7b':' ',
    'additional_information_7c':' ',
    'additional_information_7d':' ',

    
};

for (var fieldName in fields) {
    if (!fields.hasOwnProperty(fieldName)) continue;
    var field = getField(fieldName);
    if (field && field.value === '') {
        field.value = fields[fieldName];
    }
}";

$pdf->IncludeJS($js);

// reset pointer to the last page
// $pdf->lastPage();
//Close and output PDF document
$pdf->Output('form I-864.pdf', 'I');

?>