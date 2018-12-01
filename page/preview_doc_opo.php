<?php
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
$id = $_GET['id']; 
$tampil=mysqli_fetch_array(mysqli_query($con,"SELECT a.*,b.*,c.*,a.id as pengajuan_opo_id, a.nama_pekerjaan, b.unit, b.harga_per_unit, 
	sum(b.unit * b.harga_per_unit) as total FROM tbl_doc_pengajuan_opo a INNER JOIN tbl_doc_pengajuan_opo_detail b ON 
                    a.id=b.doc_pengajuan_opo_id LEFT JOIN tbl_karyawan c ON a.id_karyawan_dibuat_oleh=c.id AND 
                    a.id_karyawan_yang_mengajukan=c.id AND  a.id_karyawan_yang_menyetujui=c.id AND  
                    a.id_karyawan_yang_mengetahui=c.id AND  a.id_karyawan_finance=c.id where b.deleted=0 
                     AND b.doc_pengajuan_opo_id='$id' group by b.doc_pengajuan_opo_id  "));

$dibuat_oleh=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as dibuat_oleh FROM tbl_doc_pengajuan_opo a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_dibuat_oleh where a.deleted=0 and a.id='$id' "));

$yang_mengajukan=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as yang_mengajukan FROM tbl_doc_pengajuan_opo a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_yang_mengajukan where a.deleted=0 and a.id='$id' "));

$yang_menyetujui=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as yang_menyetujui FROM tbl_doc_pengajuan_opo a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_yang_menyetujui where a.deleted=0 and a.id='$id' "));

$yang_mengetahui=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as yang_mengetahui FROM tbl_doc_pengajuan_opo a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_yang_mengetahui where a.deleted=0 and a.id='$id' "));

$finance=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as finance FROM tbl_doc_pengajuan_opo a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_finance where a.deleted=0 and a.id='$id' "));

// memanggil library FPDF
require('../config/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
class PDF extends FPDF
{
    function SetDash($black=false, $white=false)
    {
        if($black and $white)
            $s=sprintf('[%.3f %.3f] 0 d', $black*$this->k, $white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
}

$pdf = new FPDF('P','mm','A4');
$pdf = new PDF();
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan

// mencetak string 
$pdf->Ln(2);
// 'logo.php' di bawah berarti path atau alamat gambar
// dengan panjang posisi X = 10, Y = 6, dan panjang 30 
$pdf->Image('../dist/img/logo.jpg',10,10,30);
// arial bold 15

// membuat cell kosong dengan panjang 80
$pdf->Cell(60);
// judul
// $pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(90,7,'FORM PENGAJUAN OPERASIONAL PURCHASE ORDER ',0,1,'C');
$pdf->Cell(60);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(90,7,'PT. DUA EMPAT SINERGI',0,1,'C');
$pdf->Ln(5);
$pdf->Cell(33);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(80,2,'Jl. Cipto Mangunkusumo Komplek Pembangunan III No.15 Cirebon, Telp/Fax. (0231) 230 630 ',0,0,'L');
$pdf->Cell(65,2,'office@duaempatsinergi.com, www.duaempatsinergi.com',0,1,'L');

$pdf->SetLineWidth(0.2);
$pdf->Line(10,35,200,35);
$pdf->SetLineWidth(0.9);
$pdf->Line(10,37,200,37);

$pdf->Ln();

// Memberikan space kebawah agar tidak terlalu rapat
// nomor
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,12,'',0,1);
// $pdf->Cell(30,6,'NO. MOR',0,0);
// $pdf->Cell(5,6,':',0,0);
// $pdf->Cell(50,6, $tampil['no_mor'] ,0,0);
$pdf->Cell(30,6,'Nama Pekerjaan',0,0);
$pdf->Cell(5,6,':',0,0);
$pdf->Cell(50,6,$tampil['nama_pekerjaan'],0,0);
// buat jarak dengan tanggal
$pdf->Cell(55);
// tanggal
$pdf->Cell(20,6,'Tanggal',0,0);
$pdf->Cell(5,6,':',0,0);
$pdf->Cell(80,6,tgl_indo($tampil['tanggal']),0,0);


// nama Pekerjaan
// $pdf->Cell(10,5,'',0,1);


$pdf->Cell(10,12,'',0,1);
$pdf->SetLineWidth(0.3);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(80,6,'KETERANGAN',1,0,'C');
$pdf->Cell(20,6,'UNIT',1,0,'C');
$pdf->Cell(40,6,'HARGA',1,0,'C');
$pdf->Cell(40,6,'SUBTOTAL',1,1,'C');

$pdf->SetFont('Arial','',8);

// $mahasiswa = mysqli_query($con, "select * from tbl_user");
$no=1;
// tabel keterangan
$query=mysqli_query($con,"SELECT a.*,b.*,a.id as pengajuan_opo_id, a.nama_pekerjaan,(b.unit * b.harga_per_unit) as subtotal,
 b.unit, b.harga_per_unit FROM tbl_doc_pengajuan_opo a INNER JOIN tbl_doc_pengajuan_opo_detail b ON 
                    a.id=b.doc_pengajuan_opo_id LEFT JOIN tbl_karyawan c ON a.id_karyawan_dibuat_oleh=c.id AND 
                    a.id_karyawan_yang_mengajukan=c.id AND  a.id_karyawan_yang_menyetujui=c.id AND  
                    a.id_karyawan_yang_mengetahui=c.id AND  a.id_karyawan_finance=c.id where b.deleted=0 
                     AND  b.doc_pengajuan_opo_id='$id' ");

while($detail = mysqli_fetch_array($query)){
    $pdf->Cell(10,6,$no++,1,0,'C');
    $pdf->Cell(80,6,$detail['keterangan'],1,0);
    $pdf->Cell(20,6,$detail['unit'],1,0,'C');
    $pdf->Cell(40,6,"Rp. ". number_format("$detail[harga_per_unit]",'0','.','.'),1,0);
    $pdf->Cell(40,6,"Rp. ". number_format("$detail[subtotal]",'0','.','.'),1,1);
}

$pdf->SetFont('Arial','B',8);
$pdf->Cell(150,6,'TOTAL',1,0,'R');
$pdf->Cell(40,6,"Rp. ". number_format("$tampil[total]",'0','.','.'),1,0,'L');


// // buat jarak untuk ttd
$pdf->Ln(15);
$pdf->Cell(38,6,'Dibuat Oleh',0,0,'C');
$pdf->Cell(38,6,'Yang Mengajukan',0,0,'C');
$pdf->Cell(38,6,'Yang Menyetujui',0,0,'C');
$pdf->Cell(38,6,'Yang Mengetahui',0,0,'C');
$pdf->Cell(38,6,'Finance',0,0,'C');
// jarak ttd
$pdf->Ln(21);
$pdf->Cell(38,6,$dibuat_oleh['dibuat_oleh'],0,0,'C');
$pdf->Cell(38,6,$yang_mengajukan['yang_mengajukan'],0,0,'C');
$pdf->Cell(38,6,$yang_menyetujui['yang_menyetujui'],0,0,'C');
$pdf->Cell(38,6,$yang_mengetahui['yang_mengetahui'],0,0,'C');
$pdf->Cell(38,6,$finance['finance'],0,1,'C');



$pdf->Cell(10);
$pdf->Ln(8);
$pdf->SetLineWidth(0.1);
$pdf->SetDash(4, 2); 
$pdf->Cell(188,0,'',1,0,'C');
// $pdf->Rect(0, 133, 2210, 0);

$pdf->Output();
?>
