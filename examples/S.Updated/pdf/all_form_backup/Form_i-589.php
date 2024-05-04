<?php

require_once('formheader.php');   //database connection file 

//require_once("config.php");
//$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

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
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
         if ($this->page < 11){
         $this->Cell(40, 6, "Form I-589 Edition 10/12/22", 0, 0, 'L');
         }elseif($this->page == 11){
            $this->Cell(40, 6, "Form I-589 Suppliment A 10/12/22", 0, 0, 'L');
         }else {
            $this->Cell(40, 6, "Form I-589 Suppliment B 10/12/22", 0, 0, 'L');
         }

		// if ($this->page == 1){
			$barcode_image = "images/i589/I-589-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage(), 0, 'R', 0, 1, 150, 264.5, true);
        
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
$pdf->SetFont('times', 'B', 9);	// set font
$pdf->MultiCell(80, 7, "Department of Homeland Security", 0, 'L', 0, 1, 12, 8, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->MultiCell(80, 7, "U.S. Citizenship and Immigration Services", 0, 'L', 0, 1, 12, 12, true);

$pdf->SetFont('times', 'B', 9);	// set font
$pdf->MultiCell(80, 7, "U.S. Department of Justice", 0, 'L', 0, 1, 12, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->MultiCell(80, 7, "Executive Office for Immigration Review", 0, 'L', 0, 1, 12, 22, true);




$pdf->SetFont('times', '', 9);	// set font
$pdf->MultiCell(80, 15, "OMB No. 1615-0067; Expires 01/31/2023", 0, 'R', 0, 1, 124, 8, true);





$pdf->SetFont('times', 'B', 14);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(80, 5, "I-589, Application for Asylum and for Withholding of Removal", 0, 'R', 0, 1, 129, 13, true);

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

$pdf->SetFont('times', 'B', 9);	// set font
$pdf->MultiCell(190, 7, "START HERE - Type or print in black ink. See the instructions for information about eligibility and how to complete and file this application. There is no filing fee for this application.", 0, 'L', 0, 1, 12, 33, true);

$pdf->SetFont('times', '', 9);
$html ='<div><b>NOTE: </b>  <input type="checkbox" name="notice" value="N"/> Check this box if you also want to apply for withholding of removal under the Convention Against Torture.</div>';
$pdf->writeHTMLCell(190, 7, 12, 41, $html, 0, 1, false, false, 'L', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->writeHTMLCell (189.6, 206, 13, 48, "", 1, 1, false,true,'C', true);
$pdf->SetFont('times', 'B', 12); 
$pdf->writeHTMLCell (189, 5, 13.3, 48.2, "Part A.I. Information About You", "B", 1, true,true,'L', true); 
//...........
$pdf->SetFont('times', '', 9);
$html ='<div><b>1. </b> Alien Registration Number(s) <i>(A-Number) (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 13, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_alien_registration_number', 68, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 59);
$pdf->writeHTMLCell (1, 10, 82, 55, "", "R", 1, false,true,'C', true);  //verticale line | .
//..............

$pdf->SetFont('times', '', 9);
$html ='<div><b>2. </b> U.S. Social Security Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 59, 54, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_us_social_security_number', 52, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 59);
$pdf->writeHTMLCell (1, 10, 135, 55, "", "R", 1, false,true,'C', true);  //verticale line | .

//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3. </b> USCIS Online Account Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 115, 54, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_uscis_online_account_number', 65, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 137, 59);

$pdf->writeHTMLCell (189.6, 1, 13, 65, "", "T", 1, false,true,'C', true);  // 1,2,3.end

//..................


$pdf->SetFont('times', '', 9);
$html ='<div><b>4. </b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 64, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_complete_lastname', 75, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 69);
$pdf->writeHTMLCell (1, 10, 89, 65, "", "R", 1, false,true,'C', true);  //verticale line | .
//..............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5. </b>  First Name </div>';
$pdf->writeHTMLCell(100, 4, 50, 64, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_first_name', 52, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 69);
$pdf->writeHTMLCell (1, 10, 141, 65, "", "R", 1, false,true,'C', true);  //verticale line | .

//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>6. </b> Middle Name</div>';
$pdf->writeHTMLCell(100, 4, 103, 64, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_middle_name', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 69);

$pdf->writeHTMLCell (189.6, 1, 13, 69, "", "B", 1, false,true,'C', true);  // 4,5,6 .end
//.......
$pdf->SetFont('times', '', 9);
$html ='<div><b>7. </b> What other names have you used <i>(include maiden name and aliases)?</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 74, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_other_name_used', 188, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 79);
$pdf->writeHTMLCell (189.6, 1, 13, 79, "", "B", 1, false,true,'C', true);  // 7 .end
//...........
$pdf->SetFont('times', '', 9);
$html ='<div><b>8. </b> Residence in the U.S. <i>(where you physically reside)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 84, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell (189.6, 1, 13, 85, "", "B", 1, false, true,'C', true);  // 7 horizontal line .end

//...........
$pdf->SetFont('times', '', 9);
$html ='<div> Street Number and Name </div>';
$pdf->writeHTMLCell(100, 4, 13, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_street_number_name', 130, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 94);
//..........
$pdf->SetFont('times', '', 9);
$html ='<div> Apt. Number </div>';
$pdf->writeHTMLCell(100, 4, 143, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_apt_number', 59, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 94);

$pdf->writeHTMLCell (1, 9, 142, 91, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 94, "", "B", 1, false, true,'C', true);  // 8 horizontal line .end
//...............

$pdf->SetFont('times', '', 9);
$html ='<div> City </div>';
$pdf->writeHTMLCell(100, 4, 13, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_city', 54, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 103);
//..........
$pdf->SetFont('times', '', 9);
$html ='<div> State </div>';
$pdf->writeHTMLCell(100, 4, 67, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_state', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 103);
//............
$pdf->SetFont('times', '', 9);
$html ='<div> Zip Code </div>';
$pdf->writeHTMLCell(100, 4, 117, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_zipcode', 30, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 103);
//.............

$pdf->SetFont('times', '', 9);
$html ='<div> Telephone Number <br> (  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  )</div>';
$pdf->writeHTMLCell(100, 4, 149, 99, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_residence_telephone_code', 10, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 103);
$pdf->TextField('a_i_residence_telephone_number', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 165, 103);
//............

$pdf->writeHTMLCell (1, 9, 67, 100, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (1, 9, 117, 100, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (1, 9, 149, 100, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 103, "", "B", 1, false, true,'C', true);  // 8 horizontal line .end
//...............


$pdf->SetFont('times', '', 9);
$html ='<div>(<b>NOTE:</b><i>You must be residing in the United States to submit this form.</i>)</div>';
$pdf->writeHTMLCell(120, 4, 13, 109, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell (189.6, 1, 13, 109, "", "B", 1, false, true,'C', true);  //9 horizontal line .end

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>9. </b>Mailing Address in the U.S. <i>(if different than the address in Item Number 8)</i></div>';
$pdf->writeHTMLCell(120, 4, 13, 115, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell (189.6, 1, 13, 115, "", "B", 1, false, true,'C', true);  //9 horizontal line .end
//...........

$pdf->SetFont('times', '', 9);
$html ='<div> In Care Of <i>(if applicable):</i> </div>';
$pdf->writeHTMLCell(100, 4, 13, 119, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_in_care_of', 130, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 124);
//.............
$pdf->SetFont('times', '', 9);
$html ='<div> Telephone Number <br> (  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  )</div>';
$pdf->writeHTMLCell(100, 4, 143, 120, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_telephone_code', 10, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 124);
$pdf->TextField('a_i_mailing_telephone_number', 44, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 124);
//............

$pdf->writeHTMLCell (1, 9, 142, 121, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 124, "", "B", 1, false, true,'C', true);  // 9 horizontal line .end
//...............

$pdf->SetFont('times', '', 9);
$html ='<div> Street Number and Name </div>';
$pdf->writeHTMLCell(100, 4, 13, 129, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_street_number_name', 129, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 133);
//..........
$pdf->SetFont('times', '', 9);
$html ='<div> Apt. Number </div>';
$pdf->writeHTMLCell(100, 4, 143, 129, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_apt_number', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 133);
$pdf->writeHTMLCell (1, 9, 142, 130, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 133, "", "B", 1, false, true,'C', true);  // 9 horizontal line .end
//...........

$pdf->SetFont('times', '', 9);
$html ='<div> City </div>';
$pdf->writeHTMLCell(100, 4, 13, 138, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_city', 67, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 142);
//..........
$pdf->SetFont('times', '', 9);
$html ='<div> State </div>';
$pdf->writeHTMLCell(100, 4, 80, 138, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_state', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 82, 142);
//............
$pdf->SetFont('times', '', 9);
$html ='<div> Zip Code </div>';
$pdf->writeHTMLCell(100, 4, 143, 138, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_mailing_zipcode', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 142);
//.............
$pdf->writeHTMLCell (1, 9, 142, 139, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (1, 9, 80, 139, "", "R", 1, false,true,'C', true);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 142, "", "B", 1, false, true,'C', true);  // 9 horizontal line .end

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.  </b> Gender:  <input type="checkbox" name="gender" value="male"/>    Male   <input type="checkbox" name="gender" value="female"/> Female </div>';
$pdf->writeHTMLCell(100, 4, 13, 147, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>11.  </b>  Marital Status:  <input type="checkbox" name="marital" value="single"/>    Single   <input type="checkbox" name="marital" value="married"/> Married    <input type="checkbox" name="divorced" value="divorced"/> Divorced    <input type="checkbox" name="widowed" value="widowed"/> Widowed</div>';
$pdf->writeHTMLCell(120, 4, 71, 147, $html, 0, 1, false, true, 'L', true);
//..........

$pdf->writeHTMLCell (1, 5, 70, 148, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 146, "", "B", 1, false, true,'C', true);  // 10 horizontal line .end

//..........


$pdf->SetFont('times', '', 9);
$html ='<div><b>12.  </b>  Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 151, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date_of_birth', 57, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 155);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div><b>13.  </b>  City and Country of Birth</div>';
$pdf->writeHTMLCell(120, 4, 71, 151, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_country_of_birth', 130, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 155);

$pdf->writeHTMLCell (1, 7, 70, 153, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 154, "", "B", 1, false, true,'C', true);  // 13 horizontal line .end
//..........

$pdf->SetFont('times', '', 9);
$html ='<div><b>14.  </b>  Present Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 159, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_present_nationality', 57, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 163);
//........
$pdf->SetFont('times', '', 9);
$html ='<div><b>15.  </b> Nationality at Birth</div>';
$pdf->writeHTMLCell(120, 4, 71, 159, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_nationality_at_birth', 47, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 163);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>16.  </b>  Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(120, 4, 120, 159, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_race_ethnic_tribal', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 163);
//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>17.  </b> Religion </div>';
$pdf->writeHTMLCell(100, 4, 170, 159, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_religion', 31, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 163);

$pdf->writeHTMLCell (1, 8, 70, 160, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (1, 8, 119, 160, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (1, 8, 169, 160, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (189.6, 1, 13, 162, "", "B", 1, false, true,'C', true);  // 17 horizontal line .end
//..........

$pdf->SetFont('times', '', 9);
$html ='<div><b>18. </b><i> Check the box, a through c, that applies:</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 167, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 9);
$html ='<div><b>a. </b> <input type="checkbox" name="never_been" value="a"/> I have never been in Immigration Court proceedings.</div>';
$pdf->writeHTMLCell(100, 4, 71, 167, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 9);
$html ='<div><b>b. </b> <input type="checkbox" name="iam_now" value="a"/> I am now in Immigration Court proceedings. </div>';
$pdf->writeHTMLCell(100, 4, 17, 170, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>c. </b> <input type="checkbox" name="iam_not_now" value="a"/> I am not now in Immigration Court proceedings, but I have been in the past.</div>';
$pdf->writeHTMLCell(120, 4, 87, 170, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell (189.6, 1, 13, 170, "", "B", 1, false, true,'C', true);  // 18 horizontal line .end
//..........

$pdf->SetFont('times', '', 9);
$html ='<div><b>19. </b><i> Complete 19 a through c. </i></div>';
$pdf->writeHTMLCell(100, 4, 13, 175, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 9);
$html ='<div><b>a. </b> When did you last leave your country? <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(100, 4, 17, 178, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_last_leave_country', 20, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 177);
$pdf->writeHTMLCell (20, 1, 90, 177, "", "B", 1, false, true,'C', true);  // 17 horizontal line .end
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>b. </b> What is your current I-94 Number, if any?</div>';
$pdf->writeHTMLCell(100, 4, 115, 178, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_current_i-94_number', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 175, 177);
$pdf->writeHTMLCell (25, 1, 175, 177, "", "B", 1, false, true,'C', true);  // 17 horizontal line .end
//...........

$pdf->SetFont('times', '', 9);
$html ='<div><b>c. </b>List each entry into the U.S. beginning with your most recent entry.<i> List date (mm/dd/yyyy), place, and your status for each entry. (Attach additional sheets as needed.)</i> </div>';
$pdf->writeHTMLCell(170, 4, 18, 182, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Date</div>';
$pdf->writeHTMLCell(100, 4, 18, 191, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date1', 25, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 192);
$pdf->writeHTMLCell (25, 1, 26, 191, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Date</div>';
$pdf->writeHTMLCell(100, 4, 18, 198, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date2', 25, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 199);
$pdf->writeHTMLCell (25, 1, 26, 198, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end
//...........

$pdf->SetFont('times', '', 9);
$html ='<div>Date</div>';
$pdf->writeHTMLCell(100, 4, 18, 205, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date3', 25, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 206);
$pdf->writeHTMLCell (25, 1, 26, 205, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end
//..............................

$pdf->SetFont('times', '', 9);
$html ='<div>Place</div>';
$pdf->writeHTMLCell(100, 4, 53, 191, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_place1', 40, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 192);
$pdf->writeHTMLCell (40, 1, 62, 191, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end

//.....................

$pdf->SetFont('times', '', 9);
$html ='<div>Place</div>';
$pdf->writeHTMLCell(100, 4, 53, 198, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_place2', 40, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 199);
$pdf->writeHTMLCell (40, 1, 62, 198, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end
//..............

$pdf->SetFont('times', '', 9);
$html ='<div>Place</div>';
$pdf->writeHTMLCell(100, 4, 53, 205, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_place3', 40, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 206);
$pdf->writeHTMLCell (40, 1, 62, 205, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end

//..........................................................

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Status</div>';
$pdf->writeHTMLCell(100, 4, 105, 191, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_status1', 25, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115, 192);
$pdf->writeHTMLCell (25, 1, 115, 191, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Status</div>';
$pdf->writeHTMLCell(100, 4, 105, 198, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_status2', 25, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115, 199);
$pdf->writeHTMLCell (25, 1, 115, 198, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end
//...........

$pdf->SetFont('times', '', 9);
$html ='<div>Status</div>';
$pdf->writeHTMLCell(100, 4, 105, 205, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_status3', 25, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115, 206);
$pdf->writeHTMLCell (25, 1, 115, 205, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end

//...........................
$pdf->SetFont('times', '', 9);
$html ='<div>Date Status Expired</div>';
$pdf->writeHTMLCell(100, 4, 142, 191, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_date_status_expired', 30, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 192);
$pdf->writeHTMLCell (30, 1, 170, 191, "", "B", 1, false, true,'C', true);  // 19 horizontal line .end
//........
$pdf->writeHTMLCell (189.6, 1, 13, 206, "", "B", 1, false,true,'C', true);
//.........


$pdf->SetFont('times', '', 9);
$html ='<div><b>20. </b> What country issued your last passport or travel<br> &nbsp; &nbsp; &nbsp;
document?</div>';
$pdf->writeHTMLCell(80, 4, 13, 211, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_country_issued', 70, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 219);
//........

$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> Passport Number</div>';
$pdf->writeHTMLCell(80, 4, 85, 211, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_passport_number', 53, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115, 212);
//........


$pdf->SetFont('times', '', 9);
$html ='<div>Travel Document Number</div>';
$pdf->writeHTMLCell(80, 4, 85, 218, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_travel_document_number', 46, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 219);
//........
$pdf->SetFont('times', '', 9);
$html ='<div><b>22. </b> Expiration Date <br>  &nbsp; &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 4, 170, 211, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_expiration_date', 32, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 219);
//........
$pdf->writeHTMLCell (189.6, 1, 13, 218, "", "B", 1, false,true,'C', true); // horizontal line 

$pdf->writeHTMLCell (1, 12, 83, 212, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (1, 12, 168, 212, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (85, 1, 84, 212, "", "B", 1, false,true,'C', true); // horizontal line 2

//.................

$pdf->SetFont('times', '', 9);
$html ='<div><b>23. </b> What is your native language <i>(include dialect, if applicable)?</i></div>';
$pdf->writeHTMLCell(110, 4, 13, 223, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_is_your_native_language', 85, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 228);
//........

$pdf->SetFont('times', '', 9);
$html ='<div><b>24. </b>Are you fluent in English? <br>  &nbsp; &nbsp; &nbsp;  <input type="checkbox" name="fluent_english" value="Y"/>  Yes    &nbsp;   <input type="checkbox" name="fluent_english" value="N"/>   No   </div>';
$pdf->writeHTMLCell(100, 4, 99, 223, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>25.</b>What other languages do you speak fluently?</div>';
$pdf->writeHTMLCell(100, 4, 140, 223, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_i_what_other_language_speak_fluently', 62, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 228);
//............
$pdf->writeHTMLCell (189.6, 1, 13, 228, "", "B", 1, false,true,'C', true); // horizontal line 
$pdf->writeHTMLCell (1, 10, 98, 224, "", "R", 1, false,true,'C', false);  //verticale line | .
$pdf->writeHTMLCell (1, 10, 139, 224, "", "R", 1, false,true,'C', false);  //verticale line | .
//..................

$pdf->SetFont('times', '', 9);
$html ='<div><b>For EOIR use only.</b></div>';
$pdf->writeHTMLCell(60, 5, 30, 233, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div><b>For USCIS use only.</b></div>';
$pdf->writeHTMLCell(15, 7, 70, 233, $html, 0, 1, false, true, 'C', true);

$html ='<div><b>Action:</b></div>';
$pdf->writeHTMLCell(50, 7, 70, 233, $html, 0, 1, false, true, 'C', true);

$html ='<div><b>Decision:</b></div>';
$pdf->writeHTMLCell(50, 7, 130, 233, $html, 0, 1, false, true, 'C', true);

//.............
$html ='<div>Interview Date: _____________________</div>';
$pdf->writeHTMLCell(100, 7, 90, 237, $html, 0, 1, false, true, 'L', true);

$html ='<div>Approval Date: ____________________</div>';
$pdf->writeHTMLCell(100, 7, 148, 237, $html, 0, 1, false, true, 'L', true);

$html ='<div>Asylum Officer ID No.: ______________</div>';
$pdf->writeHTMLCell(100, 7, 90, 243, $html, 0, 1, false, true, 'L', true);

$html ='<div>Denial Date: ______________________</div>';
$pdf->writeHTMLCell(100, 7, 148, 241, $html, 0, 1, false, true, 'L', true);

$html ='<div>Referral Date: _____________________</div>';
$pdf->writeHTMLCell(100, 7, 148, 245, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell (1, 20, 68, 234, "", "R", 1, false,true,'C', false);  //verticale line | .

//.................. page number 1 end -----------------------------------------------------------------------------


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
$pdf->SetFont('times', 'B', 12); 
$pdf->writeHTMLCell (191, 5, 13, 17, "Part A.II. Information About Your Spouse and Children", 1, 1, true,true,'L', true); 

$pdf->SetFont('times', '', 9);
$html ='<div><b>Your spouse</b></div>';
$pdf->writeHTMLCell(60, 5, 12, 24, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div> <input type="checkbox" name="not_married" value="N"/>     I am not married. (Skip to <b>Your Children</b> below.)</div>';
$pdf->writeHTMLCell(100, 5, 60, 24, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 92, 13, 30, "", 1, 1, false, false, 'L', true); //table 1 start 
//..........//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 29, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_alien_registration_number', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 37);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 29, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_passport_idcard_number', 37, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 37);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 29, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_of_birth', 40, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 37);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 29, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_social_security_number', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 37);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 41, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_complete_last_name', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 49);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 41, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_firstname', 37, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 49);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 41, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_middlename', 40, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 49);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8.</b>  Other names used <i>(include <br> &nbsp; &nbsp; maiden name and aliases) </i></div>';
$pdf->writeHTMLCell(100, 4, 150, 41, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_other_name_used_include_maiden', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 49);

//............
$pdf->writeHTMLCell(190, 1, 13, 31, "", "B", 1, false, false, 'L', true);
$pdf->writeHTMLCell(1, 33, 68, 30, "", "R", 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 24, 107, 30, "", "R", 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 24, 148, 30, "", "R", 1, false, true, 'L', true);
//.............
$pdf->writeHTMLCell(190, 1, 13, 48, "", "B", 1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>9.</b> Date of Marriage <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_of_marriage', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 58);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10.</b> Place of Marriage</div>';
$pdf->writeHTMLCell(100, 4, 70, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_place_of_mariage', 50, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 58);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>11.</b> City and Country of Birth </div>';
$pdf->writeHTMLCell(100, 4, 120, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_city_country_birth', 82, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 58);
//............

$pdf->writeHTMLCell(1, 9, 120, 54, "", "R", 1, false, true, 'L', true);
//.............
$pdf->writeHTMLCell(190, 1, 13, 57, "", "B", 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html ='<div><b>12.</b>  Nationality  <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_nationality_citizenship', 65, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 67);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>13. </b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 78, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_race_ethnic_tribal_group', 65, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 78, 67);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>14. </b> Gender <br>  &nbsp;  &nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="gender2" value="m"/>  &nbsp; Male  &nbsp; <input type="checkbox" name="gender2" value="f"/>  &nbsp;  Female</div>';
$pdf->writeHTMLCell(100, 4, 145, 62, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 9, 77, 63, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 9, 143, 63, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(190, 1, 13, 67, "", "B", 1, false, true, 'L', true);

//.............
$pdf->SetFont('times', '', 9);
$html ='<div><b>15.</b>  Is this person in the U.S.?  <br>  &nbsp;  &nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="person_us" value="y"/>  Yes <b>(Complete Blocks 16 to 24.) </b>  &nbsp; &nbsp; <input type="checkbox" name="person_us" value="n"/>   No (Specify location) :</div>';
$pdf->writeHTMLCell(100, 4, 13, 72, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_nationality_citizenship', 93, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 110, 76);

$pdf->writeHTMLCell(190, 1, 13, 76, "", "B", 1, false, true, 'L', true);
//............


//..........//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>16.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 81, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_place_of_last_entry_us', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 89);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>17.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 81, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_last_entry_us', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 89);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>18.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 81, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_I94number_ifany', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 109, 89);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>19.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 81, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_status_when_last_admited', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 89);
//............

$pdf->writeHTMLCell(1, 12, 58, 82, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 24, 107, 82, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 24, 150, 82, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(190, 1, 13, 88, "", "B", 1, false, true, 'L', true);
//..........//............


$pdf->SetFont('times', '', 9);
$html ='<div><b>20.</b> What is your spouse\'s<br> &nbsp; &nbsp; &nbsp;
current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_what_is_your_spouse_current_status', 40, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 101);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>21.</b> What is the expiration date of his/her <br>&nbsp;&nbsp;&nbsp;
authorized stay, if any? (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 53, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_authorization_expiration_date', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 101);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>22.</b>Is your spouse in Immigration<br> &nbsp; &nbsp;
Court proceedings? <br> &nbsp; &nbsp;  <input type="checkbox" name="spouse" value="y"/>  Yes &nbsp; &nbsp; <input type="checkbox" name="spouse" value="n"/> No   </div>';
$pdf->writeHTMLCell(100, 4, 107, 93, $html, 0, 1, false, true, 'L', true);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>23.</b> If previously in the U.S., date of<br>&nbsp; &nbsp; 
previous arrival <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 151, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_date_of_priviews_arrival', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 101);
//............
$pdf->writeHTMLCell(1, 12, 52, 94, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(190, 1, 13, 100, "", "B", 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div><b>24.</b> If in the U.S., is your spouse to be included in this application? (Check the appropriate box.) </div>';
$pdf->writeHTMLCell(180, 4, 13, 105, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div><input type="checkbox" name="include" value="y"/>  Yes <i>(Attach one photograph of your spouse in the upper right corner of Page 9 on the extra copy of the application submitted for this person.)</i><br><br><input type="checkbox" name="include" value="n"/>   No  </div>';
$pdf->writeHTMLCell(190, 5, 15, 110, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(190, 1, 13, 100, "", "B", 1, false, true, 'L', true); // table end --------------------





//...........
$pdf->SetFont('times', '', 9);
$html ='<div><b>Your Children</b>. List <b>all</b> of your children, regardless of age, location, or marital status. </div>';
$pdf->writeHTMLCell(180, 4, 13, 122, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div><input type="checkbox" name="children" value="y"/>  I do not have any children.  <i>(Skip to <b>Part A.III., Information about your background.)</b></i>
<br><input type="checkbox" name="children" value="n"/>  I have children. &nbsp;  &nbsp;  &nbsp;   Total number of children:  ____________</div>';
$pdf->writeHTMLCell(190, 5, 15, 127, $html, 0, 1, false, true, 'L', true);

//...........
$pdf->SetFont('times', '', 9);
$html ='<div> <b>(NOTE:</b> <i>Use Form I-589 Supplement A or attach additional sheets of paper and documentation if you have more than four children.)</i></div>';
$pdf->writeHTMLCell(180, 4, 13, 136, $html, 0, 1, false, true, 'L', true);
//.........



$pdf->writeHTMLCell(190, 88, 13, 145, "", 1, 1, false, false, 'L', true); //table 2 start 
//..........//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 144, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_alien_registration_number', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 152);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 144, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_passport_idcard_number', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 152);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 144, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_marital_status', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 152);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 144, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_social_security_number', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 152);
//............

$pdf->writeHTMLCell(1, 33, 69, 145, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 33, 107, 145, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 33, 153, 145, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 152, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_complete_last_name', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 162);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_firstname', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 162);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_middlename', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 162);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_date_of_birth', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 162);

$pdf->writeHTMLCell(190, 1, 13, 162, "", "B", 1, false, true, 'L', true);// horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 167, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_city_country_birth', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 172);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 167, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_nationality_citizenship', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 172);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 167, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_race_ethnic_tribal_group', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 172);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child_gender" value="m"/>  Male  &nbsp;  <input type="checkbox" name="child_gender" value="f"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 167, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 173, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child_us" value="y"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child_us" value="n"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 179, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_is_this_us', 68, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 180);
//............
$pdf->writeHTMLCell(190, 1, 13, 180, "", "B", 1, false, true, 'L', true);// horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 185, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_place_of_last_entry_us', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 193);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 185, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_date_last_entry_us', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 193);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 185, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_I94number_ifany', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 109, 193);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 185, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_status_when_last_admited', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 193);
//............
$pdf->writeHTMLCell(1, 12, 58, 186, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 186, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 186, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 192, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 197, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_current_status', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 205);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 197, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child_what_is_expiration_date', 58, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 205);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>20. </b> Is your child in Immigration Court proceedings? <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding" value="y"/>  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding" value="n"/> No</div>';
$pdf->writeHTMLCell(180, 4, 130, 197, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 12, 68, 198, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 198, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 205, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br><br> &nbsp; &nbsp; &nbsp;<input type="checkbox" name="inc_application" value="y"/>   Yes   <i>(Attach one photograph of your child in the upper right corner of Page 9 on the extra copy of the application submitted for this person.)</i> <br><br> &nbsp; &nbsp; &nbsp;<input type="checkbox" name="inc_application" value="n"/>   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 210, $html, 0, 1, false, true, 'L', true);
//............table 2 end 

//..........page number 2 end -----------------------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part A.II. Information About Your Spouse and Children</b> (continued)</div>';
$pdf->writeHTMLCell (190, 5, 13, 15, $html3, 1, 1, true,true,'L', true); 

$pdf->writeHTMLCell(190, 78, 13, 22, "", 1, 1, false, false, 'L', true); // page 3 table 1 start ---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_alien_registration_number', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 29);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_passport_idcard_number', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 29);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_marital_status', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 29);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 21, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_social_security_number', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 29);
//............

$pdf->writeHTMLCell(1, 33, 69, 22, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 33, 107, 22, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 33, 153, 22, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 29, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_complete_last_name', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 39);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_firstname', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 39);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_middlename', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 39);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 34, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_date_of_birth', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 39);

$pdf->writeHTMLCell(190, 1, 13, 39, "", "B", 1, false, true, 'L', true);// horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_city_country_birth', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 49);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_nationality_citizenship', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 49);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_race_ethnic_tribal_group', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 49);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child2_gender" value="m"/>  Male  &nbsp;  <input type="checkbox" name="child2_gender" value="f"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 44, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 50, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child_us" value="y"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child_us" value="n"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_is_this_us', 68, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 57);
//............
$pdf->writeHTMLCell(190, 1, 13, 57, "", "B", 1, false, true, 'L', true);// horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_place_of_last_entry_us', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 70);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_date_last_entry_us', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 70);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_I94number_ifany', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 109, 70);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 62, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_status_when_last_admited', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 70);
//............
$pdf->writeHTMLCell(1, 12, 58, 63, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 63, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 63, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 69, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 74, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_current_status', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 82);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 74, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_what_is_expiration_date', 58, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 82);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>20. </b> Is your child in Immigration Court proceedings? <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding" value="y"/>  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding" value="n"/> No</div>';
$pdf->writeHTMLCell(180, 4, 130, 74, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 12, 68, 75, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 75, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 82, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application" value="y"/>   Yes   <i>(Attach one photograph of your spouse in the upper right corner of Page 9 on the extra copy of the application submitted for this person.)</i> <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application" value="n"/>   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 87, $html, 0, 1, false, true, 'L', true);

//............page 3 table 1 end ------------------------------------------------------------------

$pdf->writeHTMLCell(190, 78, 13, 100, "", 1, 1, false, false, 'L', true); // page 3 table 2 start ---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_alien_registration_number', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 107);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_passport_idcard_number', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 107);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_marital_status', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 107);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 99, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_social_security_number', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 107);
//............

$pdf->writeHTMLCell(1, 33, 69, 100, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 33, 107, 100, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 33, 153, 100, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 107, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_complete_last_name', 57, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 117);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_firstname', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 117);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_middlename', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 117);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 112, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_date_of_birth', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 117);

$pdf->writeHTMLCell(190, 1, 13, 117, "", "B", 1, false, true, 'L', true);// horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_city_country_birth', 56, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 127);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_nationality_citizenship', 37, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 127);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 122, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_race_ethnic_tribal_group', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 127);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child2_gender" value="m"/>  Male  &nbsp;  <input type="checkbox" name="child2_gender" value="f"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 122, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 128, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child_us" value="y"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child_us" value="n"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 134, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_is_this_us', 68, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 135);
//............
$pdf->writeHTMLCell(190, 1, 13, 135, "", "B", 1, false, true, 'L', true);// horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_place_of_last_entry_us', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 148);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_date_last_entry_us', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 148);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_I94number_ifany', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 109, 148);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_status_when_last_admited', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 148);
//............
$pdf->writeHTMLCell(1, 12, 58, 141, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 141, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 141, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 147, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 152, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_current_status', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 160);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 152, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child2_what_is_expiration_date', 58, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 160);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>20. </b> Is your child in Immigration Court proceedings? <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding" value="y"/>  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding" value="n"/> No</div>';
$pdf->writeHTMLCell(180, 4, 130, 152, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 12, 68, 153, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 153, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 160, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application" value="y"/>   Yes   <i>(Attach one photograph of your spouse in the upper right corner of Page 9 on the extra copy of the application submitted for this person.)</i> <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl_application" value="n"/>   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 165, $html, 0, 1, false, true, 'L', true);

//............page 3 table 2 end ----------------------------------

$pdf->writeHTMLCell(190, 76, 13, 178, "", 1, 1, false, false, 'L', true); // page 3 table 3 start ---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>1.</b> Alien Registration Number (A-Number)<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 13, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_alien_registration_number', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 14, 185);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>2.</b> Passport/ID Card Number<br>
   <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_passport_idcard_number', 37, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 185);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3.</b>Marital Status <i>(Married, Single,<br> &nbsp; &nbsp; Divorced, Widowed )</i></div>';
$pdf->writeHTMLCell(100, 4, 108, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_marital_status', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 185);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>4.</b> U.S. Social Security Number<br> &nbsp; &nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 177, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_social_security_number', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 185);
//............

$pdf->writeHTMLCell(1, 30, 69, 178, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 30, 107, 178, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 30, 153, 178, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 184, "", "B", 1, false, true, 'L', true); // horizontal line ----

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5.</b> Complete Last Name</div>';
$pdf->writeHTMLCell(100, 4, 13, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_complete_last_name', 57, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 194);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6.</b> First Name</div>';
$pdf->writeHTMLCell(100, 4, 70, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_firstname', 37, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 194);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>7.</b> Middle Name </div>';
$pdf->writeHTMLCell(100, 4, 108, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_middlename', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 194);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8.</b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 155, 189, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_date_of_birth', 47, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 194);

$pdf->writeHTMLCell(190, 1, 13, 193, "", "B", 1, false, true, 'L', true);// horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>9.</b> City and Country of Birth</div>';
$pdf->writeHTMLCell(100, 4, 13, 198, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_city_country_birth', 56, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 203);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10.</b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 198, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_nationality_citizenship', 37, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 203);
//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>11.</b> Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(100, 4, 108, 198, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_race_ethnic_tribal_group', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 108, 203);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>12.</b> Gender   <br> &nbsp; &nbsp; <input type="checkbox" name="child3_gender" value="m"/>  Male  &nbsp;  <input type="checkbox" name="child3_gender" value="f"/>  Female </div>';
$pdf->writeHTMLCell(100, 4, 155, 198, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(190, 1, 13, 203, "", "B", 1, false, true, 'L', true); // horizontal line---

//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>13.</b> Is this child in the U.S. ?  &nbsp; &nbsp; <input type="checkbox" name="child3_us" value="y"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  &nbsp;  &nbsp;  <input type="checkbox" name="child3_us" value="n"/> No <i>(Specify location):</i> </div>';
$pdf->writeHTMLCell(180, 4, 13, 208, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_is_this_us', 68, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 209);
//............
$pdf->writeHTMLCell(190, 1, 13, 208, "", "B", 1, false, true, 'L', true);// horizontal line -----

//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>14.</b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(100, 4, 13, 213, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_place_of_last_entry_us', 45, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 221);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>15.</b> Date of last entry into the <br>   &nbsp;  &nbsp;   U.S. (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 4, 60, 213, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_date_last_entry_us', 48, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 221);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>16.</b> I-94 Number <i> (if any) </i></div>';
$pdf->writeHTMLCell(100, 4, 108, 213, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_I94number_ifany', 41, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 109, 221);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>17.</b> Status when last admitted 
<br> &nbsp; &nbsp; <i>(Visa type, if any)</i></div>';
$pdf->writeHTMLCell(100, 4, 150, 213, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_status_when_last_admited', 52, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 221);
//............
$pdf->writeHTMLCell(1, 12, 58, 214, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 107, 214, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(1, 12, 149, 214, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 220, "", "B", 1, false, true, 'L', true); // horizontal line---
//......................
$pdf->SetFont('times', '', 9);
$html ='<div><b>18.</b> What is your child\'s current status?</div>';
$pdf->writeHTMLCell(100, 4, 13, 225, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_current_status', 55, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 233);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>19.</b> What is the expiration date of his/her <br> &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(100, 4, 70, 225, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_ii_child3_what_is_expiration_date', 58, 5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 233);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>20. </b> Is your child in Immigration Court proceedings? <br> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="proceding3" value="y"/>  Yes  &nbsp;  &nbsp;  <input type="checkbox" name="proceding3" value="n"/> No</div>';
$pdf->writeHTMLCell(180, 4, 130, 225, $html, 0, 1, false, true, 'L', true);
//............

$pdf->writeHTMLCell(1, 12, 68, 226, "", "R", 1, false, true, 'L', true); //vertical line 
$pdf->writeHTMLCell(1, 12, 127, 226, "", "R", 1, false, true, 'L', true); //vertical line
$pdf->writeHTMLCell(190, 1, 13, 233, "", "B", 1, false, true, 'L', true); // horizontal line---

$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i>
 <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl3_application" value="y"/>   Yes   <i>(Attach one photograph of your spouse in the upper right corner of Page 9 on the extra copy of the application submitted for this person.)</i> <br>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="incl3_application" value="n"/>   No </div>';
$pdf->writeHTMLCell(190, 7, 13, 240, $html, 0, 1, false, true, 'L', true);

//............page 3 table 3 end ----------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part A.III. Information About Your Background</b></div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 

$pdf->SetFont('times', '', 9);
$html ='<div><b>1. </b>List your last address where you lived before coming to the United States. If this is not the country where you fear persecution, also list the last<br>&nbsp; &nbsp; 
address in the country where you fear persecution. <i>(List Address, City/Town, Department, Province, or State and Country.)</i><br>&nbsp;&nbsp; 
(<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.)</i></div>';
$pdf->writeHTMLCell(190, 7, 13, 23, $html, 0, 1, false, true, 'L', true);

//.............table 1 start ..............

$pdf->writeHTMLCell(190, 23, 13, 36, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html ='<div>  Number and Street<br>
<i>(Provide if available)</i></div>';
$pdf->writeHTMLCell(80, 5, 18, 35, $html, 0, 1, false, true, 'L', true);
//......
$html ='<div>City/Town</div>';
$pdf->writeHTMLCell(80, 5, 57, 37, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Department, Province, or State</div>';
$pdf->writeHTMLCell(80, 5, 84, 37, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Country</div>';
$pdf->writeHTMLCell(80, 5, 137, 37, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Dates</div>';
$pdf->writeHTMLCell(80, 5, 175, 35, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 158, 38, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 38, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 38 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 46 , "", "B", 1, false, true, 'C', true);// horizontal line ..
//.......

$pdf->writeHTMLCell(1, 23, 50, 36 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 23, 79, 36 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 23, 130, 36 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 23, 155, 36 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 15.5, 178, 43.5 , "", "R", 1, false, true, 'C', true);// verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_live_address_number_and_street1', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 44);
$pdf->TextField('a_iii_live_address_number_and_street2', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 52);
//.........
$pdf->TextField('a_iii_live_address_city_town1', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 44);
$pdf->TextField('a_iii_live_address_city_town2', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 52);
//.........
$pdf->TextField('a_iii_live_address_dept_province_state1', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 44);
$pdf->TextField('a_iii_live_address_dept_province_state2', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 52);
//.........
$pdf->TextField('a_iii_live_address_country1', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 44);
$pdf->TextField('a_iii_live_address_country2', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 52);
//.........

$pdf->TextField('a_iii_live_address_date_from1', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 44);
$pdf->TextField('a_iii_live_address_date_from2', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 52);
//.........
$pdf->TextField('a_iii_live_address_date_to1', 24, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 44);
$pdf->TextField('a_iii_live_address_date_to2', 24, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 52);
//.........page 4 table 1 end -----------------------------------------------------------

$pdf->SetFont('times', '', 9);
$html ='<div><b>2. </b> Provide the following information about your residences during the past 5 years. List your present address first.<br> &nbsp; &nbsp; &nbsp;(<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 60, $html, 0, 1, false, true, 'L', true);

//........table 2 start .....................

$pdf->writeHTMLCell(190, 42, 13, 69, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html ='<div>  Number and Street</div>';
$pdf->writeHTMLCell(80, 5, 18, 70, $html, 0, 1, false, true, 'L', true);
//......
$html ='<div>City/Town</div>';
$pdf->writeHTMLCell(80, 5, 57, 70, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Department, Province, or State</div>';
$pdf->writeHTMLCell(80, 5, 84, 70, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Country</div>';
$pdf->writeHTMLCell(80, 5, 137, 70, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Dates</div>';
$pdf->writeHTMLCell(80, 5, 175, 68, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 158, 71, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 71, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 71 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 78 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 85 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 92 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 99 , "", "B", 1, false, true, 'C', true);// horizontal line ..
//.......
$pdf->writeHTMLCell(1, 42, 50, 69 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 42, 79, 69 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 42, 130, 69 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 42, 155, 69 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 34.5, 178, 76.5 , "", "R", 1, false, true, 'C', true);// verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_residence_address_number_and_street1', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 77);
$pdf->TextField('a_iii_residence_address_number_and_street2', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 84);
$pdf->TextField('a_iii_residence_address_number_and_street3', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 91);
$pdf->TextField('a_iii_residence_address_number_and_street4', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 98);
$pdf->TextField('a_iii_residence_address_number_and_street5', 38, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 105);

//.........
$pdf->TextField('a_iii_residence_address_city_town1', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 77);
$pdf->TextField('a_iii_residence_address_city_town2', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 84);
$pdf->TextField('a_iii_residence_address_city_town3', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 91);
$pdf->TextField('a_iii_residence_address_city_town4', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 98);
$pdf->TextField('a_iii_residence_address_city_town5', 29, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 51, 105);
//.........
$pdf->TextField('a_iii_residence_address_dept_province_state1', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 77);
$pdf->TextField('a_iii_residence_address_dept_province_state2', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 84);
$pdf->TextField('a_iii_residence_address_dept_province_state3', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 91);
$pdf->TextField('a_iii_residence_address_dept_province_state4', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 98);
$pdf->TextField('a_iii_residence_address_dept_province_state5', 51, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 105);
//.........
$pdf->TextField('a_iii_residence_address_country1', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 77);
$pdf->TextField('a_iii_residence_address_country2', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 84);
$pdf->TextField('a_iii_residence_address_country3', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 91);
$pdf->TextField('a_iii_residence_address_country4', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 98);
$pdf->TextField('a_iii_residence_address_country5', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 131, 105);
//.........

$pdf->TextField('a_iii_residence_address_date_from1', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 77);
$pdf->TextField('a_iii_residence_address_date_from2', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 84);
$pdf->TextField('a_iii_residence_address_date_from3', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 91);
$pdf->TextField('a_iii_residence_address_date_from4', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 98);
$pdf->TextField('a_iii_residence_address_date_from5', 23, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 105);
//.........
$pdf->TextField('a_iii_residence_address_date_to1', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 77);
$pdf->TextField('a_iii_residence_address_date_to2', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 84);
$pdf->TextField('a_iii_residence_address_date_to3', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 91);
$pdf->TextField('a_iii_residence_address_date_to4', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 98);
$pdf->TextField('a_iii_residence_address_date_to5', 24, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 105);
//.........page 4 table 2 ends ----------------------------

$pdf->SetFont('times', '', 9);
$html ='<div><b>3. </b>Provide the following information about your education, beginning with the most recent school that you attended. 
<br> &nbsp;&nbsp; &nbsp; (<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 112, $html, 0, 1, false, true, 'L', true);


//.....page 4 table 3 start ........................

$pdf->writeHTMLCell(190, 35, 13, 121, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Name  of  School</div>';
$pdf->writeHTMLCell(80, 5, 25, 122, $html, 0, 1, false, true, 'L', true);
//......
$html ='<div>Type of School</div>';
$pdf->writeHTMLCell(80, 5, 70, 122, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Location <i>(Address)</i></div>';
$pdf->writeHTMLCell(80, 5, 115, 122, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Attended</div>';
$pdf->writeHTMLCell(80, 5, 170, 120, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 154, 123, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 123, $html, 0, 1, false, true, 'L', true);
//.......
//.......
$pdf->writeHTMLCell(190, 1, 13, 123 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 130 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 137 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 144 , "", "B", 1, false, true, 'C', true);// horizontal line ..
//.......
$pdf->writeHTMLCell(1, 35, 55, 121 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 35, 103, 121 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 35, 150, 121 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 27, 177, 129 , "", "R", 1, false, true, 'C', true);// verticle line ..
//..........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_name_of_school1', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 129);
$pdf->TextField('a_iii_education_name_of_school2', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 136);
$pdf->TextField('a_iii_education_name_of_school3', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 143);
$pdf->TextField('a_iii_education_name_of_school4', 43, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 150);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_type_of_school1', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 129);
$pdf->TextField('a_iii_education_type_of_school2', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 136);
$pdf->TextField('a_iii_education_type_of_school3', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 143);
$pdf->TextField('a_iii_education_type_of_school4', 48, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 150);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_location_address1', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 104, 129);
$pdf->TextField('a_iii_education_location_address2', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 104, 136);
$pdf->TextField('a_iii_education_location_address3', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 104, 143);
$pdf->TextField('a_iii_education_location_address4', 47, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 104, 150);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_attend_from1', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 129);
$pdf->TextField('a_iii_education_attend_from2', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 136);
$pdf->TextField('a_iii_education_attend_from3', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 143);
$pdf->TextField('a_iii_education_attend_from4', 27, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 151, 150);
//.........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_education_attend_to1', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178, 129);
$pdf->TextField('a_iii_education_attend_to2', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178, 136);
$pdf->TextField('a_iii_education_attend_to3', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178, 143);
$pdf->TextField('a_iii_education_attend_to4', 25, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178, 150);
//......... page 4 table 3 end -------------------------------------------------------------------------------------------------


$pdf->SetFont('times', '', 9);
$html ='<div><b>4. </b> Provide the following information about your employment during the past 5 years. List your present employment first.<br>&nbsp;&nbsp;&nbsp; (<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)
</div>';
$pdf->writeHTMLCell(190, 7, 13, 158, $html, 0, 1, false, true, 'L', true);



//.......page 4 table 4............. 

$pdf->writeHTMLCell(190, 27, 13, 167, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Name and Address of  Employer</div>';
$pdf->writeHTMLCell(80, 5, 32, 167, $html, 0, 1, false, true, 'L', true);
//......
$html ='<div>Your Occupation</div>';
$pdf->writeHTMLCell(80, 5, 105, 167, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Dates</div>';
$pdf->writeHTMLCell(80, 5, 172, 166, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>From <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 154, 169, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>To <i>(Mo/Yr)</i></div>';
$pdf->writeHTMLCell(80, 5, 182, 169, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 168 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 175 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 182 , "", "B", 1, false, true, 'C', true);// horizontal line ..
//........
$pdf->writeHTMLCell(1, 27, 90, 167 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 27, 148, 167 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 20, 176, 174 , "", "R", 1, false, true, 'C', true);// verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_name_and_address_employer1', 78, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 174);
$pdf->TextField('a_iii_name_and_address_employer2', 78, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 181);
$pdf->TextField('a_iii_name_and_address_employer3', 78, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 188);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_your_employment_occupation1', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 174);
$pdf->TextField('a_iii_your_employment_occupation2', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 181);
$pdf->TextField('a_iii_your_employment_occupation3', 58, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 188);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_your_employment_date_from1', 28, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 149, 174);
$pdf->TextField('a_iii_your_employment_date_from2', 28, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 149, 181);
$pdf->TextField('a_iii_your_employment_date_from3', 28, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 149, 188);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_your_employment_date_to1', 26, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 177, 174);
$pdf->TextField('a_iii_your_employment_date_to2', 26, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 177, 181);
$pdf->TextField('a_iii_your_employment_date_to3', 26, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 177, 188);

//............page 4 table 4 end -------------------------------------------------------------------

$pdf->SetFont('times', '', 9);
$html ='<div><b>5. </b>Provide the following information about your parents and siblings (brothers and sisters). Check the box if the person is deceased.<br> &nbsp;&nbsp;&nbsp; (<b>NOTE:</b><i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 195, $html, 0, 1, false, true, 'L', true);


//.......page 4 table 5.............

$pdf->writeHTMLCell(190, 48, 13, 204, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Full Name</div>';
$pdf->writeHTMLCell(80, 5, 35, 204, $html, 0, 1, false, true, 'L', true);
//......
$html ='<div>City/Town and Country of Birth</div>';
$pdf->writeHTMLCell(80, 5, 80, 204, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div>Current Location</div>';
$pdf->writeHTMLCell(80, 5, 157, 204, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->writeHTMLCell(190, 1, 13, 204 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 211 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 218 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 225 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 232 , "", "B", 1, false, true, 'C', true);// horizontal line ..
$pdf->writeHTMLCell(190, 1, 13, 239 , "", "B", 1, false, true, 'C', true);// horizontal line ..

//........
$pdf->writeHTMLCell(1, 48, 70, 204 , "", "R", 1, false, true, 'C', true);// verticle line ..
$pdf->writeHTMLCell(1, 48, 132, 204 , "", "R", 1, false, true, 'C', true);// verticle line ..
//..........
$html ='<div><i>Mother</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 210, $html, 0, 1, false, true, 'L', true);
//..........
$html ='<div><i>Father</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 217, $html, 0, 1, false, true, 'L', true);
//..........
$html ='<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 224, $html, 0, 1, false, true, 'L', true);
//.......
//..........
$html ='<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 231, $html, 0, 1, false, true, 'L', true);
//.......//..........
$html ='<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 238, $html, 0, 1, false, true, 'L', true);
//.......//..........
$html ='<div><i>Sibling</i></div>';
$pdf->writeHTMLCell(80, 5, 13, 245, $html, 0, 1, false, true, 'L', true);
//......................


$html ='<div><input type="checkbox" name="decase1" value="N"/> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 210, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="decase2" value="N"/> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 217, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="decase3" value="N"/> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 224, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="decase4" value="N"/> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 231, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="decase5" value="N"/> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 238, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="decase6" value="N"/> Deceased</div>';
$pdf->writeHTMLCell(80, 5, 133, 245, $html, 0, 1, false, true, 'L', true);

//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_iii_full_name_mother', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 210);
$pdf->TextField('a_iii_full_name_father', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 217);
$pdf->TextField('a_iii_full_name_sibling1', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 224);
//............
$pdf->TextField('a_iii_full_name_sibling2', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 231);
//............
$pdf->TextField('a_iii_full_name_sibling3', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 238);
//............
$pdf->TextField('a_iii_full_name_sibling4', 46, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 245);
//............

$pdf->TextField('a_iii_city_town_country_of_birth_mother', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 210);
$pdf->TextField('a_iii_city_town_country_of_birth_father', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 217);
$pdf->TextField('a_iii_city_town_country_of_birth_sibling1', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 224);
//............
$pdf->TextField('a_iii_city_town_country_of_birth_sibling2', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 231);
//............
$pdf->TextField('a_iii_city_town_country_of_birth_sibling3', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 238);
//............
$pdf->TextField('a_iii_city_town_country_of_birth_sibling4', 62, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 245);
//............

$pdf->TextField('a_iii_current_location_mother', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 210);
$pdf->TextField('a_iii_current_location_father', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 217);
$pdf->TextField('a_iii_current_location_sibling1', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 224);
//............
$pdf->TextField('a_iii_current_location_sibling2', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 231);
//............
$pdf->TextField('a_iii_current_location_sibling3', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 238);
//............
$pdf->TextField('a_iii_current_location_sibling4', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 245);
//............page number 4 end -------------------------------------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part B. Information About Your Application</b></div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//...........

$pdf->SetFont('times', '', 9);
$html ='<div><b>NOTE:</b> Use Form I-589 Supplement B, or attach additional sheets of paper as needed to complete your responses to the questions contained in 
Part B.)</div>';
$pdf->writeHTMLCell(188, 7, 13, 23, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(189, 1, 14, 27, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........

$pdf->SetFont('times', '', 9);
$html ='<div>When answering the following questions about your asylum or other protection claim (withholding of removal under 241(b)(3) of the INA or 
withholding of removal under the Convention Against Torture), you must provide a detailed and specific account of the basis of your claim to asylum 
or other protection. To the best of your ability, provide specific dates, places, and descriptions about each event or action described. You must attach 
documents evidencing the general conditions in the country from which you are seeking asylum or other protection and the specific facts on which 
you are relying to support your claim. If this documentation is unavailable or you are not providing this documentation with your application, explain 
why in your responses to the following questions. </div>';
$pdf->writeHTMLCell(192, 7, 13, 33, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Refer to Instructions, <b>Part 1. Filing Instructions, Section II., Basis of Eligibility, Parts A. - D., Section V., Completing the Form, Part B.; and 
Section VII. Additional Evidence That You Should Submit,</b> for more information on completing this section of the form.</div>';
$pdf->writeHTMLCell(192, 7, 13, 57, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html ='<div><b>1. </b> Why are you applying for asylum or withholding of removal under section 241(b)(3) of the INA, or for withholding of removal under the<br>&nbsp; &nbsp; &nbsp;  
Convention Against Torture? Check the appropriate box(es) below and then provide detailed answers to questions A and B below.</div>';
$pdf->writeHTMLCell(192, 7, 13, 67, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html ='<div>I am seeking asylum or withholding of removal based on:</div>';
$pdf->writeHTMLCell(190, 7, 18, 76, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="race" value="r"/></div>';
$pdf->writeHTMLCell(190, 7, 18, 80, $html, 0, 1, false, true, 'L', true);

$html ='<div><input type="checkbox" name="religion" value="r"/></div>';
$pdf->writeHTMLCell(190, 7, 18, 86, $html, 0, 1, false, true, 'L', true);

$html ='<div><input type="checkbox" name="nationality" value="r"/></div>';
$pdf->writeHTMLCell(190, 7, 18, 92, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Race</div>';
$pdf->writeHTMLCell(190, 7, 24, 81, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Religion</div>';
$pdf->writeHTMLCell(190, 7, 24, 87, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Nationality</div>';
$pdf->writeHTMLCell(190, 7, 24, 93, $html, 0, 1, false, true, 'L', true);
//.............

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="political" value="r"/></div>';
$pdf->writeHTMLCell(190, 7, 80, 80, $html, 0, 1, false, true, 'L', true);

$html ='<div><input type="checkbox" name="particular" value="r"/></div>';
$pdf->writeHTMLCell(190, 7, 80, 86, $html, 0, 1, false, true, 'L', true);

$html ='<div><input type="checkbox" name="torture" value="r"/></div>';
$pdf->writeHTMLCell(190, 7, 80, 92, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Political opinion</div>';
$pdf->writeHTMLCell(190, 7, 86, 81, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Membership in a particular social group</div>';
$pdf->writeHTMLCell(190, 7, 86, 87, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>Torture Convention</div>';
$pdf->writeHTMLCell(190, 7, 86, 93, $html, 0, 1, false, true, 'L', true);
//.............
$pdf->writeHTMLCell(189, 1, 14, 95, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........


$pdf->SetFont('times', '', 9);
$html ='<div><b>A. </b> Have you, your family, or close friends or colleagues ever experienced harm or mistreatment or threats in the past by anyone?</div>';
$pdf->writeHTMLCell(192, 7, 13, 101, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="threats" value="t"/>   No    &nbsp; &nbsp; <input type="checkbox" name="threats" value="t"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 105, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>  If "Yes," explain in detail:<br> 
1. What happened;<br>  
2. When the harm or mistreatment or threats occurred;<br>  
3. Who caused the harm or mistreatment or threats; and<br>  
4. Why you believe the harm or mistreatment or threats occurred.</div>';
$pdf->writeHTMLCell(190, 7, 18, 111, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 40, 20, 132, "", 1, 1, false, true, 'L', true);// table box --------------
//.............
$pdf->writeHTMLCell(189, 1, 14, 170, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........

$pdf->SetFont('times', '', 9);
$html ='<div><b>B. </b>  Do you fear harm or mistreatment if you return to your home country?</div>';
$pdf->writeHTMLCell(192, 7, 13, 176, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="mistreatment" value="t"/>   No    &nbsp; &nbsp; <input type="checkbox" name="mistreatment" value="t"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 180, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>  If "Yes," explain in detail:<br> 
1. What harm or mistreatment you fear;<br> 
2. Who you believe would harm or mistreat you; and<br> 
3. Why you believe you would or could be harmed or mistreated.</div>';
$pdf->writeHTMLCell(190, 7, 18, 187, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 40, 20, 205, "", 1, 1, false, true, 'L', true); // table box --------------
//............. page number 5 end .........................................................................................

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part B. Information About Your Application</b>(continued)</div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//...........

$pdf->SetFont('times', '', 9);
$html ='<div><b>2. </b>   Have you or your family members ever been accused, charged, arrested, detained, interrogated, convicted and sentenced, or imprisoned in any<br> &nbsp;&nbsp;&nbsp; 
country other than the United States (including for an immigration law violation)?</div>';
$pdf->writeHTMLCell(192, 7, 13, 25, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="violation" value="v"/>   No    &nbsp; &nbsp; <input type="checkbox" name="violation" value="v"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 32, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div> If "Yes," explain the circumstances and reasons for the action.</div>';
$pdf->writeHTMLCell(190, 7, 18, 38, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 20, 43, "", 1, 1, false, true, 'L', true); // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 73, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3.A.</b>Have you or your family members ever belonged to or been associated with any organizations or groups in your home country, such as, but not<br> &nbsp;&nbsp;&nbsp; &nbsp; 
limited to, a political party, student group, labor union, religious organization, military or paramilitary group, civil patrol, guerrilla organization,<br> &nbsp;&nbsp;&nbsp; &nbsp; 
ethnic group, human rights group, or the press or media?</div>';
$pdf->writeHTMLCell(192, 7, 13, 80, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="human_right" value="h"/>   No    &nbsp; &nbsp; <input type="checkbox" name="human_right" value="h"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 92, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," describe for each person the level of participation, any leadership or other positions held, and the length of time you or your family 
members were involved in each organization or activity.</div>';
$pdf->writeHTMLCell(190, 7, 18, 98, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 107, "", 1, 1, false, true, 'L', true); // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 138, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html ='<div><b>3.B. </b>  Do you or your family members continue to participate in any way in these organizations or groups?</div>';
$pdf->writeHTMLCell(192, 7, 13, 145, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="participate" value="h"/>   No    &nbsp; &nbsp; <input type="checkbox" name="participate" value="h"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 150, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," describe for each person your or your family members\' current level of participation, any leadership or other positions currently held,<br>
and the length of time you or your family members have been involved in each organization or group.</div>';
$pdf->writeHTMLCell(190, 7, 18, 157, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 166, "", 1, 1, false, true, 'L', true); // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 196, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4. </b> Are you afraid of being subjected to torture in your home country or any other country to which you may be returned?</div>';
$pdf->writeHTMLCell(192, 7, 13, 202, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="afraid" value="h"/>   No    &nbsp; &nbsp; <input type="checkbox" name="afraid" value="h"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 207, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," explain why you are afraid and describe the nature of torture you fear, by whom, and why it would be inflicted. </div>';
$pdf->writeHTMLCell(190, 7, 18, 214, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 220, "", 1, 1, false, true, 'L', true); // table box --------------
//.............  page number 6 end ....................................................................

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 7
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part C. Additional Information About Your Application</b></div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//.............
$pdf->SetFont('times', '', 9);
$html ='<div>(<b>NOTE:</b><i> Use Form I-589 Supplement B, or attach additional sheets of paper as needed to complete your responses to the questions contained in 
Part C.</i>)</div>';
$pdf->writeHTMLCell(188, 7, 13, 24, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(189, 1, 14, 28, "", "B", 1, false, true, 'L', true);//.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html ='<div><b>1. </b>  Have you, your spouse, your child(ren), your parents or your siblings ever applied to the U.S. Government for refugee status, asylum, or<br>&nbsp; &nbsp;&nbsp;   
withholding of removal?</div>';
$pdf->writeHTMLCell(188, 7, 13, 34, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="refugee" value="h"/>   No    &nbsp; &nbsp; <input type="checkbox" name="refugee" value="h"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 41, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," explain the decision and what happened to any status you, your spouse, your child(ren), your parents, or your siblings received as a 
result of that decision. Indicate whether or not you were included in a parent or spouse\'s application. If so, include your parent or spouse\'s 
A-number in your response. If you have been denied asylum by an immigration judge or the Board of Immigration Appeals, describe any 
change(s) in conditions in your country or your own personal circumstances since the date of the denial that may affect your eligibility for 
asylum.</div>';
$pdf->writeHTMLCell(184, 7, 18, 48, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 71, "", 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 101, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............
$pdf->SetFont('times', '', 9);
$html ='<div><b>2.A. </b>After leaving the country from which you are claiming asylum, did you or your spouse or child(ren) who are now in the United States travel <br>&nbsp; &nbsp; &nbsp; &nbsp;
through or reside in any other country before entering the United States? </div>';
$pdf->writeHTMLCell(188, 7, 13, 108, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="reside" value="r"/>   No    &nbsp; &nbsp; <input type="checkbox" name="reside" value="r"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 116, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 9);
$html ='<div><b>2.B. </b>Have you, your spouse, your child(ren), or other family members, such as your parents or siblings, ever applied for or received any lawful status<br>&nbsp; &nbsp; &nbsp; &nbsp; 
in any country other than the one from which you are now claiming asylum?</div>';
$pdf->writeHTMLCell(192, 7, 13, 122, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="claiming" value="r"/>   No    &nbsp; &nbsp; <input type="checkbox" name="claiming" value="r"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 130, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes" to either or both questions (2A and/or 2B), provide for each person the following: the name of each country and the length of stay, the<br>
person\'s status while there, the reasons for leaving, whether or not the person is entitled to return for lawful residence purposes, and whether the<br>
person applied for refugee status or for asylum while there, and if not, why he or she did not do so.</div>';
$pdf->writeHTMLCell(190, 7, 18, 137, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 33, 19, 150, "", 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 180, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>3. </b>Have you, your spouse or your child(ren) ever ordered, incited, assisted or otherwise participated in causing harm or suffering to any person<br>&nbsp;&nbsp;&nbsp; 
because of his or her race, religion, nationality, membership in a particular social group or belief in a particular political opinion?</div>';
$pdf->writeHTMLCell(192, 7, 13, 188, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="ordered" value="0"/>   No    &nbsp; &nbsp; <input type="checkbox" name="ordered" value="1"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 198, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," describe in detail each such incident and your own, your spouse\'s, or your child(ren)\'s involvement.</div>';
$pdf->writeHTMLCell(190, 7, 18, 204, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 35, 19, 210, "", 1, 1, false, true, 'L', true);  // table box --------------

//.............page number 7 end ------------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 8
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part C. Additional Information About Your Application</b>(continued)</div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>4. </b> After you left the country where you were harmed or fear harm, did you return to that country?</div>';
$pdf->writeHTMLCell(192, 7, 13, 24, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="return" value="r"/>   No    &nbsp; &nbsp; <input type="checkbox" name="return" value="r"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 29, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," describe in detail the circumstances of your visit(s) (for example, the date(s) of the trip(s), the purpose(s) of the trip(s), and the length 
of time you remained in that country for the visit(s).)</div>';
$pdf->writeHTMLCell(185, 7, 18, 36, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 45, 19, 45, "", 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 87, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>5. </b> Are you filing this application more than 1 year after your last arrival in the United States?</div>';
$pdf->writeHTMLCell(192, 7, 13, 93, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="arrival" value="r"/>   No    &nbsp; &nbsp; <input type="checkbox" name="arrival" value="r"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 98, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," explain why you did not file within the first year after you arrived. You must be prepared to explain at your interview or hearing why 
you did not file your asylum application within the first year after you arrived. For guidance in answering this question, see Instructions, Part 1: 
Filing Instructions, Section V. "Completing the Form," Part C.</b></div>';
$pdf->writeHTMLCell(185, 7, 18, 105, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(182, 45, 19, 118, "", 1, 1, false, true, 'L', true);  // table box --------------
$pdf->writeHTMLCell(189, 1, 14, 162, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b>6. </b> Have you or any member of your family included in the application ever committed any crime and/or been arrested, charged, convicted, or<br>&nbsp; &nbsp; &nbsp;  
sentenced for any crimes in the United States (including for an immigration law violation)?</div>';
$pdf->writeHTMLCell(192, 7, 13, 168, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 12);
$html ='<div><input type="checkbox" name="crimes" value="r"/>    No   &nbsp; &nbsp; <input type="checkbox" name="crimes" value="r"/>  Yes </div>';
$pdf->writeHTMLCell(190, 7, 18, 177, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>If "Yes," for each instance, specify in your response: what occurred and the circumstances, dates, length of sentence received, location, the 
duration of the detention or imprisonment, reason(s) for the detention or conviction, any formal charges that were lodged against you or your 
relatives included in your application, and the reason(s) for release. Attach documents referring to these incidents, if they are available, or an 
explanation of why documents are not available.</div>';
$pdf->writeHTMLCell(185, 7, 18, 185, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(182, 50, 19, 203, "", 1, 1, false, true, 'L', true);  // table box --------------


//.............page number 8 ends ..........................................................................

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 9
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part D. Your Signature</b></div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//.............
$pdf->SetFont('times', '', 9);
$html ='<div>I certify, under penalty of perjury under the laws of the United States of America, that this application and the 
evidence submitted with it are all true and correct. Title 18, United States Code, Section 1546(a), provides in part: 
Whoever knowingly makes under oath, or as permitted under penalty of perjury under Section 1746 of Title 28, 
United States Code, knowingly subscribes as true, any false statement with respect to a material fact in any 
application, affidavit, or other document required by the immigration laws or regulations prescribed thereunder, or 
knowingly presents any such application, affidavit, or other document containing any such false statement or 
which fails to contain any reasonable basis in law or fact - shall be fined in accordance with this title or 
imprisoned for up to 25 years. I certify that I am physically present in the United States or seeking admission at a 
Port of Entry when I execute this application. I authorize the release of any information from my immigration 
record that U.S. Citizenship and Immigration Services (USCIS) needs to determine eligibility for the 
benefit I am seeking.</div>';
$pdf->writeHTMLCell(145, 7, 12, 24, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->writeHTMLCell(44, 34, 160, 25, "", 1, 1, false, true, 'J', true); //.....bordered box ...........
$pdf->SetFont('times', '', 9);
$html ='<div>Staple your photograph here or 
the photograph of the family 
member to be included on the 
extra copy of the application 
submitted for that person.</div>';
$pdf->writeHTMLCell(43, 10, 160, 30, $html, 0, 1, false, true, 'C', true);
//.........
$pdf->writeHTMLCell(192, 1, 13, 59, "", "B", 1, false, true, 'L', true);  //.....Horizontal line ..........
//.............
$pdf->SetFont('times', 'B', 9);
$html ='<div><i>WARNING:</i> Applicants who are in the United States unlawfully are subject to removal if their asylum or withholding claims are not 
granted by an asylum officer or an immigration judge. Any information provided in completing this application may be used as a basis for 
the institution of, or as evidence in, removal proceedings even if the application is later withdrawn. Applicants determined to have 
knowingly made a frivolous application for asylum will be permanently ineligible for any benefits under the Immigration and Nationality 
Act. You may not avoid a frivolous finding simply because someone advised you to provide false information in your asylum application. If 
filing with USCIS, unexcused failure to appear for an appointment to provide biometrics (such as fingerprints) and your biographical 
information within the time allowed may result in an asylum officer dismissing your asylum application or referring it to an immigration 
judge. Failure without good cause to provide DHS with biometrics or other biographical information while in removal proceedings may 
result in your application being found abandoned by the immigration judge. See sections 208(d)(5)(A) and 208(d)(6) of the INA and 8 CFR 
sections 208.10, 1208.10, 208.20, 1003.47(d) and 1208.20.</div>';
$pdf->writeHTMLCell(190, 7, 12, 65, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(190, 10, 12, 102, "", 1, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$html ='<div>Print your complete name.</div>';
$pdf->writeHTMLCell(43, 7, 12, 101, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_print_your_complete_name', 90, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 12, 106);
//............
$pdf->writeHTMLCell(1, 10, 103, 102, "", "R", 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$html ='<div>Write your name in your native alphabet.</div>';
$pdf->writeHTMLCell(70, 7, 105, 101, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_write_your_name_alphabet', 97, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 105, 106);
//............
$pdf->SetFont('times', '', 9);
$html ='<div>Did your spouse, parent, or child(ren) assist you in completing this application?  <input type="checkbox" name="assist" value="N"/>  No  <input type="checkbox" name="assist" value="Y"/>  Yes    <i>(If "Yes," list the name and relationship.)</i></div>';
$pdf->writeHTMLCell(190, 7, 12, 113, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_name', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 12, 120);
$pdf->TextField('partd_relation_ship', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 60, 1120);
$pdf->TextField('partd_name2', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 107, 120);
$pdf->TextField('partd_relation_ship2', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 157, 120);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><i>(Name)</i></div>';
$pdf->writeHTMLCell(45, 7, 12, 126, $html, "T", 1, false, true, 'C', true);
$html ='<div><i>(Relationship)</i></div>';
$pdf->writeHTMLCell(45, 7, 60, 126, $html, "T", 1, false, true, 'C', true);

$html ='<div><i>(Name)</i></div>';
$pdf->writeHTMLCell(45, 7, 107, 126, $html, "T", 1, false, true, 'C', true);
$html ='<div><i>(Relationship)</i></div>';
$pdf->writeHTMLCell(45, 7, 157, 126, $html, "T", 1, false, true, 'C', true);

//............
$pdf->SetFont('times', '', 9);
$html ='<div>Did someone other than your spouse, parent, or child(ren) prepare this application?  &nbsp; &nbsp; &nbsp;  <input type="checkbox" name="application" value="N"/>  No  &nbsp; &nbsp;  <input type="checkbox" name="application" value="Y"/>  Yes    <i>(If "Yes," complete Part E.)</i></div>';
$pdf->writeHTMLCell(190, 7, 12, 131, $html, 0, 1, false, true, 'L', true);

//............
$pdf->SetFont('times', '', 9);
$html ='<div>Asylum applicants may be represented by counsel. Have you been provided with a list of<br>persons who may be available to assist you, at little or no cost, with your asylum claim?    &nbsp;  &nbsp;  &nbsp;   <input type="checkbox" name="asy_aapli" value="N"/>  No  &nbsp; &nbsp;  <input type="checkbox" name="asy_aapli" value="Y"/>  Yes   </div>';
$pdf->writeHTMLCell(190, 7, 12, 136, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Signature of Applicant <i>(The person in Part. A.I.)</i></div>';
$pdf->writeHTMLCell(70, 7, 20, 145, $html, 0, 1, false, true, 'C', true);


$pdf->SetFont('times', 'B', 15);
$html ='<div>[ ______________________________ ]</div>';
$pdf->writeHTMLCell(170, 7, 20, 150, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 150, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('partd_date_of_signature', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 120, 150);
//................
$pdf->SetFont('times', '', 9);
$html ='<div>Sign your name so it all appears within the brackets</div>';
$pdf->writeHTMLCell(100, 7, 27, 156, $html, 0, 1, false, true, 'L', true);

$html ='<div>Date of signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 120, 157, $html, "T", 1, false, true, 'C', true);
//.........
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part E. Declaration of Person Preparing Form, if Other Than Applicant, Spouse, Parent, or Child</b></div>';
$pdf->writeHTMLCell (191, 6, 13, 165, $html3, 1, 1, true,true,'L', true); 
//.............

$pdf->SetFont('times', '', 9); 
$html ='<div>I declare that I have prepared this application at the request of the person named in Part D, that the responses provided are based on all information of 
which I have knowledge, or which was provided to me by the applicant, and that the completed application was read to the applicant in his or her 
native language or a language he or she understands for verification before he or she signed the application in my presence. I am aware that the 
knowing placement of false information on the Form I-589 may also subject me to civil penalties under 8 U.S.C. 1324c and/or criminal penalties 
under 18 U.S.C. 1546(a).</div>';
$pdf->writeHTMLCell (190, 6, 12, 172, $html, 0, 1, false,   true,  'L',  true); 
//.............

$pdf->writeHTMLCell (190, 31, 13, 192, "", 1, 1, false,   true,  'L',  true);  //............table box --------start
//................
$pdf->SetFont('times', '', 9);
$html ='<div>Signature of Preparer</div>';
$pdf->writeHTMLCell(100, 7, 13, 191, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('times', '', 9);
$html ='<div>Print Complete Name of Preparer</div>';
$pdf->writeHTMLCell(100, 7, 85, 191, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_print_complete_name_of_preparer', 117, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 86, 196);

$pdf->writeHTMLCell (190, 1, 13, 197, "", "B", 1, false,   true,  'L',  true);  //.........horizontal line--------
$pdf->writeHTMLCell (1, 11, 84, 192, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
//................
$pdf->SetFont('times', '', 9);
$html ='<div>Daytime Telephone Number</div>';
$pdf->writeHTMLCell(100, 7, 13, 202, $html, 0, 1, false, true, 'L', true);
//................

$pdf->SetFont('times', '', 9);
$html ='<div>Address of Preparer: Street Number and Name</div>';
$pdf->writeHTMLCell(100, 7, 70, 202, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('times', '', 10);
$html ='<div>(  &nbsp;  &nbsp;  &nbsp;  &nbsp;  )</div>';
$pdf->writeHTMLCell(100, 7, 13, 207, $html, 0, 1, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_daytime_telephone_code', 7, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 16, 207);
$pdf->TextField('part_e_daytime_telephone_number', 42, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 26, 207);
$pdf->TextField('part_e_address_of_preparer_street', 132, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 70, 207);

$pdf->writeHTMLCell (190, 1, 13, 207, "", "B", 1, false,   true,  'L',  true);  //.........horizontal line--------

$pdf->writeHTMLCell (1, 10, 68, 203, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
//................

//................
$pdf->SetFont('times', '', 9);
$html ='<div>Apt. Number</div>';
$pdf->writeHTMLCell(100, 7, 13, 212, $html, 0, 1, false, true, 'L', true);


$html ='<div>City </div>';
$pdf->writeHTMLCell(100, 7, 55, 212, $html, 0, 1, false, true, 'L', true);


$html ='<div>State </div>';
$pdf->writeHTMLCell(100, 7, 110, 212, $html, 0, 1, false, true, 'L', true);

$html ='<div>Zip Code </div>';
$pdf->writeHTMLCell(100, 7, 162, 212, $html, 0, 1, false, true, 'L', true);

//................

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_preparer_address_aptnumber', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 13, 217);

$pdf->TextField('part_e_preparer_address_city', 52, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 55, 217);
$pdf->TextField('part_e_preparer_address_state', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 110, 217);

$pdf->TextField('part_e_preparer_address_zipcode', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'dashed'), array(), 162, 217);

$pdf->writeHTMLCell (1, 10, 53, 213, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
$pdf->writeHTMLCell (1, 10, 108, 213, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
$pdf->writeHTMLCell (1, 10, 160, 213, "", "R", 1, false,   true,  'L',  true);  //.........verticle line --------
//................

$pdf->writeHTMLCell (190, 28, 13, 226, "", 1, 1, false,   true,  'L',  true);  //............table box 2 -----------

$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(40, 27.5, 13.3, 226.2, "", "R", 1, true, true, 'C', true);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>To be completed by an 
attorney or accredited 
representative</b> (if any).</div>';
$pdf->writeHTMLCell(40, 20, 13, 232, $html, 0, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 9);
$html ='<div><b><input type="checkbox" name="g28" value="Y"/> &nbsp;  &nbsp; Select this box if 
Form G-28 is 
attached.</b></div>';
$pdf->writeHTMLCell(30, 20, 52, 232, $html, 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(1, 27.5, 82, 226.2, "", "R", 1, false, true, 'C', true); //.......horizontal line 
$pdf->writeHTMLCell(1, 27.5, 130, 226.2, "", "R", 1, false, true, 'C', true); //.......horizontal line 
//...............
$pdf->SetFont('times', '', 9);
$html ='<div><b>Attorney State Bar Number </b>(if 
applicable)</div>';
$pdf->writeHTMLCell(45, 20, 85, 228, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_attorney_state_bar_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 238);

//...............
$pdf->SetFont('times', '', 9);
$html ='<div><b>Attorney or Accredited Representative 
USCIS Online Account Number </b> (if any) </div>';
$pdf->writeHTMLCell(60, 20, 134, 228, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_e_attorney_online_account_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 238);

//...................page number 9 end -----------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 10
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part F. To Be Completed at Asylum Interview, if Applicable</b></div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//...............

$pdf->SetFont('times', '', 9);
$html ='<div><b>NOTE:</b><i> You will be asked to complete this part when you appear for examination before an asylum officer of the Department of Homeland Security, U.S. Citizenship and Immigration Services (USCIS).</i></div>';
$pdf->writeHTMLCell(191, 7, 12, 24, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(191, 7, 12, 28, "", "B", 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 9);
$html ='<div>I swear (affirm) that I know the contents of this application that I am signing, including the attached documents and supple ments, that they are<br>
<input type="checkbox" name="swer" value="Y"/>  all true or <input type="checkbox" name="swer" value="N"/>  not all true to the best of my knowledge and that correction(s) numbered ______ to ______ were made by me or at my request.<br>
Furthermore, I am aware that if I am determined to have knowingly made a frivolous application for asylum I will be permanently ineligible for any 
benefits under the Immigration and Nationality Act, and that I may not avoid a frivolous finding simply because someone advised me to provide 
false information in my asylum application.</div>';
$pdf->writeHTMLCell(185, 7, 12, 36, $html, 0, 1, false, true, 'L', true);
//..............
$pdf->SetFont('times', '', 9);
$html ='<div>Signed and sworn to before me by the above named applicant on:</div>';
$pdf->writeHTMLCell(190, 7, 100, 57, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Signature of Applicant</div>';
$pdf->writeHTMLCell(70, 7, 22, 73, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Date <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 110, 73, $html, "T", 1, false, true, 'C', true);
//...........


$pdf->SetFont('times', '', 9);
$html ='<div>Write Your Name in Your Native Alphabet</div>';
$pdf->writeHTMLCell(70, 7, 22, 90, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Signature of Asylum Officer</div>';
$pdf->writeHTMLCell(80, 7, 110, 90, $html, "T", 1, false, true, 'C', true);

//...........
$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Part G. To Be Completed at Removal Hearing, if Applicable</b></div>';
$pdf->writeHTMLCell (191, 7, 13, 100, $html3, 1, 1, true,true,'L', true); 
//...............

$pdf->SetFont('times', '', 9);
$html ='<div><b>NOTE:</b><i> You will be asked to complete this Part when you appear before an immigration judge of the U.S. Department of Justice, Executive Office 
for Immigration Review (EOIR), for a hearing. </i></div>';
$pdf->writeHTMLCell(191, 7, 12, 110, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->writeHTMLCell(191, 7, 12, 114, "", "B", 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 9);
$html ='<div>I swear (affirm) that I know the contents of this application that I am signing, including the attached documents and supplements, that they are<br> 
<input type="checkbox" name="affirm" value="Y"/> all true or <input type="checkbox" name="affirm" value="N"/> not all true to the best of my knowledge and that correction(s) numbered ______ to ______ were made by me or at my request.<br> 
Furthermore, I am aware that if I am determined to have knowingly made a frivolous application for asylum I will be permanently ineligible for any 
benefits under the Immigration and Nationality Act, and that I may not avoid a frivolous finding simply because someone advised me to provide 
false information in my asylum application.</div>';
$pdf->writeHTMLCell(185, 7, 12, 124, $html, 0, 1, false, true, 'L', true);

//..............
$pdf->SetFont('times', '', 9);
$html ='<div>Signed and sworn to before me by the above named applicant on:</div>';
$pdf->writeHTMLCell(190, 7, 100, 148, $html, 0, 1, false, true, 'L', true);
//...........

//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Signature of Applicant</div>';
$pdf->writeHTMLCell(70, 7, 22, 165, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Date <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 110, 165, $html, "T", 1, false, true, 'C', true);
//...........

$pdf->SetFont('times', '', 9);
$html ='<div>Write Your Name in Your Native Alphabet</div>';
$pdf->writeHTMLCell(70, 7, 22, 185, $html, "T", 1, false, true, 'C', true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div>Signature of Immigration Judge</div>';
$pdf->writeHTMLCell(80, 7, 110, 185, $html, "T", 1, false, true, 'C', true);

//...........page number 10 end ---------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 11

$pdf->SetFont('times', 'B', 13);
$html ='<div>Supplement A, Form I-589</div>';
$pdf->writeHTMLCell(80, 7, 137, 5, $html, 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(191, 20, 13, 17, "", 1, 1, false, true, 'C', true);

$pdf->writeHTMLCell(191, 1, 13, 20, "", "B", 1, false, true, 'C', true);//......horizontal line ---------------
$pdf->writeHTMLCell(1, 20, 103, 17, "", "R", 1, false, true, 'C', true);//......horizontal line ---------------
//.........
$pdf->SetFont('times', '', 9);
$html ='<div>A-Number <i>(If available)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 16, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html ='<div>Date</div>';
$pdf->writeHTMLCell(80, 7, 105, 16, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_date', 100, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 104, 21);

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Applicant\'s Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 26, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Applicant\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 104, 26, $html, 0, 1, false, true, 'L', true);



$pdf->writeHTMLCell (191, 11, 13, 40, "", 1, 1, true, true,'L', true); 
//...........
$pdf->SetFont('times', '', 12); 
$html ='<div><b>List All of Your Children, Regardless of Age or Marital Status</b></div>';
$pdf->writeHTMLCell (191, 7, 13, 40, $html, 0, 1, false, true,'L', true); 
//...............

$pdf->SetFont('times', '', 9); 
$html ='<div><b>(NOTE:</b><i> Use this form and attach additional pages and documentation as needed, if you have more than four children)</i></div>';
$pdf->writeHTMLCell (191, 7, 13, 45, $html, 0, 1, false, true,'L', true); 
//.............

$pdf->writeHTMLCell (191, 172, 13, 55, "", 1, 1, false, true,'L', true); // table start ------------------------------------

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>1. </b>Alien Registration Number (A-Number)<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_alien_registration_number', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 63);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>2. </b> Passport/ID Card Number<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_passport_idcard_number', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 63);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>3. </b> Marital Status <i>(Married, Single,<br>&nbsp; &nbsp; Divorced, Widowed)  </div>';
$pdf->writeHTMLCell(80, 7, 112, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_marital_status', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 63);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4. </b> U.S. Social Security Number<br>&nbsp; &nbsp;<i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 55, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_us_social_security_number', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159, 63);
//............
$pdf->writeHTMLCell (191, 1, 13, 63, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

$pdf->writeHTMLCell (1, 34, 68, 55, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 34, 110, 55, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 34, 157, 55, "", "R", 1, false, true,'L', true);// ........verticale line ------------------


//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>5. </b> Complete Last Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_complete_last_name', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 73);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6. </b> First Name</div>';
$pdf->writeHTMLCell(80, 7, 70, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_first_name', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 73);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>7. </b> Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 112, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_middle_name', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 73);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8. </b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_date_of_birth', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159, 73);
//............
//............
$pdf->writeHTMLCell (191, 1, 13, 73, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------


//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>9. </b> City and Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 13, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_city_country_birth', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 83);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10. </b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_nationality_citizen', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 83);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>11. </b>Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(80, 7, 112, 78, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_race_ethnic_tribal', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 83);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>12. </b>Gender<br> &nbsp; &nbsp;<input type="checkbox" name="g_gender" value="N"/> Male  <input type="checkbox" name="g_gender" value="F"/>  Female </div>';
$pdf->writeHTMLCell(80, 7, 159, 78, $html, 0, 1, false, true, 'L', true);
//............

$pdf->writeHTMLCell (191, 1, 13, 84, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------
//............

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>13. </b>Is this child in the U.S. ?  <input type="checkbox" name="g_child" value="y"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  <input type="checkbox" name="g_child" value="n"/>  No <i>(Specify location)</i>:</div>';
$pdf->writeHTMLCell(180, 7, 13, 90, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_specify_location', 70, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 90);
//............
$pdf->writeHTMLCell (191, 1, 13, 91, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>14. </b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(80, 7, 13, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_place_last_entry_in_us', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 104);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>15. </b>Date of last entry into the<br>  &nbsp;  &nbsp;
U.S. <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_date_last_entry_us', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 104);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>16. </b> I-94 Number <i>(If any)</i></div>';
$pdf->writeHTMLCell(80, 7, 112, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_I_94_number_if_any', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 104);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>17. </b>Status when last admitted<br> &nbsp; &nbsp; <i>(Visa type, if any)</i> </div>';
$pdf->writeHTMLCell(80, 7, 159, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_status_when_last_submited', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159, 104);
//............
$pdf->writeHTMLCell (191, 1, 13, 104, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

$pdf->writeHTMLCell (1, 13, 68, 97, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 13, 110, 97, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 13, 157, 97, "", "R", 1, false, true,'L', true);// ........verticale line ------------------

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>18. </b>  What is your child\'s current status?</div>';
$pdf->writeHTMLCell(80, 7, 13, 110, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_your_child_current_status', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 118);
//..........

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>19. </b> What is the expiration date of his/her<br> &nbsp;  &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 75, 110, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_authorized_expire_date', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 118);
//..........

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>20.</b>Is your child in Immigration Court proceedings?<br><br> &nbsp; &nbsp;  <input type="checkbox" name="g_proceding" value="y"/>   Yes   &nbsp;  &nbsp;  <input type="checkbox" name="g_proceding" value="n"/>   No </div>';
$pdf->writeHTMLCell(80, 7, 136, 110, $html, 0, 1, false, true, 'L', true);


//............
$pdf->writeHTMLCell (191, 1, 13, 119, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

$pdf->writeHTMLCell (1, 14, 73, 110, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 14, 135, 110, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i></div>';
$pdf->writeHTMLCell(180, 7, 13, 124, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div><input type="checkbox" name="if_in" value="y"/> &nbsp;  Yes <i>(Attach one photograph of your child in the upper right corner of Page 9 on the extra copy of the application submitted for this person.) </i> <br><br><input type="checkbox" name="if_in" value="n"/> &nbsp;  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 128, $html, 0, 1, false, true, 'L', true);
//............
$pdf->writeHTMLCell (191, 1, 13, 135, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------



//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>1. </b>Alien Registration Number (A-Number)<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_alien_registration_number', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 148);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>2. </b> Passport/ID Card Number<br>  &nbsp;&nbsp; <i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_passport_idcard_number', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 148);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>3. </b> Marital Status <i>(Married, Single,<br>&nbsp; &nbsp; Divorced, Widowed)  </div>';
$pdf->writeHTMLCell(80, 7, 112, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_marital_status', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 148);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>4. </b> U.S. Social Security Number<br>&nbsp; &nbsp;<i>(if any)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 140, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_us_social_security_number', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159, 148);
//............
$pdf->writeHTMLCell (191, 1, 13, 148, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

$pdf->writeHTMLCell (1, 34, 68, 140, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 34, 110, 140, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 34, 157, 140, "", "R", 1, false, true,'L', true);// ........verticale line ------------------


//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>5. </b> Complete Last Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_complete_last_name', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 158);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>6. </b> First Name</div>';
$pdf->writeHTMLCell(80, 7, 70, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_first_name', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 158);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>7. </b> Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 112, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_middle_name', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 158);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>8. </b> Date of Birth <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 159, 153, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_date_of_birth', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159, 158);
//............
//............
$pdf->writeHTMLCell (191, 1, 13, 158, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------


//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>9. </b> City and Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 13, 163, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_city_country_birth', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 168);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>10. </b> Nationality <i>(Citizenship)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 163, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_nationality_citizen', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 168);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>11. </b>Race, Ethnic, or Tribal Group</div>';
$pdf->writeHTMLCell(80, 7, 112, 163, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_race_ethnic_tribal', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 168);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>12. </b>Gender<br> &nbsp; &nbsp;<input type="checkbox" name="g2_gender" value="N"/> Male  <input type="checkbox" name="g2_gender" value="F"/>  Female </div>';
$pdf->writeHTMLCell(80, 7, 159, 163, $html, 0, 1, false, true, 'L', true);
//............

$pdf->writeHTMLCell (191, 1, 13, 169, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------
//............

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>13. </b>Is this child in the U.S. ?  <input type="checkbox" name="g2_child" value="y"/>  Yes <i>(Complete Blocks 14 to 21.)</i>  <input type="checkbox" name="g2_child" value="n"/>  No <i>(Specify location)</i>:</div>';
$pdf->writeHTMLCell(180, 7, 13, 175, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_specify_location', 70, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 175);
//............
$pdf->writeHTMLCell (191, 1, 13, 176, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>14. </b> Place of last entry into the U.S.</div>';
$pdf->writeHTMLCell(80, 7, 13, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_place_last_entry_in_us', 55, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 189);

//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>15. </b>Date of last entry into the<br>  &nbsp;  &nbsp;
U.S. <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 70, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_date_last_entry_us', 40, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 189);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>16. </b> I-94 Number <i>(If any)</i></div>';
$pdf->writeHTMLCell(80, 7, 112, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_I_94_number_if_any', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 189);
//............
$pdf->SetFont('times', '', 9);
$html ='<div><b>17. </b>Status when last admitted<br> &nbsp; &nbsp; <i>(Visa type, if any)</i> </div>';
$pdf->writeHTMLCell(80, 7, 159, 181, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_status_when_last_submited', 45, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159, 189);
//............
$pdf->writeHTMLCell (191, 1, 13, 189, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

$pdf->writeHTMLCell (1, 13, 68, 182, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 13, 110, 182, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 13, 157, 182, "", "R", 1, false, true,'L', true);// ........verticale line ------------------

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>18. </b>  What is your child\'s current status?</div>';
$pdf->writeHTMLCell(80, 7, 13, 195, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_your_child_current_status', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 13, 203);
//..........

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>19. </b> What is the expiration date of his/her<br> &nbsp;  &nbsp; &nbsp;
authorized stay, if any? <i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 75, 195, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_g_child2_authorized_expire_date', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 203);
//..........

//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>20.</b>Is your child in Immigration Court proceedings?<br><br> &nbsp; &nbsp;  <input type="checkbox" name="g2_proceding" value="y"/>   Yes   &nbsp;  &nbsp;  <input type="checkbox" name="g2_proceding" value="n"/>   No </div>';
$pdf->writeHTMLCell(80, 7, 136, 195, $html, 0, 1, false, true, 'L', true);


//............
$pdf->writeHTMLCell (191, 1, 13, 204, "", "B", 1, false, true,'L', true);//.......horizontal line -----------------

$pdf->writeHTMLCell (1, 14, 73, 195, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
$pdf->writeHTMLCell (1, 14, 135, 195, "", "R", 1, false, true,'L', true);// ........verticale line ------------------
//..........
$pdf->SetFont('times', '', 9);
$html ='<div><b>21. </b> If in the U.S., is this child to be included in this application? <i>(Check the appropriate box.)</i></div>';
$pdf->writeHTMLCell(180, 7, 13, 209, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div><input type="checkbox" name="if_in2" value="y"/> &nbsp;  Yes <i>(Attach one photograph of your child in the upper right corner of Page 9 on the extra copy of the application submitted for this person.) </i> <br><br><input type="checkbox" name="if_in2" value="n"/> &nbsp;  No </div>';
$pdf->writeHTMLCell(190, 7, 18, 213, $html, 0, 1, false, true, 'L', true);
//............


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 11

$pdf->SetFont('times', 'B', 13);
$html ='<div>Supplement B, Form I-589</div>';
$pdf->writeHTMLCell(80, 7, 137, 5, $html, 0, 1, false, true, 'C', true);

$pdf->SetFont('times', '', 12); 
$html3 ='<div><b>Additional Information About Your Claim to Asylum</b></div>';
$pdf->writeHTMLCell (191, 5, 13, 17, $html3, 1, 1, true,true,'L', true); 
//...............




$pdf->writeHTMLCell(191, 20, 13, 27, "", 1, 1, false, true, 'C', true);

$pdf->writeHTMLCell(191, 1, 13, 30, "", "B", 1, false, true, 'C', true);//......horizontal line ---------------
$pdf->writeHTMLCell(1, 20, 103, 27, "", "R", 1, false, true, 'C', true);//......horizontal line ---------------
//.........
$pdf->SetFont('times', '', 9);
$html ='<div>A-Number <i>(If available)</i></div>';
$pdf->writeHTMLCell(80, 7, 13, 26, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 9);
$html ='<div>Date</div>';
$pdf->writeHTMLCell(80, 7, 105, 26, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_asylum_date', 100, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 104, 31);

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Applicant\'s Name</div>';
$pdf->writeHTMLCell(80, 7, 13, 36, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 9);
$html ='<div>Applicant\'s Signature</div>';
$pdf->writeHTMLCell(80, 7, 104, 36, $html, 0, 1, false, true, 'L', true);

//.........
$pdf->SetFont('times', '', 9);
$html ='<div><b>NOTE:</b> <i>Use this as a continuation page for any additional information requested. Copy and complete as needed.</i></div>';
$pdf->writeHTMLCell(180, 7, 13, 50, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->writeHTMLCell(190, 7, 13, 52, "", "B", 1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div><b>Part</b></div>';
$pdf->writeHTMLCell(180, 7, 13, 60, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 9);
$html ='<div><b>Question</b></div>';
$pdf->writeHTMLCell(180, 7, 13, 68, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_asylum_part', 30, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 30, 60);
$pdf->TextField('additional_asylum_question', 30, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 30, 68);

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="44" rows="44" name="additional_claim_to_asylum">

</textarea>
EOD;
$pdf->writeHTMLCell(190, 100, 14, 80, $html, 0, 0, false, 'L');
//..............



$js = "
var fields = {
    'additional_claim_to_asylum':' ',
    'part_e_attorney_online_account_number':' $attorneyData->uscis_online_account_number',
    'part_e_attorney_state_bar_number':' $attorneyData->bar_number',

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
$pdf->Output('I-864A.pdf', 'I');


