<?php
set_time_limit(0);
include 'fpdf.php'; 
$pdf=new FPDF('P','mm','A4');
if(isset($_GET['year']))
	$year=$_GET['year'];
else
	$year=date('Y');	
if(($year%4)==0)
	$total_days=366;
else
	$total_days=365;
	
//$total_days=30;
for($a=0;$a<$total_days;$a++)	
{
	$pdf->AddPage();

	$pdf->Line(10,20,205,20);
	//ini_set ( 'date.timezone', 'Asia/Calcutta' );
	$date=date('F jS Y',strtotime(date("Y-m-d", strtotime("1 January $year")) . " +$a days"));
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

}	
	$pdf->Output('amiworks_'.$year.'.pdf','D');