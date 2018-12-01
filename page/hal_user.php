<?php
if(empty($_SESSION['username'])){

   echo "Anda tidak Memiliki Akses, silahkan login <br><meta http-equiv='refresh' content='2; url=../index.php'/>";
} else {
  ?>
 
<?php
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
        <li class="active"><a href="?pg=user&act=view">Manajemen Data Pengguna</a></li>
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
      <h1> Lihat Data Pengguna </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=user&act=view">Data Pengguna</a></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">

        <!-- data -->
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">       
           </div>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Ditambahkan Oleh</th>
                    <th>Ditambahkan Pada</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil=mysqli_query($con,"SELECT * FROM tbl_user Where deleted=0");
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
    <h1> Tambah Data Pengguna </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=user&act=view">Data Pengguna</a></li>
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
            // echo $created_by."<br>".$tanggal_sekarang; exit();
            $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_POST[username]'"));
            if($cek > 0){
                  echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Data username sudah ada (tidak boleh duplikat), mohon periksa kembali inputan anda </h4>
                  </div>";
            }else{
           $query = mysqli_query($con,"INSERT INTO tbl_user (id,username,password,created_by,created_on) 
            VALUES ('','$_POST[username]',md5('$_POST[password]'),'$created_by','$tanggal_sekarang')");
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

<!-- case edit -->
<?php
break;
case 'edit':
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Edit Data Pengguna </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=user&act=view">Data Pengguna</a></li>
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
              $cek_username_login = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE id='$_SESSION[id]'"));
              $cek_pass = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_user WHERE password='$password'"));
                if($cek_username_login > 0 ){
                      if($cek_pass['password'] == $_SESSION[password]){
                              // jika password sama, lanjut ke proses update data
                                $password_sebelumnya = md5($_POST['password_sebelumnya']);
                                $password_baru = md5($_POST['password_baru']);
                                $konfirmasi_password = md5($_POST['konfirmasi_password']);
                                // cek inputan data password
                                $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_POST[username]'"));
                                $pass = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_user WHERE id='$_POST[id]'"));

                                // cek data yang mau diubah
                                if (empty($_POST['password_sebelumnya'])) {
                                  mysqli_query($con,"UPDATE tbl_user SET username='$_POST[username]',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
                                  echo "<div class='alert alert-success alert-dismissible'>
                                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                          <h4><i class='icon fa fa-check'></i> Data Berhasil Di Update </h4>
                                        </div>";
                                }else{
                                    #cek password sebelumnya sesuai atau tidak
                                    if($password_sebelumnya == $pass['password']){
                                        if($password_baru != $konfirmasi_password){
                                          echo "<div class='alert alert-danger alert-dismissible'>
                                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                  <h4><i class='icon fa fa-ban'></i> Konfirmasi Password Tidak Sama </h4>
                                                  Password baru dan Konfirmasi Password tidak sesuai
                                                </div>"; 
                                        }else{
                                        mysqli_query($con,"UPDATE tbl_user SET username='$_POST[username]', password='$password_baru',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
                                        echo "<div class='alert alert-success alert-dismissible'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                <h4><i class='icon fa fa-check'></i> Data Berhasil Di Update </h4>
                                              </div>";
                                        }
                                    }else{
                                      echo "<div class='alert alert-danger alert-dismissible'>
                                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                              <h4><i class='icon fa fa-ban'></i> Password Tidak Sama </h4>
                                              Password Sebelumnya tidak sesuai
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
                
                <input name="id_user" type="hidden" id="id_user" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <div class="input-group ">
                    <input name="username" type="text" id="username" class="form-control" value="" required>
                      <span class="input-group-btn">
                        <button type="button" class="cari_user btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                      </span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Password Sebelumnya</label>
                  <input name="password_sebelumnya" id="password_sebelumnya" type="password" value="" class="form-control">
                  <span><small>Kosongkan jika password tidak diubah</small> </span>
                </div> 
                <div class="form-group">
                  <label class="form-label">Password Baru</label>
                  <input name="password_baru" id="password_baru" type="password" value="" class="form-control">
                  <span><small>Kosongkan jika password tidak diubah</small> </span>
                </div> 
                <div class="form-group">
                  <label class="form-label">Konfirmasi Password </label>
                  <input name="konfirmasi_password" id="konfirmasi_password" type="password" value="" class="form-control">
                  <span><small>Kosongkan jika password tidak diubah</small> </span>
                </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <button type="button" class="confirm_edit_user btn btn-danger"><i class="fa fa-edit"></i> Update </button>
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

<!-- case Delete -->
<?php
break;
case 'delete':
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Hapus Data Pengguna </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=user&act=view">Data Pengguna</a></li>
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
                      if($cek_pass['password'] == $_SESSION['password']){
                        // jika password sama hapus data
                          $delete = mysqli_query($con,"UPDATE tbl_user SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
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
                
                <input name="id_user" type="hidden" id="id_user" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <div class="input-group ">
                  <input name="username" type="text" id="username" class="form-control" value="" required>
                  <span class="input-group-btn">
                      <button type="button" class="cari_user btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                    </span>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <button type="button" class="confirm_delete_user btn btn-danger"><i class="fa fa-trash"></i> Delete User</button>
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
<div class="modal" id="modal_confirm_delete_user" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menghapus Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=user&act=delete">
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

<!-- ////////////////// modal buat edit data -->
<div class="modal" id="modal_confirm_edit_user" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menupdate Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=user&act=edit">
        <input name="id" type="hidden" id="id_edit" class="form-control" >
        <input name="username" type="hidden" id="username_edit" class="form-control" >
        <input name="password_sebelumnya"  id="password_sebelumnya_edit" type="hidden" class="form-control">
        <input name="password_baru"        id="password_baru_edit" type="hidden" class="form-control">
        <input name="konfirmasi_password"  id="konfirmasi_password_edit" type="hidden" class="form-control">

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

<!-- ////////////////// modal buat munculin data -->
<div class="modal" id="modal_cari_user" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="example1" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT * FROM tbl_user");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><a class="pilih_user" data-id='<?php echo "$r[id]"?>'><?php echo "$r[username]"?></a></td>
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