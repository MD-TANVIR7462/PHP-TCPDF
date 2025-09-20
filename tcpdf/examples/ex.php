


//  *****************************
//  ******** End Page No 8******
//  ******************************/

// ******************************
//  ******** Start Page No 9 ****
//  ******************************/
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(11.6);

// // // Section Header
// $html = '<div><b>Part 4. Additional Information About You (continued)</b></div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 25.5, $html, 1, 1, true, 'L');

// // Employer/School Address Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 32, 'Address of Employer, Company, or School', 0, 1, false, false, 'L', true);

// // Street Number and Name
// $pdf->writeHTMLCell(90, 7, 21, 36.6, 'Street Number and Name', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 43);

// // Apt/Ste/Flr Checkboxes
// if (showData('employer_apt_ste_flr') == "apt") $checked_apt = "checked";
// else $checked_apt = "";
// if (showData('employer_apt_ste_flr') == "ste") $checked_ste = "checked";
// else $checked_ste = "";
// if (showData('employer_apt_ste_flr') == "flr") $checked_flr = "checked";
// else $checked_flr = "";
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox" name="employer_addr_type" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="employer_addr_type" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="employer_addr_type" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 43, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 0, 144.2, 38, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 38, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_unit_number', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 43);

// // City/State/ZIP Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 50, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_city', 120.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 55);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 144.2, 50, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $comboBoxOptions = array('');
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("employer_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 55);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 168, 50, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_zip', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 55);

// // Province/Postal Code/Country Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 62, 'Province', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_province', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 67);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 93, 62, 'Postal Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_postal_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 67);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 132, 62, 'Country', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_country', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 67);

// // Dates Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 75, 'Dates of Employment, Unemployment, Retirement, or School Attendance', 0, 1, false, false, 'L', true);

// $pdf->writeHTMLCell(60, 7, 21, 82, 'From (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employment_from_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 53, 83.3);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(60, 7, 106, 82, 'To (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employment_to_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 134, 83.1);

// // Financial Support Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 89, 'If unemployed or retired, source of financial support:', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('financial_support', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 97);

// // 8. Most Recent Employer/School Outside US Section - UPDATED TO MATCH SCREENSHOT (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 104.5, '<b>8.</b>', 0, 1, false, false, 'L', true);
// $pdf->writeHTMLCell(190, 7, 21, 103.5, 'Provide your most recent employer or school outside of the United States (if not already listed above).', 0, 1, false, false, 'L', true);

// // Name and Occupation on SAME LINE (updated)
// $pdf->writeHTMLCell(90, 7, 21, 110, 'Name of Employer, Company, or School', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(90, 7, 114, 110, 'Your Occupation (if unemployed or retired, so state)', 0, 1, false, false, 'L', true);

// // Text fields below each label
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 117.4);
// $pdf->TextField('foreign_occupation', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 117.4);

// // Address Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 123, 'Address of Employer, Company, or School', 0, 1, false, false, 'L', true);

// // Street Number and Name
// $pdf->writeHTMLCell(90, 7, 21, 128, 'Street Number and Name', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_street', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 138);

// // Apt/Ste/Flr Checkboxes
// $pdf->SetFont('times', '', 14);
// $html = '<div><input type="checkbox" name="foreign_employer_addr_type" value="Apt" checked="' . $checked_apt . '" />&nbsp;<input type="checkbox" name="foreign_employer_addr_type" value="Ste" checked="' . $checked_ste . '"  /> <input type="checkbox" name="foreign_employer_addr_type" value="Flr" checked="' . $checked_flr . '" /></div>';
// $pdf->writeHTMLCell(50, 0, 144, 138, $html, '', 0, 0, true, 'L');
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 0, 144.2, 132, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');
// $pdf->writeHTMLCell(50, 0, 167, 132, "Number", '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_unit_number', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 138);

// // City/State/ZIP Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 146, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_city', 120.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 151);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 144.2, 146, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->ComboBox("foreign_employer_state", 22, 7, $comboBoxOptions, array(), array(), 144.2, 151);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(30, 5, 168, 146, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_zip', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 151);

// // Province/Postal Code/Country Row
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 21, 158, 'Province', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_province', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 163);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 93, 158, 'Postal Code', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_postal_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 163);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(50, 5, 132, 158, 'Country', '', 0, 0, true, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employer_country', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 163);

// // Dates Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 171, 'Dates of Employment, Unemployment, Retirement, or School Attendance', 0, 1, false, false, 'L', true);

// $pdf->writeHTMLCell(60, 7, 21, 178, 'From (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employment_from_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 53, 179.3);

// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(60, 7, 106, 178, 'To (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_employment_to_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 134, 179.1);

// // Financial Support Section
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 21, 185, 'If unemployed or retired, source of financial support:', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('foreign_financial_support', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 193);

// // Part 5 Header (y-4)
// $pdf->SetFont('times', 'B', 12);
// $html = '<div><b>Part 5. Information About Your Parents</b></div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 204, $html, 1, 1, true, 'L');
// $html = '<div><i>Information About Your Parent 1</i></div>';
// $pdf->writeHTMLCell(191.5, 6, 13, 213.5, $html, 0, 1, true, 'L');

// // 1. Parent 1's Legal Name - ALL THREE FIELDS ON ONE LINE (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 220, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent 1\'s Legal Name', 0, 1, false, false, 'L', true);

// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 21, 224, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 86, 223, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 222, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_last_name', 63.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 230);
// $pdf->TextField('parent1_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 230);
// $pdf->TextField('parent1_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 230);

// // 2. Parent 1's Name at Birth - ALL THREE FIELDS ON ONE LINE (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 238, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent 1\'s Name at Birth (if different than above)', 0, 1, false, false, 'L', true);

// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 21, 242, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 86, 241, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 240, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 63.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 248);
// $pdf->TextField('parent1_birth_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 248);
// $pdf->TextField('parent1_birth_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 248);

// // 3. Date of Birth
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 257, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_dob', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 66, 256.5);
// // //.......

// ******************************
//  ******** End Page No 9 ******
//  ******************************/

// ******************************
//  ******** Start Page No 10 ****
//  ******************************/

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 5. Information About Your Parents</b> (continued)</div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
// //........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, 12, 34, '<b>4.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, 20, 34, "Country of Birth ", '', 1, false, 'L');
// //..............
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p13_Applicant_family_name', 90, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 38.7);
// //.................
// $pdf->setFont('Times', 'I', 12);
// $html = "<div><b>Information About Your Parent 2</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 48, $html, 0, 1, true, 'L');
// //........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, 12, 55, '<b>5.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, 20, 55, "Parent 2's Legal Name", '', 1, false, 'L');
// //.............
// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 20, 60, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 86, 59, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 58, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_last_name', 63.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 66);
// $pdf->TextField('parent1_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 66);
// $pdf->TextField('parent1_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 66);

// // 2. Parent 1's Name at Birth - ALL THREE FIELDS ON ONE LINE (y-4)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 74, "<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent 2's Name at Birth (if different than above)", 0, 1, false, false, 'L', true);

// // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->writeHTMLCell(58, 7, 20, 80, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, 85, 79, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, 147, 78, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields below labels (aligned with above)
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 63.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 86);
// $pdf->TextField('parent1_birth_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 86, 86);
// $pdf->TextField('parent1_birth_middle_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 86);

// // 3. Date of Birth
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 95, '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_dob', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 65, 95);
// //.........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 103, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_dob', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 108);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 6. Information About Your Marital History</b></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 120, $html, 1, 1, true, 'L');
// ///..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 127, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is your current marital status?', 0, 1, false, false, 'L', true);
// //.............
// $pdf->SetFont('times', '', 14);
// if (showData('biographic_info_eye_color') == "black") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 20, 133, '<input type="checkbox" name="p3_eye_color_status1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 61, 133, '<input type="checkbox" name="p3_eye_color_status3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 82, 133, '<input type="checkbox" name="p3_eye_color_status4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "green") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 105, 133, '<input type="checkbox" name="p3_eye_color_status5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "hazel") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 127, 133, '<input type="checkbox" name="p3_eye_color_status6" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "hazel") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 165, 133, '<input type="checkbox" name="p3_eye_color_status6" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(140, 1, 26, 133.5, "Single, Never Married", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 67, 133.5, "Married", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 88, 133.5, "Divorced", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 111, 133.5, "Widowed", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 133, 133.5, "Marriage Annulledel", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 171, 133.5, "Legally Separated", 0, 0, false, true, 'L', true);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 13, 140, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you are married, is your spouse a current member of the U.S. armed forces or U.S. Coast Guard?', 0, 1, false, false, 'L', true);
// //...................
// $pdf->SetFont('times', '', 14);
// if (showData('biographic_info_eye_color') == "black") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 161, 140, '<input type="checkbox" name="p6_2_checkbox" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 175, 140, '<input type="checkbox" name="p6_2_checkbox" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 190, 140, '<input type="checkbox" name="p6_2_checkbox" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(140, 1, 167, 140.5, "N/A", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 181, 140.5, "Yes", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 196, 140.5, "No", 0, 0, false, true, 'L', true);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(200, 7, 13, 148, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How many times have you been married (including your current marriage, marriages abroad, annulled marriages, and marriages<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to the same person)?', 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 51, 153);
// //..........
// $pdf->SetFont('times', '', 10);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><i><b>Information About Your Current Marriage</b> (including if you are legally separated) </i></div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 162.4, $html, 0, 0, true, 'L');
// // *.................
// // *Reuseable Section
// // *.................
// //............
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(200, 7, 13, 170, "<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse's Legal Name ", 0, 1, false, false, 'L', true);
// //...........
// $startX = 20;
// $startY = 175;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// // Labels
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(61.5, 1, $startX + 131, $startY - 0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 12, "Current Spouse's A-Number (if any)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 72, $startY + 11, "Current Spouse's Date of Birth <br>(mm/dd/yyyy)", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 65, $startY + 13, "<b>6.</b>", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX - 8, $startY + 13, "<b>5.</b>", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX - 8, $startY + 26, "<b>7.</b>", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX, $startY + 26, "Current Spouse's Country of Birth", 0, 0, false, false, 'L', true);

// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 81, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 32);    // Family Name
// $pdf->TextField('p1_1a', 70, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 5);    // Family Name
// $pdf->TextField('p1_1b', 58.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
// $pdf->TextField('p1_1c', 52, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name
// $pdf->TextField('p1_1c', 48, $fieldHeight, $stroke, array(), $startX + 10.8, $startY + 18.2);    // principal application 
// $pdf->TextField('p1_1c', 50, $fieldHeight, $stroke, array(), $startX + 94, $startY + 18.2);
// // //...........
// //...........................
// $startX = 20;
// $startY = 204.5;
// $lineHeight = 6;
// $fieldHeight = 7;
// $labelFont = ['times', '', 10];
// $fieldFont = ['courier', 'B', 10];
// $stroke = array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid');

// // ---------------------- Section: Title ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(190, $lineHeight, $startX - 8, $startY + 11, "<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse's Legal Name", '', 0, 0, true, 'L');

// // ---------------------- Street Number ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(90, $lineHeight, $startX, $startY + 18, 'Street Number and Name', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3b', 127, $fieldHeight, $stroke, array(), $startX + 1, $startY + 24);

// // ---------------------- Apt / Ste / Flr ----------------------
// $apt_ste_flr = showData('information_about_you_us_mailing_apt_ste_flr');
// $checked_apt = $apt_ste_flr == 'apt' ? 'checked' : '';
// $checked_ste = $apt_ste_flr == 'ste' ? 'checked' : '';
// $checked_flr = $apt_ste_flr == 'flr' ? 'checked' : '';

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 150.2, $startY + 18, "Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr", '', 0, 0, true, 'L');

// $pdf->SetFont('times', '', 14);
// $html = '
//   <input type="checkbox" name="50a" value="Apt" ' . $checked_apt . ' />&nbsp;
//   <input type="checkbox" name="50st" value="Ste" ' . $checked_ste . '  />
//   <input type="checkbox" name="50f" value="Flr" ' . $checked_flr . ' />
// ';
// $pdf->writeHTMLCell(50, 0, 149, $startY + 24, $html, '', 0, 0, true, 'L');

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 0, 172, $startY + 18, "Number", '', 0, 0, true, 'L');

// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3c', 32, $fieldHeight, $stroke, array(), 173, $startY + 24);

// // ---------------------- City / State / ZIP ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 5, $startX, $startY + 31.7, 'City or Town', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3d', 127, $fieldHeight, $stroke, array(), $startX + 1, $startY + 37);

// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(50, 4, 150, $startY + 31.7, 'State', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $comboBoxOptions = [''];
// foreach ($allDataCountry as $record) {
//     $comboBoxOptions[] = $record->state_code;
// }
// $pdf->ComboBox("p5_3e", 18, $fieldHeight, $comboBoxOptions, array(), array(), 150.2, $startY + 37);
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(30, 3, 169, $startY + 31.7, 'ZIP Code', '', 0, 0, true, 'L');
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p5_3f', 35, $fieldHeight, $stroke, array(), 170, $startY + 37);
// // ---------------------- Province / Postal Code / Country ----------------------
// $pdf->SetFont(...$labelFont);
// $pdf->writeHTMLCell(130, 1, $startX, $startY + 45.5, "<div>Province</div>", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(60, 1, $startX + 62.3, $startY + 45.5, '<div>Postal Code</div>', 0, 0, false, false, 'L', false);
// $pdf->writeHTMLCell(60, 1, $startX + 121, $startY + 45.5, "Country", 0, 0, false, false, 'L', true);
// // Fields
// $pdf->SetFont(...$fieldFont);
// $pdf->TextField('p1_1a', 60, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 50.5);
// $pdf->TextField('p1_1b', 55.5, $fieldHeight, $stroke, array(), $startX + 62.5, $startY + 50.5);
// $pdf->TextField('p1_1c', 65, $fieldHeight, $stroke, array(), $startX + 120, $startY + 50.5);

// ******************************
//  ******** End Page No 10 ******
//  ******************************/

// ******************************
//  ******** Start Page No 11 ****
//  ******************************/

// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $pdf->SetFontSize(12);
// $html = "<div><b>Part 6. Information About Your Marital History</b> (continued)</div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 26, $html, 1, 1, true, 'L');
// //........
// $startX = 20;
// $startY = 34;
// // Set font for labels
// $pdf->SetFont('Times', '', 10);

// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>9.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Place of Marriage to Current Spouse", '', 1, false, 'L');

// // Sub-labels
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 6, "City or Town", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 18, "Country", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX + 92, $startY + 6, "State or Province", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 32, "Date of Marriage to Current Spouse (mm/dd/yyyy)", '', 1, false, 'L');

// // Set font for input fields
// $pdf->SetFont('courier', 'B', 10);

// // Input fields
// $pdf->TextField('marriage_city', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);

// $pdf->TextField('marriage_country', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 23);

// $pdf->TextField('marriage_state', 92, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 93, $startY + 11);

// $pdf->TextField('marriage_date', 47, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 75.5, $startY + 32);

// // .................
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, 12, 74.2, '<b>10.</b>', '', 1, false, 'L');
// addYesNoQuestion($pdf, 'Is your current spouse applying with you?', 20, 73.5, '54', 'i_131_exclusion_status');
// //................
// $pdf->setFont('Times', 'I', 12);
// $html = "<div><b>Information About Prior Marriages</b> (if any)</div>";
// $pdf->writeHTMLCell(191.5, 6, 13, 83, $html, 0, 1, true, 'L');
// //............
// $startX = 20;
// $startY = 90;

// // Section label
// $pdf->SetFont('Times', '', 10);
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>11.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Prior Spouse's Legal Name (provide family name before marriage)", '', 1, false, 'L');

// // Labels (all on same line)
// $pdf->writeHTMLCell(58, 7, $startX, $startY + 5, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(58, 7, $startX + 66, $startY + 5, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(65, 7, $startX + 128, $startY + 5, 'Middle Name (if applicable)', 0, 1, false, false, 'L', true);

// // Input fields on same horizontal line
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('prior_spouse_last_name', 63.6, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);
// $pdf->TextField('prior_spouse_first_name', 60, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 67, $startY + 11.5);
// $pdf->TextField('prior_spouse_middle_name', 56, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 129, $startY + 12);
// //.......
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 111, "<b>12.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Date of Birth (mm/dd/yyyy)", 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('prior_spouse_first_name', 47, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 67, $startY + 21);
// // // Name fields on one line - Family, Given, Middle (adjusted spacing)
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(58, 7, 12, 120.5, "<b>13.</b>&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Country of Birthf", 0, 0, false, false, 'L', true);
// $pdf->writeHTMLCell(108, 7, 115, 120.5, "<b>14.</b>&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Country of Citizenship or Nationality", 0, 0, false, false, 'L', true);
// // //......
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('parent1_birth_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 125.6);
// $pdf->TextField('parent1_birth_first_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 125.6);
// //.......
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(190, 7, 12, 135, "<b>15.</b>&nbsp;&nbsp;&nbsp;&nbsp;Date of Marriage to Prior Spouse's (mm/dd/yyyy)", 0, 1, false, false, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('prior_spouse_first_name', 50, 7, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], 94, 135);
// //...................
// //! reusable component
// //........
// $startX = 20;
// $startY = 142;
// // Set font for labels
// $pdf->SetFont('Times', '', 10);
// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>16.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Place of Marriage to Prior Spouse", '', 1, false, 'L');
// // Sub-labels
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 6, "City or Town", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 18, "Country", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX + 92, $startY + 6, "State or Province", '', 1, false, 'L');
// // Set fot for input fields
// $pdf->SetFont('courier', 'B', 10);
// // Input fields
// $pdf->TextField('marriage_city', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);
// $pdf->TextField('marriage_country', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 23);
// $pdf->TextField('marriage_state', 92, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 93, $startY + 11);
// //! reusable component
// $startX = 20;
// $startY = 172;
// // Set font for labels
// $pdf->SetFont('Times', '', 10);
// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY, '<b>17.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY, "Place Where Marriage with Prior Spouse Legally Ended ", '', 1, false, 'L');
// // Sub-labels
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 6, "City or Town", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 18, "Country", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX + 92, $startY + 6, "State or Province", '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY + 32, "Date of Marriage with Prior Spouse Legally Ended (mm/dd/yyyy)", '', 1, false, 'L');
// // Set fot for input fields
// $pdf->SetFont('courier', 'B', 10);
// // Input fields
// $pdf->TextField('marriage_city', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 11);
// $pdf->TextField('marriage_country', 90, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 1, $startY + 23);
// $pdf->TextField('marriage_state', 92, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 93, $startY + 11);
// $pdf->TextField('marriage_date', 47, 6.6, ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'], [], $startX + 95, $startY + 32);
// //! reusable component
// // Set font for labels
// $pdf->SetFont('Times', '', 10);
// // Section number and title
// $pdf->writeHTMLCell(197, 5, $startX - 8, $startY+40, '<b>18.</b>', '', 1, false, 'L');
// $pdf->writeHTMLCell(197, 5, $startX, $startY+40.4, "How Marriage Ended with Prior Spouse (select one):", '', 1, false, 'L'); 

// //............

// //.............
// $pdf->SetFont('times', '', 14);
// if (showData('biographic_info_eye_color') == "black") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 20, 218, '<input type="checkbox" name="p3_eye_color_status1" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "brown") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 42, 218, '<input type="checkbox" name="p3_eye_color_status3" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "gray") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 64, 218, '<input type="checkbox" name="p3_eye_color_status4" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
// if (showData('biographic_info_eye_color') == "green") $checked = "checked";
// else $checked = "";
// $pdf->writeHTMLCell(5, 1, 98, 218, '<input type="checkbox" name="p3_eye_color_status5" value="Y"  checked="' . $checked . '" />', 0, 1, false, false, 'L', false);

// //..................
// $pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(140, 1, 26, 218.5, "Annulled", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 48, 218.5, "Divorced", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 70, 218.5, "Spouse Deceased", 0, 0, false, true, 'L', true);
// $pdf->writeHTMLCell(140, 1, 104, 218.5, "Other (Explain):", 0, 0, false, true, 'L', true);
// //..........
// $pdf->SetFont('courier', 'B', 10); // set font
// $pdf->TextField('p13_Interpreter_signature_date', 75, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 130, 218.5);

