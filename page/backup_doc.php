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
      <h1> Data Pengguna </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc&act=view">Manajemen Data Pengguna</a></li>
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
      <h1> Document Pengajuan </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=doc&act=view">Data Pengguna</a></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
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
                                        <input type="text" name="" value="" class="form-control"  Placeholder="Username">
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
                                <input type="text" class="form-control pull-right" id="date">
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
                                    <input type="text" name="" value="" class="form-control" Placeholder="Service Printer Epson L120">
                                </div>
                            </div>
                            </td>
                            
                        </tr>
                        <tr>
                          <td align="right" colspan='6' style="width:100%;"> 
                              <button type="button"  class="generate"><i class="fa fa-plus"></i> Add Row</button> 
                              <button type="button" id="btnDelLastRow" class="btn btn-sm btn-warning "><i class="fa fa-trash"></i> Del Last Row</button>

                            </td> 
                        </tr>

                    </tbody>
                </table>
                </div>       
            </div>
            <!-- data -->
            <div class="table-responsive">
              <table id="tblAddRow" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th  style="width:4%;text-align: center;">No</th>
                    <th  style="width:40%;text-align: center;">Keterangan</th>
                    <th  style="width:10%;text-align: center;">Unit</th>
                    <th style="width:20%;text-align: center;">Harga</th>
                    <th style="width:20%;text-align: center;">Subtotal</th>
                    <th  style="width:6%;text-align: center;">Del</th>

                  </tr>
                </thead>
                <tbody>
                <!-- <button class="generate" type="button">Generate New Form</button> -->
                <!-- <div id="sample">
  <div class="form">
   
    <div class="col-sm-3 nopadding">
      <div class="form-group">
        <input type="text" class="form-control" name="qty[]" value="" placeholder="Quantity">
      </div>
    </div>
    <div class="col-sm-3 nopadding">
      <div class="form-group">
        <input type="text" class="form-control price" name="price[]" value="" placeholder="Price">
      </div>
    </div>
    <div class="col-sm-3 nopadding">
      <div class="form-group">
        <input type="text" class="form-control " name="total[]" value="" placeholder="total" readonly>
      </div>
    </div>
  </div>
  

</div> -->
              <div id="sample">
              <div class="form">
                <tr >
                    <td align="center" style="padding-top:12px"><label class="form-label"> 1 </label>  </td>
                    <td><input type="hidden" name="keterangan" /> 
                    <td><input type="text" class="form-control" name="qty[]" value="" placeholder="Quantity"></td>
                    <td> <input type="text" class="form-control price" name="price[]" value="" placeholder="Price"></td>
                    <td><input type="text" class="form-control " name="total[]" value="" placeholder="total" readonly></td>

                    <!-- <td> <input class="val1 " type="text" name="unit" /> </td>
                    <td><input class="val2 " type="text" name="harga" /> </td> -->
                    <!-- <td><input class="multTotal "type="text" name="subtotal" /> </td>  -->
                </tr>
                </div>
                </div>
                </tbody>
                <tfoot>
                  <td colspan='4' align="right"  style="padding-top:15px"> <label class="form-label">TOTAL</label></td>
                  <td>
                   <!-- <span id="grandTotal">0.00</span> -->
                    <input class="form-control" type="text" name="grandtotal"  id="grandTotal" disabled/>
                  </td>
                </tfoot>
              </table>
            </div>
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
                                        <input type="text" name="" value="" class="form-control"  Placeholder="Dibuat Oleh">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="" value="" class="form-control"  Placeholder="Yang Mengajukan">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td> 
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="" value="" class="form-control"  Placeholder="Yang Menyetujui">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td> 
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="" value="" class="form-control"  Placeholder="Yang Mengetahui">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td style="width:20%;text-align: center;">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 0px;padding-bottom:10px"> 
                                    <div class="input-group">
                                        <input type="text" name="" value="" class="form-control"  Placeholder="Finance">
                                        <span class="input-group-btn">
                                            <button type="button" class="cari btn btn-default  btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
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
    <h1> Tambah Data Pengguna </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=doc&act=view">Data Pengguna</a></li>
      <li class="active"><a href="#">Tambah Data Pengguna</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
          if (isset($_POST['add'])) {
            $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_POST[username]'"));
            if($cek > 0){
                  echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Data username sudah ada (tidak boleh duplikat), mohon periksa kembali inputan anda </h4>
                  </div>";
            }else{
           $query = mysqli_query($con,"INSERT INTO tbl_user (id,username,password) 
            VALUES ('','$_POST[username]',md5('$_POST[password]'))");
           echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                  <h4><i class='icon fa fa-check'></i> Data Berhasil Di Simpan </h4>
                </div>";
              }
          }
        ?>  
        <div class="box box-success">
          <div class="box-body">
            <form role="form" method = "POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input name="username"
                  type="text"
                  class="form-control" 
                  required>
                </div>
                <div class="form-group">
                  <label class="form-label">Password</label>
                  <input name="password"
                  type="password"
                  class="form-control"
                  required>
                </div> 
            </div>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col-md-4 col-md-offset-5">
          <button type="submit" name = 'add' class="btn btn-danger">Simpan</button>
          &nbsp;
          <button type="reset" class="btn btn-success">Reset</button>
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