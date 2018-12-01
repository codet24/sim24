<?php

include '../../config/koneksi.php';
$quick_access = $_GET['quick_access'];
$query = mysqli_query($con, "SELECT * from tbl_qa where quick_access='$quick_access' AND deleted=0");
$row = mysqli_fetch_array($query);
$data = array(
            'id_qa'    	 		 =>  $row['id'],
            'quick_access'    	 =>  $row['quick_access'],
            'description'    	 =>  $row['description'],
            'page'    	 		 =>  $row['page'],
        	);
 echo json_encode($data);

?>
