<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

//============================================================+
//
// First Page Variables
//
//============================================================+
$name = "Md. Saiful Islam";
$address = "4723 Parkway Street";
$city_state_zip = "San Diego, CA-92111";
$phone = "760-271-0177";
$email = "stevenson@gmail.com";

// for check box
$chk_plaintiff_petitioner = 1;
if($chk_plaintiff_petitioner==0) $chk_plaintiff_petitioner = false;	else $chk_plaintiff_petitioner = true;

// for check box
$chk_defendant_respondent = 0;
if($chk_defendant_respondent==0) $chk_defendant_respondent = false;	else $chk_defendant_respondent = true;

// for check box
$chk_plaintiff_petitioner_attorney = 0;
if($chk_plaintiff_petitioner_attorney==0) $chk_plaintiff_petitioner_attorney = false; else $chk_plaintiff_petitioner_attorney = true;

// for check box
$chk_plaintiff_petitioner_attorney_dash = 0;
if($chk_plaintiff_petitioner_attorney_dash==0) $chk_plaintiff_petitioner_attorney_dash = false;	else $chk_plaintiff_petitioner_attorney_dash = true;

// for check box
$chk_district = 0;
if($chk_district==0) $chk_district = false;	else $chk_district = true;

// for check box
$chk_justice_court = 0;
if($chk_justice_court==0) $chk_justice_court = false;	else $justice_court = true;

$judicial_district = "US district court";
$country = "United States";
$court_address = "1700 Broadway, Denver, CO 80290, USA";
$plaintiff_petitioner2 = "Demo";
$defendant_respondent2 = "Demo";
$title = "Demo title";
$name_of_served = "Mr. John";
$last_contact = "+1 202-502-2600";
$served_date = "February 25, 2019";
$describe = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

//============================================================+
//
// Second Page Variables
//
//============================================================+

// for check box
$chk_believed_avoiding_service_of_served_person = 0;
if($chk_believed_avoiding_service_of_served_person==0) $chk_believed_avoiding_service_of_served_person = false;
else $chk_believed_avoiding_service_of_served_person = true;

// for check box
$chk_sending_email = 0;
if($chk_sending_email==0) $chk_sending_email = false;	else $chk_sending_email = true;

// for check box
$chk_sending_phone_number = 0;
if($chk_sending_phone_number==0) $chk_sending_phone_number = false;	else $chk_sending_phone_number = true;

// for check box
$chk_mailing_from_certified_mail = 0;
if($chk_mailing_from_certified_mail==0) $chk_mailing_from_certified_mail = false;	else $chk_mailing_from_certified_mail = true;

// for check box
$chk_publishing_summons_newspaper = 0;
if($chk_publishing_summons_newspaper==0) $chk_publishing_summons_newspaper = false;	else $chk_publishing_summons_newspaper = true;

$location_of_served_person = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$failure_reason_of_served_person = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$believed_avoiding_service_of_served_person = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$publishing_summons = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$sending_email = "myemail@gmail.com";
$sending_phone_number = "+1 202-502-2789";
$publishing_summons_newspaper = "+1 202-502-2789";

//============================================================+
//
// Third Page Variables
//
//============================================================+

// for check box
$chk_posting_social_media = 0;
if($chk_posting_social_media==0) $chk_posting_social_media = false;	else $chk_posting_social_media = true;

// for check box
$chk_other_method = 0;
if($chk_other_method==0) $chk_other_method = false;	else $chk_other_method = true;

$general_circulation = "Lorem ipsum dolor sit amet";
$posting_social_media = "Facebook";
$user_name_of_person_served = "Lorem ipsum";
$other_method = "Lorem ipsum dolor sit amet";
$believed_status = "Lorem ipsum dolor sit amet";


// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    //Page header
    public function Header() {
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
		
		$footer_top_border = array(
		   'B' => array('width' => 0.1, 'color' => array(0,0,0), 'dash' => 1, 'cap' => 'square'),
		);
		$this->Cell(170, 4, '', $footer_top_border, 1, 1);
		
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
		$created_date = date("F d, Y");
		$this->Cell(60, 4, '1025GEJ Approved '.$created_date);
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018    ', $single_border_top, 0, 0);
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018', 1, 0, 'L');
		// $this->MultiCell(60, 4,'1025GEJ Approved February 26, 2018','T','L',1,0);
		
        $this->SetFont('helvetica', 'B', 8);
		$this->Cell(80, 4, 'Ex Parte Motion for Alternative Service',0, 0, 'C');
		// $this->MultiCell(60, 4,'Ex Parte Motion for Alternative Service','T','C',1,0);
		
        $this->SetFont('helvetica', '', 8);
        $this->Cell(30, 4, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, true, 'R', 'M');
    }
}


// create new PDF document
$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Md. Saiful Islam');
$pdf->SetTitle('Dynamic Document');
$pdf->SetSubject('Dynamic Document');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'../lang/eng.php')) {
    require_once(dirname(__FILE__).'../lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);
$pdf->SetMargins(24, 20, 10, true);
// add a page
$pdf->AddPage('P', 'LETTER');

/*
It is possible to create text fields, combo boxes, check boxes and buttons.
Fields are created at the current position and are given a name.
This name allows to manipulate them via JavaScript in order to perform some validation for instance.
*/

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

// print an ending header line
// $pdf->setFormDefaultProp(array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));

$pdf->Cell(100, 19, '', 0, 1);

$single_border_top = array(
   'T' => array('width' => 0.25, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$single_border_right = array(
   'R' => array('width' => 0.25, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$single_border_bottom = array(
   'B' => array('width' => 0.25, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$single_border_left = array(
   'L' => array('width' => 0.25, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);

$text_field_style = array(
	'fillColor'=>array(255, 255, 255),
	'strokeColor'=>array(255, 255, 255)
);

// name TextField
$pdf->SetFont('helvetica', '', 14);
$pdf->TextField('name',80,7,$text_field_style,array('v' => $name),25,36);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 0, '[  ] This is a private record.', 0, 1, 'C');

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(81, 4,"Name", $single_border_top,1,1);


// address TextField
$pdf->SetFont('helvetica', '', 14);
$pdf->TextField('address',80,6,$text_field_style,array('v' => $address),25,48);
$pdf->Ln(6);
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(81, 4,"Address", $single_border_top,1,1);


// city TextField
$pdf->SetFont('helvetica', '', 14);
$pdf->TextField('city_state_zip',80,6,$text_field_style,array('v' => $city_state_zip),25,58);
$pdf->Ln(6);
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(81, 4,"City, State, Zip", $single_border_top,1,1);

// phone TextField
$pdf->SetFont('helvetica', '', 14);
$pdf->TextField('phone',80,6,$text_field_style,array('v' => $phone),25,68);
$pdf->Ln(6);
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(81, 4,"Phone", $single_border_top,1,1);

// email TextField
$pdf->SetFont('helvetica', '', 14);
$pdf->TextField('email',80,6,$text_field_style,array('v' => $email),25,78);
$pdf->Ln(6);
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(81, 4,"Email", $single_border_top,1,1);

$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(10, 5, 'I am');
// Plaintiff Petitioner CheckBox
$pdf->CheckBox('plaintiff_petitioner', 5, $chk_plaintiff_petitioner, array(), array(), 'OK');
$pdf->Cell(50, 5, 'Plaintiff/Petitioner');
// Defendant Respondent CheckBox
$pdf->CheckBox('defendant_respondent', 5, $chk_defendant_respondent, array(), array(), 'OK');
$pdf->Cell(50, 5, 'Defendant/Respondent', 0, 1);
$pdf->Cell(10, 5, '');
// Plaintiff Petitioner Attorney CheckBox
$pdf->CheckBox('plaintiff_petitioner_attorney', 5, $chk_plaintiff_petitioner_attorney, array(), array(), 'OK');
$pdf->Cell(50, 5, 'Plaintiff/Petitioner’s Attorney');
// Plaintiff Petitioner Attorney Dash CheckBox
$pdf->CheckBox('plaintiff_petitioner_attorney_dash', 5, $chk_plaintiff_petitioner_attorney_dash, array(), array(), 'OK');
$pdf->Cell(50, 5, 'Defendant/Respondent’s Attorney (Utah Bar #:__________)', 0, 1);

// Single Border
$pdf->Ln(2);
$pdf->Cell(170, 3, '', $single_border_bottom, 1, 1);
$pdf->Ln(2);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(54, 5, 'In the', 0, 0, 'R');
// CheckBox CheckBox
$pdf->CheckBox('district', 6, $chk_district, array(), array(), 'OK');
$pdf->Cell(20, 5, 'District');
// Justice Court CheckBox
$pdf->CheckBox('justice_court', 6, $chk_justice_court, array(), array(), 'OK');
$pdf->Cell(50, 5, 'Justice Court of Utah', 0, 1, 'L');


$pdf->SetFont('helvetica', '', 12);
$pdf->TextField('judicial_district',32,5,$text_field_style,array('v' => $judicial_district),45,115);	// Judicial District TextField
$pdf->TextField('country',35,5,$text_field_style,array('v' => $country),110,115);	// Country TextField
$pdf->TextField('court_address',110,5,$text_field_style,array('v' => $court_address),65,122);	// Court Address TextField
$pdf->TextField('plaintiff_petitioner2',89,6,$text_field_style,array('v' => $plaintiff_petitioner2),25,142);	// Plaintiff Petitioner TextField
$pdf->TextField('defendant_respondent2',89,6,$text_field_style,array('v' => $defendant_respondent2),25,164);	// Defendant Respondent TextField

$pdf->TextField('title',142,6,$text_field_style,array('v' => $title),37,201);	// Title TextField
$pdf->TextField('name_of_served',98,6,$text_field_style,array('v' => $name_of_served),37,212);	// Name of Served TextField
$pdf->TextField('last_contact',102,5,$text_field_style,array('v' => $last_contact),75,219);	// Last Contact TextField
$pdf->TextField('served_date',49,5,$text_field_style,array('v' => $served_date),86,227);	// Served Date TextField

// Describe TextField
$pdf->TextField('describe', 157,24, array(
	'multiline'=>true, 'lineWidth'=>5, 'borderStyle'=>'none','fillColor'=>array(255, 255, 255),'strokeColor'=>array(255, 255, 255)
), array('v' => $describe),37,238);


$pdf->Ln(3);
$pdf->Cell(158, 4,"_______________ Judicial District ________________Country", 0, 1, "C");
$pdf->Ln(3);
$pdf->Cell(165, 4,"Court Address ________________________________________________", 0, 1, "C");


$pdf->Cell(170, 2, '', $single_border_bottom, 1, 1);
// use for empty space
$pdf->Cell(90, 5, '', 0, 0);
$pdf->Cell(2, 5, '', $single_border_right, 0, 1);
$pdf->Cell(2, 5, '   ', 0, 1);

$pdf->SetFont('helvetica', '', 11);	// set font
$pdf->SetLineWidth(0.25);	// set border width
$pdf->SetDrawColor(0,0,0);	// set color for cell border
$pdf->SetFillColor(255,255,255);	// set filling color

$pdf->Cell(90, 10, '', '', 0, 'L', 0, '', 0, false, 'T', 'L');
$pdf->Cell(2, 10, '', $single_border_right, 0, 1);
$pdf->Cell(2, 10, '   ', 0, 0);
$pdf->SetFont('helvetica', 'B', 11);	// set font
$pdf->MultiCell(60, 10, 'Ex Parte Motion for Alternative Service', 0, 'L', 0, 1, '', '', true);
$pdf->SetFont('helvetica', '', 10);	// set font

// $pdf->Cell(30, 10, 'Ex Parte Motion for Alternative Service', 1, 1);
$pdf->Cell(90, 4, 'Plaintiff/Petitioner', $single_border_top, 0, 1);
$pdf->Cell(2, 10, '', $single_border_right, 0, 1);
$pdf->Cell(2, 10, '   ', 0, 0);
$pdf->Cell(60, 3, '(Utah Rule of Civil Procedure 4(d))', 0, 0);
$pdf->Cell(5, 10, '', 0, 1);
$pdf->Cell(90, 3, 'V.', 0, 0);
$pdf->Cell(2, 20, '', $single_border_right, 0, 1);
$pdf->Cell(2, 15, '   ', 0, 0);
$pdf->Cell(60, 5, 'Case Number', $single_border_top, 1, 1);

// use for empty space
$pdf->Cell(90, 7, '', 0, 0);
$pdf->Cell(2, 7, '', $single_border_right, 0, 1);
$pdf->Cell(2, 7, '   ', 0, 1);

$pdf->Cell(90, 4, 'Defendant/Respondent', $single_border_top, 0, 1);
$pdf->Cell(2, 10, '', $single_border_right, 0, 1);
$pdf->Cell(2, 10, '   ', 0, 0);
$pdf->Cell(60, 5, 'Judge', $single_border_top, 1, 1);


// use for empty space
$pdf->Cell(90, 7, '', 0, 0);
$pdf->Cell(2, 7, '', $single_border_right, 0, 1);
$pdf->Cell(2, 7, '   ', 0, 1);

$pdf->Cell(90, 7, '', 0, 0);
$pdf->Cell(2, 7, '', $single_border_right, 0, 1);
$pdf->Cell(2, 7, '   ', 0, 0);
$pdf->Cell(60, 7, 'Commissioner (domestic cases)', $single_border_top, 1, 1);

$pdf->Cell(170, 2, '', $single_border_top, 1, 1);


$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(12, 8, '1.', 0, 0);
$pdf->Cell(150, 8, 'I ask the court to order alternative service of', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(150, 5, '_________________________________________________________________________ (title', 0, 1);
$pdf->Cell(12, 3, '', 0, 0);
$pdf->Cell(150, 3, 'of document(s)) be made upon', 0, 1);
$pdf->Cell(12, 8, '', 0, 0);
$pdf->Cell(150, 8, '__________________________________________________ (name of person to be served).', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(12, 5, '2.', 0, 0);
$pdf->Cell(38, 5, 'My last contact with', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(100, 5, '____________________________________________________ (name of', 0, 1);
$pdf->Ln(3);
$pdf->Cell(12, 4, '', 0, 0);
$pdf->Cell(34, 4, 'person to be served)', 0, 0);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(15, 4, 'was on', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(60, 4, '_________________________ (date)', 0, 0);
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(50, 4, 'under the following', 0, 1);
$pdf->Cell(12, 4, '', 0, 0);
$pdf->Cell(150, 4, 'circumstances (Describe.):', 0, 1);


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$pdf->AddPage();

// Location of Served Person TextField
$pdf->TextField('location_of_served_person', 157,24, array(
	'multiline'=>true, 'lineWidth'=>5, 'borderStyle'=>'none','fillColor'=>array(255, 255, 255),'strokeColor'=>array(255, 255, 255)
), array('v' => $location_of_served_person),37,38);
// Failure Reason of Served Person TextField
$pdf->TextField('failure_reason_of_served_person', 157,24, array(
	'multiline'=>true, 'lineWidth'=>5, 'borderStyle'=>'none','fillColor'=>array(255, 255, 255),'strokeColor'=>array(255, 255, 255)
), array('v' => $failure_reason_of_served_person),37,75);
// Believed Avoiding of Served Person TextField
$pdf->TextField('believed_avoiding_service_of_served_person', 151,24, array(
	'multiline'=>true, 'lineWidth'=>5, 'borderStyle'=>'none','fillColor'=>array(255, 255, 255),'strokeColor'=>array(255, 255, 255)
), array('v' => $believed_avoiding_service_of_served_person),43,118);
// Publishing Summons TextField
$pdf->TextField('publishing_summons', 151,24, array(
	'multiline'=>true, 'lineWidth'=>5, 'borderStyle'=>'none','fillColor'=>array(255, 255, 255),'strokeColor'=>array(255, 255, 255)
), array('v' => $publishing_summons),43,206);
// Sending Email TextField
$pdf->TextField('sending_email',70,5,$text_field_style,array('v' => $sending_email),84,159);
// Sending Phone Number TextField
$pdf->TextField('sending_phone_number',70,5,$text_field_style,array('v' => $sending_phone_number),94,176);
// Publishing Summons Newspaper TextField
$pdf->TextField('publishing_summons_newspaper',110,5,$text_field_style,array('v' => $publishing_summons_newspaper),43,240);
$pdf->Ln(6);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(12, 5, '3.', 0, 0);
$pdf->Cell(113, 5, 'I have done the following to locate the above-named person', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(40, 5, '(Describe all the things', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
$pdf->Cell(100, 5, 'you have done to try to find the person.):', 0, 1);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(170, 30, '', 0, 1);
$pdf->Cell(12, 5, '4.', 0, 0);
$pdf->Cell(113, 5, 'The attempts to serve the above-named person have failed because:', 0, 1);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(170, 30, '', 0, 1);
$pdf->Cell(12, 5, '5.', 0, 0);
// Believed Avoiding Service of Served Person CheckBox
$pdf->CheckBox('believedAvoidingServiceOfServedPerson', 6, $chk_believed_avoiding_service_of_served_person, array(), array(), 'OK');
$pdf->Cell(113, 5, 'I believe that the above-named person is avoiding service because:', 0, 1);

$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(18, 5, '', 0, 0);
$pdf->MultiCell(151, 10, 'Describe how you know the person should be at the address(es) used, and how many times
service was attempted. Provide dates, address(es) and other relevant information.)', 0, 'L', 1, 0, '', '', true, 0, false, true, 10, 'T');

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(170, 37, '', 0, 1);
$pdf->Cell(12, 5, '6.', 0, 0);
$pdf->Cell(113, 5, 'I ask for an order allowing the above-named document(s) to be served by the', 0, 1);

$pdf->Cell(12, 5, '', 0, 0);
$pdf->Cell(37, 5, 'following methods:', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(50, 5, '(Choose all that apply.)', 0, 1);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(170, 3, '', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
// Sending Email CheckBox
$pdf->CheckBox('sendingEmail', 6, $chk_sending_email, array(), array(), 'OK');
$pdf->Cell(114, 5, 'Sending an e-mail to _______________________________', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(27, 5, '(e-mail address)', 0, 0);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(10, 5, 'with', 0, 1);
$pdf->Cell(18, 5, '', 0, 0);
$pdf->Cell(114, 5, 'Sthe document(s) attached.', 0, 1);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(170, 7, '', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
// Sending Phone Number CheckBox
$pdf->CheckBox('sendingPhoneNumber', 6, $chk_sending_phone_number, array(), array(), 'OK');
$pdf->Cell(123, 5, 'Sending a text message to ______________________________', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(27, 5, '(phone number)', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(18, 5, '', 0, 0);
$pdf->Cell(114, 5, 'saying they can get a copy of the document(s) from the court.', 0, 1);

$pdf->Cell(170, 7, '', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
// Mailing From Certified Mail CheckBox
$pdf->CheckBox('mailingFromCertifiedMail', 5, $chk_mailing_from_certified_mail, array(), array(), 'OK');
$pdf->Cell(123, 5, 'Mailing the document(s) by certified mail with return receipt requested to the', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(18, 5, '', 0, 0);
$pdf->Cell(114, 5, 'above-named person in the care of the following name and address:', 0, 1);

$pdf->Cell(170, 28, '', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
// $pdf->CheckBox('publishing_summons_newspaper', 6, true, array(), array(), 'OK');

// publishing Summons Newspaper CheckBox
$pdf->CheckBox('publishingSummonsNewspaper', 5, $chk_publishing_summons_newspaper, array(), array(), 'OK');

$pdf->Cell(123, 5, 'Publishing a summons once a week for 4 consecutive weeks in', 0, 1);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(18, 12, '', 0, 0);
$pdf->Cell(123, 12, '________________________________________________________ (name of newspaper),', 0, 1);


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$pdf->AddPage();

// General Circulation TextField
$pdf->TextField('general_circulation',70,5,$text_field_style,array('v' => $general_circulation),113,40);
// Posting Social Media TextField
$pdf->TextField('posting_social_media',120,5,$text_field_style,array('v' => $posting_social_media),42,67);
// User Name of  Person Served TextField
$pdf->TextField('user_name_of_person_served',72,5,$text_field_style,array('v' => $user_name_of_person_served),110,78);
// Other Method TextField
$pdf->TextField('other_method',139,28,$text_field_style,array('v' => $other_method, 'dv' => $other_method),43,95);
// Believed Status TextField
$pdf->TextField('believed_status',145,28,$text_field_style,array('v' => $believed_status),37,135);

$pdf->Cell(160, 20, '', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(18, 5, '', 0, 0);
$pdf->MultiCell(150, 15, 'a newspaper of general circulation in ______________________________
county', 0, 'L', 1, 1, '', '', true, 0, false, true, 20, 'T');

$pdf->Cell(12, 5, '', 0, 0);
$pdf->CheckBox('postingSocialMedia', 6, $chk_posting_social_media, array(), array(), 'Yes');
$pdf->MultiCell(150, 10, 'Posting a notice on the social media network listed below saying they can
get a copy of the document(s) from the court:', 0, 'L', 1, 1, '', '', true, 0, false, true, 15, 'T');

$pdf->Ln(3);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(18, 20, '', 0, 0);
$pdf->MultiCell(150, 10, '_____________________________________________________________ (name of social
media network, such as Facebook or Twitter.)', 0, 'L', 1, 1, '', '', true, 0, false, true, 15, 'T');

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(18, 5, '', 0, 0);
$pdf->Cell(114, 5, 'User name of person to be served: _______________________________.', 0, 1);

$pdf->Ln(5);
$pdf->Cell(12, 5, '', 0, 0);
$pdf->CheckBox('otherMethod', 6, $chk_other_method, array(), array(), 'OK');
$pdf->Cell(27, 5, 'Other method', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(20, 5, '(Describe.):', 0, 1);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(170, 30, '', 0, 1);
$pdf->Cell(12, 5, '7.', 0, 0);
$pdf->Cell(113, 5, 'I believe the method(s) of service described above will give actual notice', 0, 1);
$pdf->Cell(12, 5, '', 0, 0);
$pdf->Cell(17, 5, 'because', 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(113, 5, '(Be specific about each method of service requested):', 0, 1);

$pdf->Ln(40);
$pdf->Cell(150, 5, 'I declare under criminal penalty of the State of Utah that everything stated in this document is', 0, 1);

$pdf->Ln(15);
$pdf->Cell(70, 5, '', 0, 0);
$pdf->Cell(70, 5, 'Signature', 0, 1);
$pdf->Cell(70, 5, 'Date', $single_border_top, 0, 1);
$pdf->Cell(17, 5, '', 0, 0);
$pdf->Cell(70, 5, '', $single_border_top, 1, 1);

$pdf->Cell(70, 5, '', 0, 0);
$pdf->Cell(24, 5, 'Printed Name', 0, 0);
$pdf->Cell(64, 5, '', $single_border_bottom, 0, 1);

$pdf->SetX(50);
/*
// Button to validate and print
$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Reset Button
$pdf->Button('reset', 30, 10, 'Reset', array('S'=>'ResetForm'), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Submit Button
$pdf->Button('submit', 30, 10, 'Submit', array('S'=>'SubmitForm', 'F'=>'https://mywebsite.com/process.php', 'Flags'=>array('ExportFormat')), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Form validation functions
$js = <<<EOD
function CheckField(name,message) {
	var f = getField(name);
	if(f.value == '') {
	    app.alert(message);
	    f.setFocus();
	    return false;
	}
	return true;
}
function Print() {
	if(!CheckField('name','Name is mandatory')) {return;}
	if(!CheckField('address','Address is mandatory')) {return;}
	if(!CheckField('phone','Phone is mandatory')) {return;}
	if(!CheckField('email','Email is mandatory')) {return;}
	print();
}
EOD;

// Add Javascript code
$pdf->IncludeJS($js);
 */

// ---------------------------------------------------------

//Close and output PDF document
// $pdf->Output('example_014.pdf', 'D');
$pdf->Output('dynamic_document.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+