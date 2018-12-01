<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sistem Informasi Manajemen PT. Dua Empat Sinergi</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <section class="content">
     <div class="row">
        <div id="content-config">
          <div class="col-md-9">
            <center>
              <div id="loading" style="display:none">Loading...</div> 
              <?php
              // include "config/config-database.php";
              ?>
            </center>
          </div>
        </div>
      <!-- </div> -->

    <div class="col-md-3">
      <div class="col-md-12" style="padding: 0px;">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
             <h4>Selamat Datang</h4>
             <p >
               Aplikasi Management Connection Database PT. Dua Empat Sinergi -  Cirebon
             </p>
           </div>
         </div>
       </div><!-- /.box-body -->
     </div> <!-- /.col -->

     <div class="col-md-12" style="padding: 0px;">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
             <h4>Login Sistem</h4>
           </div>
                <form action="page/cek_login.php" method="post">
                <div class="form-group has-feedback">
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
                  <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" name="pass" class="form-control" placeholder="Password" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">LogIn</button>
                  </div><!-- /.col -->
                  <?php 
                  include "config/koneksi.php"
                  ?>
                </div>
              </form>
         </div>
       </div><!-- /.box-body -->
     </div> <!-- /.col -->

     <div class="col-md-12" style="padding: 0px;">
        <div class="box box-primary">
          <div class="box-body">
            <div id="menu">
            <a style="color:#FFF" href="page/page_load.php?id=konfigurasi_database">
              <button class="btn btn-success btn-block btn-flat">
                 Configuration Database
                </button>
                </a><br>
              <a style="color:#FFF" href="page/page_load.php?id=konfigurasi_database">
              <button class="btn btn-success btn-block btn-flat">
                 Home
                </button>
              </a>
           </div>
         </div>
       </div>
     </div> 
     </div>
   </div>
   <!-- Main row -->


   <!-- /.row (main row) -->
 </section> <!-- /.content -->

</div><!-- /.container -->
</div><!-- /.content-wrapper -->