<?php 
include_once 'dbconfig.php';
require('pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('logo/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT. ????',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 089****',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Alamat,',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.web.com email : alamat@email.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Yatim",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Lengkap', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Panggilan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tmpt Lahir', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tgl Lahir', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'JK', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query = "SELECT * from tbl_ytm";
$stmt = $DB_con->prepare($query);
$stmt->execute();
while($lihat=$stmt->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama_lengkap'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nama_panggilan'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tmpt_lahir'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['tgl_lahir'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jk'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['status'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['kelas'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_data_barang.pdf","I");

?>