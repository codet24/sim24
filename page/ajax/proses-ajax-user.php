<?php

include '../../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * from tbl_user where id='$id' and deleted=0 ");
$row = mysqli_fetch_array($query);
$data = array(
            'id_user'    	 =>  $row['id'],
            'username'    	 =>  $row['username'],
        	);
 echo json_encode($data);

?>
