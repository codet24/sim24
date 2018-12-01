<?php 

if (!isset($_GET['pg'])) {
	include 'dashboard.php';
} else {
	switch ($_GET['pg']) {
		case 'dashboard':
			include 'dashboard.php';
			break;

		case 'user':
			include 'hal_user.php'; 	
			break;

		case 'karyawan':
			include 'hal_karyawan.php';
			break;

		case 'divisi':
			include 'hal_divisi.php';
			break;

		case 'qa':
			include 'hal_quick_access.php';
			break;

		case 'qdtl':
			include 'hal_quick_access_detail.php';
			break;

		case 'easy_access':
			include 'easy_access.php';
			break;
		
		//  Document JPO
		case 'doc_a':
			include 'hal_doc_a.php';
			break;

		//  Document OPO
		case 'doc_b':
			include 'hal_doc_b.php';
			break;

		default:	        
	    	echo "<label>404 Halaman tidak ditemukan</label>";
	    break;
		
	}
}

?>