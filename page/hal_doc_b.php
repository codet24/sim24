<?php
if(empty($_SESSION['username'])){
   echo "Anda tidak Memiliki Akses, silahkan login <br><meta http-equiv='refresh' content='2; url=../index.php'/>";
} else {
  switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'manajemen':
  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Data Pengajuan OPO</h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_b&act=view">Manajemen Data Pengajuan OPO</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-12"> 
          <!-- Application buttons -->
          <div class="box">
            <div class="box-body">
              <a class="btn btn-app">
                <i class="fa fa-search"></i> Lihat User
              </a>
              <a class="btn btn-app">
                <i class="fa fa-user-plus"></i> Tambah User
              </a>
              <a class="btn btn-app">
                <i class="fa fa-bar-chart-o"></i> Grafik User
              </a>  
            </div>
          </div>
      </div>
    </section> 
</div>

<?php
break;     
  case 'view':
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Lihat Data Pengajuan OPO</h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_b&act=view">Data Pengajuan OPO</a></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
        <div class="box-header">
        </div>
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">       
           </div>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pekerjaan</th>
                    <th>Tanggal</th>
                    <th>Dibuat Oleh</th>
                    <th>Total</th>
                    <th width="30px">Preview</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as pengajuan_opo_id, a.nama_pekerjaan, b.unit, b.harga_per_unit, sum(b.unit * b.harga_per_unit) as total FROM tbl_doc_pengajuan_opo a INNER JOIN tbl_doc_pengajuan_opo_detail b ON 
                    a.id=b.doc_pengajuan_opo_id LEFT JOIN tbl_karyawan c ON a.id_karyawan_dibuat_oleh=c.id AND 
                    a.id_karyawan_yang_mengajukan=c.id AND  a.id_karyawan_yang_menyetujui=c.id AND  
                    a.id_karyawan_yang_mengetahui=c.id AND  a.id_karyawan_finance=c.id where a.deleted=0  group by b.doc_pengajuan_opo_id");
                  $no = 1;
                  while ($r=mysqli_fetch_array($tampil)){
                    $tgl = tgl_indo($r['tanggal']);
                    ?>
                    <tr>
                      <td><?php echo "$no"?></td>
                      <td><?php echo "$r[nama_pekerjaan]"?></td>
                      <td><?php echo "$tgl"?></td>
                      <td><?php echo "$r[nama_pekerjaan]"?></td>
                      <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.')." "?></td>
                      <td><a href="preview_doc_opo.php?id=<?php echo $r['pengajuan_opo_id']?>" title="Preview Document" target="_blank">
                       <button type="button" class="btn bg-orange"><i class="fa fa-file-pdf-o"></i></button></a>
                       </td>
                    <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div> 
          </div>
        </div>
      </div> 
    </div>
  </section> 
</div>

<?php
break;
case 'add':
  
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> Document Pengajuan OPO</h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_b&act=add">Data Pengajuan OPO</a></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
      <?php 
        if (isset($_POST['save'])) {
          $created_by = $_SESSION['id'];
          $tanggal_sekarang = date('Y-m-d h:i:s');

          $nama_pekerjaan = $_POST['nama_pekerjaan'];
          $tanggal = $_POST['tanggal'];
          $id_karyawan_dibuat_oleh = $_POST['id_karyawan_dibuat_oleh'];
          $id_karyawan_yang_mengajukan = $_POST['id_karyawan_yang_mengajukan'];
          $id_karyawan_yang_menyetujui = $_POST['id_karyawan_yang_menyetujui'];
          $id_karyawan_yang_mengetahui = $_POST['id_karyawan_yang_mengetahui'];
          $id_karyawan_finance = $_POST['id_karyawan_finance'];

          $id_baris = $_POST['id_baris'];
          $jumlah_baris = count($id_baris);
          $keterangan = $_POST['keterangan'];
          $unit = $_POST['unit'];
          $harga = $_POST['harga'];
          $subtotal = $_POST['subtotal'];

          // $subtotal
          $no=1;
          

         $query = mysqli_query($con,"INSERT INTO tbl_doc_pengajuan_opo 
         (id,  nama_pekerjaan, tanggal, id_karyawan_dibuat_oleh,id_karyawan_yang_mengajukan, id_karyawan_yang_menyetujui, id_karyawan_yang_mengetahui, id_karyawan_finance,created_by,created_on) 
          VALUES ('','$nama_pekerjaan','$tanggal','$id_karyawan_dibuat_oleh','$id_karyawan_yang_mengajukan','$id_karyawan_yang_menyetujui','$id_karyawan_yang_mengetahui','$id_karyawan_finance','$created_by','$tanggal_sekarang')");
          // $doc_pengajuan_id = mysqli_insert_id($con,$query);
          $doc_pengajuan_id = mysqli_insert_id($con);
          // echo $doc_pengajuan_id;exit();
          // insert ke doc pengajuan detail
          for ($i=0;$i<$jumlah_baris;$i++){
              $detail = mysqli_query($con,"INSERT INTO tbl_doc_pengajuan_opo_detail 
             (id, doc_pengajuan_opo_id, keterangan, unit, harga_per_unit) 
              VALUES ('','$doc_pengajuan_id','$keterangan[$i]','$unit[$i]','$harga[$i]')");
          }
         // if($query){
          echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-check'></i> Data Berhasil Di Simpan </h4>
              </div>"; ?>
              <script>
                  setTimeout(function () {
                     window.location = "home.php?pg=doc_b&act=add"; //will redirect to your blog page (an ex: blog.html)
                  }, 3000); //will call the function after 2 secs.
              </script>
    <?php
         
        }
       ?>
        <div class="box box-primary">
          <div class="box-body">
          <form role="form" action="" method="POST" name="doc-form" >
            <div class="form-group">
              <!-- header -->
              <div class="table-responsive">
                  <table   style=" width:100%;">
                      <tr>
                          <td rowspan="3" style="width:20%"><img src="../dist/img/logo.jpg" width="65%" /> </td>
                          <td style="width:60%;text-align: center;"><h3 style="margin:5px"><b>FORM PENGAJUAN OPERASIONAL PURCHASE ORDER</b></h3></td>
                          <td style="width:20%;text-align: center;"></td>
                      </tr>
                      <tr>
                          <td style="width:60%;text-align: center;"><h3 style="margin:5px;"><b>PT. DUA EMPAT SINERGI</b></h3></td>
                          <td style="width:20%;text-align: center;"></td>
                      </tr>
                      <tr>
                          <td style="width:70%;text-align: Left;">
                            <p style="margin-bottom:0px;font-size:8px;">
                              <b style="margin-right:25px;padding-left:75px;">Jl. Cipto Mangunkusumo Komplek Pembangunan III No.15 Cirebon, Telp/Fax. (0231) 230 630</b>
                              <b>office@duaempatsinergi.com, www.duaempatsinergi.com</b>
                            </p>
                          </td>
                          <td style="width:20%;text-align: center;"></td>
                      </tr>
                      <tr> 
                          <td colspan='3' style="border-bottom:1px solid;padding-top:10px"></td>
                      </tr>
                      <tr> 
                          <td colspan='3' style="border-bottom:4px solid;padding-top:5px"></td>
                      </tr>
                  </table>
              </div>
              <br>
              <br>
              <!-- Document -->
                <div class="table-responsive">
                <table  style=" width:100%;">
                    <tbody>
                        <tr>
                            <td style="width:10%"><label class="form-label">Nama Pekerjaan</label></td>
                            <td style="width:5%"> : </td> 
                            <td style="width:45%">
                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0px;"> 
                                    <input type="text" name="nama_pekerjaan" value="" class="form-control" required Placeholder="Service Printer Epson L120">
                                </div>
                            </div>
                            </td>

                            <td style="width:10%"><label class="form-label">Tanggal</label></td>
                            <td style="width:5%"> : </td> 
                            <td>
                            <div class="input-group date">
                                <input type="text" name="tanggal" class="form-control pull-right" id="date" value="<?php echo date('Y-m-d'); ?>" required>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            </td>
                        </tr>

                    </tbody>
                </table>
                </div>       
            </div>
            <br>
            <!-- data -->
           
                <!-- <button class="generate" type="button">Generate New Form</button> -->
                <div class="row">
                  <div class="col-sm-3 nopadding" style="text-align: center;">
                    <label class="form-label">Keterangan</label>
                  </div>
                  <div class="col-sm-2 nopadding" style="text-align: center;">
                    <label class="form-label" >Unit</label>
                  </div>
                  <div class="col-sm-3 nopadding" style="text-align: center;">
                    <label class="form-label">Harga</label>
                  </div>
                  <div class="col-sm-3 nopadding" style="text-align: center;">
                    <label class="form-label">Subtotal</label>
                  </div>
                  <div class="col-sm-1">
                    <button type="button"  class="generate btn btn-warning btn-flat" ><i class="fa fa-plus"></i> </button> 
                  </div>
                </div>
                <br>
                <div id="sample"> 
                <div class="form">                  
                  <div class="row">
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                          <input type="hidden" name="id_baris[]" />                           
                          <input type="text" class="form-control" name="keterangan[]" value="" placeholder="Keterangan" required>
                        </div>
                      </div>  
                      <div class="col-sm-2 nopadding">
                        <div class="form-group">
                          <input type="number" class="form-control" id="unit" name="unit[]" value="" placeholder="Unit" required>
                        </div>
                      </div>
                      <div class="col-sm-3 nopadding">
                        <div class="form-group">
                          <input type="number" class="form-control harga" name="harga[]" value="" placeholder="Harga" required>
                        </div>
                      </div>
                      <div class="col-sm-3 nopadding">
                        <div class="form-group">
                          <input type="text" class="form-control " id="subtotal" name="subtotal[]" value="" placeholder="sub total" required readonly="">
                          
                        </div>
                      </div>
                      <div class="col-sm-1 nopadding">
                        <div class="copy">
                          <div class="input-group-btn"> 
                            <button class="btn btn-danger remove" type="button"><i class="fa fa-trash"></i></button>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
            <br>
            <br>
            <!-- sign nature -->
            <div class="table-responsive">
            <table  style=" width:100%;">
                    <tbody>
                        <tr>
                            <td style="width:20%;text-align: center;padding-bottom:70px"><label class="form-label">Dibuat Oleh</label></td>
                            <td style="width:20%;text-align: center;padding-bottom:70px"><label class="form-label"> Yang Mengajukan </label></td> 
                            <td style="width:20%;text-align: center;padding-bottom:70px"><label class="form-label"> Yang Menyetujui </label></td> 
                            <td style="width:20%;text-align: center;padding-bottom:70px"><label class="form-label"> Yang Mengetahui </label></td>
                            <td style="width:20%;text-align: center;padding-bottom:70px"><label class="form-label"> Finance </label></td>
                        </tr>
                        <tr>
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="dibuat_oleh" id="dibuat_oleh" value="" class="form-control" required style="border-top: 0px;border-left: 0px;" readonly="">
                                        <input type="hidden" name="id_karyawan_dibuat_oleh" id="id_karyawan_dibuat_oleh" value="" class="form-control" required style="border-top: 0px;border-left: 0px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari_karyawan_dibuat_oleh btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="yang_mengajukan" id="yang_mengajukan" value="" class="form-control"  required style="border-top: 0px;border-left: 0px;" readonly="">
                                        <input type="hidden" name="id_karyawan_yang_mengajukan" id="id_karyawan_yang_mengajukan" value="" class="form-control" required style="border-top: 0px;border-left: 0px;">
                                
                                        <span class="input-group-btn">
                                            <button type="button" class="cari_karyawan_yang_mengajukan btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td> 
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="yang_menyetujui" id="yang_menyetujui" value="" class="form-control"   required style="border-top: 0px;border-left: 0px;" readonly="">
                                        <input type="hidden" name="id_karyawan_yang_menyetujui" id="id_karyawan_yang_menyetujui" value="" class="form-control" required style="border-top: 0px;border-left: 0px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari_karyawan_yang_menyetujui btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td> 
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="yang_mengetahui" id="yang_mengetahui" value="" class="form-control"  required style="border-top: 0px;border-left: 0px;" readonly="">
                                        <input type="hidden" name="id_karyawan_yang_mengetahui" id="id_karyawan_yang_mengetahui" value="" class="form-control" required style="border-top: 0px;border-left: 0px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari_karyawan_yang_mengetahui btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="finance" id="finance" value="" class="form-control"   required style="border-top: 0px;border-left: 0px;" readonly="">
                                        <input type="hidden" name="id_karyawan_finance" id="id_karyawan_finance" value="" class="form-control" required style="border-top: 0px;border-left: 0px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari_karyawan_finance btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>

            <!-- aksi cetak -->
            <div class="row">
                <div class="col-md-4 col-md-offset-5">
                
                <!-- <button type="submit" class="btn btn-primary">
                  <i class="fa fa-file-pdf-o"> Preview Document</i>  
                </button> -->

                <button type="submit" name="save" class="btn btn-primary" onclick="submitForm()">
                  <i class="fa fa-save"> Save Document</i>  
                </button>
                  <script>
                      function submitForm() {
                      // document.doc-form.submit();
                      document.doc-form.reset();
                      }
                  </script>
            </form>
                  <!-- <button type="button" class="preview btn btn-success"><i class="fa fa-eye"></i> Preview POP </button>
                  <button type="button" class="preview btn btn-primary"><i class="fa fa-save"></i> Save POP </button> -->
                </div>    
            </div>

            <br>
        </div>
      </div> 
    </div>
  </section> 
</div>

<?php
break;
case 'delete':
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Hapus Data Pengajuan OPO</h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=doc_b&act=view">Data Pengajuan OPO</a></li>
      <li class="active">Delete Data Pengajuan OPO</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
        #validasi
        error_reporting(0);
          if (isset($_POST['delete'])) {
              $modified_by = $_SESSION['id'];
              $tanggal_update = date('Y-m-d h:i:s');

              $password = md5($_POST['password']);
              // cek username dan password login, sesuai tidak dengan user yang sedang login
              $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_SESSION[username]'"));
              $cek_pass = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_user WHERE password='$password'"));
                if($cek > 0 ){
                      if($cek_pass['password'] == $_SESSION[password]){
                        // jika password sama hapus data
                          $delete_doc_pengajuan = mysqli_query($con,"UPDATE tbl_doc_pengajuan_opo SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
                          $delete = mysqli_query($con,"UPDATE tbl_doc_pengajuan_opo_detail SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE doc_pengajuan_opo_id='$_POST[id]'");
                          if($delete){
                             echo "<div class='alert alert-success alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                    <h4><i class='icon fa fa-check'></i> Data Berhasil Dihapus</h4>
                                  </div>";
                              }else{
                              echo "<div class='alert alert-danger alert-dismissible'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                      <h4><i class='icon fa fa-ban'></i> Data Gagal Dihapus</h4>
                                    </div>";
                              }
                      }else{
                         echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-ban'></i> Password yang anda masukkan salah</h4>
                              </div>";
                      }
                }else{
                  echo "<div class='alert alert-danger alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                          <h4><i class='icon fa fa-ban'></i> Anda Tidak terdaftar sebagai user</h4>
                        </div>";
                }  
            }
        ?>
        <!-- general form elements -->
        <div class="box box-success">
          <div class="box-body">
            <!-- form start -->
            <form role="form" method ="POST" action="">
              <div class="box-body">
                
                <input name="doc_pengajuan_id" type="hidden" id="doc_pengajuan_id" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">Nama Form Pengajuan OPO</label>
                  <div class="input-group ">
                  <input name="nama_pekerjaan" type="text" id="nama_pekerjaan" class="form-control" value="" required>
                  <span class="input-group-btn">
                      <button type="button" class="cari_doc_b btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                    </span>
                </div>
              </div>
              <div class="form-group">
                  <label class="form-label">Di Buat Oleh</label>
                  <input name="dibuat_oleh" type="text" id="dibuat_oleh" class="form-control" value="" required>
              </div>
              <div class="form-group">
                  <label class="form-label">Total Pengajuan OPO</label>
                  <input name="total" type="text" id="total" class="form-control" value="" required>
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <button type="button" class="confirm_delete_doc_b btn btn-danger"><i class="fa fa-trash"></i> Delete User</button>
            </div>
          </div>
      <br>
        </div>
      </div>
        </form>
      </div>
    </div>
  </div>
</section> 
</div>

<?php
break;
}
?>

<?php
}
?>



<!-- ////////////////// modal buat hapus data -->
<div class="modal" id="modal_confirm_delete_doc_b" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menghapus Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=doc_b&act=delete">
        <input name="id" type="hidden" id="id_hapus" class="form-control" >
          <div class="form-group">
                <label class="form-label">Masukkan Password Login</label>
                <input name="password" type="password" id="password" class="form-control" value="" placeholder="password" required>
                
          </div>
          <div class="row">
              <div class="col-md-4 col-md-offset-5">
                <button type="submit" name ='delete' class="btn btn-danger">Delete</button>
              </div>
            </div>
      </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- ////////////////// modal buat munculin data -->
<div class="modal" id="modal_cari_doc_b" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="example1" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                    <th>Nama Pekerjaan</th>
                    <th>Tanggal</th>
                    <th>Dibuat Oleh</th>
                    <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as pengajuan_opo_id, a.nama_pekerjaan, b.unit, b.harga_per_unit, sum(b.unit * b.harga_per_unit) as total FROM tbl_doc_pengajuan_opo a INNER JOIN tbl_doc_pengajuan_opo_detail b ON 
                    a.id=b.doc_pengajuan_opo_id where a.deleted=0 and b.deleted=0 group by b.doc_pengajuan_opo_id");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                $tgl = tgl_indo($r['tanggal']);
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                      <td><a class="pilih_doc_b" data-id='<?php echo "$r[pengajuan_opo_id]"?>'><?php echo "$r[nama_pekerjaan]"?></a></td>
                      <td><?php echo "$tgl"?></td>
                      <td><?php echo "$r[dibuat_oleh]"?></td>
                      <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.')." "?></td>
                </tr>

                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<!-- ////////////////// modal buat munculin data karyawan dibuat oleh-->
<div class="modal" id="modal_cari_karyawan_dibuat_oleh" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="tabel_dibuat_opo" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as id_kar FROM tbl_karyawan a INNER JOIN tbl_divisi b ON 
                    a.divisi_id=b.id Where a.deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><?php echo "$r[nik]"?></td>
                  <td><a class="pilih_karyawan_dibuat_oleh" data-id='<?php echo "$r[id_kar]"?>'><?php echo "$r[nama_karyawan]"?></a></td>
                  <td><?php echo "$r[divisi]"?></td>
                 
                </tr>

                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- ////////////////// modal buat munculin data karyawan dibuat oleh-->
<div class="modal" id="modal_cari_karyawan_yang_mengajukan" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="tabel_mengajukan_opo" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as id_kar FROM tbl_karyawan a INNER JOIN tbl_divisi b ON 
                    a.divisi_id=b.id Where a.deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><?php echo "$r[nik]"?></td>
                  <td><a class="pilih_karyawan_yang_mengajukan" data-id='<?php echo "$r[id_kar]"?>'><?php echo "$r[nama_karyawan]"?></a></td>
                  <td><?php echo "$r[divisi]"?></td>
                 
                </tr>

                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- ////////////////// modal buat munculin data karyawan dibuat oleh-->
<div class="modal" id="modal_cari_karyawan_yang_menyetujui" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="tabel_menyetujui_opo" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as id_kar FROM tbl_karyawan a INNER JOIN tbl_divisi b ON 
                    a.divisi_id=b.id Where a.deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><?php echo "$r[nik]"?></td>
                  <td><a class="pilih_karyawan_yang_menyetujui" data-id='<?php echo "$r[id_kar]"?>'><?php echo "$r[nama_karyawan]"?></a></td>
                  <td><?php echo "$r[divisi]"?></td>
                 
                </tr>

                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- ////////////////// modal buat munculin data karyawan dibuat oleh-->
<div class="modal" id="modal_cari_karyawan_yang_mengetahui" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="tabel_mengetahui_opo" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as id_kar FROM tbl_karyawan a INNER JOIN tbl_divisi b ON 
                    a.divisi_id=b.id Where a.deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><?php echo "$r[nik]"?></td>
                  <td><a class="pilih_karyawan_yang_mengetahui" data-id='<?php echo "$r[id_kar]"?>'><?php echo "$r[nama_karyawan]"?></a></td>
                  <td><?php echo "$r[divisi]"?></td>
                 
                </tr>

                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- ////////////////// modal buat munculin data karyawan dibuat oleh-->
<div class="modal" id="modal_cari_karyawan_finance" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="tabel_finance_opo" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.*,a.id as id_kar FROM tbl_karyawan a INNER JOIN tbl_divisi b ON 
                    a.divisi_id=b.id Where a.deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><?php echo "$r[nik]"?></td>
                  <td><a class="pilih_karyawan_finance" data-id='<?php echo "$r[id_kar]"?>'><?php echo "$r[nama_karyawan]"?></a></td>
                  <td><?php echo "$r[divisi]"?></td>
                 
                </tr>

                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>