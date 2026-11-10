<?php
//============================================================+
// File name   : example_028.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 028 for TCPDF class
//               Changing page formats
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: changing page formats
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Antonio');
$pdf->SetTitle('');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

// set font
$pdf->SetFont('times', 'B', 20);



$pdf->AddPage('L', 'A4');
$pdf->Rect(172, 30,35, 10, 'D', '');
$pdf->Rect(207, 30,22, 10, 'D', '');
$pdf->Rect(229, 30,22, 10, 'D', '');

$pdf->SetFont('times', '', 7);
$pdf->writeHTMLCell(0, '', '202', '24', 'TS', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '215', '24', 'CN', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '227', '24', 'YF', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '240', '24', 'PPS', 0, 0, 0, true, 'L', false);

$pdf->writeHTMLCell(0, '', '185', '30', 'Noted by:', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '210', '30', 'Checked by:', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '232', '30', 'Prepared by:', 0, 0, 0, true, 'L', false);

$pdf->setPage(1, true);
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(0, '', '34', '24', 'PMI Charging Report', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '34', '30', 'To ', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '40', '30', ':', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '34', '34', 'attn', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '40', '34', ':', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '34', '38', 'Cc ', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '40', '38', ':', 0, 0, 0, true, 'L', false);

$pdf->writeHTMLCell(0, '', '34', '46', 'PMI DM', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '34', '50', 'Document #', 0, 0, 0, true, 'L', false);
$pdf->writeHTMLCell(0, '', '34', '54', 'Issued Date', 0, 0, 0, true, 'L', false);


	$pdf->writeHTMLCell(0, '', '60', '58', 'Summary of DEBIT Memo for the month of January 2017', 0, 0, 0, true, 'L', false);

	$pdf->writeHTMLCell(0, '', '20', '68', '

		<table style="padding:1px;width:80%;">
		<thead >
			<tr style="font-size:9px">
				<td style="width:20px;height:38px;border: 1px solid black;text-align:center;"><b>No.</b></td>
				<td style="width:60px;border: 1px solid black;text-align:center;"><b>In-Charge Section</b></td>
				<td style="width:95px;border: 1px solid black;text-align:center;"><b> Material/Product Name</b></td>
				<td style="width:60px;border: 1px solid black;text-align:center;"><b>Detail</b></td>
				<td style="width:70px;border: 1px solid black;text-align:center;"><b>Billing Summary</b></td>
				<td style="border: 1px solid black;text-align:center;"><b>Material unit price</b></td>
				<td style="border: 1px solid black;text-align:center;"><b>Material Qty.</b></td>
				<td style="width:55px;border: 1px solid black;text-align:center;"><b>Total Amnt.(USD)</b></td>
				<td style="border: 1px solid black;text-align:center;"><b>Sorting Qty.</b></td>
				<td style="border: 1px solid black;text-align:center;"><b>Tact time(sec)</b></td>
				<td style="width:50px;border: 1px solid black;text-align:center;"><b>Cost/Mins.</b></td>
				<td style="width:51px;border: 1px solid black;text-align:center;"><b>Total Amnt.(USD)</b></td>
				<td style="width:51px;border: 1px solid black;text-align:center;"><b>Transport Total Amnt.(USD)</b></td>
				<td style="width:51px;border: 1px solid black;text-align:center;"><b>Total Amnt.(USD)</b></td>
				<td style="width:51px;border: 1px solid black;text-align:center;"><b>Detail of indication</b></td>
				<td style="border: 1px solid black;text-align:center;"><b>Supplier Name</b></td>
				<td style="width:50px;border: 1px solid black;text-align:center;"><b>YEC Billing request</b></td>
				<td style="width:50px;border: 1px solid black;text-align:center;"><b>Category</b></td>

				
			</tr>
		</thead>
		<tbody></tbody> </table> <br>

		 <div style="text-align:left;font-size:9px;">

			 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Note: Important reminders please generate debit memo on per division section in-charge <br>
		  		 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    Example: If the instruction is from YEC QC the content of Debit Memo should be intended only for YEC-QC <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;							
			If the instruction is from YEC Eng`g the content of Debit Memo should be intended only for YEC-Eng`g
					<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
			Here`s How to distinguish the special instruction to be address of Debit Memo per section: <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			If the instruction control no. start with: TSH-XXX -> It means the charging is intended only for YEC-QC section <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			If the instruction control no. start with: TDI-XX-XXX -> Please confirm it first to Ms.Nakasato if what section should be charge. <br> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			There are 4 sections using TDI control no. that`s why it is important to ask first Ms.Nakasato, send her the specific TDI data for classification. <br> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			(YEC-Eng`g/YEC-Stamping/YEC-Sales/YEC-PPC)


													



		   </div>




		',0, 0, 0, true, 'C', true);






$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_028.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
