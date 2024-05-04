<?php
require_once('tcpdf_include.php');
// create new PDF document
$pdf = new TCPDF('L', 'mm', array(130,130), true, 'UTF-8', false);

$pdf->SetFont('times', '', 8);
$pdf->SetAutoPageBreak(TRUE, 5);

//Generating a random table for testing.
$table = [
  ['Name','Description','md5'],
];
$rows = rand(10,30);
//$rows = rand(3,5);
for($i = 0; $i < $rows; $i++) {
  $table[] = array(
    'Sector '.rand(1,10000),
    str_repeat('An Apple', rand(2,6)),
    md5(rand(1,100000)),
  );
}

$pdf->addPage();

$pdf->Write(2, 'MultiCell Example');
$pdf->Ln();
$pdf->SetFont('times', '', 8);

$column_widths = array(
  20,
  60,
  30,
);

//Total table should only be 10cm tall.
$maxheight = 100/count($table);
if($maxheight > 10) {
  $maxheight = 10;
}
foreach($table as $index => $row) {
  if($index == 0) {
    $pdf->SetFillColor(230,230,255);
  } else {
    if( ($index&1) == 0 ) {
      $pdf->SetFillColor(210,210,210);
    } else {
      $pdf->SetFillColor(255,255,255);
    }
  }
  $pdf->SetX(10);
  $currenty = $pdf->GetY();
  foreach($row as $index => $column) {
    $pdf->MultiCell(
      $width = $column_widths[$index],
      $minheight = $maxheight,
      $text = $column,
      $border = 'B', //Border bottom
      $align = 'L',
      $fill = true,
      $ln = 0, //Move to right after cell.
      $x = null,
      $y = null,
      $reseth = true,
      $stretch = 0,
      $ishtml = false,
      $autopadding = true,
      $maxheight,
      $valign = 'T',
      $fitcell = true);
  }
  $pdf->SetY($currenty + $maxheight);
}

$pdf->addPage();

$pdf->SetFont('times', '', 8);
$pdf->Write(2, 'Cell Example');
$pdf->Ln();
$pdf->SetFont('times', '', 8);

$maxheight = 100/count($table);
if($maxheight > 8) {
  $maxheight = 8;
}

$maxfontsize = 10;
$pdf->SetFontSize($maxfontsize);

foreach($table as $index => $row) {
  if($index == 0) {
    $pdf->SetFillColor(230,230,255);
  } else {
    if( ($index&1) == 0 ) {
      $pdf->SetFillColor(210,210,210);
    } else {
      $pdf->SetFillColor(255,255,255);
    }
  }
  $pdf->SetX(10);
  $currenty = $pdf->GetY();
  foreach($row as $index => $column) {
    //Reduce the font size to fit properly.
    $pdf->SetFontSize($csize = $maxfontsize);
    //0.2 step down font until it fits the cell.
    while($pdf->GetStringWidth($column) > $column_widths[$index]-1 ) {
      $pdf->SetFontSize($csize -= 0.2);
    }
    $pdf->Cell(
      $width = $column_widths[$index],
      $cellheight = $maxheight,
      $text = $column,
      $border = 'B', //Border bottom
      $ln = 0,
      $align = 'L',
      $fill = true,
      $stretch = 1,
      $ignore_min_height = true,
      $calign = 'T',
      $valign = 'T');
  }
  $pdf->SetY($currenty + $maxheight);
}

// $pdf->Output(dirname(__FILE__).'/maxheight.pdf', 'F');
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');