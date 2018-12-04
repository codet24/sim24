<?php

include '../../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * from tbl_divisi where id='$id' and deleted=0");
$row = mysqli_fetch_array($query);
$data = array(
            'id_divisi'    	 =>  $row['id'],
            'divisi'    	 =>  $row['divisi'],
            'ket'    	 	 =>  $row['ket'],
        	);
 echo json_encode($data);
?>
