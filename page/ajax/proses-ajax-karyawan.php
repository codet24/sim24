<?php

include '../../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT a.*,b.*,a.id as id_karyawan FROM tbl_karyawan a INNER JOIN tbl_divisi b ON 
                    a.divisi_id=b.id Where a.id='$id' and a.deleted=0");
$row = mysqli_fetch_array($query);
$data = array(
            'id_karyawan'    	 =>  $row['id_karyawan'],
            'nama_karyawan'    	 	 =>  $row['nama_karyawan'],
            'nik'    	 	 =>  $row['nik'],
            'divisi_id'    	 	 =>  $row['divisi_id'],
            'divisi'    	 	 =>  $row['divisi'],
            'username'    	 	 =>  $row['username'],

        	);
 echo json_encode($data);

 // print_r($data);exit();

?>
