<?php

// print_r($_POST['keterangan']);
// $nomor = $_POST['nomor'];
// $nama_pekerjaan = $_POST['nama_pekerjaan'];
// $tanggal = $_POST['tanggal'];
// $dibuat_oleh = $_POST['dibuat_oleh'];
// $yang_mengajukan = $_POST['yang_mengajukan'];
// $yang_menyetujui = $_POST['yang_menyetujui'];
// $yang_mengetahui = $_POST['yang_mengetahui'];
// $finance = $_POST['finance'];
// exit();
// memanggil library FPDF
require('../config/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan

// mencetak string 

// 'logo.php' di bawah berarti path atau alamat gambar
// dengan panjang posisi X = 10, Y = 6, dan panjang 30 
$pdf->Image('../dist/img/logo.jpg',10,10,30);
// arial bold 15

// membuat cell kosong dengan panjang 80
$pdf->Cell(60);
// judul
$pdf->SetFont('Arial','B',13);
$pdf->Cell(90,7,'FORM PENGAJUAN OPERASIONAL PT. DUA EMPAT SINERGI',0,1,'C');
$pdf->Cell(60);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,7,'DAFTAR PENGAJUAN OPERASIONAL ',0,1,'C');
$pdf->Ln(6);
$pdf->Cell(33);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(80,2,'Jl. Cipto Mangunkusumo Komplek Pembangunan III No.15 Cirebon, Telp/Fax. (0231) 230 630 ',0,0,'L');
$pdf->Cell(65,2,'Jl. Wiji Adisoro No. 40 Prenggan Kotagede YogyaKarta - Jawa Tengah',0,1,'L');
$pdf->Cell(33);
$pdf->Cell(80,2,'Komplek Kiara Sari Asri Jl. Kiara Sari Utama 1 No. 24 Bandung, Telp/Fax. (022) 8888 15 42',0,0,'L');
$pdf->Cell(65,2,'office@duaempatsinergi.com, www.duaempatsinergi.com',0,1,'L');

$pdf->SetLineWidth(0.2);
$pdf->Line(10,35,200,35);
$pdf->SetLineWidth(0.9);
$pdf->Line(10,37,200,37);



// Memberikan space kebawah agar tidak terlalu rapat
// nomor
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(10,12,'',0,1);
// $pdf->Cell(30,6,'NO. MOR',0,0);
// $pdf->Cell(5,6,':',0,0);
// $pdf->Cell(50,6, $nomor ,0,0);
// // buat jarak dengan tanggal
// $pdf->Cell(55);
// // tanggal
// $pdf->Cell(20,6,'Tanggal',0,0);
// $pdf->Cell(5,6,':',0,0);
// $pdf->Cell(80,6,$tanggal,0,0);


// // nama Pekerjaan
// $pdf->Cell(10,5,'',0,1);
// $pdf->Cell(30,6,'Nama Pekerjaan',0,0);
// $pdf->Cell(5,6,':',0,0);
// $pdf->Cell(80,6,$nama_pekerjaan,0,0);

// $pdf->Cell(10,12,'',0,1);
// $pdf->SetLineWidth(0.3);
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(10,6,'NO',1,0,'C');
// $pdf->Cell(80,6,'KETERANGAN',1,0,'C');
// $pdf->Cell(20,6,'UNIT',1,0,'C');
// $pdf->Cell(40,6,'HARGA',1,0,'C');
// $pdf->Cell(40,6,'SUBTOTAL',1,1,'C');

// $pdf->SetFont('Arial','',8);

// include '../config/koneksi.php';
// // $mahasiswa = mysqli_query($con, "select * from tbl_user");
// // tabel keterangan
// $id_baris = $_POST['id_baris'];
// $jumlah_baris = count($id_baris);

// while ($row = mysqli_fetch_array($mahasiswa)){
//     $pdf->Cell(10,6,$row['id'],1,0,'C');
//     $pdf->Cell(80,6,$row['username'],1,0);
//     $pdf->Cell(20,6,$row['username'],1,0);
//     $pdf->Cell(40,6,$row['username'],1,0);
//     $pdf->Cell(40,6,$row['username'],1,1);
// }
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(150,6,'TOTAL',1,0,'R');
// $pdf->Cell(40,6,'Rp. 2.000.000',1,0,'L');


// // buat jarak untuk ttd
// $pdf->Ln(15);
// $pdf->Cell(38,6,'Dibuat Oleh',0,0,'C');
// $pdf->Cell(38,6,'Yang Mengajukan',0,0,'C');
// $pdf->Cell(38,6,'Yang Menyetujui',0,0,'C');
// $pdf->Cell(38,6,'Yang Mengetahui',0,0,'C');
// $pdf->Cell(38,6,'Finance',0,0,'C');
// // jarak ttd
// $pdf->Ln(21);
// $pdf->Cell(38,6,$dibuat_oleh,0,0,'C');
// $pdf->Cell(38,6,$yang_mengajukan,0,0,'C');
// $pdf->Cell(38,6,$yang_menyetujui,0,0,'C');
// $pdf->Cell(38,6,$yang_mengetahui,0,0,'C');
// $pdf->Cell(38,6,$finance,0,0,'C');

$pdf->Output();
?>
