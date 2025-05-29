<?php
// require_once("localconfig.php");
require_once('tcpdf_include.php');

if (!isset($_SESSION)) session_start();

$company_name = "Mirtex Trading Corp.";
$font = 'helvetica';

function entity($value)
{
    return str_replace(array("&comma;", "&apos;", "&quot;"), array(",", "'", '"'), $value);
}

class MYPDF extends TCPDF
{
    public function Header()
    {
        $this->SetY(10);
        if ($this->page === 1) {
            $this->SetFont('helvetica', 'B', 15);
            $this->SetTextColor(0, 0, 0);
            $this->SetXY(12, 10);
            $this->Cell(100, 6, 'Mirtex Trading Corp.', 0, 2, 'L');
            $this->SetFont('helvetica', '', 10);
            $this->Cell(100, 5, '20 Berry Street', 0, 2, 'L');
            $this->Cell(100, 5, 'Brooklyn, NY 11249', 0, 2, 'L');
            $this->Cell(100, 5, '718-486-7832', 0, 2, 'L');
            $this->Cell(100, 5, 'starofmirtex@aol.com', 0, 2, 'L');

            $this->SetXY(154.4, 10);
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(50, 6, 'Invoice', 0, 2, 'L');

            $this->SetFont('helvetica', '', 10);
            $this->Cell(20, 6, '  Date', 1, 0, 'L');
            $this->Cell(30, 6, date(' m/d/Y'), 1, 1, 'L');
            $this->SetX(154.4);
            $this->Cell(20, 6, '  Invoice', 1, 0, 'L');
            $this->Cell(30, 6, ' INV-001', 1, 1, 'L');
        }
    }

    public function Footer()
    {
        $this->SetY(-25);
        $this->Ln(1.1);
        $this->MultiCell(202, 50, '', 'T', 'R', 0, 1, '', '', true);
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($company_name);
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('Invoice');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(7, 32, 7, true);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont($font, '', 12);

$invoiceId = 'INV-001';
$filename = "invoice-$invoiceId.pdf";

$pdf->AddPage('P', 'LETTER');

// Customer data
$billingCustomerCode = '06284';
$billingCustomerName = "BD'S (PROVIDENCE)";
$billingAddress = "BD&APOS;S 699 HARTFORD AVE. PROVIDENCE, RI,PROVIDENCE, 02909,";
$billingPhone = '401-331-8200';
$billingEmail = '';

$shippingCustomerName = "BD'S (PROVIDENCE)";
$shippingAddress = "BD'S (PROVIDENCE) 699 HARTFORD AVE. PROVIDENCE, RI, 02909";
$shippingPhone = '401-331-8200';

$customerTable = '

<table cellpadding="0" cellspacing="0" style="width:100%; border-collapse: collapse;">
  <tr>
    <td>
      <table cellpadding="0" cellspacing="0" style="width:100%; border-collapse: collapse;">
        <tr>
          <td style="width:1.5%;"></td>

          <!-- Bill To -->
          <td style="width:47.5%; border: 1px solid #000; font-size: 12px;">
            <table cellpadding="0" cellspacing="0" style="width:100%; border-collapse: collapse;">
              <!-- Title Row -->
              <tr>
                <td style="border-bottom: 1px solid #000; padding: 0 0 5px 0; font-size: 12px; font-weight: bold; height: 30px; line-height: 30px; padding-left: 5px;">
                  Bill To :
                </td>
              </tr>
              <!-- Customer Info -->
              <tr>
              <td >
                  
                  <div style="margin-bottom: 2px;"><b>' . $billingCustomerCode . ' ' . entity($billingCustomerName) . '</b></div>
                  <div style="margin-bottom: 2px;">' . entity($billingAddress) . '</div>
                  <div style="margin-bottom: 2px;"><b>Phone :</b> ' . $billingPhone . '</div>
                  <div><b>Email :</b> ' . $billingEmail . '</div>
                  <br>
                 
                 
                  </td>
                  </tr>
            </table>
          </td>

          <td style="width:2%;"></td>

          <!-- Ship To -->
          <td style="width:47.5%; border: 1px solid #000; font-size: 12px;">
            <table cellpadding="0" cellspacing="0" style="width:100%; border-collapse: collapse;">
              <!-- Title Row -->
              <tr>
                <td style="border-bottom: 1px solid #000; padding: 0 0 5px 0; font-size: 12px; font-weight: bold; height: 30px; line-height: 30px; padding-left: 5px;">
                  Ship To :
                </td>
              </tr>
              <!-- Customer Info -->
              <tr>
                <td style="padding: 5px;">
                  <div style="margin-bottom: 5px;"><b>' . entity($shippingCustomerName) . '</b></div>
                  <div style="margin-bottom: 5px;">' . entity($shippingAddress) . '</div>
                  <div><b>Phone :</b> ' . $shippingPhone . '</div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>';



$customerHeaderTable = '
<table cellpadding="0" cellspacing="0" style="width:100%; border-collapse: collapse; font-size: 12px; margin-bottom: 15px;">
  <tr>
    <!-- Customer # -->
    <td style="border: 1px solid #000; padding: 5px; width: 30%;">
      <div style="font-weight: bold; border-bottom: 1px solid #000; margin-bottom: 3px;">Customer #</div>
      <div>06284 BDS (Providence)</div>
    </td>
    
    <!-- P.O. # -->
    <td style="border: 1px solid #000; padding: 5px; width: 20%;">
      <div style="font-weight: bold; border-bottom: 1px solid #000; margin-bottom: 3px;">P.O. #</div>
      <div>-</div>
    </td>
    
    <!-- Terms -->
    <td style="border: 1px solid #000; padding: 5px; width: 20%;">
      <div style="font-weight: bold; border-bottom: 1px solid #000; margin-bottom: 3px;">Terms</div>
      <div>30</div>
    </td>
    
    <!-- Salesman -->
    <td style="border: 1px solid #000; padding: 5px; width: 30%;">
      <div style="font-weight: bold; border-bottom: 1px solid #000; margin-bottom: 3px;">Salesman</div>
      <div>Moustapha</div>
    </td>
  </tr>
</table>';






$pdf->Ln(8);
$pdf->writeHTML($customerTable, true, false, true, false, '');
$pdf->writeHTML($customerHeaderTable, true, false, true, false, '');
$pdf->Output($filename, 'I');
