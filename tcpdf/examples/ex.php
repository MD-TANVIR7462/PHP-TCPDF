// ******************************
// ******** End Page No 5 ******
// ******************************

// ******************************
// ******** Start Page No 6****
// ******************************

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$html = '<div><b>Part 2. Application Type or Filing Category </b> (continued)</div>';
$pdf->writeHTMLCell(191.5, 6.5, 13, 26, $html, 1, 1, true, 'L');
// ...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 33, "<b>3.b.&nbsp;&nbsp;&nbsp;Employment-based </b>", 0, 0, false, true, 'L', true);
//.................
drawCheckboxWithLabel($pdf, 19, 38.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Alien of Extraordinary Ability ');
$pdf->writeHTMLCell(190, 1, 20, 45, "Alien Workers, Form I-140 (select your category below and answer the following questions below, as applicable): ", 0, 0, false, true, 'L', true);

drawCheckboxWithLabel($pdf, 19, 50.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Outstanding Professor or Researcher');
drawCheckboxWithLabel($pdf, 19, 57, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Multinational Executive or Manager');
drawCheckboxWithLabel($pdf, 19, 63, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Member of the Professions Holding an Advanced Degree or Alien of Exceptional Ability (who is NOT seeking a National<br>Interest Waiver)');
drawCheckboxWithLabel($pdf, 19, 73, 'terms_checkbox', 'i_131_correction_terms_conditions_status', "A Professional (at a minimum, requiring a bachelor's degree or a foreign degree equivalent to a U.S. bachelor's degree)");
drawCheckboxWithLabel($pdf, 19, 80, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'A Skilled Worker (requiring at least 2 years of specialized training or experience)');
drawCheckboxWithLabel($pdf, 19, 87, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Any Other Worker (requiring less than 2 years of training or experience)');
drawCheckboxWithLabel($pdf, 19, 94, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'An Alien Applying For a National Interest Waiver (who IS a member of the professions holding an advanced degree or an<br>alien of exceptional ability)');
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(190, 1, 20, 105.5, "Did a relative file the associated Form I-140 for you (or for the principal applicant if you are a derivative applicant) or does a<br>
relative have a significant ownership interest (5 percent or more) in the business that filed Form I-140 for you (or for the<br>
principal applicant, if you are a derivative applicant)? ", 0, 0, false, true, 'L', true);
//........
drawCheckboxWithLabel($pdf, 19, 120, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'N/A (I am adjusting on the basis of a Form I-140 self-petition)');
drawCheckboxWithLabel($pdf, 19, 127, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'No');
drawCheckboxWithLabel($pdf, 19, 134, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Yes');
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(190, 1, 26, 142, 'If you answered "Yes," is this relative your (select only one box):', 0, 0, false, true, 'L', true);
//........
drawCheckboxWithLabel($pdf, 25, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Father');
drawCheckboxWithLabel($pdf, 47, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Mother');
drawCheckboxWithLabel($pdf, 69, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Child');
drawCheckboxWithLabel($pdf, 88, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Adult Son');
drawCheckboxWithLabel($pdf, 113.5, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Adult Daughter ');
drawCheckboxWithLabel($pdf, 147, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Brother');
drawCheckboxWithLabel($pdf, 170, 147, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Sister');
drawCheckboxWithLabel($pdf, 25, 154, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'None of These');
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(190, 1, 26, 162, 'Is the relative above a:', 0, 0, false, true, 'L', true);
//........
drawCheckboxWithLabel($pdf, 25, 167, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'U.S. Citizen');
drawCheckboxWithLabel($pdf, 52, 167, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'U.S. National');
drawCheckboxWithLabel($pdf, 81, 167, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Lawful Permanent Resident');
drawCheckboxWithLabel($pdf, 130, 167, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'None of These ');
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(130, 1, 12, 175, "<b>3.c.&nbsp;&nbsp;&nbsp;Special Immigrant </b>", 0, 0, false, true, 'L', true);
// .........
drawCheckboxWithLabel($pdf, 19, 181, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Special Immigrant Juvenile, Form I-360');
drawCheckboxWithLabel($pdf, 19, 187.3, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Certain Afghan or Iraqi National, Form I-360 or Form DS-157');
drawCheckboxWithLabel($pdf, 19, 193.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Certain International Broadcaster, Form I-360');
drawCheckboxWithLabel($pdf, 19, 199.7, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Certain G-4 International Organization or Family Member or NATO-6 Employee or Family Member, Form I-360');
drawCheckboxWithLabel($pdf, 19, 206, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Certain U.S. Armed Forces Members (also known as the Six and Six program), Form I-360');
drawCheckboxWithLabel($pdf, 19, 212, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Panama Canal Zone Employees, Form I-360 ');
drawCheckboxWithLabel($pdf, 19, 218.3, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Certain Physicians, Form I-360');
drawCheckboxWithLabel($pdf, 19, 224.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Certain Employee or Former Employee of the U.S. Government Abroad, DS-1884');
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(190, 1, 20, 232, 'Religious Worker, Form I-360 (select your specific category below):', 0, 0, false, true, 'L', true);
drawCheckboxWithLabel($pdf, 19, 238.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Minister of Religion');
drawCheckboxWithLabel($pdf, 19, 244.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Other Religious Worker');


//******************************
//******** End Page No 6 ******
//******************************

//******************************
//******** Start Page No 7****
//******************************
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = '<div><b>Part 2. Application Type or Filing Category </b> (continued)</div>';
// $pdf->writeHTMLCell(191.5, 6.5, 13, 26, $html, 1, 1, true, 'L');
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 33, "<b>3.d.&nbsp;&nbsp;&nbsp;Asylee or Refugee </b>", 0, 0, false, true, 'L', true);
// //.................
// drawCheckboxWithLabel($pdf, 19, 38.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Asylum Status (Immigration and Nationality Act (INA) section 208), Form I-589 or Form I-730');
// $pdf->writeHTMLCell(190, 1, 20, 45, "If you selected asylum, date you were granted asylum (mm/dd/yyyy). ", 0, 0, false, true, 'L', true);
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_unit_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 127, 45);
// //........
// //.................
// drawCheckboxWithLabel($pdf, 19, 51.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Refugee Status (INA section 207), Form I-590 or Form I-730');
// $pdf->writeHTMLCell(190, 1, 20, 59, "If you selected refugee, date of initial admission as refugee (mm/dd/yyyy).", 0, 0, false, true, 'L', true);
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_unit_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 127, 59);
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 66, "<b>3.e.&nbsp;&nbsp;&nbsp;Human Trafficking Victim or Crime Victim</b>", 0, 0, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 71.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Human Trafficking Victim (T Nonimmigrant), Form I-914 or Derivative Family Member, Form I-914A');
// drawCheckboxWithLabel($pdf, 19, 78, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Victim of Qualifying Criminal Activity (U Nonimmigrant), Form I-918, Derivative Family Member, Form I-918A, or<br>Qualifying Family Member, Form I-929r');
// // ...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 89, "<b>3.f.&nbsp;&nbsp;&nbsp;Special Programs Based on Certain Public Laws</b>", 0, 0, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 95.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'The Cuban Adjustment Act ');
// drawCheckboxWithLabel($pdf, 19, 102, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'A Victim of Battery or Extreme Cruelty as a Spouse or Child Under the Cuban Adjustment Act');
// drawCheckboxWithLabel($pdf, 19, 109, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Applicant Adjusting Based on Dependent Status Under the Haitian Refugee Immigrant Fairness Act');
// drawCheckboxWithLabel($pdf, 19, 116, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'A Victim of Battery or Extreme Cruelty as a Spouse or Child Applying Based on Dependent Status Under the Haitian<br>Refugee Immigrant Fairness Act');
// drawCheckboxWithLabel($pdf, 19, 126.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', "Lautenberg Parolees");
// drawCheckboxWithLabel($pdf, 19, 133.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Diplomats or High-Ranking Officials Unable to Return Home (Section 13 of the Act of September 11, 1957)');
// drawCheckboxWithLabel($pdf, 19, 140, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Nationals of Vietnam, Cambodia, and Laos Applying for Adjustment of Status Under section 586 of Public Law 106-429');
// drawCheckboxWithLabel($pdf, 19, 146.6, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Applicant Adjusting Under the Amerasian Act (October 22, 1982), Form I-360');
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 155, "<b>3.g.&nbsp;&nbsp;&nbsp;Additional Options  </b>", 0, 0, false, true, 'L', true);
// // .........
// drawCheckboxWithLabel($pdf, 19, 161, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Diversity Visa program');
// $pdf->writeHTMLCell(190, 1, 20, 168, "If you selected Diversity Visa program, provide your Diversity Visa Rank Number:", 0, 0, false, true, 'L', true);
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_unit_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 168);
// //.............
// drawCheckboxWithLabel($pdf, 19, 174, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Continuous Residence in the United States Since Before January 1, 1972 ("Registry")');
// drawCheckboxWithLabel($pdf, 19, 180.5, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Individual Born in the United States Under Diplomatic Status');
// drawCheckboxWithLabel($pdf, 19, 187, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'S Nonimmigrants and Qualifying Family Members (can only adjust in this category with an approved Form I-854B filed by<br>a law enforcement officer) ');
// drawCheckboxWithLabel($pdf, 19, 197, 'terms_checkbox', 'i_131_correction_terms_conditions_status', 'Other Eligibility');
// //........
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_unit_number', 178, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 202.8);
// //..............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 210.6, "<b>4.</b>", 0, 0, false, true, 'L', true);
// addYesNoQuestion($pdf, 'If you selected a family-based, employment-based, special immigrant, or Diversity Visa immigrant<br>
// category listed above in <b>Item Numbers 3.a. - 3.g</b>. as the basis for your application for adjustment of<br>
// status, are you applying for adjustment based on INA section 245(i)?', 20, 210, 'name', 'i_131_exclusion_status');
// //..............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(130, 1, 12, 223.6, "<b>5.</b>", 0, 0, false, true, 'L', true);
// addYesNoQuestion($pdf, 'Are you 21 years of age or older and applying for adjustment based on classification as a child, under the<br>
// provisions of the Child Status Protection Act (CSPA)?', 20, 223, 'name', 'i_131_exclusion_status');
// //..............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(190, 1, 20, 235, "<b>NOTE:</b>For more information to determine if you are eligible under CSPA, see the <b>Who May File Form I-485</b> section of these<br>Instructions.", 0, 0, false, true, 'L', true);
// //******************************
// //******** End Page No 7 ******
// //******************************

// //******************************
// //******** Start Page No 8 ****
// //******************************
// $pdf->AddPage('P', 'LETTER');
// $pdf->setFillColor(220, 220, 220);
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = "<div><b>Part 3. Request for Exemption for Intending Immigrant's Affidavit of Support Under Section 213A of the INA  </b> </div>";
// $pdf->writeHTMLCell(191.5, 6.5, 13, 25.5, $html, 1, 1, true, 'L');

// // Main instructional text
// $pdf->SetFont('Times', '', 10);
// $pdf->writeHTMLCell(210, 6, 12, 38, 'I am requesting an exemption from submitting an Affidavit of Support Under Section 213A of the INA (Form I-864 or Form I-864EZ)<br>because (select <b>only one</b>):', 0, 1, false, true, 'L', true);

// // ........
// $pdf->writeHTMLCell(210, 6, 12, 48, '<b>1.a.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 47, 'exemption_1a', 'exemption_1a_key', 'I have earned or can receive credit for 40 qualifying quarters (credits) of work in the United States (as defined by the Social<br>
// Security Act (SSA)). (Attach your SSA earnings statements. Do not count any quarters during which you received a means-<br>tested public benefit.)');
// // ........
// $pdf->writeHTMLCell(210, 6, 12, 63, '<b>1.b.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 62, 'exemption_1a', 'exemption_1a_key', 'I am under 18 years of age, unmarried, the child of a U.S. citizen, am not likely to become a public charge, and will<br>
// automatically become a U.S. citizen under INA section 320, upon my admission as a lawful permanent resident. ');
// // ........
// $pdf->writeHTMLCell(210, 6, 12, 73.5, '<b>1.c.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 72.5, 'exemption_1a', 'exemption_1a_key', 'I am applying under the widow or widower of a U.S. citizen (Form I-360) immigrant category.');
// // ........
// $pdf->writeHTMLCell(210, 6, 12, 80.5, '<b>1.d.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 79.5, 'exemption_1a', 'exemption_1a_key', 'I am applying as a VAWA self-petitioner.');
// // ........
// $pdf->writeHTMLCell(210, 6, 12, 87.5, '<b>1.e.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 86.5, 'exemption_1a', 'exemption_1a_key', 'None of these exemptions apply to me and I am not required by statute to submit an Affidavit of Support Under Section<br>
// 213A of the INA, nor am I required to request an exemption.');
// // ........
// $pdf->writeHTMLCell(210, 6, 12, 97.5, '<b>1.f.</b>', 0, 1, false, true, 'L', true);
// drawCheckboxWithLabel($pdf, 19, 96.5, 'exemption_1a', 'exemption_1a_key', 'None of these exemptions apply to me and I am not requesting an exemption as I am required to submit an Affidavit of<br>
// Support Under Section 213A of the INA.');
// //..........
// $pdf->setFont('Times', '', 12);
// $pdf->setCellHeightRatio(1.2);
// $pdf->setCellPaddings(1, 0.5, 1, 1);
// $html = "<div><b>Part 4. Additional Information About You</b> </div>";
// $pdf->writeHTMLCell(191.5, 6.5, 13, 110, $html, 1, 1, true, 'L');

// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 117, "<b>1.</b>", 0, 0, false, 'L');
// //......
// addYesNoQuestion($pdf, 'Have you ever applied for an immigrant visa to obtain permanent resident status at a U.S. Embassy or<br>
// U.S. Consulate abroad?', 20, 116.5, '54', 'i_131_exclusion_status');
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 20, 127, 'If you answered "Yes," complete <b>Item Numbers 2. - 4.</b>below.', 0, 0, false, 'L');
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 132.8, '<b>2.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 133, 'Location of U.S. Embassy or U.S. Consulate', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 141, 'City or Town', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 113.6, 141, 'Country', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 145.7);
// $pdf->TextField('employer_street', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 145.7);
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 154.8, '<b>3.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 155, 'Decision (for example, approved, refused, denied, withdrawn)', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 87, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 154.9);
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 162.8, '<b>4.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 163, 'Date of Decision (mm/dd/yyyy)', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 163.5);
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 172, '<b>5.</b>', 0, 0, false, 'L');
// addYesNoQuestion($pdf, 'Have you previously applied for permanent residence while in the United States?', 20, 171, '54', 'i_131_exclusion_status');
// //.............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 180, '<b>6.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 35, 180, '<b>EVER</b>', 0, 0, false, 'L');
// addYesNoQuestion($pdf, '<div>Have you&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; held lawful permanent resident status which was later rescinded under INA section 246?</div>', 20, 179, '54', 'i_131_exclusion_status');
// //.............
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 187, '<b>Employment and Educational History</b>', 0, 0, false, 'L');
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 13, 194, '<b>7.</b>', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 20, 194, 'Provide <b>ALL</b> of your employment and educational history for the last 5 years as indicated in the Instructions. Provide your<br>
// current employment or school attended first. Include periods of self-employment, unemployment, or retirement. For each period<br>
// of unemployment or retirement, list source of financial support. If you have additional employment or educational history, use<br>
// the space provided in <b>Part 14. Additional Information.</b>', 0, 0, false, 'L');
// //...........
// $pdf->writeHTMLCell(191.5, 6.5, 20, 214, 'Employer or School (current or most recent)', 0, 0, false, 'L');
// $pdf->writeHTMLCell(191.5, 6.5, 113.6, 214, 'Name of Employer, Company, or School', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 219);
// $pdf->TextField('employer_street', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 219);
// //...........
// $pdf->setFont('Times', '', 10);
// $pdf->writeHTMLCell(191.5, 6.5, 20, 226.5, 'Your Occupation (if unemployed or retired, so state)', 0, 0, false, 'L');
// $pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('employer_street', 184, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 232);
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

