<?php
// if(empty($_SESSION['username'])){
//    echo "Anda tidak Memiliki Akses, silahkan login <br><meta http-equiv='refresh' content='2; url=../index.php'/>";
// } else {
  switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'manajemen':
  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Data Pengajuan JPO </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_a&act=view">Manajemen Data Pengajuan JPO</a></li>
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
      <h1> Lihat Data Pengajuan JPO</h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_a&act=view">Data Pengajuan JPO</a></li>
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
                  $tampil=mysqli_query($con,"SELECT a.*,b.*,c.*, a.id as pengajuan_id, a.nama_pekerjaan, 
                    b.unit, b.harga_per_unit, sum(b.unit * b.harga_per_unit) as total FROM 
                    tbl_doc_pengajuan a INNER JOIN tbl_doc_pengajuan_detail b ON 
                    a.id=b.doc_pengajuan_id LEFT JOIN tbl_karyawan c ON a.id_karyawan_dibuat_oleh=c.id AND 
                    a.id_karyawan_yang_mengajukan=c.id AND  a.id_karyawan_yang_menyetujui=c.id AND  
                    a.id_karyawan_yang_mengetahui=c.id AND  a.id_karyawan_finance=c.id where a.deleted=0 
                    group by b.doc_pengajuan_id");
                  $no = 1;
                  while ($r=mysqli_fetch_array($tampil)){
                    $tgl = tgl_indo($r['tanggal']);
                    ?>
                    <tr>
                      <td><?php echo "$no"?></td>
                      <td><?php echo "$r[nama_pekerjaan]"?></td>
                      <td><?php echo "$tgl"?></td>
                      <td><?php echo "$r[nama_karyawan]"?></td>
                      <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.')." "?></td>
                      <td><a href="preview_doc_jpo.php?id=<?php echo $r['pengajuan_id']?>" title="Preview Document" target="_blank">
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
      <h1> Document Pengajuan JPO</h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_a&act=add">Data Pengguna</a></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
      <?php 
        if (isset($_POST['save'])) {
          $created_by = $_SESSION['id'];
          $tanggal_sekarang = date('Y-m-d h:i:s');

          $nomor = $_POST['nomor'];
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
          

         $query = mysqli_query($con,"INSERT INTO tbl_doc_pengajuan 
         (id, no_mor, nama_pekerjaan, tanggal, id_karyawan_dibuat_oleh,id_karyawan_yang_mengajukan, id_karyawan_yang_menyetujui, id_karyawan_yang_mengetahui, id_karyawan_finance,created_by,created_on) 
          VALUES ('','$nomor','$nama_pekerjaan','$tanggal','$id_karyawan_dibuat_oleh','$id_karyawan_yang_mengajukan','$id_karyawan_yang_menyetujui','$id_karyawan_yang_mengetahui','$id_karyawan_finance','$created_by','$tanggal_sekarang')");
          $doc_pengajuan_id = mysqli_insert_id($con);
          for ($i=0;$i<$jumlah_baris;$i++){
              $detail = mysqli_query($con,"INSERT INTO tbl_doc_pengajuan_detail 
             (id, doc_pengajuan_id, keterangan, unit, harga_per_unit,created_by,created_on) 
              VALUES ('','$doc_pengajuan_id','$keterangan[$i]','$unit[$i]','$harga[$i]','$created_by','$tanggal_sekarang')");
          }
         // if($query){
          echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-check'></i> Data Berhasil Di Simpan </h4>
              </div>"; ?>
              <script>
                  setTimeout(function () {
                     window.location = "home.php?pg=doc_a&act=add"; //will redirect to your blog page (an ex: blog.html)
                  }, 1000); //will call the function after 2 secs.
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
                          <td style="width:60%;text-align: center;"><h3 style="margin:5px"><b>FORM PENGAJUAN JOB PURCHASE ORDER</b></h3></td>
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
                              <br>
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
                            <td style="width:10%"><label class="form-label">No. MOR</label></td>
                            <td style="width:5%"><label class="form-label"> : </label></td> 
                            <td style="width:45%">
                            <?php 
                              // untuk angka romawi
                              // $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                              $sql = mysqli_query($con,"SELECT SUBSTRING(no_mor,1,3) AS
                              notrans FROM tbl_doc_pengajuan  WHERE DATE_FORMAT(tanggal, '%m') = '".date('m')."' ");
                              $m  = mysqli_fetch_assoc($sql);
                              $no = 0;
                              if($m['notrans'] <> NULL){
                                $kd = number_format($m['notrans'],0) + 1;
                                if(strlen($kd) == 1){
                                  $no = "00".$kd."/MOR/CRB/".date('m')."/".date('Y');
                                }elseif (strlen($kd) == 2) {
                                  $no = "0".$kd."/MOR/CRB/".date('m')."/".date('Y');
                                }else {
                                  $no = $kd."/MOR/CRB/".date('m')."/".date('Y');
                                }
                              }else{
                                $no = "001"."/MOR/CRB/".date('m')."/".date('Y');
                              }
                            ?>

                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <!-- <div class="input-group"> -->
                                        <input type="text" name="nomor" value="<?php echo $no ?>" class="form-control"  Placeholder="nomor" readonly="">
                                       <!--  <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-success  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div> -->
                                </div>
                            </div>
                            </td>
                            <td style="width:10%"> Tanggal</td>
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
                        <tr>
                            <td style="width:10%">Nama Pekerjaan</td>
                            <td style="width:5%"> : </td> 
                            <td style="width:45%">
                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0px;"> 
                                    <input type="text" name="nama_pekerjaan" value="" class="form-control" required Placeholder="Service Printer Epson L120">
                                </div>
                            </div>
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
                          <input type="hidden" id="id_baris" name="id_baris[]" />                           
                          <input type="text" class="form-control" name="keterangan[]" id="keterangan" value="" placeholder="Keterangan" required>
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
                <button type="submit" name="save" class="btn btn-primary" onclick="submitForm()">
                  <i class="fa fa-save"> Save Document</i>  
                </button>
            </form>
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
case 'edit':
        
?>
<div id='results'>
<div class="content-wrapper">
    <section class="content-header">
      <h1> Document Pengajuan JPO</h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc_a&act=add">Data Pengguna</a></li>
      </ol>
    </section>
    <section class="content">
    
     <div class="row">
      <div class="col-md-12">
      <?php 
      

              



        if (isset($_POST['update'])) {
          error_reporting(0);
          $created_by = $_SESSION['id'];
          $tanggal_sekarang = date('Y-m-d h:i:s');

          $nomor = $_POST['nomor'];
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

            $modified_by = $_SESSION['id'];
            $tanggal_update = date('Y-m-d h:i:s');
           
            // jika password sama update data
              $update = mysqli_query($con,"UPDATE tbl_doc_pengajuan SET no_mor='$nomor', 
                nama_pekerjaan='$nama_pekerjaan', 
                tanggal='$tanggal', id_karyawan_dibuat_oleh='$id_karyawan_dibuat_oleh',
                id_karyawan_yang_mengajukan='$id_karyawan_yang_mengajukan', 
                id_karyawan_yang_menyetujui='$id_karyawan_yang_menyetujui',
                id_karyawan_yang_mengetahui='$id_karyawan_yang_mengetahui', 
                id_karyawan_finance='$id_karyawan_finance',
                modified_by='$modified_by',modified_on='$tanggal_update'
                WHERE id='$_POST[id_doc_a]'");
              // update detail
              for ($i=0;$i<$jumlah_baris;$i++){
              $update_detail = mysqli_query($con,"UPDATE tbl_doc_pengajuan_detail SET 
                keterangan='$keterangan[$i]', 
                unit='$unit[$i]', harga_per_unit='$harga[$i]',
                modified_by='$modified_by',modified_on='$tanggal_update'
                WHERE id='$id_baris[$i]' and doc_pengajuan_id='$_POST[id_doc_a]'");
                }
              if($update){
                 echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4><i class='icon fa fa-check'></i> Data Berhasil Diupdate</h4>
                      </div>";  ?>
                        <script>
                            setTimeout(function () {
                               window.location = "home.php?pg=doc_a&act=edit"; //will redirect to your blog page (an ex: blog.html)
                            }, 1000); //will call the function after 2 secs.
                        </script>
                    <?php
                  }else{
                  echo "<div class='alert alert-danger alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                          <h4><i class='icon fa fa-ban'></i> Data Gagal Diupdate</h4>
                        </div>"; ?>
                        <script>
                            setTimeout(function () {
                               window.location = "home.php?pg=doc_a&act=edit"; //will redirect to your blog page (an ex: blog.html)
                            }, 1000); //will call the function after 2 secs.
                        </script>
                    <?php
                  }
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
                          <td style="width:60%;text-align: center;"><h3 style="margin:5px"><b>FORM PENGAJUAN JOB PURCHASE ORDER</b></h3></td>
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
                              <br>
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
              <!-- pilih data yang mau di edit-->
              <input name="id_doc_a" type="hidden" id="id_doc_a" class="form-control" value="" required>
                <div class="form-group">
                  <div class="input-group ">
                  <input name="nama_pekerjaan_atas" type="text" id="nama_pekerjaan_atas" class="form-control" value="" placeholder="Pilih Dokumen" required readonly="">
                  <span class="input-group-btn">
                      <button type="button" class="cari_doc_a btn btn-info btn-flat"><i class="fa fa-search"></i>Cari Document JPO</button>
                    </span>
                </div>
              </div>
              <!-- end edit -->
              <!-- Document -->
                <div class="table-responsive">
                <table  style=" width:100%;">
                    <tbody>
                        <tr>
                            <td style="width:10%"><label class="form-label">No. MOR</label></td>
                            <td style="width:5%"><label class="form-label"> : </label></td> 
                            <td style="width:45%">
                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="nomor" id="no_mor" value="" class="form-control"  Placeholder="nomor" >
                                        <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-success  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td style="width:10%"> Tanggal</td>
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
                        <tr>
                            <td style="width:10%">Nama Pekerjaan</td>
                            <td style="width:5%"> : </td> 
                            <td style="width:45%">
                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0px;"> 
                                    <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" value="" class="form-control" required Placeholder="Service Printer Epson L120">
                                </div>
                            </div>
                            </td>
                            
                        </tr>

                    </tbody>
                </table>
                </div>       
            </div>
            <br>
            <!-- data -->
            <div class="row">
              <div class="form-group pull-right" style="margin-bottom: 0px;padding-bottom:10px"> 
              <div class="col-md-12">
                  <div class="input-group">
                      <div class="col-sm-4 nopadding">
                        <input name="id_doc_a_for_detail" id="id_doc_a_for_detail" class="form-control input-md" type="hidden">
                      </div>
                      <div class="col-sm-4 nopadding">
                        <input type="hidden" name="jumlah" id="jumlah" value="" class="form-control"  Placeholder="nomor" >
                      </div>
                      <div class="col-sm-3 col-md-offset-9 nopadding" style="margin-right: -5px;">
                        <span class="input-group-btn">
                            <button type="button" class="munculkan_detail btn btn-success  btn-flat"><i class="fa fa-search"></i> Tampilkan Detail</button>
                        </span>
                      </div>
                  </div>
                  </div>
              </div>
            </div>
                   <!--  -->

                   <div id='isi'>
                   <div class="row">
                        <div id="loading" style="width:90px;margin-top: -150px;margin-left: 250px;"> </div>
                        </div>
                        <center>
                        </center>
                   
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
                <button type="submit"  name="update" class=" update btn btn-primary" onclick="submitForm()">
                  <i class="fa fa-save"> Update Document</i>  
                </button>
            </form>
                 </div>    
            </div>

            <br>
        </div>
      </div> 
    </div>
    
  </section> 
</div>
</div> <!-- end result -->

<?php
break;
case 'delete':
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Hapus Data Pengajuan JPO</h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=doc_a&act=view">Data Pengajuan JPO</a></li>
      <li class="active">Delete Data Pengajuan JPO</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
        #validasi
        // error_reporting(0);
          if (isset($_POST['delete'])) {
              $modified_by = $_SESSION['id'];
              $tanggal_update = date('Y-m-d h:i:s');

              // echo $modified_by."<br>".$tanggal_update;
              // exit();

              $password = md5($_POST['password']);
              // cek username dan password login, sesuai tidak dengan user yang sedang login
              $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_SESSION[username]'"));
              $cek_pass = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_user WHERE password='$password'"));
                if($cek > 0 ){
                      if($cek_pass['password'] == $_SESSION['password']){
                        // jika password sama hapus data
                          $delete_doc_pengajuan = mysqli_query($con,"UPDATE tbl_doc_pengajuan SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
                          $delete = mysqli_query($con,"UPDATE tbl_doc_pengajuan_detail SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE doc_pengajuan_id='$_POST[id]'");
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
                  <label class="form-label">Nama Form Pengajuan JPO</label>
                  <div class="input-group ">
                  <input name="nama_pekerjaan" type="text" id="nama_pekerjaan" class="form-control" value="" required>
                  <span class="input-group-btn">
                      <button type="button" class="cari_doc_a btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                    </span>
                </div>
              </div>
              <div class="form-group">
                  <label class="form-label">Di Buat Oleh</label>
                  <input name="dibuat_oleh" type="text" id="dibuat_oleh" class="form-control" value="" required>
              </div>
              <div class="form-group">
                  <label class="form-label">Total Pengajuan JPO</label>
                  <input name="total" type="text" id="total" class="form-control" value="" required>
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <button type="button" class="confirm_delete_doc_a btn btn-danger"><i class="fa fa-trash"></i> Delete Pengajuan</button>
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
// }
?>



<!-- ////////////////// modal buat hapus data -->
<div class="modal" id="modal_confirm_delete_doc_a" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menghapus Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=doc_a&act=delete">
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
<div class="modal" id="modal_cari_doc_a" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
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
              $tampil=mysqli_query($con,"SELECT a.*,b.*,c.*, a.id as pengajuan_id, a.nama_pekerjaan, 
                    b.unit, b.harga_per_unit, sum(b.unit * b.harga_per_unit) as total FROM 
                    tbl_doc_pengajuan a INNER JOIN tbl_doc_pengajuan_detail b ON 
                    a.id=b.doc_pengajuan_id LEFT JOIN tbl_karyawan c ON a.id_karyawan_dibuat_oleh=c.id AND 
                    a.id_karyawan_yang_mengajukan=c.id AND  a.id_karyawan_yang_menyetujui=c.id AND  
                    a.id_karyawan_yang_mengetahui=c.id AND  a.id_karyawan_finance=c.id where a.deleted=0 
                    group by b.doc_pengajuan_id");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                $tgl = tgl_indo($r['tanggal']);
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                      <td><a class="pilih_doc_a" data-id='<?php echo "$r[pengajuan_id]"?>'><?php echo "$r[nama_pekerjaan]"?></a></td>
                      <td><?php echo "$tgl"?></td>
                      <td><?php echo "$r[nama_karyawan]"?></td>
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
        <table id="tabel_dibuat" class="table table-responsive table-bordered table-striped">
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
        <table id="tabel_mengajukan" class="table table-responsive table-bordered table-striped">
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
        <table id="tabel_menyetujui" class="table table-responsive table-bordered table-striped">
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
        <table id="tabel_mengetahui" class="table table-responsive table-bordered table-striped">
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
        <table id="tabel_finance" class="table table-responsive table-bordered table-striped">
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


<!-- ////////////////// modal buat edit data -->
<div class="modal" id="modal_confirm_edit_doc_a" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk mengupdate Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=doc_a&act=edit">
       
        <!-- masukkan password -->
        <label class="form-label">Masukkan Password Login</label>
        <input name="password" type="password" id="password" class="form-control" value="" placeholder="password" required>
      </div>
      <div class="row">
          <div class="col-md-4 col-md-offset-5">
            <button type="submit" name ='update' class="btn btn-danger">Update</button>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>