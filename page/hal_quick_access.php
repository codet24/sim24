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
        <li class="active"><a href="?pg=qa&act=view">Manajemen Data Pengguna</a></li>
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
      <h1> Data Quick Access </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><a href="?pg=qa&act=view">Data Pengguna</a></li>
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
                    <th>Quick Access</th>
                    <th>Description</th>
                    <th>Page</th>
                    <th>Ditambahkan Oleh</th>
                    <th>Ditambahkan Pada</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil=mysqli_query($con,"SELECT * FROM tbl_qa WHERE deleted=0 ");
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
                      <td><?php echo "$r[quick_access]"?></td>
                      <td><?php echo "$r[description]"?></td>
                      <td><?php echo "$r[page]"?></td>
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
    <h1> Tambah Data Quick Access </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=qa&act=view">Data Pengguna</a></li>
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
              $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_qa where quick_access='$_POST[quick_access]'"));
              if($cek > 0){
                echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Quick Access sudah ada </h4>
                  </div>";
              }else{
                $query = mysqli_query($con,"INSERT INTO tbl_qa (id,quick_access,description,page,created_by,created_on) 
                VALUES ('','$_POST[quick_access]','$_POST[description]','$_POST[page]','$created_by','$tanggal_sekarang' )");
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
                <div class="form-group">
                  <label class="form-label">quick_access</label>
                  <input name="quick_access"
                  type="text"
                  class="form-control" 
                  required>
                </div>
                <div class="form-group">
                  <label class="form-label">description</label>
                  <input name="description"
                  type="text"
                  class="form-control"
                  required>
                </div> 
                <div class="form-group">
                  <label class="form-label">Page</label>
                  <input name="page"
                  type="text"
                  class="form-control"
                  required>
                </div> 
            </div>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col-md-4 col-md-offset-5">
          <button type="submit" name ='add' class="btn btn-danger">Simpan</button>
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
    <h1>Edit Data Quick Access </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=qa&act=view">Data Pengguna</a></li>
      <li class="active">Update Data Pengguna</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
        #validasi
        error_reporting(0);
          // $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_qa WHERE id='$_GET[id]'"));
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
                            $update = mysqli_query($con,"UPDATE tbl_qa SET quick_access='$_POST[quick_access]', description='$_POST[description]',modified_by='$modified_by',modified_on='$tanggal_update'
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
                
                <input name="id" type="hidden" id="id_qa" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">Quick Access</label>
                  <div class="input-group ">
                    <input name="quick_access" type="text" id="quick_access" class="form-control" value="" required>
                      <span class="input-group-btn">
                        <button type="button" class="cari_qa btn btn-info btn-flat"><i class="fa fa-search"></i>  Cari</button>
                      </span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Description</label>
                  <input name="description"  type="text" id="description" class="form-control">
                </div> 
                <div class="form-group">
                  <label class="form-label">Page</label>
                  <input name="page"  type="text" id="page" class="form-control">
                </div> 
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <!-- <button type="submit" name = 'update' class="btn btn-danger">Update</button> -->
              <button type="button" class="confirm_edit_qa btn btn-danger"><i class="fa fa-edit"></i> Update </button> 
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
    <h1>Hapus Data Quick Access </h1>
    <ol class="breadcrumb">
      <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active"><a href="?pg=qa&act=view">Data Pengguna</a></li>
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
                          $delete = mysqli_query($con,"UPDATE tbl_qa SET deleted='1',modified_by='$modified_by',modified_on='$tanggal_update' WHERE id='$_POST[id]'");
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

                <input name="id" type="hidden" id="id_qa" class="form-control" value="" required>
                <div class="form-group">
                  <label class="form-label">quick_access</label>
                  <div class="input-group ">
                  <input name="quick_access" type="text" id="quick_access" class="form-control" value="" required>
                  <span class="input-group-btn">
                      <button type="button" class="cari_qa btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                    </span>
                </div>
              </div>
              <div class="form-group">
                  <label class="form-label">description</label>
                  <input name="description" id="description" type="text" class="form-control">
                </div> 
                <div class="form-group">
                  <label class="form-label">Page</label>
                  <input name="page" id="page" type="text" class="form-control">
                </div> 
            </div>
          </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-5">
              <button type="button" class="confirm_delete_qa btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
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
<div class="modal" id="modal_confirm_delete_qa" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menghapus Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=qa&act=delete">
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
<div class="modal" id="modal_confirm_edit_qa" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <label>Masukkan Password Login Anda untuk menghapus Data</label>
      </div>
      <div class="modal-body">
        <form role="form" method ="POST" action="?pg=qa&act=edit">
        <input name="id" type="hidden" id="id_edit" class="form-control" >
        <input name="quick_access" type="hidden" id="quick_access_edit" class="form-control" value="" required>
        <input name="description" id="description_edit" type="hidden" class="form-control">
          <div class="form-group">
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
<div class="modal" id="modal_cari_qa" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <!-- data table -->
        <div class="table-responsive">
        <table id="example1" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>quick_access</th>
                <th>Desciption</th>
                <th>Page</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil=mysqli_query($con,"SELECT * FROM tbl_qa");
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo "$no"?></td>
                  <td><?php echo "$r[id]"?></td>
                  <td><a class="pilih_qa" data-quick_access='<?php echo "$r[quick_access]"?>'><?php echo "$r[quick_access]"?></a></td>
                  <td><?php echo "$r[description]"?></td>
                  <td><?php echo "$r[page]"?></td>
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