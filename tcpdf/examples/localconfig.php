<?php
$allDataCountry = [];
$attorney         = '';
$attorneyData     = '';

function showData($name, $arrayNo = "") {}

function addYesNoQuestion($pdf, $question, $x, $y, $fieldName, $dataKey){
    // Determine checkbox status
    $value = showData($dataKey);
    $checked_y = $value === "Y" ? "checked" : "";
    $checked_n = $value === "N" ? "checked" : "";
    // Set fonts
    $pdf->SetFont('times', '', 10);

    // Write question
    $pdf->writeHTMLCell(190, 7, $x, $y, $question, 0, 1, false, false, 'L', true);
    // Write Yes/No labels
    $pdf->writeHTMLCell(120, 7, 182, $y + 1, "Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No", '', 0, 0, true, 'L');
    // Write checkboxes
    $pdf->SetFont('times', '', 14);
    $html = '<div><input type="checkbox"  name="' . $fieldName . '" value="Y" ' . $checked_y . ' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="' . $fieldName . '" value="N" ' . $checked_n . ' /></div>';
    $pdf->writeHTMLCell(50, 7, 176, $y, $html, 0, 1, false, true, 'J', true);
}
 
// use case
// addYesNoQuestion($pdf, 'Have you resided at your current address for at least 5 years?', 20, 32.5, '54', 'i_131_exclusion_status');

function drawCheckboxWithLabel($pdf, float $x, float $y, string $checkboxName, string $dataKey, string $labelText): void {
    // Check the data using showData
    $checked = (showData($dataKey) === 'Y') ? 'checked' : '';

    // Set font and write checkbox HTML
    $pdf->SetFont('times', '', 14);
    $html = '<input type="checkbox" name="' . $checkboxName . '" value="Y" ' . $checked . ' />';
    $pdf->writeHTMLCell(50, 15, $x, $y, $html, 0, 1, false, true, 'L', true);

    // Draw label beside checkbox
    $pdf->SetFont('times', '', 10);
    $labelX = $x + 7;
    $labelY = $y + 1;
    $pdf->writeHTMLCell(190, 7, $labelX, $labelY, $labelText, 0, 0, false, true, 'L', true);
}

// drawCheckboxWithLabel(
//     $pdf,
//     19,                       // X position
//     107,                      // Y position
//     'terms_checkbox',         // Checkbox name attribute
//     'i_131_correction_terms_conditions_status',  // Data key for showData()
//     'Terms and Conditions'    // Label text
// );

// if (showData('ever_in_united_states_status') == "Y") $checked_yes = "checked";
// else $checked_yes = "";
// checked="' . $checked_yes . '"
// if (showData('beneficiary_lived_together_address_apt_ste_flr') == "apt") $apt_checked = "checked";
// else $apt_checked = "";
// if (showData('beneficiary_lived_together_address_apt_ste_flr') == "ste") $ste_checked = "checked";
// else $ste_checked = "";
// if (showData('beneficiary_lived_together_address_apt_ste_flr') == "flr") $flr_checked = "checked";
// else $flr_checked = "";