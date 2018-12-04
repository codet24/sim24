<?php
// error_reporting(0);
session_start();
include "../config/koneksi.php";
include "../config/function.php";
include "../config/fungsi_indotgl.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM INFORMASI MANAJEMEN | PT. DUA EMPAT SINERGI -  CIREBON</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/skin-green.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">

    <!-- Boostrap Sub Menu -->
    <link rel="stylesheet" href="../dist/css/bootstrap-submenu.min.css">
    <script src="../plugins/slider/js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>

      </head>
      <!-- <body class="hold-transition skin-blue-light layout-boxed sidebar-mini "> -->
        <body class="hold-transition skin-green  sidebar-mini ">
        <div class="wrapper">

          <header class="main-header">
            <!-- Logo -->
            <a href="home.php" class="logo" style="position: fixed;">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b> </b></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg">DASHBOARD</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      
                      <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
                      <span class="hidden-xs"> <?php echo strtoupper($_SESSION['username']);?> </span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                        <p>
                          <?php echo "$_SESSION[username] "?> - Dua Empat Sinergi
                          <small>SISTEM INFORMASI MANAJEMEN</small>
                        </p>
                      </li>

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-right">
                          <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                </ul>
              </div>
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar" style="background-image: url('../dist/img/sidebar.jpg');z-index: 1;background-size: cover;position: fixed;">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="position: relative;background: #000;height: 100%;max-height: 1080px;min-height: 768px;z-index: 2;opacity: 0.85;">
            <div class="bg-sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel" style="padding-top: 15px;height: 40px;margin-left: -25px;">
                <div class="pull-left info" >
                  <p style="margin-bottom:0px">PT. DUA EMPAT SINERGI</p>
                  <a href="#"></a>
                </div>
              </div>
              <hr style="margin-right:10px;margin-left:10px;margin-top:10px">
              <!-- search form easy access -->
              <form action="?pg=easy_access" method="post" class="sidebar-form" >
                <div class="input-group">
                  <input type="text" name="easy_access" class="form-control" placeholder="Quick Access">
                  <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>
              <hr style="margin-right:10px;margin-left:10px;margin-top:20px">
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">

                <li class="header">Menu Utama</li>
                <li class="active treeview">
                  <a href="?pg=dashboard">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                  </a>
                </li>

                <?php 
                // if($_SESSION['role_id'] == 1){
                 ?>
                 <!-- <li class="header">Manajemen User</li>
                 <li class="treeview">
                  <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Manajemen User</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="?pg=user&act=manajemen"><i class="fa fa-check-square-o"></i> Manajemen User</a></li>
                    <li><a href="?pg=user&act=view"><i class="fa fa-check-square-o"></i> Lihat User</a></li>
                    <li><a href="?pg=user&act=add"><i class="fa fa-check-square-o"></i> Tambah User</a></li>
                  </ul>
                </li> -->

                <?php
              // }
              ?>
              </ul>
            </div>
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <?php
          include "content.php";
          ?>
          <!-- /.content-wrapper -->


          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>SISTEM INFORMASI MANAJEMEN</b>
            </div>
            <strong>Copyright &copy; 2017 <a href="#">PT. DUA EMPAT SINERGI -  CIREBON</a>.</strong>
          </footer>


      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../dist/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- daterangepicker -->
    <script src="../dist/js/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Fileinput.js -->
    <script src="../bootstrap/js/photo_adm.js"></script>

    <!-- custom js -->
    <script src="js/proses-js.js"></script>
    <!-- js hal user -->
    <script type="text/javascript" src="js/js_hal_user.js"></script>
    <!-- js hal qa -->
    <script type="text/javascript" src="js/js_hal_qa.js"></script>
    <!-- js hal qa detail -->
    <script type="text/javascript" src="js/js_hal_qa_detail.js"></script>
    <!-- js hal doc pengajuan jpo -->
    <script type="text/javascript" src="js/js_hal_doc_a.js"></script>
    <!-- js hal doc pengajuan opo -->
    <script type="text/javascript" src="js/js_hal_doc_b.js"></script>
    <!-- js hal divisi -->
    <script type="text/javascript" src="js/js_hal_divisi.js"></script>
    <!-- js hal karyawan -->
    <script type="text/javascript" src="js/js_hal_karyawan.js"></script>
    
    <!-- manggill java script -->
    <!-- <script type="text/javascript" src="js/js_hal_user.js"></script> -->
    <!-- ajax -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->


    <!-- page script -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example1').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
        // table qa
        $('#table_qa').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
        // table user
        $('#table_user').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
        // table qa_dtl
        $('#table_qa_dtl').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
      });
    </script>
    <!-- datepicker -->
    <!-- page script datepicker -->
    <script>
      $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.content form').length>0 ? $('.content form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>

<!-- generate for add-->
<script type="text/javascript"> 
 $(document).ready(function () {
  var sample = $('#sample').html();

$(document).on('click', '.generate', function() {
  $('#sample').append(sample);
});

$(document).on("click",".remove",function(){ 
  $(this).parents(".form").remove();
});
$('#sample').on('keyup', '[name^=unit], [name^=harga]', function() {
  // get related form
  var form = $(this).closest('.form');
  // get its related values
  var unit = parseInt(form.find('[name^=unit]').val(), 10),
      harga = parseInt(form.find('[name^=harga]').val(), 10);
      

      // subtotal = parseInt(form.find('[name^=subtotal]').val(), 10);
  // ensure only numbers are given
  if (!isNaN(unit) && !isNaN(harga) ) {
    var $subtotal = (unit * harga)
    form.find('[name^=subtotal]').val($subtotal);
  }
});

});
</script>



<script type="text/javascript">

//jika jumlah diganti
$(document).on('click', '.munculkan_detail', function() {
    var jml =  document.getElementById("jumlah").value;
    var id =  document.getElementById("id_doc_a_for_detail").value;
    // alert(id);
    $.ajax({
    type: "POST",
    data: {jml: jml, id: id},
    url: "edit_doc_a.php",
    success: function(res){
      $("#results #isi").html(res);
    }
  });
  $("#loading").html("<img src='../dist/img/ajax/loader.gif'/>");

 });
</script>
    
</body>
</html>
