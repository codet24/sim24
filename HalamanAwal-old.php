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
      <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">

                  <div class="login-box">
                    <div class="login-box-body">
                    <img src="dist/img/logo.jpg" style="max-width: 100%;width: 70%; margin: 40px;">
                    
                    </div><!-- /.login-box-body -->
                  </div><!-- /.login-box -->
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">

                  <div class="login-box">
                    <div class="login-box-body">
                      <h3 class="login-box-msg">Login </h3>
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

                    </div><!-- /.login-box-body -->
                  </div><!-- /.login-box -->
                </div>
              </div>
            </div><!-- .boxrow -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div> <!-- /.col -->

      <div class="col-md-3">
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

     <!-- <div class="col-md-3">
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
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">LogIn</button>
                  </div>
                </div>
              </form>
         </div>
       </div>
     </div>  -->

     <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body">
            <button type="submit" class="btn btn-success btn-block btn-flat">Configuration Database</button>
           <!-- </div> -->
         </div>
       </div>
     </div> 

   </div>
   <!-- Main row -->


   <!-- /.row (main row) -->
 </section> <!-- /.content -->

</div><!-- /.container -->
</div><!-- /.content-wrapper -->