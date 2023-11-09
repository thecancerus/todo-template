<?php
set_time_limit(0);
include 'fpdf.php'; 
$pdf=new FPDF('P','mm','A4');

$total_days=7;
ini_set ( 'date.timezone', 'Asia/Calcutta' );	
//$total_days=30;
for($a=0;$a<$total_days;$a++)	
{
	$pdf->AddPage();

	$pdf->Line(10,20,205,20);
	//ini_set ( 'date.timezone', 'Asia/Calcutta' );
	$date=date('F jS Y',strtotime(date("Y-m-d") . " +$a days"));
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


	$pdf->SetFont('Helvetica','',10);
	$width=$pdf->GetStringWidth('Continuous improvement is better than delayed perfection.');

	$pdf->SetXY(((195/2)-($width/2)), 271);
	$pdf->Write(5, 'Continuous improvement is better than delayed perfection.');


}	
	$pdf->Output('WPoets_week.pdf','D');