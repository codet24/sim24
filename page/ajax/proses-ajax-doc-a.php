<?php

include '../../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT a.*,b.*,c.*, a.id as pengajuan_id, a.nama_pekerjaan, 
                    b.unit, b.harga_per_unit, sum(b.unit * b.harga_per_unit) as total FROM 
                    tbl_doc_pengajuan a INNER JOIN tbl_doc_pengajuan_detail b ON 
                    a.id=b.doc_pengajuan_id LEFT JOIN tbl_karyawan c ON a.id_karyawan_dibuat_oleh=c.id AND 
                    a.id_karyawan_yang_mengajukan=c.id AND  a.id_karyawan_yang_menyetujui=c.id AND  
                    a.id_karyawan_yang_mengetahui=c.id AND  a.id_karyawan_finance=c.id where a.id='$id' and a.deleted=0
                    group by b.doc_pengajuan_id");

// ngambil list  item detail
$query_detail = mysqli_query($con,"SELECT b.id as id_detail, b.keterangan, b.unit, b.harga_per_unit, (b.unit * b.harga_per_unit) as subtotal FROM tbl_doc_pengajuan a INNER JOIN tbl_doc_pengajuan_detail b ON 
                    a.id=b.doc_pengajuan_id where a.id='$id' and a.deleted=0 group by b.id
                   ");

$dibuat_oleh=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as dibuat_oleh FROM tbl_doc_pengajuan a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_dibuat_oleh where a.deleted=0 and a.id='$id' "));

$yang_mengajukan=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as yang_mengajukan FROM tbl_doc_pengajuan a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_yang_mengajukan where a.deleted=0 and a.id='$id' "));

$yang_menyetujui=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as yang_menyetujui FROM tbl_doc_pengajuan a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_yang_menyetujui where a.deleted=0 and a.id='$id' "));

$yang_mengetahui=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as yang_mengetahui FROM tbl_doc_pengajuan a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_yang_mengetahui where a.deleted=0 and a.id='$id' "));

$finance=mysqlI_fetch_array(mysqli_query($con,"SELECT b.nama_karyawan as finance FROM tbl_doc_pengajuan a 
    INNER JOIN tbl_karyawan b ON b.id=a.id_karyawan_finance where a.deleted=0 and a.id='$id' "));


$row 		= mysqli_fetch_array($query);
$jumlah 	= mysqli_num_rows($query_detail);
// untuk menampilkan detail
for ($set = array (); $row_detail = mysqli_fetch_assoc($query_detail); $set[] = $row_detail);


$data = array(
            'doc_a_id'    	 		        =>  $row['pengajuan_id'],
            'nama_pekerjaan'    	 		=>  $row['nama_pekerjaan'],
            'date'    	 					=>  $row['tanggal'],
            'no_mor'    	 				=>  $row['no_mor'],

            'total'    	             		=>  $row['total'],
            'id_karyawan_dibuat_oleh'		=>  $row['id_karyawan_dibuat_oleh'],
            'dibuat_oleh'    	     		=>  $dibuat_oleh['dibuat_oleh'],
            'yang_mengajukan'    	 		=>  $yang_mengajukan['yang_mengajukan'],
            'id_karyawan_yang_mengajukan'   =>  $row['id_karyawan_yang_mengajukan'],
            'yang_menyetujui'    	 		=>  $yang_menyetujui['yang_menyetujui'],
            'id_karyawan_yang_menyetujui'   =>  $row['id_karyawan_yang_menyetujui'],
            'yang_mengetahui'    	 		=>  $yang_mengetahui['yang_mengetahui'],
            'id_karyawan_yang_mengetahui'   =>  $row['id_karyawan_yang_mengetahui'],
            'finance'    	     	 		=>  $finance['finance'],
            'id_karyawan_finance'		    =>  $row['id_karyawan_finance'],

            // data detail
            'jumlah_detail'					=> $jumlah,
            'detail'                        => $set,
        	);

// var_dump($data['detail']);
// // echo $data['detail'];

// exit();
 echo json_encode($data);

?>
