<?php
// error_reporting(0);
// untuk mengecek apakah quick access ada
$qa_cek=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_qa where quick_access='$_POST[easy_access]'"));

// untuk mengecek apakah quick
$qa_detail_cek=mysqli_query($con,"SELECT * FROM tbl_qa_detail where qa_id='$qa_cek[id]' AND user_id='$_SESSION[id]'");
$jumlah_qa_detail = mysqli_num_rows($qa_detail_cek);

// var_dump($qa_detail_cek); exit();

// jika quick access ada maka alihkan ke page yang sesuai dengan quick access tersebut
if($qa_cek['quick_access']){
	// cek apakah dia berhak mengakses halaman tersebut
	if($jumlah_qa_detail > 0){
	echo "<script>window.location='$qa_cek[page]'</script>";
	}else{ ?>
		<div class="content-wrapper">
	  <section class="content-header">
	    <h1>Halaman Tidak Ditemukan </h1>
	    <ol class="breadcrumb">
	      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
	      <li class="active"><a href="#">Data Halaman Tidak Ditemukan</a></li>
	    </ol>
	  </section>
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	      		<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                  <h4><i class='icon fa fa-eye-slash'></i> Anda Tidak Diperkenankan Mengkases Halaman Ini</h4>
                   Anda Tidak Memiliki Akses Ke halaman Ini, Silahkan Akses Halaman Anda Saja ! Terimakasih
                </div>
	      </div>
        </div>
      </section>
    </div>
<?php
	}
}else{ ?>
	<div class="content-wrapper">
	  <section class="content-header">
	    <h1>Halaman Tidak Ditemukan </h1>
	    <ol class="breadcrumb">
	      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
	      <li class="active"><a href="#">Data Halaman Tidak Ditemukan</a></li>
	    </ol>
	  </section>
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	      		<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                  <h4><i class='icon fa fa-eye-slash'></i> Halaman Yang Anda Cari Tidak Ada </h4>
                   Mohon Periksa Kembali Quick Access yang anda masukkan ! Terimakasih
                </div>
	      </div>
        </div>
      </section>
    </div>
<?php 
}
?>