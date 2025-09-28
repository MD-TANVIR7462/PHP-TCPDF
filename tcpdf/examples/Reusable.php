
//!family name given name and middle nam
$startX = 20;
$startY = 80;
$lineHeight = 6;
$fieldHeight = 7;
$labelFont = ['times', '', 10];
$fieldFont = ['courier', 'B', 10];
$stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// Labels
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, $startX + 72.3, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, $startX + 131,$startY-0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);

// Fields
$pdf->SetFont(...$fieldFont);
$pdf->TextField('p1_1a', 70.5, $fieldHeight, $stroke, array(), $startX + 0.2, $startY + 5);    // Family Name
$pdf->TextField('p1_1b', 57.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
$pdf->TextField('p1_1c', 52, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name

//!....Bigraphic information....
//........
$startX = 12;
$startY = 34;
$labelFont = ['times', '', 10];
$fieldFont = ['courier', 'B', 10];

// Question 1: Ethnicity
$pdf->SetFont(...$labelFont);
$html = '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// Ethnicity checkboxes
$pdf->SetFont('times', '', 14);
if (showData('i_131_biographic_info_ethnicity') == "hispanic") $checked = "checked";
else $checked = "";
$html = '<input type="checkbox" name="hispanic_not_hispanic" value="hispanic"  checked="' . $checked . '" />';
$pdf->writeHTMLCell(5, 1, $startX + 9, $startY + 5, $html, 0, 1, false, false, 'L', false);

if (showData('i_131_biographic_info_ethnicity') == "nothispanic") $checked = "checked";
else $checked = "";
$html = '<input type="checkbox" name="hispanic_not_hispanic" value="nothispanic"  checked="' . $checked . '" />';
$pdf->writeHTMLCell(5, 1, $startX + 46, $startY + 5, $html, 0, 1, false, false, 'L', false);

$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(140, 1, $startX + 15.7, $startY + 5.5, "Hispanic or Latino", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, $startX + 53, $startY + 5.5, "Not Hispanic or Latino", 0, 0, false, true, 'L', true);

// ==================== RACE SECTION ====================
$startY = $startY + 12;

// Question 2: Race
$pdf->SetFont(...$labelFont);
$html = '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Race (Select <b>all applicable</b> boxes)';
$pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// Race checkboxes
$pdf->SetFont('times', '', 14);
if (showData('i_485_biographic_info_race_american_native') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, $startX + 9, $startY + 7, '<input type="checkbox" name="p3_race1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

if (showData('i_485_biographic_info_race_asian') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, $startX + 67, $startY + 7, '<input type="checkbox" name="p3_race2" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

if (showData('i_485_biographic_info_race_black_african') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, $startX + 85, $startY + 7, '<input type="checkbox" name="p3_race3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

if (showData('i_485_biographic_info_race_native_islander') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, $startX +9, $startY + 15, '<input type="checkbox" name="p3_race4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

if (showData('i_485_biographic_info_race_white') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, $startX + 77, $startY + 15, '<input type="checkbox" name="p3_race5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// Race labels
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(140, 1, $startX + 15.7, $startY + 7.5, "American Indian or Alaska Native", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, $startX + 74, $startY + 7.5, "Asian", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, $startX + 92, $startY + 7.5, "Black or African American", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, $startX + 15.7, $startY + 15.5, "Native Hawaiian or Other Pacific Islander", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, $startX + 83, $startY + 15.5, "White", 0, 0, false, true, 'L', true);

// ==================== HEIGHT AND WEIGHT SECTION ====================
$startY = $startY + 24;

$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(0, 0, $startX, $startY, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feet', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, $startX + 52, $startY, 'Inches', 0, 0, false, true, 'L', true);

$pdf->SetFont(...$fieldFont);
$pdf->ComboBox('p8_3feet', 19, 6.6, array('', '2', '3', '4', '5', '6', '7', '8'), array(), array(), $startX + 32, $startY - 0.3);
$pdf->ComboBox('p8_3inches', 19, 6.6, array('','0' ,'1','2', '3', '4', '5', '6', '7', '8', '9', '10', '11'), array(), array(), $startX + 64, $startY - 0.3);

$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(0, 0, $startX + 88, $startY, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pounds', 0, 0, false, true, 'L', true);

$pdf->SetFont(...$fieldFont);
$pdf->TextField('p8_4Pounds1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), $startX + 125, $startY - 0.3);
$pdf->TextField('p8_4Pounds2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), $startX + 132, $startY - 0.3);
$pdf->TextField('p8_4Pounds3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), $startX + 139, $startY - 0.3);

// ==================== EYE COLOR SECTION ====================
$startY = $startY + 8;

$pdf->SetFont(...$labelFont);
$html = '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye color (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// Eye color checkboxes
$pdf->SetFont('times', '', 14);
$eyeColorOptions = [
    ['x' => 21, 'value' => "black", 'label' => "Black", 'label_x' => 28],
    ['x' => 49, 'value' => "blue", 'label' => "Blue", 'label_x' => 56],
    ['x' => 66, 'value' => "brown", 'label' => "Brown", 'label_x' => 73],
    ['x' => 84, 'value' => "gray", 'label' => "Gray", 'label_x' => 91],
    ['x' => 101, 'value' => "green", 'label' => "Green", 'label_x' => 108],
    ['x' => 117.5, 'value' => "hazel", 'label' => "Hazel", 'label_x' => 124.5],
    ['x' => 133.5, 'value' => "marron", 'label' => "Maroon", 'label_x' => 140],
    ['x' => 153, 'value' => "pink", 'label' => "Pink", 'label_x' => 160],
    ['x' => 171, 'value' => "unknown", 'label' => "Unknown/Other", 'label_x' => 178]
];

foreach ($eyeColorOptions as $option) {
    $pdf->SetFont('times', '', 14);
    $checked = (showData('i_131_biographic_info_eye_color') == $option['value']) ? "checked" : "";
    $pdf->writeHTMLCell(5, 1, $option['x'], $startY + 6, '<input type="checkbox" name="p3_eye_color_status' . $option['value'] . '" value="Y"  checked="' . $checked . '" />', 0, 0, false, false, 'L', false);
    
    $pdf->SetFont(...$labelFont);
    $pdf->writeHTMLCell(140, 1, $option['label_x'], $startY + 6.3, $option['label'], 0, 0, false, true, 'L', true);
}

// ==================== HAIR COLOR SECTION ====================
$startY = $startY + 12;

$pdf->SetFont(...$labelFont);
$html = '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hair color (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, $startX, $startY, $html, 0, 0, false, true, 'L', true);

// Hair color checkboxes
$pdf->SetFont('times', '', 14);
$hairColorOptions = [
    ['x' => 21, 'value' => "blad", 'label' => "Bald(No hair)", 'label_x' => 28],
    ['x' => 49, 'value' => "black", 'label' => "Black", 'label_x' => 56],
    ['x' => 66, 'value' => "blond", 'label' => "Blond", 'label_x' => 73],
    ['x' => 84, 'value' => "brown", 'label' => "Brown", 'label_x' => 91],
    ['x' => 102, 'value' => "gray", 'label' => "Gray", 'label_x' => 109],
    ['x' => 118, 'value' => "red", 'label' => "Red", 'label_x' => 125],
    ['x' => 133, 'value' => "sandy", 'label' => "Sandy", 'label_x' => 140],
    ['x' => 153, 'value' => "white", 'label' => "White", 'label_x' => 160],
    ['x' => 171, 'value' => "unknown", 'label' => "Unknown/Other", 'label_x' => 178]
];

foreach ($hairColorOptions as $option) {
    $pdf->SetFont('times', '', 14);
    $checked = (showData('i_131_biographic_info_hair_color') == $option['value']) ? "checked" : "";
    $pdf->writeHTMLCell(5, 1, $option['x'], $startY + 6, '<input type="checkbox" name="p3_hair_color_status' . $option['value'] . '" value="Y"  checked="' . $checked . '" />', 0, 0, false, false, 'L', false);
    
    $pdf->SetFont(...$labelFont);
    $pdf->writeHTMLCell(140, 1, $option['label_x'], $startY + 6.3, $option['label'], 0, 0, false, true, 'L', true);
}
