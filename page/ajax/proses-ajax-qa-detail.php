<?php

include '../../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT a.*,b.id as id_qa_dtl, b.*,c.* FROM tbl_qa a INNER JOIN tbl_qa_detail b ON a.id=b.qa_id 
	INNER JOIN tbl_user c ON b.user_id=c.id where b.id='$id' and a.deleted=0 and b.deleted=0 and c.deleted=0");
$row = mysqli_fetch_array($query);
$data = array(
            'id_qa_detail'   =>  $row['id_qa_dtl'],
            'user_id'    	 =>  $row['user_id'],
            'username'    	 =>  $row['username'],
            'qa_id'    	  	 =>  $row['qa_id'],
            'quick_access'   =>  $row['quick_access'],
        	);
 echo json_encode($data);

?>
