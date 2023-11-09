<?php
include 'fpdf.php'; 
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->Line(10,20,205,20);
ini_set ( 'date.timezone', 'Asia/Calcutta' );
$date=date('F jS Y');
$pdf->SetFont('Helvetica','B',18);
$pdf->Cell(40,10,$date);

$pdf->SetFont('Helvetica','',24);
$width=$pdf->GetStringWidth('AmiWorks');

$pdf->SetXY((195-$width), 10);
$pdf->Write(10, 'AmiWorks');

$pdf->Rect(10,20,195,250,'D');

$pdf->Rect(145,20,60,250,'D');
for($i=0;$i<50;$i++)
{
    $pdf->Line(145,25+($i*5),205,25+($i*5));
}
$pdf->Line(145,30,205,30);
$pdf->Line(145,35,205,35);


$pdf->SetFont('Times','',8);
$width=$pdf->GetStringWidth('Integrated Solutions Made Simple');

$pdf->SetXY((195-$width), 270);
$pdf->Write(5, 'Integrated Solutions Made Simple');

$pdf->Output('amiworks.pdf','D');