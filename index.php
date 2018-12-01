<?php 
// include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MANAGEMENT DATABASE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue-light.min.css">
    <!-- Boostrap Sub Menu -->
    <link rel="stylesheet" href="dist/css/bootstrap-submenu.min.css">
    <!-- Boostrap dan JS Slider -->
    <link href="dist/slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="dist/slider/js-image-slider.js" type="text/javascript"></script>
    <script src="plugins/slider/js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
      <body class="hold-transition skin-blue-light layout-top-nav layout-boxed sidebar-mini">
        <div class="wrapper">

          <header class="main-header">
            <nav class="navbar navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <a href="#" class="navbar-brand"><b>PT. DUA EMPAT SINERGI</b></a>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                  </button>
                </div>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                      <!-- Menu Toggle Button -->
                      <a href="login.php" class="">
                        <!-- The user image in the navbar-->
                        <!--<img src="dist/img/wq.jpg" class="user-image" alt="User Image">-->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <!-- <i class="fa fa fa-key"><span class="hidden-xs"> Login Admin</span></i> -->
                      </a>
                      <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                          <p>
                            Login Administrator
                            <small>2016</small>
                          </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <div class="pull-right">
                            <form action="page/cek_login.php" method="POST">
                              <div class="body bg-white">
                                <div class="form-group">
                                  <label class="col-md-12 control-label">Username</label>
                                  <input type="text" name="username" class="form-control" placeholder="User ID" required/>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-12 control-label">Password</label>
                                  <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                                </div>
                              </div>
                              <div class="footer">
                                <button type="submit" class="btn bg-olive btn-block">Login</button>      
                              </div>
                            </form>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-custom-menu -->
              </div><!-- /.container-fluid -->
            </nav>
          </header>

          <!-- Main content -->
          <?php include "HalamanAwal.php"; ?>
          <!-- /.content -->


          <footer class="main-footer">
            <div class="container">
              <div class="pull-right hidden-xs">
                <b></b>
              </div>
              <strong>Copyright &copy; 2018 <a href="#">PT. DUA EMPAT SINERGI</a></strong>
            </div><!-- /.container -->
          </footer>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>

        <script src="dist/js/bootstrap-submenu.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function() {

            $( ".dropdown-submenu" ).click(function(event) {
        // stop bootstrap.js to hide the parents
        event.stopPropagation();
        // hide the open children
        $( this ).find(".dropdown-submenu").removeClass('open');
        // add 'open' class to all parents with class 'dropdown-submenu'
        $( this ).parents(".dropdown-submenu").addClass('open');
        // this is also open (or was)
        $( this ).toggleClass('open');
      });
          });
        </script>

        <script>
          $(document).ready(function() {
              $(document).on('click', '.tes_koneksi', function() {
                var database_name = document.getElementById("database_name").value;
                var hostname = document.getElementById("hostname").value;
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;

                $.ajax({
                    url: "http://localhost/sim24/config/koneksi.php",
                    data: $('#form0').serialize() ,
                }).success(function (data) {
                  alert("koneksi Ke Database "+data+" dapat dilakukan");
                  window.location='index.php';
                })
            })
          });
        </script>

        <style type="text/css">
        #loading { position: absolute; top: 0; left: 0; color: white; background:url(dist/img/ajax/loader.gif); padding: 10px 10px; font: 12px Arial;  }
        </style>
        <script type="text/javascript">
        $(function() {
            $('#loading').ajaxStart(function(){
                $(this).fadeIn();
            }).ajaxStop(function(){
                $(this).fadeOut();
            });

            $('#menu a').click(function() {
                var url = $(this).attr('href');

                $('#content-config').load(url);
                return false;
            });
        });
        </script>
        

      </body>
      </html>
