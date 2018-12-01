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
        <li class="active"><a href="?pg=qdtl&act=view">Manajemen Data Pengguna</a></li>
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
      <h1> Data Qucik Access Detail </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=qdtl&act=view">Data Pengguna</a></li>
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
                    <th>UserName</th>
                    <th>Quick Access</th>
                    <th>Ditambahkan Oleh</th>
                    <th>Ditambahkan Pada</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil=mysqli_query($con,"SELECT a.*,b.id as id_qa_dtl, b.*,c.* FROM tbl_qa a INNER JOIN tbl_qa_detail b ON a.id=b.qa_id INNER JOIN tbl_user c ON b.user_id=c.id WHERE b.deleted=0");
                  $no = 1;
                  while ($r=mysqli_fetch_array($tampil)){
                    if($r['created_by'] == 1){
                      $oleh ='admin';
                    }else{
                      $oleh ='sendiri';
                    }
                    ?>
                    <tr>
                      <td><?php echo "$no"?></td>
                      <td><?php echo "$r[username]"?></td>
                      <td><?php echo "$r[quick_access]"?></td>
                      <td><?php echo "$oleh"?></td>
                      <td><?php echo "$r[created_on]"?></td>
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
    <h1> Tambah Data Qucik Access Detail </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=qdtl&act=view">Data Pengguna</a></li>
      <li class="active"><a href="#">Tambah Data Pengguna</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
            if (isset($_POST['add'])) {
              $created_by = $_SESSION['id'];
              $tanggal_sekarang = date('Y-m-d h:i:s');
            #validasi agar tidak redudansi data
             // echo $_POST['qa_id']; exit();
            $cek_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_qa_detail WHERE qa_id='$_POST[qa_id]' and user_id='$_POST[user_id]'"));
              if( $cek_data > 0){
                echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Data quick access dan username sudah ada </h4>
                  </div>";
              }else{
                $query = mysqli_query($con,"INSERT INTO tbl_qa_detail (id,user_id,qa_id,created_by,created_on) 
                VALUES ('','$_POST[user_id]','$_POST[qa_id]','$created_by','$tanggal_sekarang' )");
                echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-check'></i> Data Berhasil Ditambahkan </h4>
                  </div>";
                }
            }
            
          ?>
        <div class="box box-success">
          <div class="box-body">
            <form role="form" method = "POST" action="">
              <div class="box-body">

              <input name="user_id" type="hidden" id="user_id" class=" form-control" required>
                <div class="form-group">
                  <label class="form-label">Username</label>
                   <div class="input-group ">
                      <input name="username" type="text" id="username" class=" form-control" required>
                        <span class="input-group-btn">
                          <button type="button" class="cari_username btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div>

                <input name="qa_id" type="hidden" id="qa_id" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">quick Access</label>
                   <div class="input-group ">
                      <input name="quick_access" type="text" id="quick_access" class="form-control" value="" required>
                        <span class="input-group-btn">
                          <button type="button" class="cari_quick_access btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
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

<!-- case edit -->
<?php
break;
case 'edit':
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Edit Data Qucik Access Detail </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=qdtl&act=view">Data Pengguna</a></li>
      <li class="active">Update Data Pengguna</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
        #validasi
        error_reporting(0);
          if (isset($_POST['update'])) {
            $modified_by = $_SESSION['id'];
            $tanggal_update = date('Y-m-d h:i:s');

            $password = md5($_POST['password']);
            // cek username dan password login, sesuai tidak dengan user yang sedang login
            $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_SESSION[username]'"));
            $cek_pass = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_user WHERE password='$password'"));
              if($cek > 0 ){
                    if($cek_pass['password'] == $_SESSION[password]){
                      // jika password sama update data
                      $cek_data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_qa_detail WHERE qa_id='$_POST[qa_id]' and user_id='$_POST[user_id]'"));
                      if($cek_data > 0){
                            echo "<div class='alert alert-danger alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                              <h4><i class='icon fa fa-ban'></i> Data quick access dan username sudah ada (tidak boleh duplikat), mohon periksa kembali inputan anda </h4>
                            </div>";
                      }else{
                           $update = mysqli_query($con,"UPDATE tbl_qa_detail SET qa_id='$_POST[qa_id]', user_id='$_POST[user_id]',modified_by='$modified_by',modified_on='$tanggal_update'
                            WHERE id='$_POST[id]'");
                            if($update){
                              echo "<div class='alert alert-success alert-dismissible'>
                                     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                     <h4><i class='icon fa fa-check'></i> Data Berhasil Diupdate</h4>
                                   </div>";
                               }else{
                               echo "<div class='alert alert-danger alert-dismissible'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                       <h4><i class='icon fa fa-ban'></i> Data Gagal Diupdate</h4>
                                     </div>";
                               }
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
            <form role="form" method = "POST" action="">
              <div class="box-body">
                
                <div class="form-group">
                  <label class="form-label">ID Quick Access Detail</label>
                   <div class="input-group ">
                      <input name="id" type="text" id="id_qa_detail" class=" form-control" required disabled>
                        <span class="input-group-btn">
                          <button type="button" class="cari_qa_id_detail btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div>

                <input name="user_id" type="hidden" id="user_id" class=" form-control" required>
                <div class="form-group">
                  <label class="form-label">Username</label>
                   <div class="input-group ">
                      <input name="username" type="text" id="username" class=" form-control" required disabled>
                        <span class="input-group-btn">
                          <button type="button" class="cari_username btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div>

                <input name="qa_id" type="hidden" id="qa_id" class="form-control" value="" required >
                <div class="form-group">
                  <label class="form-label">quick Access</label>
                   <div class="input-group ">
                      <input name="quick_access" type="text" id="quick_access" class="form-control" value="" required disabled>
                        <span class="input-group-btn">
                          <button type="button" class="cari_quick_access btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div> 

            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <!-- <button type="submit" name = 'update' class="btn btn-danger">Update</button> -->
              <button type="button" class="confirm_edit_qa_detail btn btn-danger"><i class="fa fa-edit"></i> Update </button> 

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

<!-- case view -->

<?php
break;
case 'delete':
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Hapus Data Qucik Access Detail </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=qdtl&act=view">Data Pengguna</a></li>
      <li class="active">Delete Data Pengguna</li>
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
                          $delete = mysqli_query($con,"UPDATE tbl_qa_detail SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
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
            <form role="form" method = "POST" action="">
              <div class="box-body">

                <div class="form-group">
                  <label class="form-label">ID Quick Access Detail</label>
                   <div class="input-group ">
                      <input name="id" type="text" id="id_qa_detail" class=" form-control" required>
                        <span class="input-group-btn">
                          <button type="button" class="cari_qa_id_detail btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div>

                <input name="user_id" type="hidden" id="user_id" class=" form-control" required>
                <div class="form-group">
                  <label class="form-label">Username</label>
                   <div class="input-group ">
                      <input name="username" type="text" id="username" class=" form-control" required disabled>
                        <span class="input-group-btn">
                          <button type="button" class="cari_username btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div>

                <input name="qa_id" type="hidden" id="qa_id" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">quick Access</label>
                   <div class="input-group ">
                      <input name="quick_access" type="text" id="quick_access" class="form-control" value="" required disabled>
                        <span class="input-group-btn">
                          <button type="button" class="cari_quick_access btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                        </span>
                    </div>
                </div>  
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <button type="button" class="confirm_delete_qa_detail btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
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

<!-- ////////////////// modal buat hapus data -->
<div class="modal" id="modal_confirm_delete_qa_detail" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menghapus Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=qdtl&act=delete">
        <input name="id" type="hidden" id="id" class="form-control" >
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

<!-- ////////////////// modal buat edit data -->
<div class="modal" id="modal_confirm_edit_qa_detail" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk mengupdate Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=qdtl&act=edit">
        <input name="id" type="hidden" id="id_qa_detail_edit" class="form-control" >
        <input name="user_id" type="hidden" id="user_id_edit" class=" form-control" required>
        <input name="qa_id" type="hidden" id="qa_id_edit" class="form-control" value="" required>


          <div class="form-group">
                <label class="form-label">Masukkan Password Login</label>
                <input name="password" type="password" id="password" class="form-control" value="" placeholder="password" required>
          </div>
          <div class="row">
              <div class="col-md-4 col-md-offset-5">
                <button type="submit" name ='update' class="btn btn-primary">Update</button>
              </div>
            </div>
      </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- ////////////////// modal buat munculin data quick access -->
<div class="modal" id="modal_cari_quick_access" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="table_qa" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>quick_access</th>
                <th>Desciption</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT * FROM tbl_qa where deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><a class="pilih_quick_access" data-quick_access='<?php echo "$r[quick_access]"?>'><?php echo "$r[quick_access]"?></a></td>
                  <td><?php echo "$r[description]"?></td>
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

<!-- ////////////////// modal buat munculin data username -->
<div class="modal" id="modal_cari_username" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="table_user" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT * FROM tbl_user where deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><a class="pilih_username" data-id='<?php echo "$r[id]"?>'><?php echo "$r[username]"?></a></td>
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

<!-- ////////////////// modal buat munculin data quick accessdetail -->
<div class="modal" id="modal_cari_qa_id_detail" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="table_qa_dtl" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Quick Access</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT a.*,b.id as id_qa_dtl, b.*,c.* FROM tbl_qa a 
                INNER JOIN tbl_qa_detail b ON a.id=b.qa_id INNER JOIN tbl_user c ON b.user_id=c.id where b.deleted=0");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><a class="pilih_qa_id_detail" data-id='<?php echo "$r[id_qa_dtl]"?>'><?php echo "$r[username]"?></a></td>
                  <td><?php echo "$r[quick_access]"?></td>
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

<?php
}
?>