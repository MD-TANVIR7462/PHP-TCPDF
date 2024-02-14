<?php

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Line Height Example');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Define the properties of the text field
$lineHeight = 10; // Set your desired line height
$textFieldProperties = array(
    'name' => 'textfield1',
    'value' => 'Sample Text',
    'font' => 'helvetica',
    'size' => 12,
    'height' => $lineHeight, // Set the line height here
);

// Add text field
$pdf->TextField($textFieldProperties, 50, 50, 100, 20);

// Output the PDF
$pdf->Output('example.pdf', 'I');
