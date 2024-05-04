<?php
require_once("config.php");
//if(!isset($_SESSION)) session_start();
//$objQuery = new \App\dataTableQuery\dataTableQuery();


$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

	
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    //Page header
    
    public function Header() {
        $this->SetY(13);
		if ($this->page > 1){
			$this->SetLineWidth(2); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 11.5, false, 'T', 'C');
			
			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 13.4, false, 'T', 'C');
		}
    }

    // Page footer
    public function Footer() {
        $this->SetY(-16); // Position at 15 mm from bottom
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(190.6, 4, '', $header_top_border, 1, 1);
		
        $this->SetFont('times', '', 9); // Set font
		
		$this->Cell(40, 6, "Form I-130 02/13/19", 0, 0, 'L');




        
        
        $image_file = 'images/code1.png';
        $this->Image($image_file, 60, 269, 100, 6, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 158.5, 268.2, true);

    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-130');

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
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set a barcode on the page footer
// $pdf->setBarcode(date('Y-m-d H:i:s'));

// add a page
$pdf->AddPage('P', 'LETTER'); // page number 1

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
$pdf->Image($logo, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(15, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(120, 15, "Petition for Alien Relative", 0, 'C', 0, 1, 50, 8, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-130A", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0012\nExpires 02/28/2021", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);

// End code for top section

$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
// $pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

//........
$pdf->MultiCell(190, 70, '', 1, 'J', 1, 2, 13, 33, true);
//......
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 9); 
$pdf->setCellHeightRatio(0.7);
$pdf->setCellPaddings(0, 1, 0, 0); 
$html ='<div><b>For USIS Use Only</div>';
$pdf->writeHTMLCell(50, 2, 13, 33, $html, 'LB', 1, true, false, 'C', true);
//..........
$pdf->SetFont('times', '', 9); 
$html ='<div><b>Free Stamp </div>';
$pdf->writeHTMLCell(65, 25, 63, 33, $html, 'LB', 0, false, false, 'C', true);
$html ='<div><b>Action Stamp</div>';
$pdf->writeHTMLCell(70, 45, 128, 33, $html, 'L', 0, false, false, 'C', true);
//..........
$pdf->SetFont('times', '', 9); 
$html ='<div><b> A-Number </b></div>';
$pdf->writeHTMLCell(20, 7, 28, 38, $html, 0, 0, false, false, 0,true);
//.....
$html ='<div><b> A-</b></div>';
$pdf->writeHTMLCell(20, 7, 13, 43, $html, 0, 0, false, false, 0,true);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 0, 0, 0); 
$pdf->writeHTMLCell(44, 2, 18, 42, '', 1, 1, false, false, 0,true);
//......
$pdf->SetFont('times', '', 9); 
$html ='<div><b> Initial Receipt</b></div>';
$pdf->setCellHeightRatio(1);
$pdf->writeHTMLCell(50, 1, 13, 50.2, $html, 'T', 1, false, false, 'L',true);
//..........
$pdf->SetFont('times', '', 9); 
$html ='<div><b> Resubmitted</b></div>';
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 0, 0, 0.3); 
$pdf->writeHTMLCell(50, 1, 13, 54.5, $html, 'TB', 1, false, false, 'L',true);
//......
$pdf->SetFont('times', '', 9);
$pdf->setCellHeightRatio(1.5);
$html ='<div><b> Relocated </b> <br> Received </div>';
$pdf->writeHTMLCell(22, 0, 13, 58, $html, 'RB', 1, false, false, 'L',true);
$pdf->SetFont('times', 'B', 8);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0.6, .5, 0, 0); 
$pdf->writeHTMLCell(22, 5, 13, 68, 'Sent', 'RB', 1, false, true, 'L',true);
//...........
$pdf->SetFont('times', '', 9);
$html ='<div><b> Completed </b></div>';
$pdf->writeHTMLCell(22, 5, 13, 73, $html, 'RB', 1, false, true, 'L',true);
//.......
$pdf->SetFont('times', 'B', 8);
$html ='<div> Approved </div>';
$pdf->writeHTMLCell(22, 6, 13, 79, $html, 'RB', 1, false, true, 'L',true);
//........
$html ='<div> Returned</div>';
$pdf->writeHTMLCell(22, 6, 13, 85, $html, 'RB', 1, false, true, 'L',true);
//.......
$pdf->SetFont('times', 'B', 9);
$html ='<div> Remarks </div>';
$pdf->writeHTMLCell(22, 5, 13, 91, $html, 'RB', 1, false, true, 'L',true);
//...........
$html ='<div> Section of Law/Visa Category </div>';
$pdf->writeHTMLCell(50, 5, 60, 58, $html, 0, 1, false, true, 'L',true);
//..........
$pdf->SetFont('times', '', 6.5);
$pdf->writeHTMLCell(3, 2, 36, 63, '', 1, 1, false, true, 'L',true);
$html ='<div> 201(b) Spouse-IR-L/CR-1</div>';
$pdf->writeHTMLCell(28, 5, 39, 63, $html, 0, 1, false, true, 'L',true);
//......
$pdf->SetFont('times', '', 6.5);
$pdf->writeHTMLCell(3, 2, 65, 63, '', 1, 1, false, true, 'L',true);
 $html ='<div> 203(a)(1) Unm. SD - FI-1 </div>';
 $pdf->writeHTMLCell(29, 5, 68, 63, $html, 0, 1, false, true, 'L',true);
//........
$pdf->SetFont('times', '', 6.5);
$pdf->writeHTMLCell(3, 2, 95, 63, '', 1, 1, false, true, 'L',true);
$html ='<div>203(a)(2)(B) Unm. S/D - F2-4</div>';
$pdf->writeHTMLCell(29, 5, 98, 63, $html, 0, 1, false, true, 'L',true);
//.......




$pdf->writeHTMLCell(3, 2, 95, 68, '', 1, 1, false, true, 'L',true);
$html ='<div>203(a)(3) Married S/D - F3-1</div>';
$pdf->writeHTMLCell(29, 5, 98, 68, $html, 0, 1, false, true, 'L',true);
//.....

$pdf->writeHTMLCell(3, 2, 36, 68, '', 1, 1, false, true, 'L',true);
$html ='<div> 201(b) Child - IR-2/CR-2</div>';
$pdf->writeHTMLCell(28, 5, 39, 68, $html, 0, 1, false, true, 'L',true);

//.......
$pdf->writeHTMLCell(3, 2, 36, 73, '', 1, 1, false, true, 'L',true);
$html ='<div> 201(b) Parent - IR-5 </div>';
$pdf->writeHTMLCell(28, 5, 39, 73, $html, 0, 1, false, true, 'L',true);
//...........
$pdf->writeHTMLCell(3, 2, 65, 68, '', 1, 1, false, true, 'L',true);
$html ='<div> 203(a)(2)(A) Spouse - F2-1 </div>';
$pdf->writeHTMLCell(29, 5, 68, 68, $html, 0, 1, false, true, 'L',true);

//.....
$pdf->writeHTMLCell(3, 2, 65, 73, '', 1, 1, false, true, 'L',true);
$html ='<div> 203(a)(2)(A) Child- F2-2</div>';
$pdf->writeHTMLCell(29, 5, 68, 73, $html, 0, 1, false, true, 'L',true);
//.....

$pdf->writeHTMLCell(3, 2, 95, 73, '', 1, 1, false, true, 'L',true);
$html ='<div>203(a)(4) Brother Sister - F4-1</div>';
$pdf->writeHTMLCell(29, 5, 98, 73, $html, 0, 1, false, true, 'L',true);
//.....
$pdf->writeHTMLCell(103, 6, 100, 78, '', 'T', 1, false, true, 'L',true);

//..........
$pdf->SetFont('times', '', 6.5);
$pdf->setCellPaddings(0.6, 1, 0, 0);
$html ='<div>Petition was filed an (Priority Date mm/dd/yyyy):</div>';
$pdf->writeHTMLCell(66, 7, 35, 78, $html, 1, 1, false, true, 'L',true);
//......
$pdf->SetFont('times', '', 7);
$pdf->setCellPaddings(0.6, 1, 0, 0);
$html ='<div>PDR request granted denied . New priority date (mm/dd/yyyy):</div>';
$pdf->writeHTMLCell(66, 6, 35, 85, $html, 'R', 1, false, true, 'L',true);
//........
$pdf->writeHTMLCell(168, 6, 35, 91, '', 'T', 1, false, true, 'L',true);
$pdf->writeHTMLCell(168, 6, 35, 96, '', 'T', 1, false, true, 'L',true);

//......
$pdf->SetFont('times', '', 9);
$pdf->setCellPaddings(1, 2, 0, 0);
$html ='<div>At which USCIS office (e.g., NBC, VSC, LOS. CRO) was Form 1-130 adjudicated?</div>';
$pdf->writeHTMLCell(0, 5, 13, 96, $html, '', 1, false, true, 'L',true);
$pdf->writeHTMLCell(50, 6, 125, 95, '', 'B', 1, false, true, 'L',true);
//.......

$pdf->SetFont('times', '', 7);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->writeHTMLCell(2, 1, 105, 79, '', 1, 1, false, true, 'L',true);
$html ='<div>Field Investigation</div>';
$pdf->writeHTMLCell(28, 3, 110, 79, $html, 0, 1, false, true, 'L',true);
//......

$pdf->writeHTMLCell(2, 1, 135, 79, '', 1, 1, false, true, 'L',true);
$html ='<div>Personal Interview</div>';
$pdf->writeHTMLCell(28, 3, 140, 79, $html, 0, 1, false, true, 'L',true);
//........
$pdf->writeHTMLCell(2, 1, 168, 79, '', 1, 1, false, true, 'L',true);
$html ='<div>204 (a) (2) (A) Resolved</div>';
$pdf->writeHTMLCell(28, 3, 173, 79, $html, 0, 1, false, true, 'L',true);
//....................

$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->writeHTMLCell(2, 1, 105, 83, '', 1, 1, false, true, 'L',true);
$html ='<div>Previously Forwarded</div>';
$pdf->writeHTMLCell(28, 3, 110, 83, $html, 0, 1, false, true, 'L',true);
//......

$pdf->writeHTMLCell(2, 1, 135, 83, '', 1, 1, false, true, 'L',true);
$html ='<div>Pet. A-File Reviewed</div>';
$pdf->writeHTMLCell(28, 3, 140, 83, $html, 0, 1, false, true, 'L',true);
//........
$pdf->writeHTMLCell(2, 1, 168, 83, '', 1, 1, false, true, 'L',true);
$html ='<div>1-485 Filed Simultaneously</div>';
$pdf->writeHTMLCell(29, 3, 173, 83, $html, 0, 1, false, true, 'L',true);
//.............


$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->writeHTMLCell(2, 1, 105, 87, '', 1, 1, false, true, 'L',true);
$html ='<div> 203 (g) Resolved</div>';
$pdf->writeHTMLCell(28, 3, 110, 87, $html, 0, 1, false, true, 'L',true);
//......

$pdf->writeHTMLCell(2, 1, 135, 87, '', 1, 1, false, true, 'L',true);
$html ='<div>  Ben. A-File Reviewed </div>';
$pdf->writeHTMLCell(28, 3, 140, 87, $html, 0, 1, false, true, 'L',true);
//........
$pdf->writeHTMLCell(2, 1, 168, 87, '', 1, 1, false, true, 'L',true);
$html ='<div> 204 (g) Resolved </div>';
$pdf->writeHTMLCell(29, 3, 173, 87, $html, 0, 1, false, true, 'L',true);
// upper box ended ...............upper box ended

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); 
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 1, 0, 0); 
$html ='<div><b>To be completed by an attorney or accredited representative </b> (if any).</div>';
$pdf->writeHTMLCell(190, 7, 13, 107, $html, 1, 1, true, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 10);
$html ='<div> <input type="checkbox" name="agree" value="1" checked=" " />  Select this box if Form G-28 is <br> attached.</div>';
$pdf->writeHTMLCell(37, 20, 13, 114, $html, 'LRB', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html ='<div><b> Volag Number </b> <br>  (if any)</div>';
$pdf->writeHTMLCell(37, 20, 50, 114, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('volga_number', 33, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),52, 125);
//...............
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 20, 87, 114, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('attorney_statebar_number', 43, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),88, 125);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div> <b>  Attorney or Accredited Representative
USCIS Online Account Number </b> (if any) <br> </div>';
$pdf->writeHTMLCell(71, 20, 132, 114, $html, 'RB', 0, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('attorney_account_number', 65, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),135, 125);
//..............

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 134, true);
$pdf->SetFont('times', '', 10); // set font
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 133, false); // angle
$pdf->StopTransform();
//.........

$pdf->SetFont('times', '', 10);
$html ='<div> If you need extra space to complete any section of this petition, use the space provided in  <b> Part 9. Additional Information.  Complete and submit as many copies of Part 9., as necessary, with your petition.</b> </div>';
$pdf->writeHTMLCell(190, 11, 13, 140.5, $html, 'LTRB', 0, false, true, 'C', true);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 1. Relationship </b>(You are the Petitioner. Your
relative is the Beneficiary) </div>';
$pdf->writeHTMLCell(91, 12, 13, 155, $html, 1, 1, true, false, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b> &nbsp;  I am filing this petition for my (Select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(90, 7, 12, 168, $html, 0, 1, false, false, 'J', true);
//..........


$pdf->SetFont('times', '', 11);
$html ='<div>
<input type="checkbox" name="Spouse" value="Spouse" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 175, $html, 0, 1, false, false, 0, true);
$pdf->writeHTMLCell(20, 5, 18.5, 173.5, 'Spouse', 0, 1, false, false, 0, true);

$html ='<div>
<input type="checkbox" name="Parent " value="Parent " /></div>';
$pdf->writeHTMLCell(90, 7, 35, 175, $html, 0, 1, false, false, 0, true);
$pdf->writeHTMLCell(20, 5, 36, 173.5, 'Parent', 0, 1, false, false, 0, true);

$html ='<div>
<input type="checkbox" name="Brother " value="Brother" /></div>';
$pdf->writeHTMLCell(90, 7, 52, 175, $html, 0, 1, false, false, 0, true);
$pdf->writeHTMLCell(25, 5, 57, 173.5, 'Brother/Sister', 0, 1, false, false, 0, true);

$html ='<div>
<input type="checkbox" name="Child " value="Child" /></div>';
$pdf->writeHTMLCell(90, 7, 84, 175, $html, 0, 1, false, false, 0, true);
$pdf->writeHTMLCell(20, 5, 86, 173.5, 'Child', 0, 1, false, false, 0, true);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2. </b> &nbsp; If you are filing this petition for your child or parent,<br> 
&nbsp; &nbsp; &nbsp;select the box that describes your relationship (Select <b> only <br>
&nbsp; &nbsp; &nbsp; one </b> box):</div>';
$pdf->writeHTMLCell(95, 7, 12, 180, $html, 0, 1, false, false, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="Child " value="Child" /> </div>';
$pdf->writeHTMLCell(90, 5, 16, 197, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(80, 7, 23, 196, 'Child was born to parents who were married to each
other at the time of the child\'s birth ', 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 11);
$html ='<div> <input type="checkbox" name="StepChild " value="StepChild" /> </div>';
$pdf->writeHTMLCell(90, 5, 16, 209, $html, 0, 1, false, false, 'J', true);
$html ='<div> Stepchild/Stepparent </div>';
$pdf->writeHTMLCell(90, 5, 22, 209, $html, 0, 1, false, false, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="StepChild " value="StepChild" /> </div>';
$pdf->writeHTMLCell(90, 5, 16, 216, $html, 0, 1, false, false, 'J', true);

$html ='<div> Child was born to parents who were not married to <br>
 each other at the time of the child\'s birth</div>';
$pdf->writeHTMLCell(85, 5, 21, 215, $html, 0, 1, false, false, 'J', true);

//.............
$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="adopt " value="adopt" /> </div>';
$pdf->writeHTMLCell(30, 5, 16, 227, $html, 0, 1, false, false, 'J', true);

$html ='<div> Child was adopted (not an Orphan or Hague <br>
 Convention adoptce) </div>';
$pdf->writeHTMLCell(80, 5, 21, 227, $html, 0, 1, false, false, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3. </b> &nbsp;   If the beneficiary is your brother/sister, are you related by
    <br>  &nbsp; &nbsp;  &nbsp;adoption?</div>';
$pdf->writeHTMLCell(90, 5, 12, 237, $html, 0, 1, false, false, 'J', true);
//....
$pdf->SetFont('times', '', 11);
$html ='<div> <input type="checkbox" name="beneficiary1 " value="Yes" /></div>';
$pdf->writeHTMLCell(30, 5, 66, 243, $html, 0, 1, false, false, 'J', true);
$html ='<div> Yes </div>';
$pdf->writeHTMLCell(30, 5, 72, 242, $html, 0, 1, false, false, 'J', true);


$html ='<div> <input type="checkbox" name="beneficiary2 " value="NO" /></div>';
$pdf->writeHTMLCell(30, 5, 85, 243, $html, 0, 1, false, false, 'J', true);
$html ='<div> No </div>';
$pdf->writeHTMLCell(30, 5, 90, 242, $html, 0, 1, false, false, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4. </b> &nbsp; Did you gain lawful permanent resident status or <br>
  &nbsp; &nbsp; &nbsp; citizenship through adoption? </div>';
$pdf->writeHTMLCell(90, 5, 12, 250, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 11);
$html ='<div> <input type="checkbox" name="resident1 " value="Yes" /></div>';
$pdf->writeHTMLCell(30, 5, 66, 255, $html, 0, 1, false, false, 'J', true);
$html ='<div> Yes </div>';
$pdf->writeHTMLCell(30, 5, 72, 255, $html, 0, 1, false, false, 'J', true);


$html ='<div> <input type="checkbox" name="resident2 " value="NO" /></div>';
$pdf->writeHTMLCell(30, 5, 85, 255, $html, 0, 1, false, false, 'J', true);
$html ='<div> No </div>';
$pdf->writeHTMLCell(30, 5, 90, 255, $html, 0, 1, false, false, 'J', true);

//..........end left side ............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 2. Information About You </b> (Petitioner) </div>';
$pdf->writeHTMLCell(90, 7, 113, 155, $html, 1, 1, true, false, 'J', true);
//....
$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b>  &nbsp; &nbsp; Alien Registration Number (A-Number) (if any) </div>';
$pdf->writeHTMLCell(80, 5, 112, 163, $html, 0, 1, false, false, 'J', true);
//.......
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 105, false); // angle
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 146, 170, $html, 0, 1, false, false, 'J', true);
//...........
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_registration', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 169);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 176, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_online_account', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 182);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 130, 148, false); // angle
$pdf->StopTransform();

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3. </b>   &nbsp; &nbsp;  U.S. Social Security Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 189, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_3_social_security', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 195);

//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 137, 152, false); // angle
$pdf->StopTransform();
//........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220,220,220);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0, 0, 4);
$html ='<div> Your Full Name </div>';
$pdf->writeHTMLCell(91, 5, 112, 205, $html, 0, 1, true, false, 'J', true);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 215, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_4a_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 217);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 225, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_4b_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 227);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 236, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_4c_middle', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 236);
//........... right side and page one end ................

$pdf->AddPage('P', 'LETTER'); // page number 2



$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 2. Information About You </b> (Petitioner) (Continued) </div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$pdf->SetFont('times', 'I', 11.6);
$html ='<div><b>Other Names Used </b>(if any) </div>';
$pdf->writeHTMLCell(90, 7, 13, 31, $html, 0, 1, true, false, 'J', true);
//........
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('times', '', 10);
$html ='<div>Provide all other names you have ever used, including aliases,
maiden name, and nicknames.</div>';
$pdf->writeHTMLCell(85, 5, 13, 40, $html, 0, 1, false, true, 'L', false);
//................
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 50, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_5a_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 51);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 60, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_5b_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 60);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 70, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_5c_middle', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 69);
//.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Information </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 78, $html, 0, 1, true, false, 'J', true);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>6. </b> &nbsp; &nbsp;  City/Town/Village of Birth </div>';
$pdf->writeHTMLCell(90, 7, 12, 86, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_city_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 91.5);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>7. </b>  &nbsp; &nbsp;  Country of Birth </div>';
$pdf->writeHTMLCell(90, 7, 12, 98.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_7_country_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 104.5);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>8. </b>  &nbsp; &nbsp;  Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 114, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_8_date_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 114);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>9. </b>  &nbsp; &nbsp; Sex </div>';
$pdf->writeHTMLCell(90, 7, 12, 123, $html, 0, 1, false, false, 'J', true);

$html ='<div><input type="checkbox" name="male" value="male"  /></div>';
$pdf->writeHTMLCell(90, 7, 32, 123, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(90, 7, 38, 122, 'Male', 0, 1, false, false, 'J', true);

$html ='<div><input type="checkbox" name="female" value="female"  /></div>';
$pdf->writeHTMLCell(90, 7, 50, 123, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(90, 7, 56, 122, 'Female', 0, 1, false, false, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 132, $html, 0, 1, true, false, 'J', true);
$pdf->SetFont('times', 'I', 9);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input">(Uses ZIP Code Lookup)</a></div>';
$pdf->writeHTMLCell(90, 7, 13, 132, $html, 0, 1, true, false, 'R', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_10a_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 145);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.b. </b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 153, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_10b_street_number', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 154);






//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.c. </b>&nbsp; &nbsp; <input type="checkbox" name="2Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="2Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="2Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 163, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_10c_apt_ste', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 163);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 171, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_10d_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 171.5);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 179, $html, '', 0, 0, true, 'L');

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 179, $html, '', 0, 0, true, 'L');
$html= '<div><b>10.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 180, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_10f_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 180);
//..........


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 188, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_10g_province', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 188.5);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(30, 0, 12, 197, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_10h_postal_code', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 197);
//........


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>10.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 205, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_10i_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 211);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b>  Is your current mailing address the same as your  physical <br>  &nbsp;     &nbsp; &nbsp; address? </div>';
$pdf->writeHTMLCell(90, 5, 12, 219, $html, 0, 1, false, true, 'L', false);

$html= '<div><input type="checkbox" name="Yes" value="Yes" checked="" />Yes  &nbsp;&nbsp;<input type="checkbox" name="No" value="No" checked="" />No </div>';
$pdf->writeHTMLCell(60, 0, 77, 224, $html, '', 0, 0, true, 'L');

$html ='<div> If you answered "No" to<b> Item Number 11.,</b> provide
information  on your physical address in <b>Item Numbers 12.a. -
13.b.</b></div>';
$pdf->writeHTMLCell(93, 10, 12, 234, $html, '', 0, 0, true, 'L');
 
//............... left side page two  left side end ..............
//.............right side start ..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Address History </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, false, 'J', true);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div>Provide your physical addresses for the last five years, whether
inside or outside the United States. Provide your current
address first if it is different from your mailing address in <b> Item Numbers 10.a. - 10.i.</b>
<b>Physical Address 1</b></div>';
$pdf->writeHTMLCell(92, 10, 112, 25, $html, '', 0, 0, true, 'L');
//........

$html ='<div><b>Physical Address 1</b></div>';
$pdf->writeHTMLCell(50, 7, 112, 46, $html, '', 0, 0, true, 'L');
//............


$html = '<b>12.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 52, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_12a_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 53);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>12.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 63, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_12b_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 62);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 71, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_12c_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 71);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 79, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 79, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_12_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 79.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 88, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_12f_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 88);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 96.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_12g_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 96.5);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>12.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 102, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_12h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 108);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 117, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_13_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 117);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 126, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_13b_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 126);

$pdf->writeHTMLCell(90, 0, 112, 135, '', 'T', 0, 0, true, 'L'); 

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Physical Address 2</b></div>';
$pdf->writeHTMLCell(50, 7, 112, 136, $html, '', 0, 0, true, 'L');
//............





$html = '<b>14.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 142, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_14a_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 144);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>14.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt3" value="Apt3" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste3" checked="" />Ste. <input type="checkbox" name="Flr3" value="Flr3" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 152, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_14b_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 152);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 160, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_14c_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 160.5);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>14.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 170, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 170, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_14_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 170);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>14.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 178, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_14f_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 178.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>14.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 187, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_14g_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 187.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>14.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 193, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_14h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 199);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>15.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 208, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_15a_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 208);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>15.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 217, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_15b_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 217);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10.5); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Your Marital Information </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 227, $html, 0, 1, true, false, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>16.  </b>  How many times have you been married?</div>';
$pdf->writeHTMLCell(80, 7, 112, 237, $html, 0, 1, false, false, 'J', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 155, 153, false); // angle
$pdf->StopTransform();
$pdf->TextField('part2_16_married', 18, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),185, 237);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.  </b>  Current Marital Status</div>';
$pdf->writeHTMLCell(80, 7, 112, 244, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10); 
$pdf->setCellHeightRatio(1.6);
$html= '<div> <input type="checkbox" name="single" value="single" checked="" />Single, Never Married &nbsp;&nbsp; <input type="checkbox" name="married" value="married" checked="" />Married  &nbsp;&nbsp;  

<input type="checkbox" name="divorce" value="divorce" checked="" /> Divorcee  <br> <input type="checkbox" name="widowed" value="widowed" checked="" /> Widowed  &nbsp;&nbsp; <input type="checkbox" name="separeted" value="separeted" checked="" /> Separeted  &nbsp;&nbsp;
<input type="checkbox" name="annulled" value="annulled" checked="" /> Annulled 
</div>';
$pdf->writeHTMLCell(85, 10, 116, 250, $html, '', 0, 0, true, 'L');

//...........page two end ........... page two (2) end ...............   


//........page three(3)start ............... 

$pdf->AddPage('P', 'LETTER'); // page number 3

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 2. Information About You </b> (Petitioner) (Continued) </div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10.5); 
$html ='<div><b>18. </b> Date of Current Marriage (if currently married) <br>
 &nbsp;  &nbsp;  &nbsp;  (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 29, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('part2_18_married_date', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 35);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Place of Your Current Marriage</b> (if married)</div>';
$pdf->writeHTMLCell(90, 7, 13, 45, $html, 0, 1, true, false, 'J', true);
//.............



//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>19.a.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 54, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_19a_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 54);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>19.b.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 62, $html, '', 0, 0, true, 'L');

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 47, 62, $html, '', 0, 0, true, 'L');

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>19.c.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 70, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_19b_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 70);
//...............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>19.d. </b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 77, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_19d_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 83);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Names of All Your Spouses</b> (if any)</div>';
$pdf->writeHTMLCell(90, 7, 13, 92.5, $html, 0, 1, true, false, 'J', true);
//.............
$pdf->SetFont('times', '', 9.5);
$pdf->setCellHeightRatio(1.3);
$html ='<div>Provide information on your current spouse (if currently married)
first and then list all your prior spouses (if any).</div>';
$pdf->writeHTMLCell(92, 7, 12, 101, $html, 0, 1, false, true, 'J', true);

$html ='<div><b>Spouse 1</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 111, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>20.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 116, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_20a_lastname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 117.5);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>20.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 125, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_20b_firstname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 127);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>20.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 136, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_20c_middle', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 137);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21. </b>  Date Marriage Ended (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 12, 146, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_21_date_ended', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 146);

$pdf->writeHTMLCell(90, 0, 13, 155, '', 'T', 1, false, false, 'J', true);

//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>Spouse 2</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 155, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>22.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 161, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_22a_lastname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 164);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>22.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 171, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_22b_firstname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 173);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>22.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 182, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_22c_middle', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 182);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23. </b>  Date Marriage Ended (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 12, 191, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_23_date_ended', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 191);

//...........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 12); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(0, 1, 0, 0); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div>Information About Your Parent</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, true, true, 'J', true);


//.......

$pdf->SetFont('times', '', 10); 
$html ='<div><b>Parent 1\'s Information </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Full Name of Parent 1 </div>';
$pdf->writeHTMLCell(50, 7, 12, 212, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>24.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 217, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_24a_lastname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 220);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>24.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 226, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_24b_firstname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 229);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>24.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 237, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_24c_middle', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 238);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>25. </b>  Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 12, 246, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_25_date_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 247);

$pdf->SetFont('times', '', 11);
$html= '<div><b>26. </b>  Sex </div>';
$pdf->writeHTMLCell(60, 0, 12, 257, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 11);
$html= '<div><input type="checkbox" name="male" value="male" checked="" />Male  &nbsp;&nbsp; <input type="checkbox" name="female" value="female" checked="" /> Female </div>';
$pdf->writeHTMLCell(60, 0, 40, 257, $html, '', 0, 0, true, 'L');








//...........page 3 end left side ....................  








$pdf->SetFont('times', '', 10.5);
$html ='<div><b>27. </b>  &nbsp; Country of Birth</div>';
$pdf->writeHTMLCell(35, 10, 112, 15, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_27_country_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 21);
//............

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>28.  </b>  City/ Town/ Village of Residence </div>';
$pdf->writeHTMLCell(80, 7, 112, 29, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_28_city_town', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 35);

//.......
$pdf->SetFont('times', '', 10.5);
$html ='<div><b>29.  </b>   Country of Residence </div>';
$pdf->writeHTMLCell(80, 7, 112, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_29_residence', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 48);

//......

$pdf->SetFont('times', '', 10); 
$html ='<div><b>Parent 2\'s Information </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 56, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Full Name of Parent 2 </div>';
$pdf->writeHTMLCell(50, 7, 112, 62, $html, 0, 1, false, true, 'J', true);
//.......




$pdf->SetFont('times', '', 10);
$html ='<div><b>30.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 68, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_30a_lastname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 70);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 78, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_30b_firstname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 79);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 87, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_30c_middle', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 88);

// // //..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>31. </b>  Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 112, 96, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_31_date_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 97);

$pdf->SetFont('times', '', 11);
$html= '<div><b>32. </b>  Sex </div>';
$pdf->writeHTMLCell(60, 0, 112, 106, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 11);
$html= '<div><input type="checkbox" name="male" value="male" checked="" />Male  &nbsp;&nbsp; <input type="checkbox" name="female" value="female" checked="" /> Female </div>';
$pdf->writeHTMLCell(60, 0, 140, 106, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>33. </b>  &nbsp; Country of Birth</div>';
$pdf->writeHTMLCell(35, 10, 112, 112, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_33_country_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 118);
//............

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>34.  </b>  City/ Town/ Village of Residence </div>';
$pdf->writeHTMLCell(80, 7, 112, 126, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_34_city_town', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 132);

//.......
$pdf->SetFont('times', '', 10.5);
$html ='<div><b>35.  </b>   Country of Residence </div>';
$pdf->writeHTMLCell(80, 7, 112, 139, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_35_residence', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 145);

//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1.5, 1, 0, 0); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Additional Information About You</b> (Petitioner)</div>';
$pdf->writeHTMLCell(93, 7, 112, 155, $html, 0, 1, true, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>36.    </b>     I am a (Select <b>only one </b> box):  </div>';
$pdf->writeHTMLCell(93, 7, 112, 162, $html, 0, 1, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 11);
$html= '<div><input type="checkbox" name="us" value="us" checked="" />U.S. Citizen   &nbsp;&nbsp; <input type="checkbox" name="lawful" value="lawful" checked="" /> Lawful Permanent Resident </div>';
$pdf->writeHTMLCell(90, 0, 119, 166.5, $html, '', 0, 0, true, 'L');
//...

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>If you are a U.S. citizen, complete Item Number 37.</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 173, $html, 0, 1, false, true, 'J', true);

$html ='<div><b>37. </b>  My citizenship was acquired through (Select <b>only one</b><br>
   &nbsp;   &nbsp; &nbsp; box): </div>';
$pdf->writeHTMLCell(93, 7, 112, 180, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$pdf->setCellHeightRatio(1.5);
$html= '<div><input type="checkbox" name="citizen" value="us" checked="" />Birth in the United States<br>
<input type="checkbox" name="citizen" value="lawful" checked="" />Naturalization<br><input type="checkbox" name="citizen" value="parents" checked="" />Parents<br>
</div>';
$pdf->writeHTMLCell(90, 0, 119, 189, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('times', '', 10.5);
$pdf->setCellHeightRatio(1.1);
$html ='<div><b>38. </b> Have you obtained a Certificate of Naturalization or a<br>
  &nbsp;  &nbsp;  &nbsp;Certificate of Citizenship? </div>';
$pdf->writeHTMLCell(93, 7, 112, 207, $html, 0, 1, false, true, 'J', true);

$html= '<div><input type="checkbox" name="certificates" value="certificates" checked="" /> Yes   &nbsp;&nbsp; <input type="checkbox" name="certificates" value="certificates" checked="" /> No</div>';
$pdf->writeHTMLCell(90, 0, 175, 212, $html, '', 0, 0, true, 'L');
//.......

$html ='<div>If you answered "Yes" to <b>Item Number 38</b>., complete the
following:</div>';
$pdf->writeHTMLCell(93, 7, 112, 218, $html, 0, 1, false, true, 'J', true);


//............


$pdf->SetFont('times', '', 10.5);
$html ='<div><b>39.a.  </b>  Certificate Number</div>';
$pdf->writeHTMLCell(45, 10, 112, 230, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_39a_certification', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 125, 236);

// //.......

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>39.b.  </b>  Place of Issuance </div>';
$pdf->writeHTMLCell(50, 7, 112, 243, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_39b_place', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 125, 249);

//..........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>39.c </b>  Date of Issuance (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 112, 258, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_39c_date_issue', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172, 258);




//..............page 3 end ................    






$pdf->AddPage('P', 'LETTER'); // page number 4

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 2. Information About You </b> (Petitioner) (Continued) </div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 1, true, false, 'J', true);


$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.1);
$html ='<div>If you are a lawful permanent resident, complete <b>Item
Numbers 40.a. - 41.</b></div>';
$pdf->writeHTMLCell(90, 12, 12, 30, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10.5);
$html ='<div><b>40.a.  </b>   Class of Admission</div>';
$pdf->writeHTMLCell(90, 7, 12, 40, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_40a_admission', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 45.5);

//.......
$pdf->SetFont('times', '', 10.5);
$html ='<div><b>40.b.  </b>   Date of Admission(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 54, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_40b_admission_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 74, 54);


$pdf->SetFont('times', '', 10);
$html ='<div>Place of Admission</div>';
$pdf->writeHTMLCell(90, 7, 12, 61, $html, 0, 1, false, true, 'J', true);

$html ='<div><b>40.c.  </b>  City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_40c_city_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 72);

//.....

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>40.d..</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 12, 12, 80, $html, '', 0, 0, true, 'L');

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 50, 80, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10);
$html= '<div><b>41.  </b>  Did you gain lawful permanent resident status through<br>
    &nbsp;  &nbsp; &nbsp;  marriage to a U.S. citizen or lawful permanent resident?</div>';
$pdf->writeHTMLCell(90, 0, 12, 86, $html, '', 0, 0, true, 'L');

$html= '<div><input type="checkbox" name="gain1" value="Yes" checked="" /> Yes   &nbsp;&nbsp; <input type="checkbox" name="gain2" value="No" checked="" /> No</div>';
$pdf->writeHTMLCell(90, 0, 75, 95, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div>Employment History</div>';
$pdf->writeHTMLCell(90, 7, 13, 102, $html, 0, 1, true, true, 'J', true);

//..........
$pdf->SetFont('times', '', 10);
$html= '<div>Provide your employment history for the last five years, whether
inside or outside the United States. Provide your current
employment first. If you are currently unemployed, type or print
"Unemployed" in <b>Item Number 42.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 110, $html, 0, 1, false, true, 'J', true);

$html= '<div><b>Employer 1</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 127, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>42.  </b>   Name of Employer/Company</div>';
$pdf->writeHTMLCell(90, 7, 12, 133, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_42_employer_company', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 139);
//...........
$pdf->SetFont('times', '', 10.5);
$html = '<b>43.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 12, 146, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_43a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 47, 147.5);
//..........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>43.b.  </b>  <input type="checkbox" name="apt" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste" value="ste" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr" value="flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 12, 156, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_43b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 156);
//..........


$pdf->SetFont('times', '', 10); // set font
$html = '<b>43.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 164, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_43c_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 164.5);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>43.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>43.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 173, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 173, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_43_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69.5, 173);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>43.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 182, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_43f_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 182);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>43.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 191, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_43g_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 191);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>43.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 197, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_43h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 203);

//........
$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>44.</b> &nbsp;&nbsp;Your Occupation';
$pdf->writeHTMLCell(50, 0, 12, 210, $html, '', 0, 0, true, 'L'); 
$pdf->TextField('part2_44_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 216);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>45.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 225,  $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_45a_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 225);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>45.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 235, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_45b_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 235);

//........... page 4 left side end ............ 
 


$pdf->SetFont('times', '', 10.5);
$html= '<div><b>Employer 2</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 15, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>46.  </b>   Name of Employer/Company</div>';
$pdf->writeHTMLCell(90, 7, 112, 20, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_46_employer_company', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 26);
//...........
$pdf->SetFont('times', '', 10.5);
$html = '<b>47.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 33, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_47a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 35);
//..........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>47.b.  </b>  <input type="checkbox" name="apt1" value="apt1" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste1" value="ste1" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr1" value="flr1" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 43, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part2_47b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 43.5);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>47.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 52, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_47c_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 52);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>47.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>47.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 61, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 61, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_47_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 60.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>47.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 69, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_47f_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 69);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>47.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 77.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_47g_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 77.5);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>47.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 84, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_47h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 90);

//........
$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>48.</b> &nbsp;&nbsp;Your Occupation';
$pdf->writeHTMLCell(50, 0, 112, 97, $html, '', 0, 0, true, 'L'); 
$pdf->TextField('part2_48_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 103);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>49.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 112,  $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_49a_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172.5, 112);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>49.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 121, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part2_49b_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172.5, 121);
//............

$pdf->SetFont('times', 'B', 12);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div>Part 3. Biographic Information</div>';
$pdf->writeHTMLCell(90, 7, 113, 131, $html, 1, 1, true, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10.5);
$pdf->setCellPaddings(0, 0, 0, 0);
$html= '<div><b>NOTE: </b>Provide the biographic information about you, the petitioner.</div>';
$pdf->writeHTMLCell(90, 7, 113, 140, $html, 0, 0, false, true, 'J', true);

$html= '<div><b>1.   </b>    Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(90, 7, 113, 150, $html, 0, 0, false, true, 'J', true);
$pdf->setCellHeightRatio(1.3);
$pdf->SetFont('times', '', 11);
$html= '<div>   
&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Ethnicity" value="Hispanic" checked="" /> Hispanic or Latino <br>

&nbsp;&nbsp; &nbsp; <input type="checkbox" name="Ethnicity" value="Not Hispanic" checked="" /> Not Hispanic or Latino
 </div>';
$pdf->writeHTMLCell(90, 7, 112, 155, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>2.   </b> Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(90, 7, 112, 169, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html= '<div>   
&nbsp;&nbsp;&nbsp;<input type="checkbox" name="white" value="white" checked="" /> White <br>

&nbsp;&nbsp; &nbsp; <input type="checkbox" name="asian" value="asian" checked="" /> Asian <br>

&nbsp; &nbsp; &nbsp;<input type="checkbox" name="black" value="black" checked="" /> Black or African American <br>

&nbsp; &nbsp; &nbsp;<input type="checkbox" name="american " value="american" checked="" />    American Indian or Alaska Native <br>

&nbsp; &nbsp; &nbsp;<input type="checkbox" name="native " value="native" checked="" /> Native Hawaiian or Other Pacific Islander <br>

 </div>';
$pdf->writeHTMLCell(90, 7, 112, 175, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>3.   </b>  Height </div>';
$pdf->writeHTMLCell(30, 7, 112, 205, $html, 0, 0, false, true, 'J', true);
$html= '<div><label for="selection">Feet:</label>
<select name="feet" size="0">
    <option value=" ">select</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(40, 7, 142, 205, $html, 0, 0, false, true, 'J', true);

$html1= '<div><label for="selection">Inches:</label>
<select name="inches" size="0">
    <option value=" ">select</option>
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
$pdf->writeHTMLCell(90, 7, 172, 205, $html1, 0, 0, false, true, 'J', true);

$html= '<div><b>4.    </b>   Weight   &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;   &nbsp;   Pounds </div>';
$pdf->writeHTMLCell(50, 7, 112, 215, $html, 0, 0, false, true, 'J', true);
$pdf->TextField('part3_4_pound', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 176, 215);
$pdf->TextField('part3_4_pound', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 215);
$pdf->TextField('part3_4_pound', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 215);
//...........

$html= '<div><b>5.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 11);
$html= '<div>   
&nbsp; &nbsp;&nbsp;<input type="checkbox" name="black" value="black" checked="" /> Black 
&nbsp;  &nbsp;  &nbsp;&nbsp;<input type="checkbox" name="blue" value="blue" checked="" /> Blue 
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="brown" value="brown" checked="" /> Brown <br>

&nbsp; &nbsp; &nbsp; <input type="checkbox" name="gray " value="gray" checked="" />  Gray
&nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" name="green " value="green" checked="" /> Green 
&nbsp; &nbsp; <input type="checkbox" name="hazel " value="hazel" checked="" /> Hazel <br>

&nbsp; &nbsp; &nbsp; <input type="checkbox" name="maroon" value="maroon" checked="" /> Maroon 
&nbsp; &nbsp;<input type="checkbox" name="pink" value="pink" checked="" /> Pink 
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown" value="unknown" checked="" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 114, 235, $html, 0, 0, false, true, 'J', true);

//............... page 4 end  ...........  


//............page 5 start ...........     

$pdf->AddPage('P', 'LETTER'); // page number 5

$pdf->SetFont('times', '', 11);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div><b>Part 3. Biographic Information</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, true, 'J', true);
//........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>6.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 25, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$html= '<div>   
&nbsp;<input type="checkbox" name="blad" value="blad" checked="" /> Blad(No hair) 
&nbsp;&nbsp;<input type="checkbox" name="black" value="black" checked="" /> Black
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="blond" value="blond" checked="" /> Blond <br>

 &nbsp; <input type="checkbox" name="brown " value="brown" checked="" /> brown 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; <input type="checkbox" name="gray " value="gray" checked="" /> Gray 
 &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox" name="red " value="red" checked="" /> Red <br>

 &nbsp; <input type="checkbox" name=" sandy" value=" sandy" checked="" /> Sandy  
&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; <input type="checkbox" name="white" value="white" checked="" />  White
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown" value="unknown" checked="" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 14, 32, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 12);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div><b>Part 4. Information About Beneficiary</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 52, $html, 1, 1, true, true, 'J', true);

//..........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>1.  </b>   Alien Registration Number (A-Number) (if any) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, true, 'J', true);

//.......
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 39, 50, false); // angle
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 46, 66, $html, 0, 1, false, false, 'J', true);
//...........
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_registration', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 66);

//...........

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 73, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_online_account', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 79);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 43, 95, false); // angle
$pdf->StopTransform();

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3. </b>   &nbsp; &nbsp;  U.S. Social Security Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 86, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_3_social_security', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 92);

//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 50, 98, false); // angle
$pdf->StopTransform();
//........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'I', 12);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div><b> Beneficiary\'s Full Name </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 101, $html, 0, 1, true, true, 'J', true);

//................
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 108, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_4a_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 111);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 118, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_4b_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 120);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 129, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_4c_middle', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 129);
//.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Names Used </b>(if any)</div>';
$pdf->writeHTMLCell(90, 7, 13, 139, $html, 0, 1, true, false, 'J', true);
//...........
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 10);
$html ='<div>Provide all other names the beneficiary has ever used, including
aliases, maiden name, and nicknames.</div>';
$pdf->writeHTMLCell(93, 7, 12, 148, $html, 0, 1, false, true, 'J', false);

//.......
//................
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 156, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_5a_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 158);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 165, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_5b_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 167);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 176, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_5c_middle', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 176);

//.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Information About Beneficiary </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 186, $html, 0, 1, true, false, 'J', true);

//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>6. </b> &nbsp; &nbsp;  City/Town/Village of Birth </div>';
$pdf->writeHTMLCell(90, 7, 12, 193, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_6_city_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 198.5);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>7. </b>  &nbsp; &nbsp;  Country of Birth </div>';
$pdf->writeHTMLCell(90, 7, 12, 206, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_7_country_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 211.5);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>8. </b>  &nbsp; &nbsp;  Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 219, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_8_date_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 220);
//.......
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>9.   </b>   Sex   
&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; <input type="checkbox" name="male" value="male" checked="" /> Male  
&nbsp;&nbsp;<input type="checkbox" name="female" value="female" checked="" /> Female

 </div>';
$pdf->writeHTMLCell(90, 7, 12, 228, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>10. </b>  Has anyone else ever filed a petition for the beneficiary? <br>    
&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; 
<input type="checkbox" name="yes" value="yes" checked="" /> Yes  
&nbsp; &nbsp; <input type="checkbox" name="no" value="no" checked="" /> No
 &nbsp; &nbsp;<input type="checkbox" name="unknown" value="unknown" checked="" /> Unknown
 </div>';
$pdf->writeHTMLCell(93, 10, 12, 235, $html, 0, 0, false, true, 'J', true);

//............

$html ='<div><b>NOTE: </b> Select "Unknown" only if you do not know, and
the beneficiary also does not know, if anyone else has
ever filed a petition for the beneficiary.</div>';
$pdf->writeHTMLCell(87, 7, 16, 248, $html, 0, 1, false, false, 'J', true);


// page 5 left side enfd ...............  

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Beneficiary\'s Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, false, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div>If the beneficiary lives outside the United States in a home
without a street number or name, leave <b>bItem Numbers 11.a.</b>
and <b>11.b.</b> blank.</div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 1, false, true, 'J', true);

//...........
$pdf->SetFont('times', '', 10.5);
$html = '<b>11.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 40, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_11a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 42);
//..........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>11.b.  </b>  <input type="checkbox" name="apt1" value="apt1" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste1" value="ste1" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr1" value="flr1" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 50, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_11b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 50.5);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>11.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 59, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_11c_city_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 59);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>11.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>11.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 68, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 68, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_11_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 67.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>11.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 76, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_11f_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 76);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>11.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 84.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_11g_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 84.5);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>11.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 91, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_11h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 97);

//...............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Address and Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 107, $html, 0, 1, true, false, 'J', true);

//..................
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.1);
$html ='<div>Provide the address in the United States where the beneficiary
intends to live, if different from <b>Item Numbers 11.a. - 11.h.</b> If
the address is the same, type or print "SAME" in <b>Item Number
12.a.</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 116, $html, 0, 1, false, true, 'J', false);

//...........
$pdf->SetFont('times', '', 10.5);
$html = '<b>12.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 132, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_12a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 133);
//..........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>12.b.  </b>  <input type="checkbox" name="apt4" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste4" value="ste1" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr4" value="flr1" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 142, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_12b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 141.5);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_12c_city_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 150);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 158, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 158, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 9); // set font
$pdf->TextField('part4_12_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 158);

//..............

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the beneficiary\'s address outside the United States, if
different from <b>Item Numbers 11.a. - 11.h.</b> If the address is the
ame, type or print "SAME" in <b>Item Number 13.a.</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 167, $html, 0, 1, false, true, 'J', false);
//...........



$pdf->setFont('times', '', 11);
$html= '<div><b>13.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 182, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13a_street_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 183);

//.............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>13.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 192, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13b_apt_ste', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),164, 192);


//......

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>13.c.</b> &nbsp; City Or Town </div>';
$pdf->writeHTMLCell(50, 0, 112, 201, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13c_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 201);
//............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>13.d.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 209, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13f_provience', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 210);
//...............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>13.e.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(35, 0, 112, 219, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13g_postal_code', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 219);

//........

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>13.f.</b> &nbsp; Country</div>';
$pdf->writeHTMLCell(30, 0, 112, 225.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13h_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 231);
//..........

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>14.  </b>  &nbsp; Daytime Telephone Number (if any) </div>';
$pdf->writeHTMLCell(90, 0, 112, 239.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_14_telephone', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 245);

//..............page number 5 end 














































$js = "
var fields = {
    'volga_number':' ',
    'attorney_statebar_number':' ',
    'attorney_account_number':' ',
    'part2_registration':' ',
    'part2_3_social_security':' ',
    'part2_4a_lastname':' ',
    'part2_4b_firstname':' ',
    'part2_4c_middle':' ',
    'part2_online_account':' ',
    'part2_5a_lastname':' ',
    'part2_5b_firstname':' ',
    'part2_5c_middle':' ',
    'part2_city_town':' ',
    'part2_7_country_birth':' ',
    'part2_8_date_birth':' ',
    'part2_10a_care_name':' ',
    'part2_10b_street_number':' ',
    'part2_10c_apt_ste':' ',
    'part2_10d_city_town':' ',
    'state':' ',
    'part2_10f_zipcode':' ',
    'part2_10g_province':' ',
    'part2_10h_postal_code':' ',
    'part2_10i_country':' ',
    'part2_12a_street':' ',
    'part2_12b_apt_ste_flr':' ',
    'part2_12c_city_or_town':' ',
    'part2_12_zip_code':' ',
    'part2_12f_province':' ',
    'part2_12g_postal_code':' ',
    'part2_12h_country':' ',
    'part2_13_date_from':' ',
    'part2_13b_date_to':' ',
    'part2_14a_street':' ',
    'part2_14b_apt_ste_flr':' ',
    'part2_14c_city_or_town':' ',
    'part2_14_zip_code ':' ',
    'part2_14f_province':' ',
    'part2_14g_postal_code':' ',
    'part2_14h_country':' ',
    'part2_15a_date_from':' ',
    'part2_15b_date_to':' ',
    'part2_16_married':' ',
    'part2_14_zip_code':' ',
    'part2_18_married_date':' ',
    'part2_19a_city_town':' ',
    'part2_19b_province':' ',
    'part2_19d_country':' ',
    'part2_20a_lastname':' ',
    'part2_20b_firstname':' ',
    'part2_20c_middle':' ',
    'part2_21_date_ended':' ',
    'part2_22a_lastname':' ',
    'part2_22b_firstname':' ',
    'part2_22c_middle':' ',
    'part2_23_date_ended':' ',
    'part2_24a_lastname':' ',
    'part2_24b_firstname':' ',
    'part2_24c_middle':' ',
    'part2_25_date_birth':' ',
    'part2_27_country_birth':' ',
    'part2_28_city_town':' ',
    'part2_29_residence':' ',
    'part2_30a_lastname':' ',
    'part2_30b_firstname':' ',
    'part2_30c_middle':' ',
    'part2_31_date_birth':' ',
    'part2_33_country_birth':' ',
    'part2_34_city_town':' ',
    'part2_35_residence':' ',
    'part2_39a_certification':' ',
    'part2_39b_place':' ',
    'part2_39c_date_issue':' ',
    'part2_40a_admission':' ',
    'part2_40b_admission_date':' ',
    'part2_40c_city_town':' ',
    'part2_42_employer_company':' ',
    'part2_43a_street':' ',
    'part2_43b_ste_flr':' ',
    'part2_43c_city_or_town':' ',
    'part2_43_zip_code':' ',
    'part2_43f_province':' ',
    'part2_43g_postal_code':' ',
    'part2_43h_country':' ',
    'part2_44_occupation':' ',
    'part2_45a_date_from':' ',
    'part2_45b_date_to':' ',
    'part2_46_employer_company':' ',
    'part2_47a_street':' ',
    'part2_47b_ste_flr':' ',
    'part2_47c_city_or_town':' ',
    'part2_47_zip_code':' ',
    'part2_47f_province':' ',
    'part2_47g_postal_code':' ',
    'part2_47h_country':' ',
    'part2_48_occupation':' ',
    'part2_49a_date_from':' ',
    'part2_49b_date_to':' ',
    'feet':' ',
    'inches':' ',
    'part3_4_pound':' ',
    'part4_registration':' ',
    'part4_online_account':' ',
    'part4_3_social_security':' ',
    'part4_4a_lastname':' ',
    'part4_4b_firstname':' ',
    'part4_4c_middle':' ',
    'part4_5a_lastname':' ',
    'part4_5b_firstname':' ',
    'part4_5c_middle':' ',
    'part4_6_city_town':' ',
    'part4_7_country_birth':' ',
    'part4_8_date_birth':' ',
    'part4_11a_street':' ',
    'part4_11b_ste_flr':' ',
    'part4_11c_city_town':' ',
    'part4_11_zip_code':' ',
    'part4_11f_province':' ',
    'part4_11g_postal_code':' ',
    'part4_11h_country':' ',
    'part4_12a_street':' ',
    'part4_12b_ste_flr':' ',
    'part4_12c_city_town':' ',
    'part4_12_zip_code':' ',
    'part4_13a_street_number':' ',
    'part4_13b_apt_ste':' ',
    'part4_13c_city_town':' ',
    'part4_13e_zipcode':' ',
    'part4_13f_provience':' ',
    'part4_13g_postal_code':' ',
    'part4_13h_country':' ',
    'part4_14_telephone':' ',
    '':' ',





   
};

for (var fieldName in fields) {
    if (!fields.hasOwnProperty(fieldName)) continue;
    var field = getField(fieldName);
    if (field && field.value === '') {
        field.value = fields[fieldName];
    }
}

function SubmitCustomForm() {
	this.submitForm('https://lms.siscotech.com/views/work_file/pdf/fetch.php', true);
}
";
$pdf->IncludeJS($js);

// reset pointer to the last page
// $pdf->lastPage();
//Close and output PDF document
$pdf->Output('form i-130.pdf', 'I');

?>