<?php
// require_once("../../vendor/autoload.php");
// if(!isset($_SESSION)) session_start();
// $objQuery 		= new \App\dataTableQuery\dataTableQuery();
// $objSettings 	= new \App\settings\settings();




$company_name	= $objSettings->getValue("company_name");
		
$type = "";
$token = $_GET['token'];

if(isset($_GET['type'])){
	$type = $_GET['type'];
}

$currentDate = date('mdY');
$font = 'helvetica';

function entity($value){
	return str_replace(array("&comma;","&apos;","&quot;"), array(",","'",'"'), $value);
}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	
	public function Header(){
		global $font;
		global $token;
		global $objSettings;
		global $company_name;
		global $objQuery;

		$clientInformation = $objQuery->indexByQuerySingleData("SELECT 
		o.*, o.id AS oId,
		c.company_name AS customer,
		c.phone AS phone,
		c.sales_person_code AS salesPersonCode,
		DATE_FORMAT(o.created_at, '%m/%d/%Y') AS order_date,

		-- Ship Info
		cMaintain.*, 
		cMaintain.id AS cMId,
		cMaintain.outlet AS cMaintainName,

		-- Billing Info
		ocr.*,
		ocr.company_name AS ocrCompanyName,
		ocr.billing_street AS ocrBillingStreet,
		ocr.billing_state AS ocrBillingState,
		ocr.billing_city AS ocrBillingCity,
		ocr.billing_zip_code AS ocrBillingZipCode,
		ocr.email AS ocrEmail,
		ocr.phone AS ocrPhone,
		ocr.resale_certificate AS ocrResale,
		-- ShipTo ID
		o.ship_to_id AS oShipToId,

		
		t.terms AS oInfTerms,
		ocr.customer_code AS ocrCustomerCode,

    -- Final Shipping Address fallback with same alias names
		CASE 
			WHEN cMaintain.id IS NOT NULL THEN cMaintain.shipping_street
			ELSE ocr.billing_street
		END AS cMaintainBillStreet,

		CASE 
			WHEN cMaintain.id IS NOT NULL THEN cMaintain.shipping_state
			ELSE ocr.billing_state
		END AS cMaintainBillState,

		CASE 
			WHEN cMaintain.id IS NOT NULL THEN cMaintain.shipping_city
			ELSE ocr.billing_city
		END AS cMaintainBillCity,

		CASE 
			WHEN cMaintain.id IS NOT NULL THEN cMaintain.shipping_zip_code
			ELSE ocr.billing_zip_code
		END AS cMaintainBillZipCode,

		CASE 
			WHEN cMaintain.id IS NOT NULL THEN cMaintain.phone
			ELSE ocr.phone
		END AS cMaintainPhone,

		CASE 
			WHEN cMaintain.id IS NOT NULL THEN cMaintain.email
			ELSE ocr.email
		END AS cMaintainEmail

		FROM invoice_summery o
		LEFT JOIN customer_info c ON c.id = o.customer_id
		
		LEFT JOIN terms t ON t.id = o.terms
		LEFT JOIN outlet_customer_ship_address_info cMaintain ON cMaintain.id = o.ship_to_id
		LEFT JOIN outlet_customer_register_info ocr ON ocr.id = o.outlet_customer_id
		WHERE o.id = '$token'");

		
		// Added (-) After 3 Digit Phone Number
		if (!function_exists('formatPhoneNumber')) {
			 function formatPhoneNumber($number) {
				if (empty($number)) {
					return '';
				}
				return substr($number, 0, 3) . '-' . substr($number, 3, 3) . '-' . substr($number, 6);
			}
		}
		/* $clientPhone = $clientInformation->ocrPhone;
		$cMaintainPhone = $clientInformation->cMaintainPhone; */
		if($clientInformation->ocrPhone != ''){
		$clientPhoneNumber = formatPhoneNumber($clientInformation->ocrPhone) ?? '';
		}
		if($clientInformation->cMaintainPhone != ''){
			$cMaintainPhoneNumber = formatPhoneNumber($clientInformation->cMaintainPhone)?? '';
		}

		$address		= strtoupper($objSettings->getValue("address"));
		$city			= strtoupper($objSettings->getValue("city"));
		$state			= strtoupper($objSettings->getValue("state"));
		$zip			= strtoupper($objSettings->getValue("zip"));
		$tel			= strtoupper($objSettings->getValue("tel"));


					  $outletCompanyName =  entity($clientInformation->ocrCompanyName);
					  $outletLocationName =  entity($clientInformation->location_name);
					  $outletCustomerStreet =  entity($clientInformation->ocrBillingStreet);
                      $outletCustomerState =  entity( $clientInformation->ocrBillingState);
                      $outletCustomerCity =  entity($clientInformation->ocrBillingCity);
                      $outletCustomerZip =  entity( $clientInformation->ocrBillingZipCode);

					  $cMaintainBillStreet =  entity($clientInformation->cMaintainBillStreet);
					  $cMaintainBillCity =  entity($clientInformation->cMaintainBillCity);
					  $cMaintainBillState =  entity($clientInformation->cMaintainBillState);
					  $cMaintainBillZipCode =  entity($clientInformation->cMaintainBillZipCode);
					   $poNumber = $clientInformation->po;
					  if($poNumber != ''){$po = $poNumber;}else{$po= '-';}
					  if ($clientInformation->oShipToId != '') $locationNameShip =  ucfirst($clientInformation->cMaintainName);
					  elseif ($clientInformation->oInfCNameSec != '') $locationNameShip = ucfirst($clientInformation->cMaintainName);
					  else $locationNameShip = ucfirst($clientInformation->ocrCompanyName);
					  $formated_due_date = date('m/d/Y',strtotime($clientInformation->due_date));
					  
		$this->SetFont($font, '', 18);		
		$this->MultiCell(200, 6, $company_name, 0, 'L', 0, 1, '', 7, true);		
		$this->SetFont($font, '', 12);
		
		$html = "<table cellspacing='0' cellpadding='1' border='0' style='width:100%;text-align:center'>
					<tr><td>
					<span size='10' style='text-align:center; font-weight:400; font-weight:bold'></span></td></tr>
					<tr><td>20 Berry Street </td></tr>
					<tr><td>Brooklyn, NY 11249</td></tr>
					<tr><td>718-486-7832</td></tr>
					<tr><td>starofmirtex@aol.com</td></tr>
				</table>";
		$this->writeHTMLCell(0, 0, 7, 9, $html, 0, 1, 0, true, 'L', true);
		
		$html = <<<EOD
				<input type="button" name="print" value="Print" onclick="print()" />
				EOD;
		$this->writeHTMLCell(0, 0, 95, 9, $html, 0, 1, 0, true, 'L', true);

		$this->SetFont($font, '', 18);
		$this->writeHTMLCell(0, 0, 165, 9, 'Invoice', 0, 1, 0, true, 'L', true);

		$this->SetFont($font, '', 10);

		$dueDate   = new DateTime($clientInformation->due_date);
		$todayDate = new DateTime(date('Y-m-d'));


		$border_style = array('all' => array('width' => 2, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));

		if($clientInformation->payment_status == 1){

			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0, 255, 0);
			$this->writeHTMLCell(10, 7, 153, 23, 'Paid', 0, 1, true, true, 'C', true);
		}else if($dueDate < $todayDate){
			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(255, 0, 0);
			$this->writeHTMLCell(20, 7, 143, 23, 'Past Due', 0, 1, true, true, 'C', true);
		}
		
		$this->SetFillColor(255, 255, 255); // reset again 
		$this->SetTextColor(0, 0, 0); 
		$html = <<<EOD
		<table cellspacing="0" cellpadding="4" border="1" style="width:100%; text-align:left; border-collapse:collapse;">
			<tr>
				<td style="border:1px solid #000;">Invoice #</td>
				<td style="border:1px solid #000;">{$token}</td>
			</tr>
			<tr>
				<td style="border:1px solid #000;">Date</td>
				<td style="border:1px solid #000;">{$clientInformation->order_date}</td>
			</tr>
			<tr>
				<td style="border:1px solid #000;">Due Date</td>
				<td style="border:1px solid #000;">{$formated_due_date}</td>
			</tr>
		</table>
		EOD;

		$this->writeHTMLCell(0, 0, 165, 16, $html, 0, 1, 0, true, 'L', true);

		$this->setLineStyle(
			array(
				'width' => 0.2,
				'cap' => 'butt',
				'join' => 'miter',
				'dash' => 0,
				'color' => array(0, 0, 0)
			)
		);
		/* if ($this->page == 1){ */
			//$this->MultiCell(55, 5, 'Page No.          '.$this->getAliasNumPage(), 0, '', 0, 1, 168.3, 28, true);
			
			$html = <<<EOD
			<table cellspacing="0" cellpadding="1" border="0" style="width:100%; text-align:left;padding:5px;">
				<tr><td><span style="font-size:10pt; font-weight:bold;"> Bill To:</span></td></tr>
				<tr><td> {$outletCompanyName}</td></tr>
				<tr><td> {$outletCustomerStreet}</td></tr>
				<tr><td> {$outletCustomerCity}, {$outletCustomerState}, {$outletCustomerZip}</td></tr>
				<tr><td> {$clientPhoneNumber}</td></tr>
				<tr><td> </td></tr>
			</table>
			EOD;
			
			$this->writeHTMLCell(90, 0, 7, 38, $html, 1, 1, 0, true, 'L', true);

			$html = <<<EOD
			<table cellspacing="0" cellpadding="1" border="0" style="width:50%; text-align:left;padding:5px;">
				<tr>
					<td></td>
					<td></td>
				</tr>
			</table>
			EOD;
			$this->writeHTMLCell(90, 0, 7, 38, $html, 1, 1, 0, true, 'L', true);
			$this->writeHTMLCell(90, 0, 119, 38, $html, 1, 1, 0, true, 'L', true);

			if(($clientInformation->cMaintainBillStreet != '') || ($clientInformation->cMaintainBillCity != '') || ($clientInformation->cMaintainBillState != '')
			|| ($clientInformation->cMaintainBillZipCode != '')){
				$html = <<<EOD
					<table cellspacing="0" cellpadding="1" border="0" style="width:100%;text-align:left; padding:5px;">
						<tr><td>
						<span size="10" style="text-align:left; font-weight:bold"> Ship To: </span></td></tr>
						<tr><td> {$locationNameShip}</td></tr>
						<tr><td> {$cMaintainBillStreet}</td></tr>
						<tr><td> {$cMaintainBillCity}, {$cMaintainBillState}, {$cMaintainBillZipCode}</td></tr>
						<tr><td> {$cMaintainPhoneNumber}</td></tr>
						<tr><td> {$clientInformation->cMaintainEmail}</td></tr>
						<tr><td> </td></tr>
					</table>
					EOD;
			}else{
				$html = <<<EOD
			<table cellspacing="0" cellpadding="1" border="0" style="width:100%; text-align:left;padding:5px;">
				<tr><td><span style="font-size:10pt; font-weight:bold;"> Ship To:</span></td></tr>
				<tr><td> {$outletCompanyName}</td></tr>
				<tr><td> {$outletCustomerStreet}</td></tr>
				<tr><td> {$outletCustomerCity}, {$outletCustomerState}, {$outletCustomerZip}</td></tr>
				<tr><td> {$clientPhoneNumber}</td></tr>
				<tr><td> {$clientInformation->ocrEmail}</td></tr>
				<tr><td> </td></tr>
			</table>
			EOD;
			}

			$this->writeHTMLCell(90, 0, 119, 38, $html, 1, 1, 0, true, 'L', true);

			$html = <<<EOD
			<table cellspacing="0" cellpadding="3" border="1" style="width:100%; text-align:left;">
				<tr>
					<td> Resale Certificate # </td><td> {$clientInformation->ocrResale}</td>
				</tr>
					
			</table>
			EOD;
			$this->writeHTMLCell(90, 0, 7, 68, $html, 1, 1, 0, true, 'L', true);

			$html = <<<EOD
					<table cellspacing="0" cellpadding="4" border="1" style="width:100%;text-align:center">
						<tr>
							<th> Customer #</th>
							<th> P.O. #</th>
							<th colspan="2"> Terms</th>
							<th> Salesman</th>
						</tr>
						<tr>
						
							<td> {$clientInformation->ocrCustomerCode}</td>
							<td> {$po}</td>
							<td colspan="2"> {$clientInformation->oInfTerms}</td>
							<td> {$clientInformation->salesPersonCode}</td>
						</tr>
					</table>
					EOD;
			$this->writeHTMLCell(0, 0, 7, 78, $html, 1, 1, 0, true, 'L', true);
			

	}

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-26);        
		$this->Ln(1.1);		
		$this->MultiCell(202, 50, '', 'T', 'R', 0, 1, '', '', true);
		$this->MultiCell(55, 5, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, '', 0, 1, 195, 265, true);
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($company_name);
$pdf->SetTitle('Mirtex - invoice');
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('Invoice');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(7, 94, 7, true); // PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont($font, '', 10);

if(isset($_GET['token'])){
	$invoiceId 	= $_GET['token'];
	$sqlInvoice = "SELECT * FROM invoice_summery WHERE id=$invoiceId";
	$filename = "invoice-$invoiceId.pdf";
} 
$allDataInvoice = $objQuery->indexByQueryAllData($sqlInvoice);
$totalRows 		= count($allDataInvoice);

if($totalRows>0){
	$i = $total_pages = 0;
	foreach($allDataInvoice as $inv){
		$i++;
		$invoiceId = $inv->id;
		
		$applied_amount = $inv->applied_amount;
		$balance 		= $inv->balance;
		// add a page
		$pdf->AddPage('P', 'LETTER');
			$data = '<table border="0" cellspacing="0" cellpadding="4" style="width:100%;">
					<thead>
					<tr style="background-color:lightgray;">
						<td style="width:8%; border:1px solid #000; text-align:left;">Qty Cases</td>
						<td style="width:14%; border:1px solid #000; text-align:center;">Item#</td>
						<td style="width:35%; border:1px solid #000; text-align:center;">Description</td>
						<td style="width:9%; border:1px solid #000; text-align:center;"> Unit Price</td>
						<td style="width:7%; border:1px solid #000; text-align:center;">Qty..</td>
						<td style="width:15%; border:1px solid #000; text-align:center;">UPC</td>
						<td style="width:12%; border:1px solid #000; text-align:center;">Amount</td>
					</tr>
					</thead>';

				$orderInvoice = $objQuery->indexByQueryAlldata("SELECT o.*,o.qty_per_box as orderQtyPerBox,o.custom_unit_value as oCustomUnitVal,p.name as product_name,p.qty_per_box as qtyPerBox,p.price as prPerPrice, 
				CONCAT_WS(' ',p.description,o.note) AS pDescription, p.upc as pUPC, p.unit_value as pUnitValue, o.qty as oQty,u.name as unit, o.unit_price as unitprice, o.qty_per_box as oQtyPerBox,
					o.total_price as total FROM order_info o
					LEFT JOIN product p ON p.id=o.product_id
					LEFT JOIN unit_info u on u.id=p.unit_id WHERE o.token='$token' order by p.name ASC");


				$allAdjustment = $objQuery->indexByQueryAllData("SELECT a.*, i.name, i.type, i.description 
										FROM invoice_adjustments a 
                                        LEFT JOIN account_item i ON i.id = a.label
                                        WHERE a.invoice_id =$invoiceId");


				$total = 0;
				$rowIndex = 0;
				$totalItems = count($orderInvoice);
				$index = 0;
				$grandTotal = 0;
				$val = 0;
				foreach($orderInvoice as $record){
						/* if($record->qty < 0.5) $sign = "*"; else $sign = ""; */
						if(fmod($record->qty, 1) !=0) $sign = "*"; else $sign = "";
						 $grandTotal +=$record->total; 
                         $unitPrice = $record->unitprice;
                         $productPerPrice = $record->prPerPrice;
                         $quantity = $record->oQty; 
                         $qtyFilter = ceil($record->qty);
						 /* ($quantity == floor($quantity))? (int)$quantity : rtrim(rtrim($quantity, '0'), '.'); */ 
                         $qty = $record->qtyPerBox; 
                         $calcPerPice = $unitPrice;
						 $OrderQty = $record->orderQtyPerBox;
						 $oCustomUnitVal = str_replace('.00','', $record->oCustomUnitVal);
						 $pUnitValue = $record->pUnitValue;
 								// Invoice Column Name Price condition
							if($record->oQtyPerBox == NULL){
								$productPerPriceCheck = $record->prPerPrice;
							}else{
								$productPerPriceCheck =	$unitPrice;
							}
                         $val += $qtyFilter;
						 $pDescription = entity($record->pDescription);

					$bgColor = ($rowIndex % 2 == 0) ? '#f2f2f2' : '#ffffff';
					$index++;
					$isLast = ($index === $totalItems);
					
					$borderBottom = $isLast ? 'border-bottom:1px solid #000;' : '';
					$data .= '<tbody>
							<tr style="background-color:'.$bgColor.';">
								<td style="'.$borderBottom.'width:8%; border-left:1px solid #000;border-right:1px solid #000;"> '.$qtyFilter.''.$sign.'</td>
								<td style="'.$borderBottom.'width:14%; border-left:1px solid #000;border-right:1px solid #000;"> '.$record->product_name.'</td>
								<td style="'.$borderBottom.'width:35%; border-left:1px solid #000;border-right:1px solid #000;"> '.$pDescription.'</td>
								<td style="'.$borderBottom.'width:9%; border-left:1px solid #000;border-right:1px solid #000; text-align:right;"> '.number_format($unitPrice,2).'</td>
								<td style="'.$borderBottom.'width:7% border-left:1px solid #000;border-right:1px solid #000;; text-align:right;"> '.$oCustomUnitVal.'</td>
								<td style="'.$borderBottom.'width:15%; border-left:1px solid #000;border-right:1px solid #000; text-align:right;"> '.$record->pUPC.'</td>
								<td style="'.$borderBottom.'width:12%; border-left:1px solid #000;border-right:1px solid #000; text-align:right;"> '.number_format($record->total,2).'</td>
							</tr>';

					$rowIndex++;
				}
				
				$adjTotal = count($allAdjustment);
				$adjIndex = 0;
				
				if ($adjTotal > 0) {
					$data .= '
								<tr>
									<td style="border:1px solid #000; text-align:left;"></td>
									<td style="border:1px solid #000; text-align:left;"></td>
									<td style="border:1px solid #000; text-align:right;"></td>
									<td style="border:1px solid #000; text-align:right;"></td>
									<td style="border:1px solid #000; text-align:right;"></td>
									<td style="border:1px solid #000; text-align:right;">Sub Total:</td>
									<td style="border:1px solid #000; text-align:right;">$ ' . number_format($grandTotal, 2) . ' </td>
								</tr>';
				}

					

					foreach ($allAdjustment as $adj) {

						$adjIndex++;

						$adj_type = strtolower($adj->type);
						if ($adj_type == 'expense') {
							$persent = "%";
							$value = number_format(($grandTotal * $adj->adjustment_value) / 100,2);
							$grandTotal -= $value;
							$sign = "- ";

						} else if ($adj_type == 'income') {
							$persent = "%";
							$value = number_format(($grandTotal * $adj->adjustment_value) / 100,2);
							$grandTotal += $value;
							$sign = "";
						}else if($adj_type=='flat'){
							$persent = "";
							$value = number_format($adj->adjustment_value,2);
							$grandTotal -=$value;
							$sign = "- ";
						}

						$data .= '
							<tr>
								<td style="border:1px solid #000; text-align:left;"></td>
								<td style="border:1px solid #000; text-align:center;"></td>
								<td style="border:1px solid #000; text-align:left;">'.$adj->description.'</td>
								<td style="border:1px solid #000; text-align:right;">'.$sign.''.$adj->adjustment_value.''.$persent.'</td>
								<td style="border:1px solid #000; text-align:right;"></td>
								<td style="border:1px solid #000; text-align:right;"></td>
								<td style="border:1px solid #000; text-align:right;">'.$sign.''.$value.'</td>
							</tr>';


						if ($adjIndex < $adjTotal) {
							$data .= '
								<tr>
									<td style="border:1px solid #000; text-align:left;"></td>
									<td style="border:1px solid #000; text-align:left;"></td>
									<td style="border:1px solid #000; text-align:right;"></td>
									<td style="border:1px solid #000; text-align:right;"></td>
									<td style="border:1px solid #000; text-align:right;"></td>
									<td style="border:1px solid #000; text-align:right;">Sub Total:</td>
									<td style="border:1px solid #000; text-align:right;">$ '.number_format($grandTotal,2).' </td>
								</tr>';
						}

					}




				$data .= '
					<tr>
						<td style="border-left:1px solid #000; text-align:left;"> '.$val.' Cases</td>
						<td colspan="5" style="text-align:right;">Total:</td>
						<td style="border:1px solid #000; text-align:right;">$ '.number_format($grandTotal,2).' </td>
					</tr>';

				$data .= '
					<tr>
						<td rowspan="2" style="border-left:1px solid #000;border-bottom:1px solid #000; text-align:left;"></td>
						<td colspan="5" style="text-align:right;">Payment Applied:</td>
						<td style="border:1px solid #000; text-align:right;">$ '.number_format($applied_amount,2).' </td>
					</tr>';

				$data .= '
					<tr>
						<td colspan="5" style="border-bottom:1px solid #000; text-align:right;">Balance Due:</td>
						<td style="border:1px solid #000; text-align:right;">$ '.number_format($balance,2).' </td>
					</tr>';

			$data .= '</tbody>
						</table>'; 

		$txt = <<<EOD
		$data
		EOD;
		
		$pdf->writeHTML($txt, true, false, true, false, '');
	}
}

//Close and output PDF document
if($type=='email'){
	$pdf->Output(__DIR__ . '/files/'.$filename, 'F');
} else {
	$pdf->Output($filename, 'I');
}
//============================================================+
// END OF FILE
//============================================================+