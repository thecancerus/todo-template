<?php

include 'fpdf.php'; 
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->Line(10,20,205,20);
ini_set ( 'date.timezone', 'Asia/Calcutta' );
if(isset($_GET['today']))
	$date=date('F jS Y');
else
	$date =date('F jS Y',time()+86400);

$pdf->SetFont('Helvetica','B',18);
$pdf->Cell(40,10,$date);

$pdf->SetFont('Helvetica','',24);
$width=$pdf->GetStringWidth('WPoets');

$pdf->SetXY((195-$width), 10);
$pdf->SetXY((195-$width), 10);
$pdf->Write(10, 'WPoets');

$pdf->Rect(10,20,195,250,'D');

$pdf->Rect(10,20,75,250,'D');
for($i=0;$i<30;$i++)
{
    $pdf->Line(10,28+($i*8),85,28+($i*8));
}
//$pdf->Line(145,30,205,30);
//$pdf->Line(145,35,205,35);


$pdf->SetFont('Helvetica','',10);
$width=$pdf->GetStringWidth('Continuous improvement is better than delayed perfection.');

$pdf->SetXY(((195/2)-($width/2)), 271);
$pdf->Write(5, 'Continuous improvement is better than delayed perfection.');

$date=date('d-M-y');
$pdf->Output('wpoets-'.$date.'.pdf','D');