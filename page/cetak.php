<?php
include "../config/koneksi.php"; //pemanggilan koneksi
// // include "../../include/kalender.php"; //pemanggilan tanggal untuk convert ke format d F Y
// include "../config/fpdf.php"; // pemanggilan library FPDF

$query="select * from inventaris ORDER BY kdinv ";
$sql=mysql_query($query);

// memanggil library FPDF
require('../config/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->Image('../dist/img/logo.png',1,1,2,2); // pemanggilan logo
$pdf->SetX(3);
$pdf->MultiCell(17.5,0.5,'Pemerintah Daerah Daerah Istimewa Yogyakarta',0,'C');
$pdf->SetFont('Times','B',11);
$pdf->SetX(3);
$pdf->MultiCell(17.5,0.5,'Balai Latihan Pendidikan Teknik Yogyakarta',0,'C');
$pdf->SetFont('Times','B',9);
$pdf->SetX(3);
$pdf->MultiCell(17.5,0.5,'Jl. Kiai Mojo 70 Yogyakarta Telp.(0274) 513036 Fax. 561690',0,'C');
$pdf->SetFont('Times','B',8);
$pdf->SetX(3);
$pdf->MultiCell(17.5,0.5,'website : www.blptjogja.co.id email : blptjogja@yahoo.com',0,'C');
$pdf->Line(1,3.1,20.5,3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,20.5,3.2);
$pdf->SetLineWidth(0);
$pdf->Ln();
$pdf->SetFont('Times','B',14);
$pdf->MultiCell(19.5,0.8,'Laporan Daftar Inventaris ',0,'C');
$pdf->SetFont('Times','B',12);
$pdf->setFillColor(222,222,222);

      $pdf->Cell(1.0,0.8,'No',1,0,'C'); 
      $pdf->Cell(3.5,0.8,'Kode Inventaris ',1,0,'C');
       $pdf->Cell(2.5,0.8,'Tanggal ',1,0,'C');
      $pdf->Cell(3.2,0.8,'Kode Peralatan',1,0,'C');
      $pdf->Cell(3.0,0.8,'Peralatan',1,0,'C');
      $pdf->Cell(4.8,0.8,'Kategori',1,0,'C');
    
     
      $pdf->SetFont('Times','',10);
      $pdf->Ln();

      $hasi=mysql_query("select * from inventaris");
      $no=1;
      while($hasil=mysql_fetch_array($hasi)){
      $pdf->setFillColor(255,255,255);

      $kdinv=$hasil['kdinv'];
     $tglinv=''.tglindo("$hasil[tglinv]").'';
      $kdalat=$hasil['kdalat'];
       // $harga= 'Rp. ' .number_format(("$hasil[harga]"),0,',','.');  //membuat format rupiah
   
         $x = mysql_query("SELECT * FROM peralatan WHERE kdalat = '$hasil[kdalat]'");
         $a = mysql_fetch_array($x);
         $x = mysql_query("SELECT inventaris.kdinv, peralatan.nmalat, kategori.nmkat
                                                FROM kategori INNER JOIN (peralatan INNER JOIN inventaris ON peralatan.kdalat = inventaris.kdalat)
                                                ON kategori.kdkat = peralatan.kdkat WHERE kdinv = '$hasil[kdinv]'");
          $a = mysql_fetch_array($x);
           $nmalat=  $a['nmalat'];
      
         $x = mysql_query("SELECT inventaris.kdinv, peralatan.nmalat, kategori.nmkat
                                                FROM kategori INNER JOIN (peralatan INNER JOIN inventaris ON peralatan.kdalat = inventaris.kdalat)
                                                ON kategori.kdkat = peralatan.kdkat WHERE kdinv = '$hasil[kdinv]'");
          $a = mysql_fetch_array($x);
           $nmkat=  $a['nmkat'];
       
          
     $pdf->Cell(1.0,0.5,$no,1,0,'C',true);
     $pdf->Cell(3.5,0.5,$kdinv,1,0,'L',true);
      $pdf->Cell(2.5,0.5,$tglinv,1,0,'L',true);
     $pdf->Cell(3.2,0.5,$kdalat,1,0,'L',true);
    $pdf->Cell(3.0,0.5,$nmalat,1,0,'L',true);
    $pdf->Cell(4.8,0.5,$nmkat,1,0,'L',true);
    

        $pdf->Ln(); $no++;}
       $pdf->SetFont('Times','B',10);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
         //menampilkan fungsi format tanggal Indonesia
              $bulan = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
              $waktu[1]=date("d",time());
              $waktu[2]=date("m",time());
              $waktu[3]=date("Y",time());
              $tanggalini="$waktu[1] ".$bulan[$waktu[2]-1]." $waktu[3]";
        //mencetak tanggal
        $pdf->MultiCell(18.2,0.5,' Yogyakarta, '.$tanggalini,0,'R'); 
        $pdf->MultiCell(17.1,0.5,'Penyusun Barang',0,'R'); 
        $pdf->SetFont('Times','B',10);
         $pdf->MultiCell(19.5,0.5,' ',0,'R');
        $pdf->MultiCell(19.5,0.5,' ',0,'R');
        $pdf->MultiCell(19.5,0.5,' ',0,'R');
        $pdf->MultiCell(19.5,0.5,' ',0,'R');
        $pdf->SetFont('Times','B',10);
        $pdf->MultiCell(17.3,0.5,'(XXXX, S.Pd.)',0,'R');
        $pdf->MultiCell(18.6,0.8,'NIP. XXXXXXX XXXXX X 0098',0,'R');
        $pdf->Output();
?>
