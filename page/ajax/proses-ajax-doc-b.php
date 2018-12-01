<?php

include '../../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT a.*,b.*,a.id as pengajuan_opo_id, a.nama_pekerjaan, b.unit, b.harga_per_unit,
 sum(b.unit * b.harga_per_unit) as total FROM tbl_doc_pengajuan_opo a INNER JOIN tbl_doc_pengajuan_opo_detail b ON 
                    a.id=b.doc_pengajuan_opo_id  where a.id='$id' and a.deleted=0 and b.deleted=0 group by b.doc_pengajuan_opo_id");
$row = mysqli_fetch_array($query);
$data = array(
            'doc_pengajuan_opo_id'    	 =>  $row['pengajuan_opo_id'],
            'nama_pekerjaan'    	 =>  $row['nama_pekerjaan'],
            'total'    	 =>  $row['total'],
            'dibuat_oleh'    	 =>  $row['dibuat_oleh'],
        	);
 echo json_encode($data);


?>
